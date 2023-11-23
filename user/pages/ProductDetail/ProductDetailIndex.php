<link rel="stylesheet" href="../../user/styles/ProductDetailStyles.css">

<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($connect, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
    <div class="warpper_deital">
        <div class="hinhanh_sanpham">
            <img src="../../admin/pages/Product/ProductImages/<?php echo $row_chitiet['hinhanh'] ?>">
        </div>
        <form class="form-sp" action="../pages/Cart/AddToCart.php?id=<?php echo $row_chitiet['id_sanpham'] ?>" method="POST">
            <div class="chitiet_sanpham">
                <h3 style="margin: 0;"><?php echo $row_chitiet['tensanpham'] ?></h3>
                <div class="rating">
                    <span class="review-no">4.8</span>
                    <div class="stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                </div>
                <div class="price">
                    <?php $salerandom = rand(10, 70) ?>
                    <p class="gia-cu"><?php echo number_format($row_chitiet['giasanpham'] * ($salerandom / 100) + $row_chitiet['giasanpham'], 0, ',', '.') ?> VNĐ</p>
                    <h5 class="gia-now"><?php echo number_format($row_chitiet['giasanpham'], 0, ',', '.') ?> VNĐ</h5>
                    <span class="slae"><?php echo  $salerandom ?>% GIẢM</span>
                </div>
                <div class="soluong-sp">
                    <p class="soluong-sp-p"><b>Số lượng:</b></p>
                    <div class="soluong-sp-dem">
                        <a class="soluong-sp-dem-icon" href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                        <input class="soluong-sp-input" type="text" name="soluong" value="1">
                        <a class="soluong-sp-dem-icon" href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                    </div>
                    <p class="soluong-sp-cosan"><?php echo $row_chitiet['soluong'] ?></p><span class="soluong-sp-cosan-text">sản phẩm còn sẵn</span>
                </div>
                <div class="mota">
                    <p class="mota-text"><b>Danh mục:</b> <?php echo $row_chitiet['tendanhmuc'] ?> </p>
                </div>

                <div class="mota">
                    <p class="mota-text"><b>Mô tả:</b> <?php echo $row_chitiet['tomta3'] ?> </p>
                </div>
                <div class="input-themcart">
                    <i class="fa-solid fa-cart-plus"></i>
                    <input class="themgiohang" type="submit" name="addToCart" value="Thêm Giỏ Hàng">
                </div>
            </div>
        </form>
    </div>
<?php
}
?>

<?php
$sql_details = "SELECT * FROM tbl_product INNER JOIN tbl_product_image ON tbl_product.id = tbl_product_image.product_id
 WHERE tbl_product.id = '$_GET[id]'";
$query_details = mysqli_query($connect, $sql_details);
$row_details = mysqli_fetch_array($query_details);
$get_Name = $row_details['name'];
$get_EvenId = $row_details['event_id'];
$get_Code = $row_details['code'];
$get_Price = $row_details['price'];

$sql_details_event = "SELECT * FROM tbl_event WHERE id = '$get_EvenId'";
$query_details_event = mysqli_query($connect, $sql_details_event);
$row_event = mysqli_fetch_array($query_details_event);
$get_Discount = $row_event['discount'];
$get_EventName = $row_event['name'];

?>

<?php
// Xử lý thời gian
// Đặt múi giờ cho hàm date
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Thời gian hiện tại
$current_time = time();

$get_End = $row_event['end_date'];

// Chuyển đổi các thời điểm từ chuỗi thành timestamp
$end_timestamp = strtotime($get_End);

// Tính thời gian còn lại
$time_left = $end_timestamp - $current_time;

// Tính giờ, phút và giây
$days = floor($time_left / 3600 / 24);
$hours = floor(($time_left % (3600 * 24)) / 3600);
$minutes = floor(($time_left % 3600) / 60);
$seconds = $time_left % 60;

// Định dạng thời gian còn lại
$time_left_formatted = sprintf('%d Ngày %d Giờ %d Phút %d Giây', $days, $hours, $minutes, $seconds);

?>
<div class="appCard row">
    <div class="col col-4 detail_images">
        <div class="ecommerce-gallery" data-mdb-zoom-effect="true" data-mdb-auto-height="true">
            <div class="row py-3 shadow-5">
                <div class="col-12 mb-1">
                    <div class="lightbox">
                        <img style="max-width: 100%; max-height: 500px;" src="../../admin/pages/ProductImage/<?php if ($row_details['main_image']) echo $row_details['content'] ?>" alt="Gallery image 1" class="ecommerce-gallery-main-img active w-100" />
                    </div>
                </div>
                <?php
                while ($row_details = mysqli_fetch_array($query_details)) {
                ?>
                    <div class="col-4 mt-3">
                        <img style="max-width: 100%; max-height: 100px;" src="../../admin/pages/ProductImage/<?php if (!$row_details['main_image']) echo $row_details['content'] ?>" data-mdb-img="" alt="Gallery image 1" class="active w-100" />
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="col col-5 detail_product">
        <div class="product_name">
            <p>
                <?php echo $get_Name ?>
            </p>
        </div>

        <div class="product_rating">
            <span class="review-no">4.8</span>
            <span class="stars">
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
            </span>
            <div class="status fs-14 mt-3">
                <span class="product_code">
                    Mã sản phẩm: <?php echo $get_Code; ?>
                </span>
                <div>Tình trạng:
                    <a style="color: green;">Còn hàng</a>
                </div>
            </div>
        </div>

        <div class="product_price flex justify-between mt-3">
            <div class="price mr-12">
                <div class="current_price">
                    <span class="price">
                        Giá sale:
                        <i class="sale"><?php echo number_format($get_Price, 0, ',', '.') ?> VNĐ</i>
                    </span>
                </div>
                <div class="fake_price">
                    <span class="price">
                        Giá gốc:
                        <i class="fake"><?php echo number_format($get_Price * ($get_Discount / 100) + $get_Price, 0, ',', '.') ?> VNĐ</i>
                    </span>
                </div>
                <div class="save">
                    <span class="price">
                        Tiết kiệm:
                        <i class="sale"><?php echo number_format(($get_Price * ($get_Discount / 100) + $get_Price - $get_Price), 0, ',', '.') ?> VNĐ</i>
                    </span>
                </div>
            </div>
            <div class="event">
                <div class="event_name">
                    <span class="sale">
                        <i class="fa-regular fa-clock"></i>
                        <?php echo $get_EventName ?>
                    </span>
                </div>

                <div class="event_time">
                    <span>
                        <?php echo $time_left_formatted; ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="product_gift mt-3">
            <div class="gift_sale">
                <i class="fa-solid fa-percent"></i>
                <span class="gift-text">
                    <b>Mua càng nhiều, ưu đãi càng lớn</b><br>
                    <em style="font-size: 13px;" ;="">(Ưu đãi có thể kết thúc sớm)</em>
                </span>
            </div>
            <div class="gift_list">
                <span><i class="fa-solid fa-circle-check mr-3"></i>Freeship khi mua 2 đôi</span>
                <br><span><i class="fa-solid fa-circle-check mr-3"></i>Tặng tất theo sản phẩm(Tùy đôi)</span>
                <br><span><i class="fa-solid fa-circle-check mr-3"></i>Mua 5 đôi tặng 1 đôi</span>
                <br>
            </div>
        </div>

        <div class="prodcut_size mt-3">
            <div class="d-flex flex-wrap">
                <span class="flex-center mr-3">
                    Size
                </span>
                <?php
                $sql_details_size = "SELECT * FROM tbl_product_size INNER JOIN tbl_size
            ON tbl_size.id = tbl_product_size.size_id
            WHERE product_id = '$_GET[id]'";
                $query_details_size = mysqli_query($connect, $sql_details_size);

                while ($row_details_size = mysqli_fetch_array($query_details_size)) {
                    $id = $row_details_size['id'];
                    $size_name = $row_details_size['name'];
                ?>
                    <div class="p-1">
                        <label class="btn btn-outline-success size-btn" data-size-id="<?php echo $id; ?>">
                            <?php echo $size_name; ?>
                            <input type="hidden" name="selected_size" value="<?php echo $id; ?>">
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>

            <script>
                $(document).ready(function() {
                    $(".size-btn").click(function() {
                        // Xóa lớp active từ tất cả các nút
                        $(".size-btn").removeClass("active");

                        // Thêm lớp active cho nút được chọn
                        $(this).addClass("active");
                    });
                });
            </script>

        </div>

        <div class="size_quantity mt-3">
            <div class="input-group input-group-sm">
                <span class="flex-center mr-10" for="quantity">Số lượng:</span>
                <div class="input-group-prepend">
                    <button class="btn btn-light" type="button" id="minusBtn">-</button>
                </div>
                <input class="btn btn-light" id="quantity" name="quantity" size="1" min="1" value="1">
                <div class="input-group-append">
                    <button class="btn btn-light" type="button" id="plusBtn">+</button>
                </div>
            </div>
        </div>

        <div class="addCart d-grid gap-2 mt-3">
            <button type="submit" class="btn btn-success btn-lg">Đặt mua ngay</button>
        </div>

        <script>
            $(document).ready(function() {
                $("#plusBtn").click(function() {
                    // Tăng giá trị số lượng khi nút cộng được click
                    var quantity = parseInt($("#quantity").val());
                    $("#quantity").val(quantity + 1);
                });

                $("#minusBtn").click(function() {
                    // Giảm giá trị số lượng khi nút trừ được click
                    var quantity = parseInt($("#quantity").val());
                    if (quantity > 1) {
                        $("#quantity").val(quantity - 1);
                    }
                });
            });
        </script>

    </div>

    <div class="col col-3 detail_contact">
        <div class="">
            <div class="seller-info">
                <a style="text-decoration: none;" href="#" class="">
                    <img height="44" width="4" alt="" class="" src="./images/logo.svg" style="width: 44px;"><noscript><img height="44" width="4" alt="" class="WebpImg__StyledImg-sc-h3ozu8-0 fWjUGo logo" src="/wp-content/uploads/2022/09/PNG-1.png" style="width: 44px;" /></noscript>
                    <span>Shoes Land</span>
                    <div class="flex-center">
                        <span class="">
                            <img height="18" width="74" alt="" class="" src="../../user/img/official.png" style="width: 74px; height: 18px;"><noscript><img height="18" width="74" alt="" class="WebpImg__StyledImg-sc-h3ozu8-0 fWjUGo badge-img" src="/wp-content/uploads/2022/06/offcial-i.png" style="width: 74px; height: 18px;" /></noscript>
                        </span>
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="col benefit-item">
                    <img alt="compensation-icon" src="../../user/img/security.png" height="32" width="32" data-lazy-src="/wp-content/uploads/2022/06/hoan-tien.png" data-ll-status="loaded" class="entered lazyloaded"><noscript><img alt="compensation-icon" src="/wp-content/uploads/2022/06/hoan-tien.png" height="32" width="32" /></noscript>
                    <span>
                        Hoàn tiền<br>
                        <b>100%</b><br>
                        nếu không đúng hàng
                    </span>
                </div>
                <div class="col benefit-item">
                    <img alt="compensation-icon" src="../../user/img/like.png" height="32" width="32" data-lazy-src="/wp-content/uploads/2022/06/unbox.png" data-ll-status="loaded" class="entered lazyloaded"><noscript><img alt="compensation-icon" src="/wp-content/uploads/2022/06/unbox.png" height="32" width="32" /></noscript>
                    <span>
                        Nhận hàng<br>
                        Kiểm tra hàng<br>
                        Thoải mái
                    </span>
                </div>
                <div class="col benefit-item">
                    <img alt="compensation-icon" src="../../user/img/refund.png" height="32" width="32" data-lazy-src="/wp-content/uploads/2022/06/doi-tra.png" data-ll-status="loaded" class="entered lazyloaded"><noscript><img alt="compensation-icon" src="/wp-content/uploads/2022/06/doi-tra.png" height="32" width="32" /></noscript>
                    <span>
                        Đổi trả trong<br>
                        <b>3 ngày</b><br>
                        nếu sp lỗi
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>