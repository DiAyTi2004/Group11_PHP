<div class="modal fade" id="editEventPopup_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="pages/Event/EventLogic.php?Id=<?php echo $row['id']; ?>" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="text-center text-white">Sửa sự kiện</h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table border="1" width="100%" style="border-collapse: collapse;">

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Mã sự kiện</label>
                                    <input name="code" type="text" value="<?php echo $row['code'] ?>" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Tên sự kiện</label>
                                    <input name="name" type="text" value="<?php echo $row['name'] ?>" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="col-6 flex-column">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        Banner
                                    </label>
                                    <input type="file" name="banner" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="col-6">
                                    <img class="imageInPopup" src="pages/Event/EventImages/<?php echo $row['banner'] ?>" alt="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlInput1" class="form-label">Giảm giá</label>
                                    <input name="discount" type="text" value="<?php echo $row['discount'] ?>" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="date" class="form-label">Ngày bắt đầu</label>
                                    <input name="start_date" type="date" value="<?php echo $row['start_date'] ?>" class="form-control" id="datepicker">
                                </div>
                                <div class="mb-2 col">
                                    <label for="date" class="form-label">Ngày kết thúc</label>
                                    <input name="end_date" type="date" value="<?php echo $row['end_date'] ?>" class="form-control" id="datepicker">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="row">
                                <div class="mb-2 col">
                                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $row['description'] ?></textarea>
                                </div>
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




<?php
$sql_sua_event = "SELECT * FROM tbl_event WHERE id='$_GET[id]' LIMIT 1";
$result_sua_sp = mysqli_query($connect, $sql_sua_event);
?>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="pages/Event/EventLogic.php?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
        <?php
        while ($row = mysqli_fetch_array($result_sua_event)) {


        ?>

            <tr>
                <th colspan="2">Sửa sự kiện</th>
            </tr>
            <tr>
                <td>ngày bắt đầu</td>
                <td>
                    <input type="date" name="start_date" value="<?php echo $row['start_date'] ?>">
                    <span class="input-group-append">
                        <span class="input-group-text bg-light d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td>ngaykethuc</td>
                <td>
                    <input type="date" name="end_date" value="<?php echo $row['end_date'] ?>">
                    <span class="input-group-append">
                        <span class="input-group-text bg-light d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td>giảm giá</td>
                <td><input type="number" name="discount" value="<?php echo $row['discount'] ?>"></td>
            </tr>
            <tr>
                <td>banner</td>
                <td><input type="text" name="banner" value="<?php echo $row['banner'] ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Sửa sự kiện" name="suasukien"></td>
            </tr>
    </form>
<?php
        }
?>
</table>