<?php
session_start();

include('../../common/config/Connect.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];

    if ($username == 'admin')
        header("Location: ../../admin/adminCommon/Login.php");

    $password = ($_POST['password']);

    $findLoginUserSQL = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
    
    $row = mysqli_query($connect, $findLoginUserSQL);
    $count = mysqli_num_rows($row);
    
    if ($count > 0) {
        $row_data = mysqli_fetch_array($row);

        $_SESSION['signup'] = $row_data['taikhoan'];
        $_SESSION['email'] = $row_data['email'];
        $_SESSION['id_khachhang'] = $row_data['id_khachhang'];

        header("Location: ./UserIndex.php");
    } else {
        $message = "Tài khoản hoặc mật khẩu không đúng";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHOESLAND</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'>
    <link rel="stylesheet" href="../styles/UserLoginAndSignUpStyles.css" />
</head>

<body>
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <!-- Log In Form Section -->
    <section>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="#">
                    <h1>Đăng ký</h1>
                    <div class="social-container">
                        <a href="https://Github.com/farazc60" target="_blank" class="social"><i class="fab fa-github"></i></a>
                        <a href="https://Codepen.io/codewithfaraz" target="_blank" class="social"><i class="fab fa-codepen"></i></a>
                        <a href="mailto:farazc60@gmail.com" target="_blank" class="social"><i class="fab fa-google"></i></a>
                    </div>
                    <span>Tạo tài khoản mới</span>
                    <label>
                        <input type="text" placeholder="Tên của bạn" />
                    </label>
                    <label>
                        <input type="email" placeholder="Tên tài khoản" />
                    </label>
                    <label>
                        <input type="password" placeholder="Mật khẩu" />
                    </label>
                    <button style="margin-top: 9px">Đăng ký</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="" method="POST">
                    <h1>Đăng nhập</h1>
                    <div class="social-container">
                        <a href="https://Github.com/farazc60" target="_blank" class="social"><i class="fab fa-github"></i></a>
                        <a href="https://Codepen.io/codewithfaraz" target="_blank" class="social"><i class="fab fa-codepen"></i></a>
                        <a href="mailto:farazc60@gmail.com" target="_blank" class="social"><i class="fab fa-google"></i></a>
                    </div>
                    <span> Hoặc đăng nhập bằng tài khoản sẵn có</span>
                    <label>
                        <input type="username" placeholder="Tên tài khoản" />
                    </label>
                    <label>
                        <input type="password" placeholder="Mật khẩu" />
                    </label>
                    <a href="#">Quên mật khẩu?</a>
                    <button name="login">Đăng nhập</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Đăng nhập</h1>
                        <p>Đăng nhập nếu bạn đã có sẵn tài khoản</p>
                        <button class="ghost mt-5" id="signIn">Đăng nhập</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Đăng ký!</h1>
                        <p>Đăng ký tài khoản mới để khám phá nào... </p>
                        <button class="ghost" id="signUp">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js'></script>
    <script src="script.js"></script>
</body>

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () =>
        container.classList.add('right-panel-active'));

    signInButton.addEventListener('click', () =>
        container.classList.remove('right-panel-active'));
</script>

</html>