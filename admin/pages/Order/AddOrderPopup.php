<!-- Modal -->
<div class="modal fade" id="addOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="text-center text-white">Thêm đơn hàng</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="categoryForm" method="POST" action="pages/Order/OrderLogic.php" enctype="multipart/form-data">
                    <table border="1" width="100%" padding="10px" style="border-collapse: collapse;">
                        <tr>
                            <td class="row">
                                <div class="mb-2 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Người đặt hàng</label>
                                    <select name="userId" class="form-select" aria-label="Default select example">
                                        <option value="">Chưa chọn</option>

                                        <?php
                                        $sql_user = "SELECT * FROM tbl_user";
                                        $query_user = mysqli_query($connect, $sql_user);
                                        while ($row_user = mysqli_fetch_array($query_user)) {
                                        ?>
                                            <option class="p-2" value="<?php echo $row_user['id'] ?>">
                                                <?php echo $row_user['fullname'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-2 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Trạng thái đơn hàng</label>
                                    <select name="statusId" class="form-select" aria-label="Default select example">
                                        <option value="">Chưa chọn</option>

                                        <?php
                                        $sql_status = "SELECT * FROM tbl_status";
                                        $query_status = mysqli_query($connect, $sql_status);
                                        while ($row_status = mysqli_fetch_array($query_status)) {
                                        ?>
                                            <option class="p-2" value="<?php echo $row_status['id'] ?>">
                                                <?php echo $row_status['name'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </td>

                            <td class="row">
                                <div class="mb-2 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Hình thức thanh toán</label>
                                    <select name="payment_type_id" class="form-select" aria-label="Default select example">
                                        <option value="">Chưa chọn</option>

                                        <?php
                                        $sql_payment = "SELECT * FROM tbl_payment_type";
                                        $query_payment = mysqli_query($connect, $sql_payment);
                                        while ($row_payment = mysqli_fetch_array($query_payment)) {
                                        ?>
                                            <option class="p-2" value="<?php echo $row_payment['id'] ?>">
                                                <?php echo $row_payment['name'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Điện thoại nhận hàng</label>
                                    <input name="dienthoainhan" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="diachinhan" class="form-label">Địa chỉ nhận</label>
                                    <textarea name="diachinhan" class="form-control" id="diachinhan" rows="3"></textarea>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Phí giao hàng</label>
                                    <input name="phigiaohang" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="diachinhan" class="form-label">Mô tả</label>
                                    <textarea name="mota" class="form-control" id="diachinhan" rows="3"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary pt-2 pb-2" data-bs-dismiss="modal">Đóng</button>

                <button type="submit" class="btn btn-primary" name="addOrder">Thêm danh mục</button>
            </div>
            </form>
        </div>
    </div>
</div>