<!-- Modal -->
<div class="modal fade" id="addProductImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="text-center text-white">Thêm ảnh cho sản phẩm <?php echo $productCode; ?></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ProductImageForm" method="POST" action="pages/ProductImage/ProductImageLogic.php?productId=<?php echo $productId; ?>" enctype="multipart/form-data">
                    <table border="1" width="100%" padding="10px">
                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="code" class="form-label">Mã sản phẩm</label>
                                    <input name="code" type="text" class="form-control" value="<?php echo $productCode; ?>" disabled id="code">
                                </div>
                                <div class="mb-2 col">
                                    <label for="name" class="form-label">Tên sản phẩm</label>
                                    <input name="name" type="text" class="form-control" value="<?php echo $productName; ?>" disabled id="name">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div>
                                    <label for="code" class="form-label">Mô tả hình ảnh</label>
                                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="col-md-6">
                                    <label for="images">Chọn Ảnh:</label>
                                    <input type="file" name="images[]" id="imageInput" class="form-control" multiple accept="image/*" onchange="uploadImages()"><br>
                                </div>
                                <div class="col-md-6">
                                    <label for="images">Ảnh đã chọn:</label>
                                    <div id="imageGallery" class="d-flex flex-wrap justify-content-between"></div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="main_image">Chọn Ảnh Chính:</label>
                                <select name="main_image" id="main_image" class="form-control" disabled>
                                    <option value="" selected disabled>Chọn ảnh chính</option>
                                </select>
                            </td>
                        </tr>

                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary pt-2 pb-2" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" name="addProductImage">Thêm ảnh</button>
            </div>
            </form>

            <!-- Bootstrap JS and Popper.js (required for Bootstrap components) -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            
            <script>
                // Lấy thông tin từ form
                var imageInput = document.getElementById('imageInput');
                var mainImageSelect = document.getElementById('main_image');
                var imageGallery = document.getElementById('imageGallery');
                // Biến để kiểm tra xem đã chọn main_image chưa
                var mainImageSelected = false;
                function uploadImages() {
                    // Kiểm tra xem đã chọn ảnh chưa
                    if (imageInput.files.length === 0) {
                        alert("Vui lòng chọn ít nhất một ảnh.");
                        return;
                    }
                    // Hiển thị ảnh trong select box để chọn làm ảnh chính
                    mainImageSelect.innerHTML = "";
                    for (var i = 0; i < imageInput.files.length; i++) {
                        var option = document.createElement("option");
                        option.value = i;
                        option.text = "Ảnh " + (i + 1);
                        mainImageSelect.appendChild(option);
                    }
                    // Hiển thị danh sách ảnh
                    imageGallery.innerHTML = "";
                    for (var i = 0; i < imageInput.files.length; i++) {
                        var imgContainer = document.createElement("div");
                        imgContainer.className = "mb-3";
                        var img = document.createElement("img");
                        img.src = URL.createObjectURL(imageInput.files[i]);
                        img.width = 100; // Có thể thay đổi kích thước theo ý muốn
                        img.height = 100;
                        // Radio button để chọn ảnh chính
                        var radioButton = document.createElement("input");
                        radioButton.type = "radio";
                        radioButton.name = "mainImageRadio";
                        radioButton.value = i;
                        // Thêm sự kiện click để chọn ảnh chính
                        radioButton.addEventListener('click', function() {
                            if (!mainImageSelected) {
                                mainImageSelect.value = this.value;
                                mainImageSelected = true;
                            } else {
                                // Nếu đã có ảnh được chọn, hủy chọn ảnh trước đó
                                alert("Chỉ được chọn duy nhất một ảnh làm main_image.");
                                this.checked = false;
                            }
                        });
                        var divRadio = document.createElement("div");
                        divRadio.className = "form-check";
                        divRadio.appendChild(radioButton);
                        // Thêm ảnh và radio button vào container
                        imgContainer.appendChild(img);
                        imgContainer.appendChild(divRadio);
                        imageGallery.appendChild(imgContainer);
                    }
                    // Kích hoạt select box để cho phép chọn ảnh chính
                    mainImageSelect.disabled = false;
                }
                // Thêm event listener cho sự kiện change của select box
                mainImageSelect.addEventListener('change', function() {
                    // Reset trạng thái đã chọn khi thay đổi select box
                    mainImageSelected = false;
                });
            </script>
        </div>
    </div>
</div>