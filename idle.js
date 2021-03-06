var humans = {
    idling: 1,
    sexing: 0,
    farming: 2,
    lumbering: 0,
    mining_bitcoin: 0,
    delta: 0,
    count: function() {
        return this.idling + this.sexing + this.farming + this.lumbering + this.mining_bitcoin;
    },
    assign: function(job, qty) {
        if (qty > 0) {
            var ch_qty = available_from_qty(this.idling, qty);
            if (ch_qty > 0) {
                switch(job) {
                    case "sexing":
                        this.idling -= ch_qty;
                        this.sexing += ch_qty;
                        break;
                    case "farming":
                        this.idling -= ch_qty;
                        this.farming += ch_qty;
                        break;
                    case "lumbering":
                        this.idling -= ch_qty;
                        this.lumbering += ch_qty;
                        break;
                    case "mining_bitcoin":
                        this.idling -= ch_qty;
                        this.mining_bitcoin += ch_qty;
                        break;
                    default:
                        break;
                }
            }
        } else if (qty < 0) {
            switch(job) {
                case "sexing":
                    var ch_qty = available_from_qty(this.sexing, -qty);
                    this.sexing -= ch_qty;
                    this.idling += ch_qty;
                    break;
                case "farming":
                    var ch_qty = available_from_qty(this.farming, -qty);
                    this.farming -= ch_qty;
                    this.idling += ch_qty;
                    break;
                case "lumbering":
                    var ch_qty = available_from_qty(this.lumbering, -qty);
                    this.lumbering -= ch_qty;
                    this.idling += ch_qty;
                    break;
                case "mining_bitcoin":
                    var ch_qty = available_from_qty(this.mining_bitcoin, -qty);
                    this.mining_bitcoin -= ch_qty;
                    this.idling += ch_qty;
                    break;
                default:
                    break;
            }
        }
        refresh_display();
    },
    reproduce_and_starve: function() {
        // starvation
        if (food <= 0) {
            food = 0;
            if (this.idling > 0) {
                this.idling--;
            } else if (this.sexing > 0) {
                this.sexing--;
            } else if (this.mining_bitcoin > 0) {
                this.mining_bitcoin--;
            } else if (this.lumbering > 0) {
                this.lumbering--;
            } else if (this.farming > 0) {
                this.farming--;
            } else {
                // lose game
            }
            this.delta = -1;
            new_humans = 0;
        } else {
            // reproduction if not dying
            new_humans = Math.floor(humans.sexing/2);
            if ((this.count() + new_humans) > homes*4) {
                new_humans = homes*4 - this.count();
            }
            this.idling += new_humans;
            this.delta = new_humans;
        }
    }
};

var food = 0;
var wood = 0;
var bitcoin = 0;
var ticks = 0;
var homes = 1;

var wood_cost_per_home = 40;

var food_prod = '';
var food_cons = '';
var food_change = '';
var new_humans = '';
var qty = 1;

var achieved_1000_bitcoin = false;

$(function() {
    refresh_display();
    get_scores();

    setInterval(loop, 1000);

    $("button.inc_sexing").click(function() { humans.assign("sexing",qty) });
    $("button.dec_sexing").click(function() { humans.assign("sexing",-qty) });
    $("button.inc_farming").click(function() { humans.assign("farming",qty) });
    $("button.dec_farming").click(function() { humans.assign("farming",-qty) });
    $("button.inc_lumbering").click(function() { humans.assign("lumbering",qty) });
    $("button.dec_lumbering").click(function() { humans.assign("lumbering",-qty) });
    $("button.inc_mining_bitcoin").click(function() { humans.assign("mining_bitcoin",qty) });
    $("button.dec_mining_bitcoin").click(function() { humans.assign("mining_bitcoin",-qty) });

    $("button.inc_homes").click(function() { build_homes(qty) });

    $("button.inc_multiplier").click(function() { setQty(Math.floor(qty*10)); });
    $("button.dec_multiplier").click(function() { setQty(Math.floor(qty/10)); });

    $("button.change-qty-1").click(function() {setQty(1); });
    $("button.change-qty-10").click(function() {setQty(10); });
    $("button.change-qty-100").click(function() {setQty(100); });
    $("button.change-qty-1000").click(function() {setQty(1000); });
    $("button.change-qty-1000000").click(function() {setQty(1000000); });
});

function loop() {
    ticks++;

    // food
    food_prod = 2*humans.farming; // production
    food_cons = humans.count(); // consumption
    food_change = food_prod - food_cons; // difference
    food += food_change; // new total

    // wood
    wood += humans.lumbering;

    // bitcoin
    bitcoin += humans.mining_bitcoin; //@todo should be random per miner

    humans.reproduce_and_starve();

    if (humans.delta < 0) {
        noty({
            text: humans.delta + " humans",
            layout: 'bottomRight',
            type: 'error',
            timeout: 1000

        });
    } else if (humans.delta > 0) {
        noty({
            text: "+" + humans.delta + " humans",
            layout: 'bottomRight',
            type: 'success',
            timeout: 1000

        });
    }


    refresh_display();

    if (!achieved_1000_bitcoin && bitcoin >= 1000) {
        achieved_1000_bitcoin = true;
        var username = prompt("You got 1000 bitcoin!  What's your name?");
        save_score(username, ticks);
    }
}

function refresh_display() {
    $(".resource-qty.humans").html(metrify(humans.count()));
    $(".resource-qty.food").html(metrify(food));
    $(".resource-qty.wood").html(metrify(wood));
    $(".resource-qty.bitcoin").html(metrify(bitcoin));
    $(".resource-qty.ticks").html(ticks);
    $(".resource-qty.homes").html(metrify(homes));

    $(".homes-cap").html(metrify(homes*4));

    $(".humans_change").html(Math.abs(humans.delta));
    $(".food_change").html(Math.abs(food_change));
    $(".new_humans").html(new_humans);

    $(".idling").html(metrify(humans.idling));
    $(".sexing").html(metrify(humans.sexing));
    $(".farming").html(metrify(humans.farming));
    $(".lumbering").html(metrify(humans.lumbering));
    $(".mining_bitcoin").html(metrify(humans.mining_bitcoin));

    $(".wood_cost_per_home").html(wood_cost_per_home);

    $(".qty").html(metrify(qty));

    if (humans.delta > 0) {
        $(".humans.change_container").css({'color':'green'});
        $(".humans_change_down").hide();
        $(".humans_change_up").show();
    } else if (humans.delta == 0) {
        $(".humans.change_container").css({'color':'black'});
        $(".humans_change_up").hide();
        $(".humans_change_down").hide();
    } else {
        $(".humans.change_container").css({'color':'red'});
        $(".humans_change_up").hide();
        $(".humans_change_down").show();
    }

    if (food_change > 0) {
        $(".food.change_container").css({'color':'green'});
        $(".food_change_down").hide();
        $(".food_change_up").show();
    } else if (food_change == 0) {
        $(".food.change_container").css({'color':'black'});
        $(".food_change_down").hide();
        $(".food_change_up").hide();
    } else {
        $(".food.production_container").css({'color':'red'});
        $(".food_change_up").hide();
        $(".food_change_down").show();
    }
}

function available_from_qty(f, q) {
    return f >= q ? q : f;
}

function setQty(x) {
    qty = x > 0 ? x : 1;
    refresh_display();
}

// convert value to abbreviated metric strings for display
function metrify(x) {
    if (x < 1000) {
        return x;
    } else if (x < 1000000) {
        return Math.round(x/1000 *100)/100 + 'k';
    } else if (x < 1000000000) {
        return Math.round(x/1000000 *100)/100 + 'm';
    } else if (x < 1000000000000) {
        return Math.round(x/1000000000 *100)/100 + 'b';
    } else {
        return Math.round(x/1000000000000 *100)/100 + 't';
    }
}

function build_homes(qty) {
    var can_afford = Math.floor(wood/wood_cost_per_home);
    var will_build = can_afford >= qty ? qty : can_afford;
    wood -= will_build * wood_cost_per_home;
    homes += will_build;
}

/**
 * API
 */
function save_score(username, ticks) {
    $.ajax({
        url: api_url,
        method: "POST",
        data: {
            "username": username,
            "ticks": ticks
        }
    })
}

function get_scores() {
    $.ajax({
        method: "GET",
        url: api_url,
        data: { "action": "get_scores" },
        success: function(data) {
            json = JSON.parse(data);
            json.forEach(function(d) {
                $("#highscores tbody").append("<tr><td>"+d.username+"</td><td>"+d.ticks+"</td></tr>");
            });
        }
    });
}