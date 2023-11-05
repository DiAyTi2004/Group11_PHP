       <p>
           <?php
            if (isset($_SESSION['dangky'])) {
            }
            ?>
       </p>


       <?php
        if (isset($_SESSION['cart'])) {
        }

        ?>
       <hr />
       <table border="0" style="width:95%; padding: 0; margin: 0 auto">
           <tr>
               <th>Sản phẩm đã thêm</th>
           </tr>
       </table>
       <table border="0" style="width:95%; padding: 0; margin: 0 auto">
           <?php
            if (isset($_SESSION['cart'])) {
                $i = 0;
                $tongtien = 0;
                foreach ($_SESSION['cart'] as $cart_item) {
                    $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
                    $tongtien += $thanhtien;
                    $i++;
            ?>
                   <tr>
                       <td><b><?php echo $cart_item['tensanpham'] ?></b></td>
                       <td><img class="img-cart" src="../../admin/pages/Product/ProductImages/<?php echo $cart_item['hinhanh'] ?>"></td>
                       <td>
                           <div class="soluong-sp-dem">
                               <a class="soluong-sp-dem-icon" href="../pages/Cart/EditQuantity.php?minus=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                               <input class="soluong-sp-input" type="text" name="soluong" value="<?php echo $cart_item['soluong'] ?>">
                               <a class="soluong-sp-dem-icon" href="../pages/Cart/EditQuantity.php?plus=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                           </div>
                       </td>
                       <td><?php echo number_format($cart_item['giasanpham'], 0, ',', '.') . ' VNĐ' ?></td>
                       <td class="giasp-cart"><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></td>
                       <td style="text-align: center"><a href="../pages/Cart/DeleteFromCart.php?id=<?php echo $cart_item['id'] ?>">Xóa sản phẩm</a></td>
                   </tr>
               <?php
                }
                echo "<hr/>";
                ?>
               <tr>
                   <td colspan="5">
                       <p style="float: left; color: red;font-weight: bold;font-size: 16px;"> Tổng tiền : <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ'  ?></p>
                       <div style="clear:both;"> </div>
                       <?php
                        if (isset($_SESSION['dangky'])) {

                        ?>
                           <p class="btn-dathang"><a class="btn-dathang-a" href="pages/main/thanhtoan/index.php?usingPage=vanchuyen">Đặt hàng</a></p>
                       <?php
                        } else {

                        ?>
                           <p><a href="index.php?usingPage=dangnhap">Đăng nhập đặt hàng</a></p>
                       <?php
                        }

                        ?>
                   </td>
                   <td>
                       <p style="text-align: center"><a href="pages/main/giohang/xoahetgiohang.php?xoatatca=xoahet">Xóa hết</a></p>
                   </td>
               </tr>
           <?php
            } else {
            ?>
               <hr>
               <tr>
                   <td colspan="6">Hiện tại giỏ hàng trống</td>
               </tr>
           <?php
            }
            ?>
       </table>
       <p></p>