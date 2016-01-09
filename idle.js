var idling = 0;
var sexing = 2;
var farming = 4;
var food = 0;
var food_prod = '';
var food_cons = '';
var food_diff = '';
var human_diff = '';
var qty = 1;

$(function() {
    refresh_display();
    setInterval(loop, 1000);
    
    $("button.inc_sexing").click(function() {add_sexing()});
    $("button.dec_sexing").click(function() {sub_sexing()});
    $("button.inc_farming").click(function() {add_farming()});
    $("button.dec_farming").click(function() {sub_farming()});

    $("button.change-qty-1").click(function() {setQty(1); });
    $("button.change-qty-10").click(function() {setQty(10); });
    $("button.change-qty-100").click(function() {setQty(100); });
});

function loop() {
    
    // food
    food_prod = 2*farming; // production
    food_cons = humans(); // consumption
    food_diff = food_prod - food_cons; // difference
    food += food_diff; // new total
    
    // starvation
    if (food <= 0) {
        food = 0;
        if (idling > 0) {
            idling--;
        } else if (sexing > 0) {
            sexing--;
        } else if (farming > 0) {
            farming--;
        } else {
            // lose game
        }
    } else {
        // reproduction if not dying
        human_diff = Math.floor(sexing/2);
        idling += human_diff;
    }
    
    refresh_display();
}

function refresh_display() {
    $(".humans").html(humans());
    $(".food_diff").html(food_diff+'/sec');
    $(".human_diff").html(human_diff+'/sec');
    $(".food_prod").html(food_prod+'/sec');
    
    $(".idling").html(idling);
    $(".sexing").html(sexing);
    $(".farming").html(farming);
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
    
    if (human_diff > 0) {
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

function add_sexing() {
    var ch_qty = available_from_qty(idling, qty);
    if (ch_qty > 0) {
        idling -= ch_qty;
        sexing += ch_qty;
        refresh_display();
    }
}

function sub_sexing() {
    var ch_qty = available_from_qty(sexing, qty);
    if (ch_qty > 0) {
        sexing -= ch_qty;
        idling += ch_qty;
        refresh_display();
    }
}

function add_farming() {
    var ch_qty = available_from_qty(idling, qty);
    if (ch_qty > 0) {
        idling -= ch_qty;
        farming += ch_qty;
        refresh_display();
    }
}

function sub_farming() {
    var ch_qty = available_from_qty(farming, qty);
    if (ch_qty > 0) {
        farming -= ch_qty;
        idling += ch_qty;
        refresh_display();
    }
}

function humans() {
    return idling + sexing + farming;
}

function setQty(x) {
    qty = x;
    refresh_display();
}