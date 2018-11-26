<?php
include 'head.php';
session_start();
include 'header.php';
include 'dbconfig/queries.php';
?>
<style>
    body{
        background: linear-gradient(90deg, #33d116, #f9cf15, #3ba7e0) no-repeat;
        background-size: 100% 100%;
    }
</style>
<?php
if (isset($_GET['item'])){
    echo "<div class=\"card-columns m-5 pl-5\">";
    $item=$_GET['item'];
    $card='';
    $card.=" <!-- Card -->
    <div class=\"card\">

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
        <div class=\"card\">
            <form oninput=\"total.value=parseInt(quantity.value)*".getPprice()[$item].";q.value=parseInt(quantity.value)\" action=\"cart.php\" method=\"post\">
                <!-- Card content -->
                <div class=\"card-body\">
                    <!-- Title -->
                    <!--                    <h4 class=\"card-title\"><a>Card title</a></h4>-->
                    <!-- Text -->
                    <!--                    <p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <div class=\"form-group\">
                        

                        <label for=\"address\">Address</label>
                        <textarea type=\"text\" name=\"address\" class=\"form-control\" placeholder=\"Address\" rows=\"3\" ></textarea>
                        <label for=\"exampleFormControlSelect1\">Quantity</label>
                        <select class=\"form-control\" name=\"quantity\" id=\"exampleFormControlSelect1\">
                            <option value=\"1\">1</option>
                            <option value=\"2\">2</option>
                            <option value=\"3\">3</option>
                            <option value=\"4\">4</option>
                            <option value=\"5\">5</option>
                        </select>
                        <input type='hidden' name='category' value=\"".$_GET['category']."\">
                        <input type='hidden' name='item' value=\"".$item."\">

                        <label><b>Total Amount:</b></label><br>
                        <span>".getPprice()[$item]." Rs x </span><output name=\"q\" for=\"quantity\"></output><span> =</span>
                        <output name=\"total\" class=\"\" for=\"quantity\"></output><br>
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
    for ($i=count(getPCart())-1;$i>=0;$i--){
        $tr="<tr>
        <th scope=\"row\">1</th>
        <td>".getPCart()[$i]['name']."</td>
        <td>".getPCart()[$i]['price']."</td>
        <td>".getPCart()[$i]['quantity']."</td>
        <td>".getPCart()[$i]['totalamt']."</td>
        <td>".getPCart()[$i]['address']."</td>
    </tr>";
    }
    echo $tr;
    ?>

    </tbody>
    <!--Table body-->
</table>
<!--Table-->
<?php include 'footer.php';
include 'scripts.php';
if (isset($_POST['buy'])){
    $item=$_POST['item'];
    $quantity=$_POST['quantity'];
    $address=$_POST['address'];
    $category=$_POST['category'];
    include 'dbconfig/dbconnect.php';
    $stmt=$conn->prepare('select user_id from user where username=:username');
    $stmt->bindParam('username',$_SESSION['username']);
    $stmt->execute();
    $user=$stmt->fetch()['0'];
    $stmt=$conn->prepare('insert into orders(user_id, category, product_id, address, quantity) values(:user_id,:category,:item,:add,:quantity)');
    $stmt->bindParam('user_id',$user);
    $stmt->bindParam('category',$category);
    $stmt->bindParam('item',$item);
    $stmt->bindParam('add',$address);
    $stmt->bindParam('quantity',$quantity);
    $stmt->execute();
}



?>


