var idling = 0;
var sexing = 2;
var farming = 8;
var food = 0;
var food_diff;

$(function() {
    refresh_display();
    setInterval(loop, 1000);
    
    $("button.inc_sexing").click(function() {add_sexing()});
    $("button.dec_sexing").click(function() {sub_sexing()});
    
    $("button.inc_farming").click(function() {add_farming()});
    $("button.dec_farming").click(function() {sub_farming()});
});

function loop() {
    // reproduction
    idling += Math.random() < 0.1 ? Math.floor(sexing/2) : 0;
    
    // consumption
    food_diff = 2*farming - humans();
    food += food_diff;
    
    refresh_display();
}

function refresh_display() {
    $(".idling").html(idling);
    $(".sexing").html(sexing);
    $(".farming").html(farming);
    $(".food").html(food);
    
    if (food_diff > 0) {
        $(".food_diff_down").hide();
        $(".food_diff_up").show();
    } else {
        $(".food_diff_up").hide();
        $(".food_diff_down").show();
    }
}

function add_sexing() {
    if (idling >= 1 ) {
        idling--;
        sexing++;
    }
    refresh_display();
}

function sub_sexing() {
    if (sexing >= 1 ) {
        sexing--;
        idling++;
    }
    refresh_display();
}

function add_farming() {
    if (idling >= 1 ) {
        idling--;
        farming++;
    }
    refresh_display();
}

function sub_farming() {
    if (farming >= 1 ) {
        farming--;
        idling++;
    }
    refresh_display();
}

function humans() {
    return idling + sexing + farming;
}