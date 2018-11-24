<?php
include 'head.php';
include 'header.php';
?>
<style>
    body{
        background: linear-gradient(90deg, #32d156,#0b51c5, #f17306) no-repeat;
        background-size: 100% 100%;
    }
</style>
<h3 class="text-center success-color">MyCart</h3>
<div class="row border-bottom-dark">
    <div class="col-4">
        <div class="card">

            <!-- Card image -->
            <div class="card-img-">
                <img class="card-img-top" src="images/percussion/tabla.jpg" alt="Card image cap">
            </div>
            <!-- Card content -->
            <div class="card-body">


                <!-- Title -->
                <h4 class="card-title"><a>Card title</a></h4>
                <!-- Text -->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                <!-- Button -->
                <a href="#" class="btn btn-primary">Button</a>

            </div>

        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <form oninput="total.value=parseInt(quantity.value)*1500;q.value=parseInt(quantity.value)">
                <!-- Card content -->
                <div class="card-body">
                    <!-- Title -->
<!--                    <h4 class="card-title"><a>Card title</a></h4>-->
                    <!-- Text -->
<!--                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Quantity</label>
                        <select class="form-control" name="quantity" id="exampleFormControlSelect1">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label><b>Total Amount:</b></label><br>
                        <span>1500 Rs x </span><output name="q" for="quantity"></output><span>=</span>
                        <output name="total" class="inputvalues" for="quantity"></output><br>
                    </div>

                    <!-- Button -->
                    <a href="#" class="btn btn-primary">Buy Now</a>
            </form>
            </div>

        </div>
    </div>
</div>


<?php include 'footer.php';
include 'scripts.php';
?>

