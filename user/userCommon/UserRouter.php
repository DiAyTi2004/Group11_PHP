<div class="main">
    <div class="maincontent">

        <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
        if (isset($_GET['quanly'])) {
            $bientam = $_GET['quanly'];
        } else {
            $bientam = "";
        }

        if ($bientam == 'danhmuclist') {
            include("../pages/danhmuc.php");
        } else if ($bientam == 'giohang') {
            include("../pages/giohang/cart.php");
        } else if ($bientam == 'dangky') {
            header("Location: ./UserSignUp.php");
        } else if ($bientam == 'sanpham') {
            include("../pages/sanpham.php");
        } else if ($bientam == 'dangnhap') {
            header("Location: UserLogin.php");
        } else if ($bientam == 'thongtin') {
            include("../pages/info.php");
        } else if ($bientam == 'timkiem') {
            include("../pages/timkiem.php");
        } else { ?>

            <div class="slideshow-container">

                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="images/1a.jpg" style="width:100%">
                    <!-- <div class="text">Caption Text</div> -->
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="images/2a.jpg" style="width:100%">
                    <!-- <div class="text">Caption Two</div> -->
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="images/4a.jpg" style="width:100%">
                    <!-- <div class="text">Caption Three</div> -->
                </div>
            </div>
            <br>

            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>

            <script>
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                    setTimeout(showSlides, 3000); // Change image every 2 seconds
                }
            </script>
        <?php

        }
        ?>

    </div>
</div>