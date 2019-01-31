<ul class="nav nav-tabs green nav-justified md-tabs indigo" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just" aria-selected="true">PERCUSSION</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just" aria-selected="false">NON-PERCUSSION</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab-just" data-toggle="tab" href="#contact-just" role="tab" aria-controls="contact-just" aria-selected="false">STRING</a>
    </li>
</ul>
<div class="tab-content  pt-5 pb-0" id="myTabContentJust">
    <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
        <div class="card-columns">
            <?php
            $card='';
            for ($i=getPCount()-1;$i>=0;$i--){
                $card.=" <!-- Card -->
            <div class=\"card\">

                <!-- Card image -->
                <div class=\"card-img-\">
                    <img class=\"card-img-top\" src=\"images/percussion/".getPImage()[$i]."\" alt=\"Card image cap\">
                </div>
                <!-- Card content -->
                <div class=\"card-body\">
                    <!-- Title -->
                    <h4 class=\"card-title\"><a>".getPName()[$i]."</a></h4>
                    <!-- Text -->
                    <p class=\"card-text\">".getPDescription()[$i]."</p>
                    <!-- Button -->
                    <p class=\"card-price\">&#8377; ".getPprice()[$i]."</p>
                    <a href=\"cart.php?category=percussion&item=".$i."\" class=\"btn btn-primary\">Add to Cart</a>

                </div>

            </div>
            <!-- Card -->";
            }
            echo $card;
            
            ?>

        </div>
    </div>
    <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
        <div class="card-columns">
            <?php
            $card='';
            for ($i=getNPCount()-1;$i>=0;$i--){
                $card.=" <!-- Card -->
            <div class=\"card\">

                <!-- Card image -->
                <div class=\"card-img-\">
                    <img class=\"card-img-top\" src=\"images/nonpercussion/".getNPImage()[$i]."\" alt=\"Card image cap\">
                </div>
                <!-- Card content -->
                <div class=\"card-body\">
                    <!-- Title -->
                    <h4 class=\"card-title\"><a>".getNPName()[$i]."</a></h4>
                    <!-- Text -->
                    <p class=\"card-text\">".getNPDescription()[$i]."</p>
                    <!-- Button -->
                    <p class=\"card-price\">&#8377; ".getNPprice()[$i]."</p>
                    <a href=\"cart.php?category=non_percussion&item=".$i."\" class=\"btn btn-primary\">Add to Cart</a>

                </div>

            </div>
            <!-- Card -->";
            }
            echo $card;

            ?>

        </div>
    </div>
    <div class="tab-pane fade" id="contact-just" role="tabpanel" aria-labelledby="contact-tab-just">
        <div class="card-columns">
            <?php
            $card='';
            for ($i=getSCount()-1;$i>=0;$i--){
                $card.=" <!-- Card -->
            <div class=\"card\">

                <!-- Card image -->
                <div class=\"card-img-\">
                    <img class=\"card-img-top\" src=\"images/".getSImage()[$i]."\" alt=\"Card image cap\">
                </div>
                <!-- Card content -->
                <div class=\"card-body\">
                    <!-- Title -->
                    <h4 class=\"card-title\"><a>".getSName()[$i]."</a></h4>
                    <!-- Text -->
                    <p class=\"card-text\">".getSDescription()[$i]."</p>
                    <!-- Button -->
                    <p class=\"card-price\">&#8377; ".getSprice()[$i]."</p>
                    <a href=\"cart.php?category=string&item=".$i."\" class=\"btn btn-primary\">Add to Cart</a>

                </div>
            </div>
            <!-- Card -->";
            }
            echo $card;
            ?>

        </div>
    </div>
</div>