<!-- Modal -->
<div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="text-center text-white">Thêm người dùng</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="userForm" method="POST" action="pages/User/UserLogic.php" enctype="multipart/form-data">
                    <table border="1" width="100%" padding="10px" style="border-collapse: collapse;">
                    
                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Tên người dùng</label>
                                    <input name="hovatens" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Account</label>
                                    <input name="taikhoans" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input name="emails" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">PhoneNumber</label>
                                    <input name="dienthoais" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                                    <input name="diachis" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Chức vụ</label>
                                    <p>
                                        <select name="chucvus" style="width:120px">
                                            <?php
                                            if ($nguoidung['chucvu'] == 1) {
                                            ?>
                                                <option value="1" selected> Bán hàng</option>
                                                <option value="0">Không</option>

                                            <?php
                                            } else {
                                            ?>
                                                <option value="1"> Bán hàng</option>
                                                <option value="0" selected>Không</option>
                                            <?php

                                            }

                                            ?>
                                        </select>
                                    </p>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Bạn chắc chắn về thông tin thêm người dùng?
                                            <div class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary pt-2 pb-2" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" name="themnguoidung">Thêm </button>
            </div>
            </form>
        </div>
    </div>
</div>