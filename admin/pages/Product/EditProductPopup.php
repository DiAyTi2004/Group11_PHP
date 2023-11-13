<div class="modal fade" id="editPopup_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form method="POST" action="pages/Product/ProductLogic.php?productId=<?php echo $row['id']; ?>" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="text-center text-white">Sửa sản phẩm <?php echo $row['code']; ?></h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table border="1" width="100%" padding="10px" style="border-collapse: collapse;">
                        <tr>
                            <td class="row">
                                <div class="mb-2 col col-12 col-md-4">
                                    <label for="name" class="form-label">Tên sản phẩm</label>
                                    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name'] ?>">
                                </div>
                                <div class="mb-2 col col-12 col-md-4">
                                    <label for="code" class="form-label">Mã sản phẩm</label>
                                    <input name="code" type="text" class="form-control" id="code" value="<?php echo $row['code'] ?>">
                                </div>
                                <div class="mb-2 col col-12 col-md-4">
                                    <label for="price" class="form-label">Giá</label>
                                    <input name="price" type="number" step="0.01" class="form-control" id="price" value="<?php echo $row['price'] ?>">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="description" class="form-label">Mô tả</label>
                                    <textarea name="description" class="form-control" id="description" rows="3"><?php echo $row['description'] ?></textarea>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col-6">
                                    <label for="categoryId" class="form-label">Danh mục</label>
                                    <select name="categoryId" class="form-select" aria-label="Default select example">
                                        <option value="">Chưa chọn</option>
                                        <?php
                                        $getAllCategorySql = "SELECT * FROM tbl_category";
                                        $categoryData = mysqli_query($connect, $getAllCategorySql);

                                        while ($row_danhmuc = mysqli_fetch_array($categoryData)) {
                                            $selected = ($row_danhmuc['id'] == $row['category_id']) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $row_danhmuc['id'] ?>" <?php echo $selected; ?>>
                                                <?php echo $row_danhmuc['name'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-2 col-6">
                                    <label for="eventId" class="form-label">Sự kiện</label>
                                    <select name="eventId" class="form-select" aria-label="Default select example">
                                        <option value="">Chưa chọn</option>
                                        <?php
                                        $getAllEventSql = "SELECT * FROM tbl_event";
                                        $eventData = mysqli_query($connect, $getAllEventSql);

                                        while ($row_danhmuc = mysqli_fetch_array($eventData)) {
                                            $selected = ($row_danhmuc['id'] == $row['event_id']) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $row_danhmuc['id'] ?>" <?php echo $selected; ?>>
                                                <?php echo $row_danhmuc['name'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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
                            <td colspan="2">
                                <?php include "./pages/Product/OwningSizeTable.php"; ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="col-12 col-md-6">
                                    <p><b>Các ảnh của sản phẩm:</b></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <a class='btn btn-primary text-white productSizeButton color-white display-block h-100 w-100' href="?workingPage=productImage&productId=<?php echo $row['id']; ?>">
                                        <i class="fa-solid fa-pen-to-square text-white mr-1"></i>
                                        Chỉnh sửa các ảnh mà sản phẩm có
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <?php include "./pages/Product/OwningImageTable.php"; ?>
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