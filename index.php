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
                <div>Ticks of time</div>
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
                        <p>Humans reproduce and consume food.  Humans need food or they die.</p>
                        <h4>Getting Started</h4>
                        <ol>
                            <li>
                                You start with 3 Humans. 2 are Farming. 1 is Idle.<br>
                                <strong>Action:</strong> Put the Idle Human to work Farming by clicking on the green plus (+) next to Farming.<br>
                                Notice your Food increasing more quickly.  With your 3 Farmers, you produce +6 food/tick, but humans eat 1 food/tick so the net change is +3 food/tick (indicated in green above).
                            </li>
                            <li>
                                When you build up enough food, you can send a couple farmers to Sexing for a few seconds.<br>
                                <strong>Action:</strong> Click the red (-) next to Farming twice.  Click the green (+) next to Sexing twice.<br>
                                Notice a new Human is produced!<br>
                                <strong>Action:</strong> Quickly put everyone back on farming before you starve and die!
                            </li>
                            <li>
                                You are maxed at 4 Humans because you only have 1 Home.  Notice Homes have a capacity of 4 humans and cost 40 wood to build.  For more Humans we need to build another Home.  Let's get some Wood.<br>
                                <strong>Action:</strong> Put a couple workers on Lumbering.<br>
                            </li>
                            <li>
                                When we get 40 Wood we can build another Home.  Then we can have more Humans.<br>
                                <strong>Action:</strong> Build a Home.
                            </li>
                            <li>
                                Now that you're getting the hang of it, let's build up a steady population growth.<br>
                                <strong>Action:</strong> Put a couple humans on Sexing.<br>
                            </li>
                            <li>
                                Now you've got a steady flow of humans being produced, an increasing food demand, and a goal of building homes for an ever increasing population cap.
                                <strong>Action:</strong> Try to achieve a population of 1,000 Humans!<br>
                                Note: Increase the multiplier when you want to move more Humans per click!
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        High Scores
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
