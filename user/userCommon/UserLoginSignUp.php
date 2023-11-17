<?php
session_start();

//Handle login with google
include('../../common/GoogleLogin.php');

include('../../common/config/Connect.php');

//Handle login with fb
include('../../common/facebook_source.php');

include('../../common/config/Connect.php');

$username = '';
$password  = '';

if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];

    if ($username == 'admin') {
        header("Location: ../../admin/adminCommon/Login.php");
    }

    $password = ($_POST['password']);
    echo "catched 1";

    if ($username != '' && $password != '') {
        $findLoginUserSQL = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
        echo "catched 2";

        $row = mysqli_query($connect, $findLoginUserSQL);
        $count = mysqli_num_rows($row);

        if ($count > 0) {
            echo "login success";
            $row_data = mysqli_fetch_array($row);

            $_SESSION['username'] = $row_data['username'];
            $_SESSION['email'] = $row_data['email'];
            $_SESSION['userId'] = $row_data['id'];
            $_SESSION['userImage'] = $row_data['user_image'];

            header("Location: ./UserIndex.php");
        } else {
            $message = "Tài khoản hoặc mật khẩu không đúng";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
} else if (isset($_POST['signUp'])) {
    echo "catched in sign up";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['passwordConfirmation'];

    $findByUsernameSQL = "SELECT * FROM tbl_user WHERE username = '$username'";

    $queryUser = mysqli_query($connect, $findByUsernameSQL);
    $numsOfUser = mysqli_num_rows($queryUser);

    if ($numsOfUser > 0 || $username == 'admin') {
        echo '<script>alert("Tên tài khoản đã tồn tại, vui lòng chọn tên tài khoản khác")</script>';
    } else if ($passwordConfirmation != $password) {
        echo '<script>alert("Xác nhận mật khẩu không chính xác!")</script>';
    } else {
        function generateUuid()
        {
            $data = random_bytes(16);

            $data[6] = chr(ord($data[6]) & 0x0F | 0x40);
            $data[8] = chr(ord($data[8]) & 0x3F | 0x80);

            $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

            return $uuid;
        }

        $userId =  generateUuid();
        $createUser = "INSERT INTO tbl_user(id, username, password) 
         VALUES ('" . $userId . "','" . $username . "','" . $password . "')";
        $res = mysqli_query($connect, $createUser);

        if ($res) {
            echo '<script>alert("Đăng ký thành công, đăng nhập để bắt đầu trải nghiệm Shop nào!")</script>';
        }
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
                <form name="signUp" action="" method="POST">
                    <h1>Đăng ký</h1>
                    <div class="social-container">
                        <!-- login with google  -->
                        <?php if (isset($authUrl)) { ?>
                            <a href="<?php echo $authUrl; ?>" target="_blank" class="social"><i class="fab fa-google"></i></a>
                        <?php } ?>

                        <!-- login with fb  -->
                        <?php if (isset($authUrl)) { ?>
                            <a href="<?php echo $authUrl; ?>" target="_blank" class="social"><i class="fab fa-facebook"></i></a>
                        <?php } ?>

                    </div>
                    <span>Tạo tài khoản mới</span>
                    <label>
                        <input required name="username" type="text" placeholder="Tên tài khoản" />
                    </label>
                    <label>
                        <input required name="password" type="password" placeholder="Mật khẩu" />
                    </label>
                    <label>
                        <input required name="passwordConfirmation" type="password" placeholder="Xác nhận mật khẩu" />
                    </label>
                    <button style="margin-top: 9px" name="signUp">Đăng ký</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form name="login" action="" method="POST">
                    <h1>Đăng nhập</h1>
                    <div class="social-container">
                        <!-- login with fb  -->
                        <?php if (isset($authUrl)) { ?>
                            <a href="<?php echo $authUrl; ?>" target="_blank" class="social"><i class="fab fa-facebook"></i></a>
                        <?php } ?>

                        <!-- login with google  -->
                        <?php if (isset($authUrl)) { ?>
                            <a href="<?php echo $authUrl; ?>" target="_blank" class="social"><i class="fab fa-google"></i></a>
                        <?php } ?>

                    </div>
                    <span> Hoặc đăng nhập bằng tài khoản sẵn có</span>
                    <label>
                        <input required name="username" type="text" placeholder="Tên tài khoản" />
                    </label>
                    <label>
                        <input required name="password" type="password" placeholder="Mật khẩu" />
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