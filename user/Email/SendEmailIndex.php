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
$sql = "SELECT email FROM tbl_user WHERE id = '$userId'";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_assoc($query);
$email = $result['email'];
?>
<?php
function GuiMail($email){   
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
        $mail->addAddress($email, 'Vi'); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Tiêu đề thư';
        $noidungthu = 'Nội dung thư'; 
        $mail->Body = $noidungthu;
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
if (isset($_POST['confirmBuy'])){
    GuiMail($email);
    header('Location:../../userCommon/UserIndex.php?usingPage=account');
}
?>