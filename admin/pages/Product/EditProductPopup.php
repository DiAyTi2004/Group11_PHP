<div class="modal fade" id="editPopup_<?php echo $row['id_sanpham']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="pages/Product/ProductLogic.php?productId=<?php echo $row['id_sanpham']; ?>" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="text-center text-white">Sửa sản phẩm</h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table border="1" width="100%" style="border-collapse: collapse;">

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        Tên sản phẩm
                                    </label>
                                    <input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham" class="form-control" id="exampleFormControlInput1">

                                </div>
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        Mã sản phẩm
                                    </label>
                                    <input type="text" name="masp" value="<?php echo $row['masanpham'] ?>" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        Giá
                                    </label>
                                    <input type="number" name="giasp" value="<?php echo $row['giasanpham'] ?>" class="form-control" id="exampleFormControlInput1">

                                </div>
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        Số lượng
                                    </label>
                                    <input type="text" name="soluong" value="<?php echo $row['soluong'] ?>" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="col-6">
                                    <img class="imageInPopup" src="pages/Product/ProductImages/<?php echo $row['hinhanh'] ?>">
                                </div>

                                <div class="col-6 flex-center flex-column">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        Hình ảnh
                                    </label>
                                    <input type="file" name="hinhanh" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        Tóm tắt
                                    </label>
                                    <textarea name="tomtat" rows="5" cols="50" id="exampleFormControlTextarea1" class="form-control" style="resize: none;"><?php echo $row['tomtat'] ?></textarea>
                                </div>

                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        Nội dung
                                    </label>
                                    <textarea name="noidung" rows="5" cols="50" id="exampleFormControlTextarea1" class="form-control" style="resize: none;"><?php echo $row['noidung'] ?></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="row">

                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        Danh mục sản phẩm
                                    </label>

                                    <select name="danhmuc" class="form-select" aria-label="Default select example">
                                        <?php
                                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                                        $query_danhmuc = mysqli_query($connect, $sql_danhmuc);
                                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                            if ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) {
                                        ?>
                                                <!--dùng value thêm danh mục dựa vào địa chỉ id_danhmuc -->
                                                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>" selected>
                                                    <?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>">
                                                    <?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>

                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        Tình trạng
                                    </label>

                                    <select name="hienthi" class="form-select" aria-label="Default select example">
                                        <?php
                                        if ($row['trangthai'] == 1) {
                                        ?>
                                            <option value="1" selected>Mới</option>
                                            <option value="0">Cũ</option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="1">Mới</option>
                                            <option value="0" selected>Cũ</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Bạn chắc chắn về thông tin sửa sản phẩm?
                                        </label>
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
                    <button type="submit" class="btn btn-primary" name="editProduct">Sửa sản phẩm</button>
                </div>
            </div>
        </form>
    </div>
</div>