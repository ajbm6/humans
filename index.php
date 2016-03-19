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
                <?php require 'views/help.php'; ?>
            </div>
            <div class="col-xs-6">
                <?php require 'views/highscores.php'; ?>
            </div>
        </div>
    </div>



</body>
</html>
