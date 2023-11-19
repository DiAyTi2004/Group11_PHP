<div class="main">
    <div class="maincontent">

        <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
        if (isset($_GET['usingPage'])) {
            $usingPage = $_GET['usingPage'];
        } else {
            $usingPage = "";
        }

        if ($usingPage == 'vanchuyen') {
            include("vanchuyen.php");
        } elseif ($usingPage == 'payment') {
            include("payment.php");
        } elseif ($usingPage == 'thanhtoan') {
            include("thanhtoan.php");
        } elseif ($usingPage == 'donhangdadat') {
            include("donhangdadat.php");
        } else {
            echo "Cảm ơn bạn đã đặt hàng";
        }
        ?>

    </div>
</div>

<script type="text/javascript" src="../../../../javascript/Modal.js"></script>