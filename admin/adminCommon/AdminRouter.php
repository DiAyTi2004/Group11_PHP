<div class="flex-grow-1">
    <div class="container my-4 appCard   <?php if (!isset($_GET['workingPage'])) echo "bg-transparent"; ?>">
        <?php
        if ($workingPage == 'category' && $query == 'edit') {
            include("./pages/Category/EditCategoryPopup.php");
        } else if ($workingPage == 'category') {
            include("./pages/Category/AddCategoryPopup.php");
            include("./pages/Category/CategoryIndex.php");
            include("./pages/Category/CategoryConfirmDeletePopup.php");
        } else if ($workingPage == 'product') {
            include("./pages/Product/ProductIndex.php");
            include("./pages/Product/AddProductPopup.php");
        } else if ($workingPage == 'event' && $query == 'edit') {
            include("./pages/Event/EditEventPopup.php");
        } else if ($workingPage == 'event') {
            include("./pages/Event/EventIndex.php");
            include("./pages/Event/AddEventPopup.php");
            include("./pages/Event/EventConfirmDeletePopup.php");
        } else if ($workingPage == 'user') {
            include("./pages/User/UserIndex.php");
            include("./pages/User/AddUserPopup.php");
            include("./pages/User/EditUserPopup.php");
            include("./pages/User/UserConfirmDeletePopup.php");
        } else if ($workingPage == 'order') {
             include("./pages/Order/OrderIndex.php"); 
             include("./pages/Order/AddOrderPopup.php");  
             include("./pages/Order/OrderConfirmDelete.php");
            }
            else if ($workingPage == 'dangxuat') {
            include("Login.php");
        } else {
            include("./pages/Dashboard/DashboardIndex.php");
        }
        ?>
    </div>
</div>