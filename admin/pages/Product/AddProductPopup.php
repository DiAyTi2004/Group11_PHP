<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table border="1" width="100%" padding="10px" style="border-collapse: collapse;">
                    <form id="productForm" method="POST" action="pages/Product/ProductLogic.php"
                        enctype="multipart/form-data">
                        <legend style="text-align: center;">Thêm sản phẩm</legend>
                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                                    <input name="tensanpham" type="text" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Mã sản phẩm</label>
                                    <input name="masp" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Giá</label>
                                    <input name="giasp" type="text" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Số lượng</label>
                                    <input name="soluong" type="text" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="exampleFormControlInput1" class="form-label">Hình ảnh</label>
                                <div class="input-group mb-2">
                                    <input name="hinhanh" type="file" class="form-control" id="inputGroupFile02">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tóm tắt</label>
                                    <textarea name="tomtat" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                </div>
                    
                                <div class="mb-2 col">
                                    <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                    <textarea name="noidung" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Danh mục</label>
                                    <select name="danhmuc" class="form-select" aria-label="Default select example">
                                        <?php
                                    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                                    $query_danhmuc = mysqli_query($connect, $sql_danhmuc);
                                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                    ?>
                                        <!--dùng value thêm danh mục dựa vào địa chỉ id_danhmuc -->
                                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>">
                                            <?php echo $row_danhmuc['tendanhmuc'] ?>
                                        </option>


                                        <?php
                                    }
                                    ?>
                                    </select>
                                </div>

                                <div class="mb-2 col">
                                <label for="exampleFormControlInput1" class="form-label">Tình trạng</label>
                                <select name="hienthi" class="form-select" aria-label="Default select example">
                                    <?php
                                    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                                    $query_danhmuc = mysqli_query($connect, $sql_danhmuc);
                                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                    ?>
                                    <!--dùng value thêm danh mục dựa vào địa chỉ id_danhmuc -->
                                    <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>">
                                        <?php echo $row_danhmuc['tendanhmuc'] ?>
                                    </option>


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
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                            required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Bạn chắc chắn về thông tin thêm sản phẩm?
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary mt-3" type="submit" name="themsanpham">Thêm sản
                                        phẩm</button>
                                </div>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>