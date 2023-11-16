<!-- Modal -->
<div class="modal fade" id="addOrderDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="text-center text-white">Thêm sản phẩm cho đơn hàng <?php echo $orderCode; ?></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="OrderDetailForm" method="POST" action="pages/OrderDetail/OrderDetailLogic.php?orderId=<?php echo $orderId; ?>" enctype="multipart/form-data">
                    <table border="1" width="100%" padding="10px">
                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="code" class="form-label">Mã đơn hàng</label>
                                    <input name="code" type="text" class="form-control" value="<?php echo $orderCode; ?>" disabled id="code">
                                </div>
                                <div class="mb-2 col">
                                    <label for="name" class="form-label">Người đặt</label>
                                    <input name="name" type="text" class="form-control" value="<?php echo $username; ?>" disabled id="name">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="sizeId" class="form-label">Size</label>
                                    <select name="sizeId" class="form-select" required>
                                        <option value="">Chưa chọn</option>
                                        <?php
                                        $getAllsizeSql = "SELECT * FROM tbl_size WHERE id NOT IN (SELECT size_id FROM tbl_product_size WHERE product_id = '$productId');";
                                        $sizeData = mysqli_query($connect, $getAllsizeSql);

                                        while ($rowSize = mysqli_fetch_array($sizeData)) {
                                        ?>
                                            <option value="<?php echo $rowSize['id'] ?>">
                                                <?php echo $rowSize['name'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-2 col">
                                    <label for="quantity" class="form-label">Số lượng còn</label>
                                    <input name="quantity" type="number" class="form-control" id="quantity" value="0">
                                </div>
                            </td>
                        </tr>

                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary pt-2 pb-2" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" name="addOrderDetail">Thêm</button>
            </div>
            </form>
        </div>
    </div>
</div>