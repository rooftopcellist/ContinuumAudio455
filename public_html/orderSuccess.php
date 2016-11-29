<?php
if(!isset($_REQUEST['id'])){
    header("Location: Ca_Shop_Index.php");
}
require 'includes/Ca_Header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <style>
    .container{width: 100%;padding-left: 350px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
</head>
<body>
<div class="container">
    <h1>Order Status</h1>
    <p>Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></p>
</div>
</body>
</html>
<?php include './includes/Ca_Footer.php'; ?>
