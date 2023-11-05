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

<div class="show_new">
    <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
    if (isset($_GET['usingPage'])) {
        $usingPage = $_GET['usingPage'];
    } else {
        $usingPage = "";
    }
    if ($usingPage == "") { ?>

        <div class="new_product">
            <h3>SẢN PHẨM MỚI</h3>
        </div>
    <?php
        include("../pages/Home/NewProductSection.php");
    }
    ?>

</div>

<div class="show">
    <?php //lấy qiamly từ menu truyền vào bằng phuong thức GET
    if (isset($_GET['usingPage'])) {
        $usingPage = $_GET['usingPage'];
    } else {
        $usingPage = "";
    }
    if ($usingPage == "") {
    ?>
        <div class="new_product">
            <h3>TẤT CẢ SẢN PHẨM</h3>
        </div>


    <?php

    }

    ?>

    <?php
    if (isset($_GET['trang'])) {
        $page = $_GET['trang'];
    } else {
        $page = 1;
    }
    if ($page == '' || $page == 1) {
        $begin = 0;
    } else {
        $begin = ($page * 10) - 10;
    }
    // GET id là lấy id từ bên MENU.php 
    $sql_show = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,10";
    $query_show = mysqli_query($connect, $sql_show);

    ?>

    <ul class="product_list">

        <?php
        while ($row = mysqli_fetch_array($query_show)) {
        ?>
            <li>
                <a href="UserIndex.php?usingPage=product&id=<?php echo $row['id_sanpham'] ?>">
                    <img src="../../admin/pages/Product/ProductImages/<?php echo $row['hinhanh'] ?>">
                    <p></p>
                    <h5 class="title_product"> <?php echo $row['tensanpham'] ?></h5>
                    <h5 class="price_product">Giá: <?php echo number_format($row['giasanpham'], 0, ',', '.') . ' VNĐ' ?></h5>
                    <p style="text-align: center;"><?php echo "Xem chi tiết" ?></p>
                </a>

            </li>

        <?php
        }
        ?>
    </ul>

    <?php
    $sql_trang = mysqli_query($connect, "SELECT * FROM tbl_sanpham");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count / 10);
    ?>

    <ul class="list_trang">

        <?php

        for ($i = 1; $i <= $trang; $i++) {
        ?>
            <li <?php if ($i == $page) {
                    echo 'style="background: brown;"';
                } else {
                    echo '';
                }  ?>>
                <a href="UserIndex.php?trang=<?php echo $i ?>">
                    <?php echo $i ?>
                </a>
            </li>
        <?php
        }
        ?>

    </ul>

</div>