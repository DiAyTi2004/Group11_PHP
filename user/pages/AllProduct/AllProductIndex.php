
<?php
$severname = "localhost";
$username = "root";
$password = "";
$database = "shoesland";

$connect = new mysqli($severname, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "loi ket noi" . mysqli_connect_error();
    exit();
}

$sql_show_test = "SELECT * FROM tbl_product INNER JOIN tbl_product_image ON tbl_product.id = tbl_product_image.product_id
WHERE tbl_product_image.main_image = 1 LIMIT 5";
$query_show_test = mysqli_query($connect, $sql_show_test);

$countAllSql = "SELECT * FROM tbl_product INNER JOIN tbl_product_image ON tbl_product.id = tbl_product_image.product_id
WHERE tbl_product_image.main_image = 1;";

$total_records = mysqli_num_rows(mysqli_query($connect, $countAllSql));

$pageIndex = isset($_GET['page']) ? $_GET['page'] : 1;
$pageSize = isset($_GET['limit']) ? $_GET['limit'] : 5;

$total_page = ceil($total_records / $pageSize);

$start = ($pageIndex - 1) * $pageSize;
?>
<div class="container p-0">
    <div class="product_list row">
        <?php
        while ($row_test = mysqli_fetch_array($query_show_test)) {
            $sql_show_event = "SELECT * FROM tbl_product INNER JOIN tbl_event ON tbl_product.event_id = tbl_event.id WHERE tbl_product.id = '$row_test[product_id]'";
            $query_show_event = mysqli_query($connect, $sql_show_event);
            $row_event = mysqli_fetch_array($query_show_event);
        ?>
            <li class="col-xs-12 col-sm-4 col-md-3 pb-4">
                <div class="w-100" class="productClass br-10">
                    <a href="UserIndex.php?usingPage=product&id=<?php echo $row_test['product_id'] ?>">
                        <div class="product-container over-hidden">
                            <?php
                            $imageSource = str_starts_with($row_test['content'], 'http') ? $row_test['content'] : "../../admin/pages/ProductImage/{$row_test['content']}";
                            echo "<img src=\"{$imageSource}\" alt=\"{$row_test['name']}\">";

                            if ($row_event['discount'] > 0) :
                            ?>
                                <div class="discount-overlay"><?php echo "-" . $row_event['discount'] . '%'; ?></div>
                            <?php endif; ?>
                        </div>

                        <h5 class="title_product mt-2"> <?php echo $row_test['name'] ?></h5>
                        <div class="sold flex justify-between mt-2">
                            <span style="font-size: 15px;" class="ml-3">
                                Mã sản phẩm: <?php echo $row_test['code'] ?>
                            </span>
                        </div>
                        <div class="cdt-product-param"><span data-title="Loại Hàng"><i class="fa-solid fa-cart-arrow-down"></i> Like auth</span></div>
                        <span style="text-decoration: line-through;" class="price_fake ml-3">
                            <?php echo number_format($row_test['price'] * ($row_event['discount'] / 100) + $row_test['price'], 0, ',', '.') ?> đ
                        </span>
                        <span class="price_real ml-3">
                            <?php echo number_format($row_test['price'], 0, ',', '.') . ' đ' ?>
                        </span>
                    </a>
                </div>
            </li>
        <?php
        }
        ?>
        </ul>

    </div>
</div>

<form action="" method="GET">
    <nav class="row py-2" aria-label="Page navigation example">
        <div class="col-md-6 d-flex align-items-center">
            <label for="limitSelect" class="mr-2">Rows per page:</label>
            <select name="limit" id="limitSelect" class="form-control" onchange="updatePageAndLimit()">
                <option value="5" <?php if ($pageSize == 5) echo 'selected'; ?>>5</option>
                <option value="10" <?php if ($pageSize == 10) echo 'selected'; ?>>10</option>
                <option value="15" <?php if ($pageSize == 15) echo 'selected'; ?>>15</option>
            </select>
        </div>

        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <span class="mr-3">
                Showing <?php echo $pageSize . " of " . $total_records . " results"; ?>
            </span>
        </div>

        <ul class="pagination justify-content-center col-12 col-md-6 mt-2 mt-md-0">
            <li class="page-item <?php echo ($pageIndex > 1) ? '' : 'disabled'; ?>">
                <a class="page-link" href="?usingPage=allproduct&limit=<?php echo $pageSize; ?>&page=<?php echo ($pageIndex - 1); ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php
            for ($i = 1; $i <= $total_page; $i++) {
                echo '<li class="page-item ' . (($i == $pageIndex) ? 'active' : '') . '">
                        <a class="page-link" href="?usingPage=allproduct&limit=' . $pageSize . '&page=' . $i . '">' . $i . '</a>
                      </li>';
            }
            ?>

            <li class="page-item <?php echo ($pageIndex < $total_page) ? '' : 'disabled'; ?>">
                <a class="page-link" href="?usingPage=allproduct&limit=<?php echo $pageSize; ?>&page=<?php echo ($pageIndex + 1); ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</form>
include()
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
