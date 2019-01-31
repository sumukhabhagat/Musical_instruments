<?php
include 'head.php';
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
include 'header.php';
include 'dbconfig/queries.php';
if (isset($_POST['buy'])) {
//    header('location:success.php');
    $item = $_POST['item'];
//    var_dump($item);
    $quantity = $_POST['quantity'];
    $price=$_POST['price'];
//    var_dump($price);
    $address = $_POST['address'];
    $total= ($quantity * $price);
//    var_dump($total);
    $category = $_POST['category'];
    include 'dbconfig/dbconnect.php';
    $stmt = $conn->prepare('select user_id from user where username=:username');
    $stmt->bindParam('username', $_SESSION['username']);
    $stmt->execute();
    $user = $stmt->fetch()['0'];
    $stmt = $conn->prepare('insert into orders(user_id, category, product_id,totalamt, address, quantity) values(:user_id,:category,:item,:total,:add,:quantity)');
    $stmt->bindParam('user_id', $user);
    $stmt->bindParam('item', $item);
    $stmt->bindParam('total', $total);
    $stmt->bindParam('category', $category);
    $stmt->bindParam('add', $address);
    $stmt->bindParam('quantity', $quantity);
    $stmt->execute();
}
?>
<style>
    body{
        background: linear-gradient(90deg, #33d116, #f9cf15, #3ba7e0) no-repeat;
        background-size: 100% 100%;
    }
</style>
<?php
if (isset($_GET['item']) and $_GET['category']==='percussion'){
    echo "<div class=\"card-columns m-5 pl-5\">";
    $item=$_GET['item'];
    $card='';
    $card.=" <!-- Card -->
    <div class=\"card bg-transparent\">

        <!--Card image-->
        <div class=\"view overlay\">
            <img class=\"card-img-top\" src=\"images/percussion/".getPImage()[$item]."\" alt=\"Card image cap\">
        </div>

        <!--Card content-->
        <div class=\"card-body\">

            <!--Title-->
            <h4 class=\"card-title\">".getPName()[$item]."</h4>
            <!--Text-->
            <p class=\"card-subtitle\"><span>&#x20b9; </span>".getPprice()[$item]."</p>
            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->

        </div>

    </div>
    <!-- Card -->";
    echo $card;
    echo "<div class=\"col-8\">
        <div class=\"card bg-transparent\">
            <form oninput=\"total.value=parseInt(quantity.value)*".getPprice()[$item].";q.value=parseInt(quantity.value)\" action=\"cart.php\" method=\"post\">
                <!-- Card content -->
                <div class=\"card-body\">
                    <!-- Title -->
                    <!--                    <h4 class=\"card-title\"><a>Card title</a></h4>-->
                    <!-- Text -->
                    <!--                    <p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <div class=\"form-group\">
                        

                        <label for=\"address\">Address</label>
                        <textarea type=\"text\" name=\"address\" class=\"form-control\" placeholder=\"Address\" rows=\"3\" required ></textarea>
                        <label for=\"exampleFormControlSelect1\">Quantity</label>
                        <select class=\"form-control\" name=\"quantity\" id=\"exampleFormControlSelect1\">
                            <option value=\"1\">1</option>
                            <option value=\"2\">2</option>
                            <option value=\"3\">3</option>
                            <option value=\"4\">4</option>
                            <option value=\"5\">5</option>
                        </select>
                        <input type='hidden' name='category' value=\"".$_GET['category']."\">
                        <input type='hidden' name='item' value=\"".($item+1)."\">

                        <label><b>Total Amount:</b></label><br>
                        <span>".getPprice()[$item]." Rs x </span><output name=\"q\" for=\"quantity\"></output><span> =</span>
                        <output name=\"total\" class=\"\" for=\"quantity\"></output><br>
                        <input type='hidden' name='price' value=\"".getPprice()[$item]."\">
                    </div>

                    <!-- Button -->
                    <button type=\"submit\" name=\"buy\" class=\"btn btn-primary\">Buy Now</button>
            </form>
        </div>
    </div>
</div>
</div>";

}?>
<?php
if (isset($_GET['item']) and $_GET['category']==='non_percussion'){
    echo "<div class=\"card-columns m-5 pl-5\">";
    $item=$_GET['item'];
    $card='';
    $card.=" <!-- Card -->
    <div class=\"card bg-transparent\">

        <!--Card image-->
        <div class=\"view overlay\">
            <img class=\"card-img-top\" src=\"images/nonpercussion/".getNPImage()[$item]."\" alt=\"Card image cap\">
        </div>

        <!--Card content-->
        <div class=\"card-body\">

            <!--Title-->
            <h4 class=\"card-title\">".getNPName()[$item]."</h4>
            <!--Text-->
            <p class=\"card-subtitle\"><span>&#x20b9; </span>".getNPprice()[$item]."</p>
            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->

        </div>

    </div>
    <!-- Card -->";
    echo $card;
    echo "<div class=\"col-8\">
        <div class=\"card bg-transparent\">
            <form oninput=\"total.value=parseInt(quantity.value)*".getNPprice()[$item].";q.value=parseInt(quantity.value)\" action=\"cart.php\" method=\"post\">
                <!-- Card content -->
                <div class=\"card-body\">
                    <!-- Title -->
                    <!--                    <h4 class=\"card-title\"><a>Card title</a></h4>-->
                    <!-- Text -->
                    <!--                    <p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <div class=\"form-group\">
                        

                        <label for=\"address\">Address</label>
                        <textarea type=\"text\" name=\"address\" class=\"form-control\" placeholder=\"Address\" rows=\"3\" required ></textarea>
                        <label for=\"exampleFormControlSelect1\" >Quantity</label>
                        <select class=\"form-control\" name=\"quantity\" id=\"exampleFormControlSelect1\">
                            <option value=\"1\">1</option>
                            <option value=\"2\">2</option>
                            <option value=\"3\">3</option>
                            <option value=\"4\">4</option>
                            <option value=\"5\">5</option>
                        </select>
                        <input type='hidden' name='category' value=\"".$_GET['category']."\">
                        <input type='hidden' name='item' value=\"".($item+1)."\">


                        <label><b>Total Amount:</b></label><br>
                        <span>".getNPprice()[$item]." Rs x </span><output name=\"q\" for=\"quantity\"></output><span> =</span>
                        <output name=\"total\" class=\"\" for=\"quantity\"></output><br>
                        <input type='hidden' name='price' value=\"".getNPprice()[$item]."\">
                    </div>
                    <!-- Button -->
                    <button type=\"submit\" name=\"buy\" class=\"btn btn-primary\">Buy Now</button>
            </form>
        </div>
    </div>
</div>
</div>";

}?>
<?php
if (isset($_GET['item']) and $_GET['category']==='string'){
    echo "<div class=\"card-columns m-5 pl-5\">";
    $item=$_GET['item'];
    $card='';
    $card.=" <!-- Card -->
    <div class=\"card bg-transparent\">

        <!--Card image-->
        <div class=\"view overlay\">
            <img class=\"card-img-top\" src=\"images/".getSImage()[$item]."\" alt=\"Card image cap\">
        </div>

        <!--Card content-->
        <div class=\"card-body\">

            <!--Title-->
            <h4 class=\"card-title\">".getSName()[$item]."</h4>
            <!--Text-->
            <p class=\"card-subtitle\"><span>&#x20b9; </span>".getSprice()[$item]."</p>

        </div>

    </div>
    <!-- Card -->";
    echo $card;
    echo "<div class=\"col-8\">
        <div class=\"card bg-transparent\">
            <form oninput=\"total.value=parseInt(quantity.value)*".getSprice()[$item].";q.value=parseInt(quantity.value)\" action=\"cart.php\" method=\"post\">
                <!-- Card content -->
                <div class=\"card-body\">
                    <!-- Title -->
                    <!--                    <h4 class=\"card-title\"><a>Card title</a></h4>-->
                    <!-- Text -->
                    <!--                    <p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <div class=\"form-group\">
                        

                        <label for=\"address\">Address</label>
                        <textarea type=\"text\" name=\"address\" class=\"form-control\" placeholder=\"Address\" rows=\"3\" required></textarea>
                        <label for=\"exampleFormControlSelect1\">Quantity</label>
                        <select class=\"form-control\" name=\"quantity\" id=\"exampleFormControlSelect1\">
                            <option value=\"1\">1</option>
                            <option value=\"2\">2</option>
                            <option value=\"3\">3</option>
                            <option value=\"4\">4</option>
                            <option value=\"5\">5</option>
                        </select>
                        <input type='hidden' name='category' value=\"".$_GET['category']."\">
                        <input type='hidden' name='item' value=\"".($item+1)."\">

                        <label><b>Total Amount:</b></label><br>
                        <span>".getSprice()[$item]." Rs x </span><output name=\"q\" for=\"quantity\"></output><span> =</span>
                        <output name=\"total\" class=\"\" for=\"quantity\"></output><br> 
                        <input type='hidden' name='price' value=\"".getSprice()[$item]."\">
                    </div>

                    <!-- Button -->
                    <button type=\"submit\" name=\"buy\" class=\"btn btn-primary\">Buy Now</button>
            </form>
        </div>
    </div>
</div>
</div>";

}?>
<!--Table-->
<table id="tablePreview" class="table">
    <!--Table head-->
    <thead>
    <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Amount</th>
        <th>Address</th>
    </tr>
    </thead>
    <!--Table head-->
    <!--Table body-->
    <tbody>
    <?php
    $tr='';
    $no=1;
    for ($i=count(getPCart())-1;$i>=0;$i--){
        $tr.="<tr>
        <th scope=\"row\">".$no++."</th>
        <td>".getPCart()[$i]['name']."</td>
        <td>".getPCart()[$i]['price']."</td>
        <td>".getPCart()[$i]['quantity']."</td>
        <td>".getPCart()[$i]['totalamt']."</td>
        <td>".getPCart()[$i]['address']."</td>
    </tr>";
    }
    for ($i=count(getNPCart())-1;$i>=0;$i--){
        $tr.="<tr>
        <th scope=\"row\">".$no++."</th>
        <td>".getNPCart()[$i]['name']."</td>
        <td>".getNPCart()[$i]['price']."</td>
        <td>".getNPCart()[$i]['quantity']."</td>
        <td>".getNPCart()[$i]['totalamt']."</td>
        <td>".getNPCart()[$i]['address']."</td>
    </tr>";
    }
    for ($i=count(getSCart())-1;$i>=0;$i--){
        $tr.="<tr>
        <th scope=\"row\">".$no++."</th>
        <td>".getSCart()[$i]['name']."</td>
        <td>".getSCart()[$i]['price']."</td>
        <td>".getSCart()[$i]['quantity']."</td>
        <td>".getSCart()[$i]['totalamt']."</td>
        <td>".getSCart()[$i]['address']."</td>
    </tr>";
    }
    unset($no);
    echo $tr;
    ?>

    </tbody>
    <!--Table body-->
</table>
<!--Table-->
<?php include 'footer.php';
include 'scripts.php';





?>


