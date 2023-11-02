<div class="flex-grow-1">
    <div class="container my-4">
        <?php
        if ($workingPage == 'category' && $query == 'them') {
            include("./pages/Category/AddCategoryPopup.php");
            include("./pages/Category/CategoryIndex.php");
            include("./pages/Category/CategoryConfirmDeletePopup.php");
        } else if ($workingPage == 'category' && $query == 'sua') {
            include("./pages/Category/EditCategoryPopup.php");
        } else if ($workingPage == 'product' && $query == 'them') {
            include("./pages/Product/ProductIndex.php");
            include("./pages/Product/AddProductPopup.php");
            include("./pages/Product/ProductConfirmDeletePopup.php");
        } else if ($workingPage == 'product' && $query == 'sua') {
            include("./pages/Product/EditProductPopup.php");
        } else if ($workingPage == 'event') {
            include("./pages/Event/EventIndex.php");
            include("./pages/Event/AddEventPopup.php");
            include("./pages/Event/EventConfirmDeletePopup.php");
        } else if ($workingPage == 'event' && $query == 'edit') {
            include("./pages/Event/EditEventPopup.php");
        } else if ($workingPage == 'user' && $query == 'them') {
            include("./pages/User/UserIndex.php");
        } else if ($workingPage == 'user' && $query == 'sua') {
            include("./pages/User/EditUserPopup.php");
        } else if ($workingPage == 'order' && $query == 'them') {
            include("./pages/Order/OrderIndex.php");
        } else if ($workingPage == 'order' && $query == 'sua') {
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