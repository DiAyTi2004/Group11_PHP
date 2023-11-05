<!-- Modal -->
<div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="text-center text-white">XÁC NHẬN</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productForm" method="POST" action="pages/Product/ProductLogic.php" enctype="multipart/form-data">
                    <table border="1" width="100%" padding="10px" style="border-collapse: collapse;">
                        Bạn có chắc chắn muốn xóa sản phẩm này?
                    </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary pt-2 pb-2" data-bs-dismiss="modal">Hủy</button>

                <button type="submit" class="btn btn-primary" name="themsanpham">Xác nhận</button>
            </div>
            </form>
        </div>
    </div>
</div>