<?php
$countAllEvent = "SELECT * FROM tbl_event;";
$total_event = mysqli_num_rows(mysqli_query($connect, $countAllEvent));
if ($total_event > 0) {
?>
    <div class="show_event_slide appCard p-0">
        <?php
        include("../pages/Home/EventSlides.php");
        ?>
    </div>
<?php
}
?>

<div class="show_category_slide appCard">
    <?php
    if (isset($_GET['usingPage'])) {
        $usingPage = $_GET['usingPage'];
    } else {
        $usingPage = "";
    }
    if ($usingPage == "") {
        include("../pages/Home/CategorySlide.php");
    }
    ?>
</div>

<div class="show_new appCard">
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

<div class="show appCard">
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