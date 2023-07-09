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
					<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Thêm mới</h4>
										<a href="page_insert.php"class="btn btn-primary btn-round ml-auto"> <i class="fa fa-plus"></i> Thêm mới</a>										
									</div>
								</div>
							</div>		
						</div>	
					<!-- Thông báo thao tác -->
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
					<!-- kết thúc thông báo thao tác -->

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
												<tr class="record">
													
													<th>Mã </th>
													<th>A</th>
													<th>B</th>
													<th>C</th>
													<th>D</th>
													<th>Đáp án đúng</th>
													<th>Giải thích</th>
													<!-- <th>Hay sai</th> -->
													<th>Hình ảnh</th>
													<!-- <th>Lưu</th> -->
												
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
													foreach($fetchdata as $key=>$row)
													{			
														?>
										 			<tr>
															<td style="font-size:13px"><?php echo $row['MaCH']?></td>
															<td style="font-size:13px"><?php echo $row['DapAnA']?></td>
															<td style="font-size:13px"><?php echo $row['DapAnB']?></td>
															<td style="font-size:13px"><?php echo $row['DapAnC']?></td>
															<td style="font-size:13px"><?php echo $row['DapAnD']?></td>	
															<td style="font-size:13px"><?php echo $row['DapAnDung']?></td>
															<td style="font-size:13px" ><?php echo $row['GiaiThich']?></td>																														
															<td><img width='50px' src= images/<?php echo $row['HinhAnh'] ?>></td>													
															
															<td style="font-size:13px"><?php echo $row['MaLoaiBang']?></td>
															<td style="font-size:13px"><?php echo $row['MaLoaiCH']?></td>
												 			<td style="font-size:13px" ><?php echo $row['NoiDung']?></td>																																																																											
														    <td>
															<div class="form-button-action" >
																<!-- <a href="#"  class="badge badge- info edit_btn"  > edit</a> -->
																<!-- <a href="" data-original-title="Delete" class="btn btn-link btn-danger btn-lg "  > <i class="fa fa-times"></i></a> -->
																
																	<!-- Nút edit -->
																<!-- <button type="button" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg edit_btn"   data-original-title="Edit Task">
																	<i class="fa fa-edit"></i>
																</button> -->

																	<!-- Nút delete -->
																<!-- <button type="button" data-toggle="modal" title="" class="btn btn-link btn-danger btn-lg"   data-target="#deleteCauHoiModal" data-original-title="Delete">
																	<i class="fa fa-times"></i>	
																</button> -->
																

																<!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
																<i class="fa fa-plus"></i>
																	Thêm mới
																</button>
																-->
																<!-- Nút xóa -->
																<!-- <form action="index.php" method="get">  
																	<button type="button" data-toggle="tooltip" name="btn_xoa" value="<?php echo $key ?>" data-id="<?php echo $key ?>"  value="btn_xoa" title="" class="btn btn-link btn-danger" onclick="confirmDelete(this);"  data-original-title="Remove">
																		<i class="fa fa-times"></i>																
																	</button>															
																</form>	 -->
																


																
																<!-- <button data-target="#editCauHoiModal" type="button"  data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg "   data-original-title="Edit Task">
																	<i class="fa fa-edit"></i>
																</button>  -->

																<a href="page_update.php?id=<?php echo $key?>" data-original-title="Delete" class="btn btn-link btn-primary  "  > <i class="fa fa-edit"></i></a>

																<form action="deleteCauHoi.php" method="POST">  
																	<button type="submit" data-toggle="tooltip"  name="delete_btn" value="<?=$key?>" class="btn btn-link btn-danger"  data-original-title="Remove">																
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
								</div>
							</div>
						</div>
						<!-- Nút thêm  -->	
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Thêm mới</h4>
										<a href="page_insert.php"class="btn btn-primary btn-round ml-auto"> <i class="fa fa-plus"></i> Thêm mới</a>										
									</div>
								</div>
							</div>		
						</div>						
						<!-- Hết nút thêm -->
				
					

					
				</div>
			</div>
			<?php session_destroy()?>
			<!-- footer -->
	   
		 
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






