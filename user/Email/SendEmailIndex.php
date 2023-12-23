<?php
include "../../common/config/Connect.php";
// Bắt đầu phiên làm việc nếu chưa bắt đầu
session_start();
?>
<?php
if(isset($_SESSION['userId'])) {
    // Lấy userId từ biến session
    $userId = $_SESSION['userId'];
}

$sql = "SELECT * FROM tbl_user WHERE id = '$userId'";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_assoc($query);
$email = $result['email'];
$username = $result['username'];

$sql_order  = "SELECT * FROM tbl_order where user_id = '$userId'";
$query_order=  mysqli_query($connect,$sql_order);
$result_order = mysqli_fetch_assoc($query_order);

$sql_order_detail = "Select * from tbl_order_detail where order_id ='$result_order[id]'";
$query_order_detail =  mysqli_query($connect, $sql_order_detail);
$result_order_detail =  mysqli_fetch_assoc($query_order_detail);

$sql_product = "Select * from tbl_product where id = '$result_order_detail[product_id]'";
$query_product  =  mysqli_query($connect, $sql_product);
$result_product = mysqli_fetch_assoc($query_product);

$sql_product_size = "select * from tbl_product_size  where product_id = '$result_product[id]'";
$query_product_size =  mysqli_query($connect,$sql_product_size);
$result_product_size= mysqli_fetch_assoc($query_product_size);

 $sql_size = "select * from tbl_size where id  =  '$result_product_size[size_id]'" ;
 $query_size = mysqli_query($connect, $sql_size);
 $result_size = mysqli_fetch_assoc($query_size);

 $tongTien  = (float)$result_order['delivery_cost'] + (float)$result_order_detail['quantity']*(float)$result_order_detail['unit_price'];
?>
<?php
function GuiMail($email,$content,$username){   
    require "PHPMailer-master/src/PHPMailer.php"; 
    require "PHPMailer-master/src/SMTP.php"; 
    require 'PHPMailer-master/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
        $mail->SMTPDebug = 2; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'shopshoesland@gmail.com'; // SMTP username
        $mail->Password = 'ktnr mdiu ccwp pvzg';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('shopshoesland@gmail.com', 'ShoesLandShop' ); 
        $mail->addAddress($email, $username); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Shop giày ShoesLand kính gửi bạn!';
        $noidungthu = 'Đơn hàng của bạn'; 
        $mail->Body = $content;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
 }//function GuiMail
 ?>
<?php
if (isset($_POST['confirm'])){
    $content = "<p>Tên khách hàng: ".$username."</p>".
    "<p>Địa chỉ nhận hàng: ".$result_order['receive_address']."</p>".
    "<p>Số điện thoại nhận hàng: ".$result_order['receive_phone']."</p>".
    "<p>Mã đơn hàng: ".$result_order['code']."</p>".
    "<p>Số tiền giao hàng: ".$result_order['delivery_cost']."</p>".
    "<p>Mã sản phẩm:  ".$result_product['code']."</p>".
    "<p>Tên sản phẩm:  ".$result_product['name']."</p>".
    "<p>Cỡ sản phẩm: ".$result_size['name']."</p>".
    "<p>Giá sản phẩm: ".$result_order_detail['unit_price']."đ</p>".
    "<p>Số lượng: ".$result_order_detail['quantity']."(đôi)</p>".
    "<p>Tổng tiền: ".$tongTien."đ</p>"
    ;
    GuiMail($email,$content,$username);
    header('Location:../../user/pages/Payment/ConfirmEmail.php');
}
?>
<?php

?>