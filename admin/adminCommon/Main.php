<div class="clear"></div>
<div class="main container">
    <?php

    if (isset($_GET['action']) && $_GET['query']) {
        $bientam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $bientam = '';
        $query = '';
    }
    if ($bientam == 'quanlydanhmucsanpham' && $query == 'them') {
        include("./pages/quanlydanhmucsp/them.php");
        include("./pages/quanlydanhmucsp/lietke.php");
    } elseif ($bientam == 'quanlydanhmucsanpham' && $query == 'sua') {
        include("./pages/quanlydanhmucsp/sua.php");
    } elseif ($bientam == 'quanlysanpham' && $query == 'them') {
        include("./pages/Product/ProductIndex.php");
        include("./pages/Product/AddProductPopup.php");
    } elseif ($bientam == 'quanlysanpham' && $query == 'sua') {
        include("./pages/Product/EditProductPopup.php");
    } elseif ($bientam == 'quanlynguoidung' && $query == 'them') {
        include("./pages/quanlynguoidung/lietke.php");
    } elseif ($bientam == 'quanlynguoidung' && $query == 'sua') {
        include("./pages/quanlynguoidung/sua.php");
    } elseif ($bientam == 'quanlydonhang' && $query == 'them') {
        include("./pages/quanlydonhang/lietke.php");
    } elseif ($bientam == 'quanlydonhang' && $query == 'sua') {
        include("./pages/quanlydonhang/sua.php");
    } elseif ($bientam == 'quanlydonhang' && $query == 'xemdonhang') {
        include("./pages/quanlydonhang/xemdonhang.php");
    } elseif ($bientam == 'dangxuat') {
        include("Login.php");
    } else {
        include("Dashboard.php");
    }
    ?>
</div>