
<div class="modal fade" id="editPopup_<?php echo $row['id_khachhang'];?>" tabindex="-1 aria-labelledby=" exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<form method="POST" action="pages/User/UserLogic.php?userId=<?php echo $row['id_khachhang']; ?>" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="text-center text-white">Sửa sản phẩm</h5>
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<table border="1" width="100%" style="border-collapse: collapse;">
						<tr>
							<td>Name</td>
							<td><input type="text" size="50" name="hovatens" value="<?php echo $row['hovaten'] ?>"></td>
						</tr>
						<tr>
							<td>Account</td>
							<td><input type="text" size="50" name="taikhoans" value="<?php echo $row['taikhoan'] ?>"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" size="50" name="emails" value="<?php echo $row['email'] ?>"> </td>
						</tr>
						<tr>
							<td>Number Phone</td>
							<td><input type="text" size="50" name="dienthoais" value="<?php echo $row['sodienthoai'] ?>"> </td>
						</tr>
						<tr>
							<td>Address</td>
							<td>
								<input type="text" name="diachis" value="<?php echo $row['diachi'] ?>">
							</td>
						</tr>
						<tr>
							<td>Chức Vụ </td>
							<td>
								<select name="chucvus" style="width: 120px">
									<?php
									if ($nguoidung['chucvu'] == 1) {
									?>
										<option value="1" selected> Bán hàng</option>
										<option value="0">Không</option>

									<?php
									}else
									?>
										<option value="1"> Bán hàng</option>
										<option value="0" selected>Không</option>
								</select>
							</td>
						</tr>
						<tr>
                            <td>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Bạn chắc chắn về thông tin sửa người dùng?
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary pt-2 pb-2" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" name="suanguoidung">Sửa </button>
                </div>
			</div>
		</form>
	</div>
</div>
