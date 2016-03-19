<!DOCTYPE html>
<html lang="en">

<?php require 'views/head.php'; ?>

<body>
    <div class="container">
        <h1>Humans</h1>

        <!-- Resources -->
        <div id="inventory">
            <!-- Unemployed -->
            <div class="resource-panel" title="idling">
                <div class="icon">
                    <i class="fa fa-bed"></i>
                </div>
                <span class="resource-qty idling"></span>
                <div class="production_container discreet">
                    &nbsp;
                </div>
                <div class="btn-group btn-group-xs">
                    &nbsp;
                </div>
                <div>Unemployed</div>
            </div>
            <!-- Humans -->
            <div class="resource-panel" title="humans">
                <div class="icon">
                    <i class="fa fa-user fa-fw"></i>
                </div>
                <span class="resource-qty humans"></span>
                /<span class="homes-cap discreet"></span>
                <div class="humans change_container discreet">
                    <span class="humans_change_up" style="display:none">+</span>
                    <span class="humans_change_down" style="display:none">-</span>
                    <span class="humans_change"></span>
                    <i class="fa fa-user fa-fw"></i>
                </div>
                <div class="btn-group btn-group-xs">
                    <button type="button" class="btn btn-danger dec_sexing"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-success inc_sexing"><i class="fa fa-plus"></i></button>
                </div>
                <i class="fa fa-users"></i> <span class="sexing"></span>
                <div>Reproducing</div>
            </div>
            <!-- Food -->
            <div class="resource-panel" title="food">
                <div class="icon">
                    <i class="fa fa-apple fa-fw"></i>
                </div>
                <span class="resource-qty food"></span>
                <div class="food change_container discreet">
                    <span class="food_change_up" style="display:none">+</span>
                    <span class="food_change_down" style="display:none">-</span>
                    <span class="food_change"></span><i class="fa fa-apple fa-fw"></i>
                </div>
                <div class="btn-group btn-group-xs">
                    <button type="button" class="btn btn-danger dec_farming"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-success inc_farming"><i class="fa fa-plus"></i></button>
                </div>
                <i class="fa fa-users"></i> <span class="farming"></span>
                <div>Farming</div>
            </div>
            <!-- Wood -->
            <div class="resource-panel" title="wood">
                <div class="icon">
                    <i class="fa fa-tree fa-fw" ></i><br>
                </div>
                <span class="resource-qty wood"></span>
                <div class="production_container discreet">
                    &nbsp;
                </div>
                <div class="btn-group btn-group-xs">
                    <button type="button" class="btn btn-danger dec_lumbering"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-success inc_lumbering"><i class="fa fa-plus"></i></button>
                </div>
                <i class="fa fa-users"></i> <span class="lumbering"></span>
                <div>Logging</div>
            </div>
            <!-- Homes -->
            <div class="resource-panel" title="homes">
                <div class="icon">
                    <i class="fa fa-home"></i>
                </div>
                <span class="resource-qty homes"></span>
                <div class="production_container discreet">
                    &nbsp;
                </div>
                <div class="btn-group btn-group-xs">
                    <button type="button" class="btn btn-success inc_homes"><i class="fa fa-plus"></i></button>
                </div>
                <div><i class="fa fa-tree fa-fw" ></i>40 <i class="fa fa-arrow-right fa-fw" ></i> +/4<i class="fa fa-users fa-fw" ></i></div>
            </div>
            <!-- Bit Coin -->
            <div class="resource-panel" title="bitcoin">
                <div class="icon">
                    <i class="fa fa-bitcoin fa-fw" ></i><br>
                </div>
                <span class="resource-qty bitcoin"></span>
                <div class="production_container discreet">
                    &nbsp;
                </div>
                <div class="btn-group btn-group-xs">
                    <button type="button" class="btn btn-danger dec_mining_bitcoin"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-success inc_mining_bitcoin"><i class="fa fa-plus"></i></button>
                </div>
                <i class="fa fa-users"></i> <span class="mining_bitcoin"></span>
                <div>Bitcoin Mining</div>
            </div>
            <!-- Ticks -->
            <div class="resource-panel" title="ticks">
                <div class="icon">
                    <i class="fa fa-clock-o fa-fw" ></i><br>
                </div>
                <span class="resource-qty ticks"></span>
                <div class="production_container discreet">
                    &nbsp;
                </div>
                <div class="btn-group btn-group-xs">
                    &nbsp;
                </div>
                <div>Ticks</div>
            </div>
        </div>



        <div class="btn-group btn-group-xs">
            <button type="button" class="btn btn-default change-qty-1">1</button>
            <button type="button" class="btn btn-default change-qty-10">10</button>
            <button type="button" class="btn btn-default change-qty-100">100</button>
            <button type="button" class="btn btn-default change-qty-1000">1000</button>
            <button type="button" class="btn btn-default change-qty-1000000">1000000</button>
        </div>
        x<span class="qty"></span> multiplier<br>
    </div>



    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col-xs-6">
                <!-- Help -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Help</h3>
                    </div>
                    <div class="panel-body">
                        <ul style="list-style-type: none; padding-left: 0;">
                            <li><i class="fa fa-users fa-fw" ></i> Humans need <i class="fa fa-apple fa-fw" ></i> food or they <span style="color:red;">-1<i class="fa fa-user fa-fw" ></i></span> die.</li>
                            <li><i class="fa fa-users fa-fw" ></i> Humans each consume <span style="color:red;">-1<i class="fa fa-apple fa-fw" ></i></span> food per <i class="fa fa-clock-o fa-fw" ></i> tick.</li>
                            <li><i class="fa fa-users fa-fw" ></i> Humans farm <span style="color:green;">+<i class="fa fa-apple fa-fw" ></i></span> food.</li>
                            <li><i class="fa fa-users fa-fw" ></i> Humans reproduce <span style="color:green;">+<i class="fa fa-user fa-fw" ></i></span> humans.</li>
                            <li><i class="fa fa-users fa-fw" ></i> Humans collect <span style="color:green;">+<i class="fa fa-tree fa-fw" ></i></span> wood.</li>
                            <li><i class="fa fa-home fa-fw" ></i> Homes cost <span style="color:red;">40<i class="fa fa-tree fa-fw" ></i></span> wood and allow <span style="color:green;">+4<i class="fa fa-users fa-fw" ></i></span> human capacity.</li>
                            <li><i class="fa fa-users fa-fw" ></i> Humans collect <span style="color:green;">+<i class="fa fa-bitcoin fa-fw" ></i></span> bitcoin.</li>
                            <li><em>Fastest (fewest <i class="fa fa-clock-o fa-fw" ></i> ticks) to 1,000 <i class="fa fa-bitcoin fa-fw" ></i></span> bitcoin wins!</em></li>
                        </ul>
                        <hr>
                        <h4>Getting Started</h4>
                        <ol>
                            <li>
                                You start with 3 <i class="fa fa-users fa-fw" ></i> humans. 2 are farming. 1 is unemployed. <strong>Click on the <button type="button" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> green plus button next to farming</strong> to give the unemployed human a job.  Notice your <span style="color:green;">+<i class="fa fa-apple fa-fw" ></i></span> food increasing more quickly.  3 Farmers produce +6 food/tick, but humans eat 1 food/tick.  Your net food change is +3 food/tick.
                            </li>
                            <li>
                                When you have enough <i class="fa fa-apple fa-fw" ></i> food, you can send a couple farmers to reproduce for a few <i class="fa fa-clock-o fa-fw" ></i> ticks.  <strong>Click the <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></button> red minus button next to Farming twice.  Click the <button type="button" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> green plus button next to Reproducing twice.</strong> Notice a new <span style="color:green;">+1<i class="fa fa-user fa-fw" ></i></span> human is produced.  <strong>Quickly put everyone back on farming</strong> before you starve and <span style="color:red;">-1<i class="fa fa-user fa-fw" ></i></span> die!
                            </li>
                            <li>
                                You are maxed at 4 <i class="fa fa-users fa-fw" ></i> humans because you only have 1 <i class="fa fa-home fa-fw" ></i> home.  For more humans we need to build another Home.  We need wood to build a home.  <strong>Put a couple workers on lumbering</strong>.  When we get 40 <i class="fa fa-tree fa-fw" ></i> wood we can <strong>build another <span style="color:green;">+1<i class="fa fa-home fa-fw" ></i></span> home</strong>.
                            </li>
                            <li>
                                Build up your population. <strong> Put a couple humans on reproduction</strong>.  Keep building <i class="fa fa-home fa-fw" ></i> homes and build up to a steady flow of new +<i class="fa fa-user fa-fw" ></i> humans.  Satisfy the increasing <i class="fa fa-apple fa-fw" ></i> food demand.
                            </li>
                            <li>
                                Achieve 1,000 <i class="fa fa-bitcoin fa-fw" ></i> bitcoin as <i class="fa fa-clock-o fa-fw" ></i> quickly as possible!
                            </li>
                        </ol>
                        You can increase the multiplier when you want to move more <i class="fa fa-users fa-fw" ></i> humans per click
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">High Scores</h3>
                        <em>fastest (least ticks) to 1,000 <i class="fa fa-bitcoin fa-fw" ></i> Bitcoin</em>
                    </div>
                    <div class="panel-body">
                        <div id="highscores">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Ticks</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">


    </div>
</body>

</html>
