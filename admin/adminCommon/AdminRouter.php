<div class="container my-4">
    <?php
    if ($workingPage == 'quanlydanhmucsanpham' && $query == 'them') {
        include("./pages/quanlydanhmucsp/them.php");
        include("./pages/quanlydanhmucsp/lietke.php");
    } else if ($workingPage == 'quanlydanhmucsanpham' && $query == 'sua') {
        include("./pages/quanlydanhmucsp/sua.php");
    } else if ($workingPage == 'product' && $query == 'them') {
        include("./pages/Product/ProductIndex.php");
        include("./pages/Product/AddProductPopup.php");
    } else if ($workingPage == 'product' && $query == 'sua') {
        include("./pages/Product/EditProductPopup.php");
    } else if ($workingPage == 'quanlynguoidung' && $query == 'them') {
        include("./pages/quanlynguoidung/lietke.php");
    } else if ($workingPage == 'quanlynguoidung' && $query == 'sua') {
        include("./pages/quanlynguoidung/sua.php");
    } else if ($workingPage == 'order' && $query == 'them') {
        include("./pages/quanlydonhang/lietke.php");
    } else if ($workingPage == 'order' && $query == 'sua') {
        include("./pages/quanlydonhang/sua.php");
    } else if ($workingPage == 'order' && $query == 'xemdonhang') {
        include("./pages/quanlydonhang/xemdonhang.php");
    } else if ($workingPage == 'dangxuat') {
        include("Login.php");
    } else {
        include("Dashboard.php");
    }

    ?>

</div>