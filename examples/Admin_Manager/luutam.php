<?php 
include('dbcon.php');
session_start();
	 if(isset($_POST['delete_btn']))
	{
		$del_id = $_POST['delete_btn'];
		$ref_table = 'CauHoi/'.$del_id;
		$deleteQuerry_rusult = $database->getReference($ref_table)->remove();
		//-------------------------------
		if($deleteQuerry_rusult)
		{
			$_SESSION['status'] = "Xóa thành công";
			header('Location: index.php');
		}
		else
		{
			$_SESSION['status'] = "Xóa thất bại";
			header('Location: index.php');
		}
	}
?>





















<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Quản lý APP Ôn luyện bằng láy xe</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>
	
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

<?php
include('dbcon.php');
session_start();
if(isset($_POST['btn_insert']))
{
	if( empty($_POST["txt_CauA"]))
	{

	}
	else
	{
		
		$CauA = $_POST["txt_CauA"];
		$CauB = $_POST["txt_CauB"];
		$CauC = $_POST["txt_CauC"];
		$CauD = $_POST["txt_CauD"];
		// $HaySai= $_POST["txt_HaySai"];
		// $Luu = $_POST["txt_Luu"]="";
		$HinhAnh = $_POST["txt_HinhAnh"];
		$GiaiThich= $_POST["txt_GiaiThich"];
		$DapAnDung=$_POST["txt_DapAnDung"];
		$MaCauHoi= $_POST["txt_MaCauHoi"];
		$MaLoaiBang= $_POST["txt_MaLoaiBang"];
		$MaLoaiCH= $_POST["txt_LoaiCauHoi"];
		$NoiDung= $_POST["txt_NoiDung"];	

		$postData = [
			'DapAnA'=>$CauA,
			'DapAnB'=>$CauB,
			'DapAnC'=>$CauC,
			'DapAnD'=>$CauD,
			'HinhAnh'=>$HinhAnh,
			'DapAnDung'=>$DapAnDung,
			'MaCauHoi'=>$MaCauHoi*1,
			'MaLoaiBang'=>$MaLoaiBang*1,
			'MaLoaiCH'=>$MaLoaiCH*1,
			'NoiDung'=>$NoiDung,	
			'GiaiThich'=>$GiaiThich,
			'Luu'=>0,
			'HaySai'=>0,
		];
		$ref_table = "CauHoi";
		$postRef_result = $database->getReference($ref_table)->push($postData);
		
		if($postRef_result)
		{
			$_SESSION['status'] = "Thêm thành công";
		}
		else
		{
			$_SESSION['status'] = "Thêm thất bại";
		}
		
	}
	
		
}

?>

</head>
<body>
	<div class="wrapper">
		<?php
		include("body/header.php");
		include("body/menu_table.php");
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

					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">  </h4>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
											<table id="basic-datatables" class="display  table-striped table-hover" >
											<thead>
												<tr>
													<th>A</th>
													<th>B</th>
													<th>C</th>
													<th>D</th>
													<th>Đáp án đúng</th>
													<th>Giải thích</th>
													<!-- <th>Hay sai</th> -->
													<th>Hình ảnh</th>
													<!-- <th>Lưu</th> -->
													<th>Mã câu hỏi</th>
													<th>Mã loại bằng</th>
													<th>Mã loại CH</th> 
													<th>Nội dung</th>
													<th>Thao tác</th>
												</tr>
											</thead>
									
											<tbody >
												<?php
												include('dbcon.php');
												$ref_table = 'CauHoi';
												$fetchdata = $database->getReference($ref_table)->getValue();
												if($fetchdata>0)
												{
													$i = 0;
													foreach($fetchdata as $key=>$row)
													{
														?>
														<tr>
															<td><?php echo $row['DapAnA']?></td>
															<td><?php echo $row['DapAnB']?></td>
															<td><?php echo $row['DapAnC']?></td>
															<td><?php echo $row['DapAnD']?></td>
															<td><?php echo $row['DapAnDung']?></td>
															<td><?php echo $row['GiaiThich']?></td>																														
															<td><img width='50px' src= <?php echo $row['HinhAnh'] ?> > </td>													
															<td><?php echo $row['MaCauHoi']?></td>
															<td><?php echo $row['MaLoaiBang']?></td>
															<td><?php echo $row['MaLoaiCH']?></td>
															<td><?php echo $row['NoiDung']?></td>
											<td>
														<div class="form-button-action" >

															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"  data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>

														<form action="index.php" method="get"> 

														     <button type="button" data-toggle="tooltip" name="btn_xoa" data-id="<?php echo $id; ?>"  value="btn_xoa" title="" class="btn btn-link btn-danger" onclick="confirmDelete(this);"  data-original-title="Remove">
																<i class="fa fa-times"></i>																
															</button>
															
														</form>															
														</div>
													</td>
														</tr>
														<?php
													}
												}
												
												?>		
																																																																																																
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Thêm mới</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Thêm mới
										</button>
									</div>
								</div>

								
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Thêm</span> 
														<span class="fw-light">
															câu hỏi mới
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>


												<div class="modal-body">
													<p class="small">Thêm một câu hỏi mới vào bảng câu hỏi</p>
													<!----------------------------------------------- form ----------------------------------------------- -->
													<form action="insertCauHoi.php" method="post">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																<label>Nội dung</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_NoiDung">																	
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																<label>Câu A</label>
																	<input id="addName" type="text" class="form-control"name="txt_CauA">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Câu B</label>
																	<input id="addPosition" type="text" class="form-control" name="txt_CauB" >
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Câu C</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_CauC" >
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Câu D</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_CauD">
																</div>
															</div>
														
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Hình ảnh</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_HinhAnh" >
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Giải thích</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_GiaiThich" >
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Đáp án đúng</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_DapAnDung" >
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Mã câu hỏi</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_MaCauHoi">
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Mã loại bảng</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_MaLoaiBang">
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Loại câu hỏi</label>
																	<input id="addOffice" type="text" class="form-control" name="txt_LoaiCauHoi">
																</div>
															</div>
															

														</div>


														<div class="modal-footer no-bd">
															<!-- chuyển hướng trang  chổ này nè truyền id vô <3-->
															<!-- <a href=" " class="btn btn-primary"> Thêm </a>     
															<a href=""  class="btn btn-danger"  data-dismiss="modal"> Hủy</a> -->
													<button type="submit" id="" class="btn btn-primary" name="btn_insert" >Thêm</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
														</div>
													</form>
													<!----------------------------------------------- form ----------------------------------------------- -->
												</div>
												

											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer -->
	     <?php include('body/footer.php')?>
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
//////////
<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Quản lý APP Ôn luyện bằng láy xe</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>
	
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
  				    <?php 
						if(isset($_SESSION['status']))
						{						 
							echo "<h4 id='words' class='alert alert-success'>".$_SESSION['status']."</h4>";
							unset($_SERVER['status']);
						}
					
					?>
					<script type="text/javascript"> 
							setTimeout(function() {
								var msg=document.getElementById("words")
								msg.parentNode.removeChild(msg)
							},2500)						
				    </script>


					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">  </h4>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
											<table id="basic-datatables" class="display  table-striped table-hover" >
											<thead>
												<tr>
													<th>STT</th>
													<th>A</th>
													<th>B</th>
													<th>C</th>
													<th>D</th>
													<th>Đáp án đúng</th>
													<th>Giải thích</th>
													<!-- <th>Hay sai</th> -->
													<th>Hình ảnh</th>
													<!-- <th>Lưu</th> -->
													<th>Mã câu hỏi</th>
													<th>Mã loại bằng</th>
													<th>Mã loại CH</th> 
													<th>Nội dung</th>
													<th>Thao tác</th>
												</tr>
											</thead>
									
											<tbody >
												<?php
												include('dbcon.php');
												$ref_table = 'CauHoi';
												$fetchdata = $database->getReference($ref_table)->getValue();
												if($fetchdata>0)
												{
													$i = 1;
													foreach($fetchdata as $key=>$row)
													{
														?>
											<tr>			<td> <?php echo $i++?></td>
															<td><?php echo $row['DapAnA']?></td>
															<td><?php echo $row['DapAnB']?></td>
															<td><?php echo $row['DapAnC']?></td>
															<td><?php echo $row['DapAnD']?></td>
															<td><?php echo $row['DapAnDung']?></td>
															<td><?php echo $row['GiaiThich']?></td>																														
															<td><img width='50px' src= images/<?php echo $row['HinhAnh'] ?>></td>													
															<td><?php echo $row['MaCauHoi']?></td>
															<td><?php echo $row['MaLoaiBang']?></td>
															<td><?php echo $row['MaLoaiCH']?></td>
												 			<td><?php echo $row['NoiDung']?></td>
											           <td>
														  <div class="form-button-action" >
															<!-- Nút edit -->
															<button type="button" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg"  data-target="#addRowModal_capNhat" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>

															<!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
															<i class="fa fa-plus"></i>
																Thêm mới
															</button>
															 -->
															<!-- Nút xóa -->
														    <form action="index.php" method="get">  
																<button type="button" data-toggle="tooltip" name="btn_xoa" data-id=""  value="btn_xoa" title="" class="btn btn-link btn-danger" onclick="confirmDelete(this);"  data-original-title="Remove">
																	<i class="fa fa-times"></i>																
																</button>															
														    </form>	

															<!-- <form action="deleteCauHoi.php" method="POST">  
																<button type="submit" data-toggle="tooltip"  name="delete_btn" value="<?=$key?>" class="btn btn-link btn-danger"  data-original-title="Remove">																
																	<i class="fa fa-times"></i>																
																</button>															
														    </form>	   !important -->

														</div>

							 						  </td>
												</tr>
														<?php
													}
												}																								
												?>	

																																																																																															
											</tbody>
											
										</table>
									</div>
								</div>
							</div>
						</div>

						

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Thêm mới</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Thêm mới
										</button>
									</div>
								</div>

								<!-- card-body thêm------------------------------- -->
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Thêm</span> 
														<span class="fw-light">
															câu hỏi mới
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
                                               <!-- the form thêm -->
												<div class="modal-body">
													<p class="small">Thêm một câu hỏi mới vào bảng câu hỏi</p>
												
													<form action="insertCauHoi.php" method="POST">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																<label>Nội dung</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_NoiDung">																	
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																<label>Câu A</label>
																	<input id="addName" type="text" class="form-control"name="txt_CauA">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Câu B</label>
																	<input id="addPosition" type="text" class="form-control" name="txt_CauB" >
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Câu C</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_CauC" >
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Câu D</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_CauD">
																</div>
															</div>
														
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Hình ảnh</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_HinhAnh" >
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Giải thích</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_GiaiThich" >
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Đáp án đúng</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_DapAnDung" >
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Mã câu hỏi</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_MaCauHoi">
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Mã loại bảng</label>
																	<input id="addOffice" type="text" class="form-control"  name="txt_MaLoaiBang">
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Loại câu hỏi</label>
																	<input id="addOffice" type="text" class="form-control" name="txt_LoaiCauHoi">
																</div>
															</div>
															

														</div>


														<div class="modal-footer no-bd">															
													<button type="submit" id="" class="btn btn-primary" name="btn_insert" >Thêm</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
														</div>
													</form>
												
												</div>
												<!-- kết thúc thẻ Form thêm -->

											</div>
										</div>
									</div>

								</div>
								<!-- kết thúc card body thêm -->
										
								


								
                                    
							


							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- footer -->
	     <?php include('body/footer.php')?>
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

		document.getElementById("form-delete-user").id.value = id;
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
				<form method="POST" action="deleteCauHoi.php" id="form-delete-user">
					<input type="hidden" name="id">
				</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>				
				<form action="deleteCauHoi.php" method="POST">  
					<button type="submit" name="delete_btn" value="<?=$key?>" class="btn btn-danger" data-original-title="Yes">Yes</button>															
				</form>					
			</div>		

		</div>

	</div>
</div>










<!-- Xử lý xóa ------------------------------------------------------------------------------------------- -->

<?php include('body/footer.php')?>yy


   


//




















<?php 
	if(isset($_POST['checking_edit_btn'])){
	$_id = $_POST['id_cauHoi'];
	$result_array = [];
	include('dbcon.php');
	$ref_table = 'CauHoi';
	// $fetchdata = $database->getReference($ref_table)->getValue();
	$get_Data = $database->getReference($ref_table)->getChild($_id)->getValue();	
		if($fetchdata>0)
		{
			foreach($get_Data as $row)
			{
				array_push($result_array,$row);
				header('Content-type: application/json');
				echo json_encode($result_array);
			}
		}
	}

?>












<!-- Xử lý xóa ------------------------------------------------------------------------------------------- -->

