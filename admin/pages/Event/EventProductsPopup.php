<!-- <link rel="stylesheet" href="./styles/SizeStyles.css"> -->

<?php
$getAllEventProductsSQL = "SELECT * FROM tbl_product, tbl_event WHERE tbl_product.event_id = '$row[id]';";
$tableEventProductsData = mysqli_query($connect, $getAllEventProductsSQL);
?>
<!-- Modal -->
<div class="modal fade" id="eventProductsModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="text-center text-white">Các ảnh của sản phẩm (Mã SP: <?php echo $row['code'] ?>)</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="w-100">
                    <thead class="table-head w-100">
                        <tr class="table-heading">
                            <th class="noWrap">STT</th>
                            <th class="noWrap">Các hình ảnh</th>
                            <th class="noWrap">Mô tả</th>
                            <th class="noWrap">Ảnh chính</th>
                        </tr>
                    </thead>

                    <tbody class="table-body">
                        <?php
                        $displayOrder = 0;
                        $hasData = false;
                        while ($rowEventProductsData = mysqli_fetch_array($tableEventProductsData)) {
                            $displayOrder++;
                            $hasData = true;
                        ?>
                            <tr>
                                <td>
                                    <?php echo  $displayOrder + ($pageIndex - 1) * $pageSize; ?>
                                </td>
                                <td>
                                    <img style="width: 150px; height: 150px" src="pages/ProductImage/<?php echo $rowEventProductsData['content'] ?>" alt="">
                                </td>
                                <td>
                                    <?php echo $rowEventProductsData['description'] ?>
                                </td>
                                <td>
                                    <?php if ($rowEventProductsData['main_image']) echo '<i class="fa-solid fa-check fa-lg"></i>';
                                    else echo '<i class="fa-solid fa-xmark fa-lg"></i>'; ?>
                                </td>
                            </tr>
                        <?php
                        }
                        if (!$hasData) {
                        ?>
                            <tr>
                                <td colspan="5">
                                    <?php echo "Hiện không có ảnh nào!" ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary pt-2 pb-2" data-bs-dismiss="modal">Đóng</button>

                <div class="col-12 col-md-6">
                    <a class='btn btn-primary text-white productSizeButton color-white display-block h-100 w-100' href="?workingPage=productImage&productId=<?php echo $row['id']; ?>">
                        <i class="fa-solid fa-pen-to-square text-white mr-1"></i>
                        Chỉnh sửa các ảnh sản phẩm
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>