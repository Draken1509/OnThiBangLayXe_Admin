<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

	<title>Quản lý APP Ôn luyện bằng láy xe</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>


	<style>
		
	</style>
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
 
		.dd_mon{
			width:32%;
			border:1px solid grey;
			float:left;
			margin:5px;}
   
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
session_start();
include("dbcon.php");
if (isset($_POST['btn_update'])) {
	$version = $_POST["txt_capNhatVersion"];
	
		$version = $version * 1;
		$ref_table = "Version";	
		
	
		$updateData = [
			'Version'=>$version,
		];
		$queryUpdate_result = $database->getReference()->update($updateData);
		if ($queryUpdate_result) {
			$_SESSION['status'] = "Cập nhật  Version thành công";
			
		} else {
			$_SESSION['status'] = "Cập nhật Version thất bại";		
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
						<h4 class="page-title">Cập nhật Version</h4>
						<ul class="breadcrumbs">
				
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
						</ul>
					</div>
					<!-- Thông báo thao tác -->
  			
					<!-- kết thúc thông báo thao tác -->

					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">  </h4>
								</div>
								<!--  -->
							
										<?php
										include('dbcon.php');
										$ref_table = 'Version';
										$fetchdata = $database->getReference($ref_table)->getValue();																																							
										?>	
										<h2 style="text-align: center;"><?php 	echo "Version hiện tại: " .$fetchdata;?></h2>
										<form action="capNhatversion.php" method="POST">
											<div class="row "style="margin-top: 70px; ">
											<div class="col-md-2" style="margin-left: 430px; ">
												<div class="form-group form-group-default">
													<label>Cập nhật Version mới  </label>
													<input required  type="number" class="form-control"  name="txt_capNhatVersion">
												</div>																								
											</div>
											<div class="col-md-3" style="margin-left: 10px;">
													<button   style="height: 60px;" type="submit" class="btn btn-primary" name="btn_update"  >Cập nhật</button>																							
											</div>
											</div>
											
																							
										</form>
										<?php 
											if(isset($_SESSION['status']))
											{						 
												echo "<h4  id='words' class='alert alert-success'>".$_SESSION['status']."</h4>";
												unset($_SERVER['status']);
											}										
											?>
											<script type="text/javascript"> 
													setTimeout(function() {
														var msg=document.getElementById("words")
														msg.parentNode.removeChild(msg)
													},2500)						
										</script>
									
										<br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
																																								
								</div>
									<!--  -->

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




<!--  Xử lý xóa --- -->

<!-- làm lại từ đâu -->






