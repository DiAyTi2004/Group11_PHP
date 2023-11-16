<div class="modal fade" id="editPopup_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form method="POST" action="pages/Order/OrderLogic.php?orderId=<?php echo $row['id']; ?>" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="text-center text-white">Sửa đơn hàng <?php echo $row['code']; ?></h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table border="1" width="100%" padding="10px" style="border-collapse: collapse;">
                        <tr>
                            <td class="row">
                                <div class="mb-2 col col-12 col-md-4">
                                    <label for="code" class="form-label">Mã đơn hàng</label>
                                    <input name="code" type="text" class="form-control" id="code" value="<?php echo $row['code'] ?>">
                                </div>
                                <div class="mb-2 col col-12 col-md-4">
                                    <label for="phigiaohnang" class="form-label">Phí giao hàng</label>
                                    <input name="phigiaohang" type="text" class="form-control" id="delivery_cost" value="<?php echo $row['delivery_cost'] ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="row">
                                <div class="mb-2 col col-12 col-md-4">
                                    <label for="dienthoainhan" class="form-label">Điện thoại nhận hàng</label>
                                    <input name="dienthoainhan" type="text" class="form-control" id="name" value="<?php echo $row['receive_phone'] ?>">
                                </div>
                                <div class="mb-2 col col-12 col-md-4">
                                    <label for="diachinhan" class="form-label">Địa chỉ nhận</label>
                                    <input name="diachinhan" type="text" class="form-control" id="code" value="<?php echo $row['receive_address'] ?>">
                                </div>
                                
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="mota" class="form-label">Mô tả</label>
                                    <textarea name="mota" class="form-control" id="description" rows="3"><?php echo $row['description'] ?></textarea>
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td class="row">
                                <div class="col-12 col-md-6">
                                    <p><b>Các kích cỡ của sản phẩm:</b></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <a class='btn btn-primary text-white productSizeButton color-white display-block h-100 w-100' href="?workingPage=productSize&productId=<?php echo $row['id']; ?>">
                                        <i class="fa-solid fa-pen-to-square text-white mr-1"></i>
                                        Chỉnh sửa các kích cỡ mà sản phẩm có
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="row">
                                <div class="col-12 col-md-6">
                                    <p><b>Các chi tiết của đơn hàng:</b></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <a class='btn btn-primary text-white productSizeButton color-white display-block h-100 w-100' href="?workingPage=order_detail&orderId=<?php echo $row['id']; ?>">
                                        <i class="fa-solid fa-pen-to-square text-white mr-1"></i>
                                        Chỉnh sửa chi tiết đơn hàng 
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary pt-2 pb-2" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" name="editOrder">Sửa</button>
                </div>
            </div>
        </form>
    </div>
</div>