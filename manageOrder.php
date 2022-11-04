<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">
    <title>Document</title>
</head>

<body>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
}
    if(!isset($_SESSION['user_type'])||$_SESSION['user_type']!='admin'){
        header("location: /store/index.php");
    }
    else{
        include 'partials/_header.php';
        include 'partials/_dbconnect.php';
        echo'
        <div class="container">
            <h1 style= "padding-top: 50px; padding-bottom: 20px;">All Orders</h1>
                <div class="row">
                <div class="col-sm-12 col-md-12 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">Total Bill</th>
                                <th class="text-center">Payment Method</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Order Status</th>
                            </tr>
                        </thead>
                <tbody>
                ';
                    $sql = "SELECT * FROM `orders`";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if ($num>0){
                        while($row = mysqli_fetch_assoc($result)){
                        $orderId = $row['order_id'];
                        $paymentMethod = $row['payment_method'];
                        $amountPaid = $row['bill'];
                        $status = $row['order_status'];
                        $payStatus = $row['payment_status'];
                        echo'
                <tr>
                <td class="text-center">
                <a href="/store/orderPage.php?orderId='.$orderId.'"><span>#'.$orderId.'</span></a>
                </td>
                <td class="text-center"><strong>$'.$amountPaid.'</strong></td>
                <td class="text-center"><strong>'.$paymentMethod.'</strong></td>
                <td class="text-center"><strong>'.$payStatus.'</strong></td>
                <td class="text-center"><strong>'.$status.'</strong></td>
                </tr>
        </a>';
                }}
                ;}
    
    
    ?>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</body>

</html>