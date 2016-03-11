var humans = {
    idling: 1,
    sexing: 0,
    farming: 2,
    lumbering: 0,
    delta: 0,
    count: function() {
        return this.idling + this.sexing + this.farming + this.lumbering;
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
var homes = 1;
var wood_cost_per_home = 40;

var food_prod = '';
var food_cons = '';
var food_diff = '';
var new_humans = '';
var qty = 1;

$(function() {
    refresh_display();
    setInterval(loop, 1000);

    $("button.inc_sexing").click(function() { humans.assign("sexing",qty) });
    $("button.dec_sexing").click(function() { humans.assign("sexing",-qty) });
    $("button.inc_farming").click(function() { humans.assign("farming",qty) });
    $("button.dec_farming").click(function() { humans.assign("farming",-qty) });
    $("button.inc_lumbering").click(function() { humans.assign("lumbering",qty) });
    $("button.dec_lumbering").click(function() { humans.assign("lumbering",-qty) });

    $("button.inc_homes").click(function() { build_homes(qty) });

    $("button.change-qty-1").click(function() {setQty(1); });
    $("button.change-qty-10").click(function() {setQty(10); });
    $("button.change-qty-100").click(function() {setQty(100); });
    $("button.change-qty-1000").click(function() {setQty(1000); });
    $("button.change-qty-1000000").click(function() {setQty(1000000); });
});

function loop() {

    // food
    food_prod = 2*humans.farming; // production
    food_cons = humans.count(); // consumption
    food_diff = food_prod - food_cons; // difference
    food += food_diff; // new total

    // wood
    wood += humans.lumbering;

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
}

function refresh_display() {
    $(".humans").html(metrify(humans.count()));
    $(".food").html(metrify(food));
    $(".wood").html(metrify(wood));
    $(".homes").html(metrify(homes));

    $(".human_diff").html(Math.abs(humans.delta));
    $(".food_diff").html(Math.abs(food_diff));
    $(".new_humans").html(new_humans+' humans/sec');
    $(".food_prod").html(food_prod+' food/sec');

    $(".idling").html(metrify(humans.idling));
    $(".sexing").html(metrify(humans.sexing));
    $(".farming").html(metrify(humans.farming));
    $(".lumbering").html(metrify(humans.lumbering));

    $(".wood_cost_per_home").html(wood_cost_per_home);


    $(".qty").html(qty);

    if (humans.delta > 0) {
        $(".human_diff_container").css({'color':'green'});
        $(".human_diff_down").hide();
        $(".human_diff_up").show();
    } else {
        $(".human_diff_container").css({'color':'red'});
        $(".human_diff_up").hide();
        $(".human_diff_down").show();
    }
    $(".human_diff_container").show().delay(400).fadeOut();

    if (food_diff > 0) {
        $(".food_diff_container").css({'color':'green'});
        $(".food_diff_down").hide();
        $(".food_diff_up").show();
    } else {
        $(".food_diff_container").css({'color':'red'});
        $(".food_diff_up").hide();
        $(".food_diff_down").show();
    }
    $(".food_diff_container").show().delay(400).fadeOut();

    if (new_humans > 0) {
        $(".new_humans_container").css({'color':'green'});
        $(".new_humans_down").hide();
        $(".new_humans_up").show();
    } else {
        $(".new_humans_container").css({'color':'red'});
        $(".new_humans_up").hide();
        $(".new_humans_down").show();
    }

    if (food_prod > 0) {
        $(".food_prod_container").css({'color':'green'});
        $(".food_prod_down").hide();
        $(".food_prod_up").show();
    } else {
        $(".food_prod_container").css({'color':'red'});
        $(".food_prod_up").hide();
        $(".food_prod_down").show();
    }
}

function available_from_qty(f, q) {
    return f >= q ? q : f;
}

function setQty(x) {
    qty = x;
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
    if (wood/wood_cost_per_home >= qty) {
        wood -= qty*wood_cost_per_home;
        homes += qty;
    }
}