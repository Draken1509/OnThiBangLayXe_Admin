<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

	<title>Quản lý APP Ôn luyện bằng láy xe</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>

	<!--  -->
	<!--  -->


	<!-- Fonts and icons -->
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">
	<style>
  .myImg{
	width:20px;
	height:20px;
  }
     td{
	text-align: center;
	padding: 10px;
  }
	</style>

<?php 
    set_error_handler(function(int $errno, string $errstr) {
	if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
		return false;
	} else {
		return true;
	}
  }, E_WARNING);


?>

</head>
<body>
	<div class="wrapper">
		<?php
		session_start();
		include("body/header.php");
		include("body/menu_table.php");
		$id_delete = 0;
		$id_update = 0;
	
		?>
<!-- bảng dữ liệu câu hỏi -->
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">DANH MỤC CÂU HỎI</h4>
						<ul class="breadcrumbs">
				
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
						</ul>
					</div>
					<!-- Thông báo thao tác -->
                	<div tabindex="-1" aria-labelledby="editCauHoiModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">						
								<?php
								include("dbcon.php");
								if(isset($_GET['id']))
								{									
									$key_child = $_GET['id'];
									$ref_table = "CauHoi";
									$getData = $database->getReference($ref_table)->getChild($key_child)->getValue();									
									if($getData>0)
									{
										?>
										<form action="updateCauHoi.php" method="POST">
										<div class="modal-body">	
											<input type="hidden" name="key" value="<?=$key_child?>">											
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group form-group-default">
													<label>Nội dung</label>
														<input id="edit_NoiDung" type="text" class="form-control" value="<?=$getData["NoiDung"]?>"  name="txt_NoiDung">																	
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
													<label>Câu A</label>
														<input id="edit_CauA" type="text" class="form-control"name="txt_CauA" value="<?=$getData["DapAnA"]?>" >
													</div>
												</div>
												<div class="col-md-6 pr-0">
													<div class="form-group form-group-default">
														<label>Câu B</label>
														<input id="edit_CauB" type="text" class="form-control" name="txt_CauB" value="<?=$getData["DapAnB"]?>" >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>Câu C</label>
														<input id="edit_CauC" type="text" class="form-control"  name="txt_CauC" value="<?=$getData["DapAnC"]?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>Câu D</label>
														<input id="edit_CauD" type="text" class="form-control"  name="txt_CauD" value="<?=$getData["DapAnD"]?>">
													</div>
												</div>
											
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>Hình ảnh</label>
														<input id="edit_HinhAnh" type="text" class="form-control"  name="txt_HinhAnh" value="<?=$getData["HinhAnh"]?>" >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>Giải thích</label>
														<input id="edit_GiaiThich" type="text" class="form-control"  name="txt_GiaiThich"value="<?=$getData["GiaiThich"]?>" >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label>Đáp án đúng</label>
														<select  required="required"class="form-control" id="list_DapAn" onchange="getSelectedIndexDapAn();">													
															<option>A</option>																																			   
															<option>B</option>		
															<option>C</option>		
															<option>D</option>	
															<option selected hidden > <?php echo $getData["DapAnDung"]?></option>		
														</select>
														<script>
															function getSelectedIndexDapAn()
															{															
																var a=document.getElementById("list_DapAn");
																var index=a.options[a.selectedIndex].index;
																document.getElementById("temp_list_DapAn").value=index;
																console.log(index);																																															
															}																												
														</script>				
														<!-- <input id="edit_DapAnDung" type="text" class="form-control"  name="txt_DapAnDung" value="<?=$getData["DapAnDung"]?>"> -->
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default" >
														<label>Mã câu hỏi</label>
														<input id="edit_MaCH" type="text" class="form-control"  readonly="readonly" name="txt_MaCauHoi" value="<?=$getData["MaCH"]?>">
													</div>
												</div>
												<div class="col-md-5">
													<div class="form-group form-group-default">
													<label for=""> Loại bằng láy </label>
														<select name="txt_MaLoaiBang" required="required"class="form-control" id="list_LoaiBang" onchange="getSelectedIndexMaLoaiBang();">
														<?php 
															include('dbcon.php');
															$ref_table = 'Loaibang';
															$fetchdata = $database->getReference($ref_table)->getValue();												
															if($fetchdata>0)
																{
																	foreach($fetchdata as $key=>$row)
																	{?>
																	<option ><?php echo $row['TenLoaiBang'];?></option>																						
													  			 <?php
																	}		
																																											
																}?>
															 <?php 
															 	$temp = $getData["MaLoaiBang"];
															 	echo "Ma bang la :" . $temp;
															 	$tenbang ="";
																 if($temp==1){
																	 $tenbang = "Bằng láy xe A1";
																 }
																 else if($temp==2){
																	 $tenbang = "Bằng láy xe B1";																	
																 }
																 ?>
																 <option selected hidden><?php  echo $tenbang?></option>		
																 <?php
															 ?>
														</select>
														<script>
															function getSelectedIndexMaLoaiBang()
															{															
																var a=document.getElementById("list_LoaiBang");
																var index=a.options[a.selectedIndex].index;
																document.getElementById("temp_list_LoaiBang").value=index;
																console.log(index);																																																			
															}																												
														</script>														
													</div>
												</div>
												<div class="col-md-5">
													<div class="form-group form-group-default">
													<label for=""><span style="color: blue; font-size: 13px;">  Loại câu hỏi </span> <span style="color: red; font-size: 13px;">(*)</span></label>
														<select  required="required"class="form-control" id="list_LoaiCH" onchange="getSelectedIndexMaLoaiCH();">
														<?php 
															include('dbcon.php');
															$ref_table = 'LoaiCauHoi';
															$fetchdata = $database->getReference($ref_table)->getValue();												
															if($fetchdata>0)
																{
																	foreach($fetchdata as $key=>$row)
																	{
														?>
																	<option><?php echo $row['TenLoaiCauHoi'];?></option>																						
														<?php
																	}											
																}																																																					
													    ?>
														<?php 
															 	$temp = $getData["MaLoaiCH"];															 	
															 	$tenbang ="";
																 if($temp==1){
																	 $tenbang = "Câu hỏi điểm liệt";
																 }
																 else if($temp==2){
																	 $tenbang = "Khái niệm và quy tắc";																	
																 }
																 else if($temp==3){
																	$tenbang = "Biển báo đường bộ";																	
																}
																else if($temp==4){
																	$tenbang = "Văn hóa và đạo đức";																	
																}
																else if($temp==5){
																	$tenbang = "Kỹ thuật láy xe";																	
																}
																else{
																	$tenbang = "Cấu tạo và sửa chữa";	
																}
																 ?>
																 <option selected hidden><?php  echo $tenbang?></option>		
																 <?php
															 ?>
														</select>
														<script>
															function getSelectedIndexMaLoaiCH()
															{															
																var a=document.getElementById("list_LoaiCH");
																var index=a.options[a.selectedIndex].index;
																document.getElementById("temp_list_LoaiCH").value=index;
																console.log(index);																																																			
															}																												
														</script>

														<!-- <label>Loại câu hỏi</label>
														<input id="edit_LoaiCH" type="text" class="form-control" required name="txt_LoaiCauHoi" > -->
													</div>
													</div>
												</div>	
												</div>												
														
														<input value="0" hidden  required id="temp_list_LoaiBang" name="ma_loaiBang" type="text">																																																														
														
														<input value="0"hidden required  id="temp_list_LoaiCH" name="ma_loaiCH" type="text" >
														
														<input value="0" hidden required  id="temp_list_DapAn" name="ma_dapAn" type="text" >
											</div>	
																																		
										</div>
										<div class="modal-footer no-bd">		
											<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>													
											<button type="submit" id="" class="btn btn-primary"  name="btn_update" >Cập nhật</button>												
											</div>	
																					
								   </form>
										<?php
									}
									else
									{
										$_SESSION['status'] = "Không câu hỏi nào được cập nhật";
										 header('Location:index.php');
										exit();
									}
								}
								else
									{

										$_SESSION['status'] = "Không câu hỏi nào được cập nhật";
										 header('Location:index.php');
										exit();
									}
								?>
								


								
								</div>
							</div>
						</div>
					 

					

					
				</div>
			</div>
			<!-- footer -->
	     <?php
			 session_destroy();
		 ?>
		 
			<!-- end footer -->
		</div>

	</div>
	<!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
   <!--  -->
<!-- <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script> -->
   <!--  -->
	<script >		
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});
			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});
			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
			$('#addRowButton').click(function() {			
						
			});
		});
	</script> 
</body>
</html>

<script>
	function confirmDelete(self) {
		var id = self.getAttribute("data-id");
        $id_temp=id;
		document.getElementById("form-delete-user").id.value = id;
		document.getElementById("form-delete-user").value = id;
		$("#myModal").modal("show");

	}
</script>
<!-- dialog xác nhận -->
<div id="myModal" class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			
			<div class="modal-header">
				<h4 class="modal-title">Xóa câu hỏi</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<p>Bạn có chắc muốn xóa câu hỏi này?</p>
				<!-- <form method="POST" action="deleteCauHoi.php" id="form-delete-user">
					<input type="hidden" name="id">
				</form> -->
				
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>				
				<form action="deleteCauHoi.php" method="POST" id="form-delete-user">  
					<button type="submit" name="delete_btn" value="<?=3?>" class="btn btn-danger" data-original-title="Yes">Yes</button>																			
				</form>					
			</div>		

		</div>

	</div>
</div>


<!-- Xử lý xóa ------------------------------------------------------------------------------------------- -->

<!-- làm lại từ đâu -->






