<div class="flex-grow-1">
    <div class="container my-4 appCard <?php if (!isset($_GET['workingPage'])) echo "bg-transparent"; ?>">
        <?php
        if ($workingPage == 'category') {
            include("./pages/Category/CategoryIndex.php");
            include("./pages/Category/AddCategoryPopup.php");
        } else if ($workingPage == 'productSize') {
            include("./pages/ProductSize/ProductSizeIndex.php");
            include("./pages/ProductSize/AddProductSizePopup.php");
        } else if ($workingPage == 'productImage') {
            include("./pages/ProductImage/ProductImageIndex.php");
            include("./pages/ProductImage/AddProductImagePopup.php");
        } else if ($workingPage == 'product') {
            include("./pages/Product/ProductIndex.php");
            include("./pages/Product/AddProductPopup.php");
        } else if ($workingPage == 'event') {
            include("./pages/Event/EventIndex.php");
            include("./pages/Event/AddEventPopup.php");
            include("./pages/Event/EditEventPopup.php");
            include("./pages/Event/ConfirmDeleteEventPopup.php");
        } else if ($workingPage == 'user') {
            include("./pages/User/UserIndex.php");
            include("./pages/User/AddUserPopup.php");
            include("./pages/User/EditUserPopup.php");
            include("./pages/User/UserConfirmDeletePopup.php");
        } else if ($workingPage == 'order') {
            include("./pages/Order/OrderIndex.php");
            include("./pages/Order/AddOrderPopup.php");
            include("./pages/Order/OrderConfirmDelete.php");
            include("pages/Order/EditOrderPopup.php");
        } else if ($workingPage == 'status') {
            include("./pages/Status/StatusIndex.php");
            include("./pages/Status/AddStatusPopup.php");
            include("./pages/Status/EditStatusPopup.php");
            include("./pages/Status/ConfirmDeleteStatusPopup.php");
        } else if ($workingPage == 'size') {
            include("./pages/Size/SizeIndex.php");
            include("./pages/Size/AddSizePopup.php");
            include("./pages/Size/EditSizePopup.php");
            include("./pages/Size/ConfirmDeleteSizePopup.php");
        } else if ($workingPage == 'payment_type') {
            include("./pages/PaymentType/PaymentTypeIndex.php");
            include("./pages/PaymentType/AddPaymentTypePopup.php");
            include("./pages/PaymentType/EditPaymentTypePopup.php");
            include("./pages/PaymentType/ConfirmDeletePaymentTypePopup.php");
        } else if ($workingPage == 'orderDetail') {
            include("./pages/OrderDetail/OrderDetailIndex.php");
            include("./pages/OrderDetail/AddOrderDetailPopup.php");
            include("./pages/OrderDetail/EditOrderDetailPopup.php");
            include("./pages/OrderDetail/OrderDetailConfirmDelete.php");
        } else {
            include("./pages/Dashboard/DashboardIndex.php");
        }
        ?>
    </div>
</div>