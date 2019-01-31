<!DOCTYPE html>
<html>
<body>
<?php
include ('head.php');
include('header.php');
?>
<h3>Your Order is Placed</h3>
<a href="cart.php" class="btn btn-lg btn-success">Back to Cart</a>
<?php
include ('footer.php');
include ('scripts.php');
if (isset($_POST['buy'])) {
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $address = $_POST['address'];
    $category = $_POST['category'];
    include 'dbconfig/dbconnect.php';
    $stmt = $conn->prepare('select user_id from user where username=:username');
    $stmt->bindParam('username', $_SESSION['username']);
    $stmt->execute();
    $user = $stmt->fetch()['0'];
    $stmt = $conn->prepare('insert into orders(user_id, category, product_id, address, quantity) values(:user_id,:category,:item,:add,:quantity)');
    $stmt->bindParam('user_id', $user);
    $stmt->bindParam('category', $category);
    $stmt->bindParam('item', $item);
    $stmt->bindParam('add', $address);
    $stmt->bindParam('quantity', $quantity);
    $stmt->execute();
}

?>


</body>
</html>