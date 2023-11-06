<div class="flex-grow-1">
    <div class="container my-4 <?php if (!isset($_GET['workingPage'])) echo "bg-transparent"; ?>">
        <?php
        if ($workingPage == 'category' && $query == 'edit') {
            include("./pages/Category/EditCategoryPopup.php");
        } else if ($workingPage == 'category') {
            include("./pages/Category/AddCategoryPopup.php");
            include("./pages/Category/CategoryIndex.php");
            include("./pages/Category/CategoryConfirmDeletePopup.php");
        } else if ($workingPage == 'product' && $query == 'edit') {
            include("./pages/Product/ProductIndex.php");
            include("./pages/Product/EditProductPopup.php");
            include("./pages/Product/AddProductPopup.php");
            include("./pages/Product/ProductConfirmDeletePopup.php");
        } else if ($workingPage == 'product') {
            include("./pages/Product/ProductIndex.php");
            include("./pages/Product/EditProductPopup.php");
            include("./pages/Product/AddProductPopup.php");
            include("./pages/Product/ProductConfirmDeletePopup.php");
        } else if ($workingPage == 'event' && $query == 'edit') {
            include("./pages/Event/EditEventPopup.php");
        } else if ($workingPage == 'event') {
            include("./pages/Event/EventIndex.php");
            include("./pages/Event/AddEventPopup.php");
            include("./pages/Event/EventConfirmDeletePopup.php");
        } else if ($workingPage == 'user' && $query == 'edit') {
            include("./pages/User/EditUserPopup.php");
        } else if ($workingPage == 'user') {
            include("./pages/User/UserIndex.php");
            include("./pages/User/AddUserPopup.php");
        } else if ($workingPage == 'order') {
            include("./pages/Order/OrderIndex.php");
        } else if ($workingPage == 'order' && $query == 'edit') {
            include("./pages/Order/OrderLogicPopup.php");
        } else if ($workingPage == 'order' && $query == 'xemdonhang') {
            include("./pages/Order/CheckOrderPopUp.php");
        } else if ($workingPage == 'dangxuat') {
            include("Login.php");
        } else {
            include("./pages/Dashboard/DashboardIndex.php");
        }

        ?>
    </div>
</div>