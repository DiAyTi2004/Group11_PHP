<link rel="stylesheet" href="../../user/styles/ProductDetailStyles.css">

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
<div class="appCard row pb-3">
    <div class="col col-4 detail_images">
        <div class="ecommerce-gallery" data-mdb-zoom-effect="true" data-mdb-auto-height="true">
            <div class="row py-3 shadow-5">
                <div class="col-12 mb-1">
                    <div class="lightbox">
                        <?php
                        $mainImageSource = str_starts_with($row_details['content'], 'http') ? $row_details['content'] : "../../admin/pages/ProductImage/{$row_details['content']}";

                        echo "<img style=\"max-width: 100%; max-height: 500px;\" src=\"{$mainImageSource}\" alt=\"Gallery image 1\" class=\"ecommerce-gallery-main-img active w-100\" />";
                        ?>
                    </div>
                </div>
                <?php
                while ($row_details = mysqli_fetch_array($query_details)) {
                ?>
                    <div class="col-4 mt-3">
                        <?php
                        $imageSource = str_starts_with($row_details['content'], 'http') ? $row_details['content'] : "../../admin/pages/ProductImage/{$row_details['content']}";

                        echo "<img style=\"max-width: 100%; max-height: 100px;\" src=\"{$imageSource}\" data-mdb-img=\"\" alt=\"Gallery image 1\" class=\"active w-100\" />";
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>


    <div class="col col-5 detail_product">
        <div class="product_name">
            <p class="product_code">
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
                    Mã sản phẩm:
                    <span class="text-green">
                        <?php echo $get_Code; ?>
                    </span>
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

        <form method="post" action="../pages/ProductDetail/AddProductToCart.php?productId=<?php echo $_GET['id']; ?>">
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
                        $size_id = $row_details_size['id'];
                        $size_name = $row_details_size['name'];
                    ?>
                        <div class="p-1">
                            <label class="btn btn-outline-success size-btn">
                                <?php echo preg_replace('/\D/', '', $size_name); ?>
                                <input type="hidden" name="selectedSize" value="<?php echo $size_id; ?>">
                            </label>
                        </div>
                    <?php
                    }
                    ?>
                </div>
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

            <div class="addCart d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-success btn-lg" name="addToCart">
                    <i class="fa-solid fa-cart-shopping mr-2 ml-0"></i>
                    Đặt mua ngay
                </button>
            </div>

            <!-- Get price -->
            <input type="hidden" name="price" value="<?php echo $get_Price; ?>">
        </form>

        <script>
            $(document).ready(function() {
                // Khi người dùng submit form
                $("form").submit(function(event) {
                    // Lấy giá trị size_id từ trường input ẩn
                    var selectedSizeId = $("input[name='selectedSize']").val();

                    // Kiểm tra nếu size chưa được chọn
                    if (!selectedSizeId) {
                        // Hiển thị thông báo cảnh báo
                        alert("Vui lòng chọn một size trước khi đặt hàng.");
                        // Ngăn chặn sự kiện submit nếu size chưa được chọn
                        event.preventDefault();
                    }
                });

                // Xử lý sự kiện khi người dùng chọn size
                $(".size-btn").click(function() {
                    // Xóa lớp active từ tất cả các nút
                    $(".size-btn").removeClass("active");

                    // Thêm lớp active cho nút được chọn
                    $(this).addClass("active");

                    // Lấy giá trị size_id từ trường input ẩn của nút được chọn
                    var selectedSizeId = $(this).find("input[name='selectedSize']").val();

                    // Cập nhật giá trị của trường input ẩn
                    $("input[name='selectedSize']").val(selectedSizeId);
                });
            });
        </script>


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
            <div class="seller-info flex-center">
                <a style="text-decoration: none;" href="#" class="">
                    <img height="44" width="44" alt="" class="" src="./images/logo.svg" style="width: 44px;"><noscript><img height="44" width="4" alt="" class="WebpImg__StyledImg-sc-h3ozu8-0 fWjUGo logo" src="/wp-content/uploads/2022/09/PNG-1.png" style="width: 44px;" /></noscript>
                    <span>Shoes Land</span>
                    <div class="flex-center">
                        <span class="">
                            <img height="18" width="74" alt="" class="" src="./images/official.png" style="width: 74px; height: 18px;"><noscript><img height="18" width="74" alt="" class="WebpImg__StyledImg-sc-h3ozu8-0 fWjUGo badge-img" src="/wp-content/uploads/2022/06/offcial-i.png" style="width: 74px; height: 18px;" /></noscript>
                        </span>
                    </div>
                </a>
            </div>
            <div class="row mt-4">
                <div class="col benefit-item">
                    <img alt="compensation-icon" src="./images/security.png" height="32" width="32" data-lazy-src="/wp-content/uploads/2022/06/hoan-tien.png" data-ll-status="loaded" class="entered lazyloaded"><noscript><img alt="compensation-icon" src="/wp-content/uploads/2022/06/hoan-tien.png" height="32" width="32" /></noscript>
                    <span>
                        Hoàn tiền<br>
                        <b>100%</b><br>
                        nếu không đúng hàng
                    </span>
                </div>
                <div class="col benefit-item">
                    <img alt="compensation-icon" src="./images/like.png" height="32" width="32" data-lazy-src="/wp-content/uploads/2022/06/unbox.png" data-ll-status="loaded" class="entered lazyloaded"><noscript><img alt="compensation-icon" src="/wp-content/uploads/2022/06/unbox.png" height="32" width="32" /></noscript>
                    <span>
                        Nhận hàng<br>
                        Kiểm tra hàng<br>
                        Thoải mái
                    </span>
                </div>
                <div class="col benefit-item">
                    <img alt="compensation-icon" src="./images/refund.png" height="32" width="32" data-lazy-src="/wp-content/uploads/2022/06/doi-tra.png" data-ll-status="loaded" class="entered lazyloaded"><noscript><img alt="compensation-icon" src="/wp-content/uploads/2022/06/doi-tra.png" height="32" width="32" /></noscript>
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