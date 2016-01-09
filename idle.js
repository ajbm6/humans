var humans = {
    idling: 0,
    sexing: 2,
    farming:4,
    count: function() {
        return this.idling + this.sexing + this.farming;
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
                default:
                    break;
            }
        }
        refresh_display();
    },
    reproduce: function() {
        var delta = Math.floor(humans.sexing/2);
        this.idling += delta;
        return delta;
    },
    starve: function() {
        if (this.idling > 0) {
            this.idling--;
        } else if (this.sexing > 0) {
            this.sexing--;
        } else if (this.farming > 0) {
            this.farming--;
        } else {
            // lose game
        }
    }
};

var food = 100;
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

    $("button.change-qty-1").click(function() {setQty(1); });
    $("button.change-qty-10").click(function() {setQty(10); });
    $("button.change-qty-100").click(function() {setQty(100); });
});

function loop() {
    
    // food
    food_prod = 2*humans.farming; // production
    food_cons = humans.count(); // consumption
    food_diff = food_prod - food_cons; // difference
    food += food_diff; // new total
    
    // starvation
    if (food <= 0) {
        food = 0;
        humans.starve();
    } else {
        // reproduction if not dying
        new_humans = humans.reproduce();
    }
    
    refresh_display();
}

function refresh_display() {
    $(".humans").html(humans.count());
    $(".food_diff").html(food_diff+'/sec');
    $(".human_diff").html(new_humans+'/sec');
    $(".food_prod").html(food_prod+'/sec');
    
    $(".idling").html(humans.idling);
    $(".sexing").html(humans.sexing);
    $(".farming").html(humans.farming);
    $(".food").html(food);
    
    $(".qty").html(qty);
    
    if (food_diff > 0) {
        $(".food_diff_container").css({'color':'green'});
        $(".food_diff_down").hide();
        $(".food_diff_up").show();
    } else {
        $(".food_diff_container").css({'color':'red'});
        $(".food_diff_up").hide();
        $(".food_diff_down").show();
    }
    
    if (new_humans > 0) {
        $(".human_diff_container").css({'color':'green'});
        $(".human_diff_down").hide();
        $(".human_diff_up").show();
    } else {
        $(".human_diff_container").css({'color':'red'});
        $(".human_diff_up").hide();
        $(".human_diff_down").show();
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