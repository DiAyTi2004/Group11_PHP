<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="text-center text-white">Thêm người dùng</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="categoryForm" method="POST" action="pages/User/UserLogic.php" enctype="multipart/form-data">
                    <table border="1" width="100%" padding="10px" style="border-collapse: collapse;">
                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Họ tên</label>
                                    <input name="tennguoidung" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input name="email" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Tài khoản</label>
                                    <input name="taikhoan" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td class="row">
                                <div class="col-6 flex-column">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        Hình ảnh
                                    </label>
                                    <input type="file" name="hinhanh" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-6">
                                    <img class="imageInPopup" src="pages/User/UserImages/<?php echo $row['user_image'] ?>" alt="">
                                </div>
                            </td>
                        </tr>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Code</label>
                                    <input name="code" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                                    <input name="diachi" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                                    <input name="phonenumber" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>

                            </td>
                        </tr>

                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary pt-2 pb-2" data-bs-dismiss="modal">Đóng</button>

                        <button type="submit" class="btn btn-primary" name="addUser">Thêm người dùng</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>