<?php

$connection = mysqli_connect("localhost","root","","project1");

$getdata = $_GET['did'];
if(!isset($_GET['did']) || empty ($_GET['did'])){
    header("location:orderdetail.php");
}
    
$query = mysqli_query($connection,"select * from tbl_orderdetail where ordetail_id = '{$getdata}'") or die ("error in query".mysqli_error($connection));

$fetchdata = mysqli_fetch_array($query);

if($_POST){
    $ordetailid = $_POST['txt1'];
    $orderid = $_POST['txt2'];
    $proid = $_POST['txt3'];
    $orqty = $_POST['qty'];
    $oramt = $_POST['amt'];
    
    
    $update = mysqli_query($connection, "update tbl_orderdetail set order_id = '{$orderid}',product_id = '{$proid}',ordetail_qty= '{$orqty}',ordetail_amount= '{$oramt}' where ordetail_id = '{$ordetailid}'") or die ("not update".mysqli_error($connection));

    if($update){
        echo "<script>alert('record update');window.location='orderdetail_dis_delete.php';</script>";
    }
}

?>

<html>
    <body>
    <center>
        <form method="post">
            <input type="hidden" name="txt1" value="<?php echo $fetchdata['ordetail_id'];?>">
            <h1>Order Detail Update Form</h1><br><br>
                <table style="text-align:left;">
                    <tr>
                        <th><label>Order ID:</label></th>
                        <td><input type="number" name="txt2" value="<?php echo $fetchdata['order_id'];?>" placeholder="Enter ID" required></td>
                    </tr>
                    <tr>
                        <th><label>Product ID:</label></th>
                        <td><input type="number" name="txt3" value="<?php echo $fetchdata['product_id'];?>" placeholder="Enter ID" required></td>
                    </tr>
                    <tr>
                        <th><label>OrderDetail Quntity:</label></th>
                        <td><input type="number" name="qty" value="<?php echo $fetchdata['ordetail_qty'];?>" placeholder="Enter Quantity" required></td>
                    </tr>
                    <tr>
                        <th><label>OrderDetail Amount:</label></th>
                        <td><input type="number" name="amt" value="<?php echo $fetchdata['ordetail_amount'];?>" placeholder="Enter Amount" required></td>
                    </tr>
                </table>
           </br></br>
            <input type="submit" name="btn">
        </form>
    </center>
    </body>
</html>
