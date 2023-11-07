<?php
session_start();

include('../../common/config/Connect.php');

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM tbl_dangky ,tbl_admin WHERE tbl_dangky.taikhoan='" . $username . "' AND tbl_dangky.matkhau='" . $password . "'  LIMIT 1";
  $row = mysqli_query($connect, $sql);
  $count = mysqli_num_rows($row);
  if ($count > 0) {
    $row_data = mysqli_fetch_array($row);

    $_SESSION['signup'] = $row_data['taikhoan'];
    $_SESSION['email'] = $row_data['email'];
    $_SESSION['id_khachhang'] = $row_data['id_khachhang'];

    header("Location: ./UserIndex.php");
  } elseif ($username == 'admin') {
    header("Location: ../../admin/adminCommon/Login.php");
  } else {
    $message = "Tài khoản mật khẩu không đúng";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles//UserLoginStyles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>ĐĂNG NHẬP</title>

</head>
<link rel="stylesheet" href="../../common//css/CommonStyle.css">

<body>
  <section class="login">
    <div class="login_box">
      <div class="left">
        <div class="top_link">
          <a href="./UserIndex.php">
            <i class="fa-solid fa-circle-chevron-left mr-2"></i>
            Về trang chủ
          </a>
        </div>
        <div class="contact">
          <form action="" method="POST">
            <h3>ĐĂNG NHẬP</h3>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button class="submit" name="login">ĐĂNG NHẬP</button>
          </form>
        </div>
      </div>
      <div class="right">
        <div class="right-inductor">
          <img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt="">
        </div>
      </div>
    </div>
  </section>
</body>

</html>