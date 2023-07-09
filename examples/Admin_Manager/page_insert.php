<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<title>Quản lý APP Ôn luyện bằng láy xe</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>
	<script src="https://www.gstatic.com/firebasejs/8.2.8/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.8/firebase-storage.js"></script>
					
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
	session_start();
    set_error_handler(function(int $errno, string $errstr) {
	if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
		return false;
	} else {
		return true;
	}
  }, E_WARNING);
?>
					<!--  su li them  -->
		<?php
			include('dbcon.php');			
			if(isset($_POST['btn_insert']))
			{		
				$CauA = $_POST["txt_CauA"];
				$CauB = $_POST["txt_CauB"];
				$CauC = $_POST["txt_CauC"];
				$CauD = $_POST["txt_CauD"];		
				// $HinhAnh = $_POST["txt_HinhAnh"];
				$HinhAnh = $_FILES["txt_HinhAnh"]["errol"] == 0 ? $_FILES["txt_HinhAnh"]["name"] : "";						
				$GiaiThich= $_POST["txt_GiaiThich"];	
				$MaCauHoi= $_POST["txt_MaCauHoi"];
				$DapAnDung="";
				$DapAnDung1=$_POST["ma_dapAn"];
				$MaLoaiBang= $_POST["ma_loaiBang"];	
				$MaLoaiCH = $_POST["ma_loaiCH"];
				$NoiDung= $_POST["txt_NoiDung"];	
				if($DapAnDung1=="0"){
					$DapAnDung = "A";
				}
				if($DapAnDung1=="1"){
					$DapAnDung = "B";
				}
				if($DapAnDung1=="2"){
					$DapAnDung = "C";
				}
				if($DapAnDung1=="3"){
					$DapAnDung = "D";
				}						
				if( empty($_POST["txt_CauC"]) && empty($_POST["txt_CauD"]) && empty($HinhAnh))
				{
					$tempC = "null";		
					$tempD = "null";	
					$tempHinhAnh = "null";	
					$postData = [
						'DapAnA'=>$CauA,
						'DapAnB'=>$CauB,
						'DapAnC'=>$tempC,
						'DapAnD'=>$tempD,
						'HinhAnh'=>$tempHinhAnh,
						'DapAnDung'=>$DapAnDung,
						'MaCH'=>$MaCauHoi*1,
						'MaLoaiBang'=>$MaLoaiBang*1+1,
						'MaLoaiCH'=>$MaLoaiCH*1+1,
						'NoiDung'=>$NoiDung,	
						'GiaiThich'=>$GiaiThich,
						'Luu'=>0,
						'HaySai'=>0,
					];
					$ref_table = "CauHoi";
					$postRef_result = $database->getReference($ref_table)->push($postData);
				}
				else if( empty($_POST["txt_CauC"]) && empty($_POST["txt_CauD"]))
				{
					move_uploaded_file($_FILES["txt_HinhAnh"]["tmp_name"],"images/$HinhAnh");
					$tempC = "null";		
					$tempD = "null";	
					$tempHinhAnh = "null";	
					$postData = [
						'DapAnA'=>$CauA,
						'DapAnB'=>$CauB,
						'DapAnC'=>$tempC,
						'DapAnD'=>$tempD,
						'HinhAnh'=>$HinhAnh,
						'DapAnDung'=>$DapAnDung,
						'MaCH'=>$MaCauHoi*1,
						'MaLoaiBang'=>$MaLoaiBang*1+1,
						'MaLoaiCH'=>$MaLoaiCH*1+1,
						'NoiDung'=>$NoiDung,	
						'GiaiThich'=>$GiaiThich,
						'Luu'=>0,
						'HaySai'=>0,
					];
					$ref_table = "CauHoi";
					$postRef_result = $database->getReference($ref_table)->push($postData);
				}
				else if( empty($_POST["txt_CauC"]) && empty($HinhAnh))
				{
					move_uploaded_file($_FILES["txt_HinhAnh"]["tmp_name"],"images/$HinhAnh");
					$tempC = "null";		
					$tempD = "null";	
					$tempHinhAnh = "null";	
					$postData = [
						'DapAnA'=>$CauA,
						'DapAnB'=>$CauB,
						'DapAnC'=>$tempC,
						'DapAnD'=>$CauD,
						'HinhAnh'=>$HinhAnh,
						'DapAnDung'=>$DapAnDung,
						'MaCH'=>$MaCauHoi*1,
						'MaLoaiBang'=>$MaLoaiBang*1+1,
						'MaLoaiCH'=>$MaLoaiCH*1+1,
						'NoiDung'=>$NoiDung,	
						'GiaiThich'=>$GiaiThich,
						'Luu'=>0,
						'HaySai'=>0,
					];
					$ref_table = "CauHoi";
					$postRef_result = $database->getReference($ref_table)->push($postData);
				}
				else if( empty($_POST["txt_CauD"]) &&empty($HinhAnh))
				{
					$tempC = "null";		
					$tempD = "null";	
					$tempHinhAnh = "null";	
					$postData = [
						'DapAnA'=>$CauA,
						'DapAnB'=>$CauB,
						'DapAnC'=>$CauC,
						'DapAnD'=>$tempD,
						'HinhAnh'=>$tempHinhAnh,
						'DapAnDung'=>$DapAnDung,
						'MaCH'=>$MaCauHoi*1,
						'MaLoaiBang'=>$MaLoaiBang*1+1,
						'MaLoaiCH'=>$MaLoaiCH*1+1,
						'NoiDung'=>$NoiDung,	
						'GiaiThich'=>$GiaiThich,
						'Luu'=>0,
						'HaySai'=>0,
					];
					$ref_table = "CauHoi";
					$postRef_result = $database->getReference($ref_table)->push($postData);
				}
				else if( empty($_POST["txt_CauC"]) )
				{
					move_uploaded_file($_FILES["txt_HinhAnh"]["tmp_name"],"images/$HinhAnh");
					$tempC = "null";		
					$tempD = "null";	
					$tempHinhAnh = "null";	
					$postData = [
						'DapAnA'=>$CauA,
						'DapAnB'=>$CauB,
						'DapAnC'=>$tempC,
						'DapAnD'=>$CauD,
						'HinhAnh'=>$HinhAnh,
						'DapAnDung'=>$DapAnDung,
						'MaCH'=>$MaCauHoi*1,
						'MaLoaiBang'=>$MaLoaiBang*1+1,
						'MaLoaiCH'=>$MaLoaiCH*1+1,
						'NoiDung'=>$NoiDung,	
						'GiaiThich'=>$GiaiThich,
						'Luu'=>0,
						'HaySai'=>0,
					];
					$ref_table = "CauHoi";
					$postRef_result = $database->getReference($ref_table)->push($postData);
				}
				else if( empty($_POST["txt_CauD"]) )
				{
					move_uploaded_file($_FILES["txt_HinhAnh"]["tmp_name"],"images/$HinhAnh");
					$tempC = "null";		
					$tempD = "null";	
					$tempHinhAnh = "null";	
					$postData = [
						'DapAnA'=>$CauA,
						'DapAnB'=>$CauB,
						'DapAnC'=>$CauC,
						'DapAnD'=>$tempD,
						'HinhAnh'=>$HinhAnh,
						'DapAnDung'=>$DapAnDung,
						'MaCH'=>$MaCauHoi*1,
						'MaLoaiBang'=>$MaLoaiBang*1+1,
						'MaLoaiCH'=>$MaLoaiCH*1+1,
						'NoiDung'=>$NoiDung,	
						'GiaiThich'=>$GiaiThich,
						'Luu'=>0,
						'HaySai'=>0,
					];
					$ref_table = "CauHoi";
					$postRef_result = $database->getReference($ref_table)->push($postData);
				}
				else if( empty($HinhAnh) )
				{
					$tempC = "null";		
					$tempD = "null";	
					$tempHinhAnh = "null";	
					$postData = [
						'DapAnA'=>$CauA,
						'DapAnB'=>$CauB,
						'DapAnC'=>$CauC,
						'DapAnD'=>$CauD,
						'HinhAnh'=>$tempHinhAnh,
						'DapAnDung'=>$DapAnDung,
						'MaCH'=>$MaCauHoi*1,
						'MaLoaiBang'=>$MaLoaiBang*1+1,
						'MaLoaiCH'=>$MaLoaiCH*1+1,
						'NoiDung'=>$NoiDung,	
						'GiaiThich'=>$GiaiThich,
						'Luu'=>0,
						'HaySai'=>0,
					];
					$ref_table = "CauHoi";
					$postRef_result = $database->getReference($ref_table)->push($postData);
				}
				else{	
					move_uploaded_file($_FILES["txt_HinhAnh"]["tmp_name"],"images/$HinhAnh");
					$postData = [
						'DapAnA'=>$CauA,
						'DapAnB'=>$CauB,
						'DapAnC'=>$CauC,
						'DapAnD'=>$CauD,
						'HinhAnh'=>$HinhAnh,
						'DapAnDung'=>$DapAnDung,
						'MaCH'=>$MaCauHoi*1,
						'MaLoaiBang'=>$MaLoaiBang*1+1,
						'MaLoaiCH'=>$MaLoaiCH*1+1,
						'NoiDung'=>$NoiDung,	
						'GiaiThich'=>$GiaiThich,
						'Luu'=>0,
						'HaySai'=>0,
					];
					$ref_table = "CauHoi";
					$postRef_result = $database->getReference($ref_table)->push($postData);
				}	
				if($postRef_result)
				{
					$_SESSION['status'] = "Thêm thành công";
					// header('Location: index.php');
				}
				else
				{
					$_SESSION['status'] = "Thêm thất bại";
					// header('Location: index.php');
				}																														
			}
		?>

					<!-- ket thuc xu li them -->
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
								<div class="modal-content">						
								<?php
								include("dbcon.php");
								?>
										<form action="page_insert.php" method="POST" enctype="multipart/form-data">
										<div class="modal-body">																					
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group form-group-default">
													<label><span style="color: blue; font-size: 13px;">  Nội dung </span> <span style="color: red; font-size: 13px;">(*)</span></label>
														<input id="edit_NoiDung" type="text" required class="form-control"  name="txt_NoiDung">																	
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
													<label><span style="color: blue; font-size: 13px;">  Câu A </span> <span style="color: red; font-size: 13px;">(*)</span></label>
														<input id="edit_CauA" type="text" required  class="form-control"name="txt_CauA"  >
													</div>
												</div>
												<div class="col-md-6 pr-0">
													<div class="form-group form-group-default">
														<label><span style="color: blue; font-size: 13px;">  Câu B </span> <span style="color: red; font-size: 13px;">(*)</span></span></label>
														<input id="edit_CauB" type="text" required class="form-control" name="txt_CauB" >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label> <span style="color: blue; font-size: 13px;"> Câu C </span>  </label>
														<input id="edit_CauC" type="text" class="form-control"  name="txt_CauC">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label> <span style="color: blue; font-size: 13px;">  Câu D </span> </label>
														<input id="edit_CauD" type="text" class="form-control"  name="txt_CauD" >
													</div>
												</div>											
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label> <span style="color: blue; font-size: 13px;">  Hình ảnh </span> </label>
														<input id="photo" type="file" class="form-control"  name="txt_HinhAnh" >
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default">
														<label><span style="color: blue; font-size: 13px;">  Giải thích </span> <span style="color: red; font-size: 13px;">(*)</span></label>
														<input id="edit_GiaiThich" type="text" required  class="form-control"  name="txt_GiaiThich" >
													</div>
												</div>
												<div class="col-md-6">
												<div class="form-group form-group-default">
													<label for=""><span style="color: blue; font-size: 13px;">  Đáp án đúng </span> <span style="color: red; font-size: 13px;">(*)</span></label>
														<select  required="required"class="form-control" id="list_DapAn" onchange="getSelectedIndexDapAn();">													
															<option>A</option>																																			   
															<option>B</option>		
															<option>C</option>		
															<option>D</option>		
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
													</div>
													<!-- <div class="form-group form-group-default">
														<label><span style="color: blue; font-size: 13px;">  Đáp án đúng </span> <span style="color: red; font-size: 13px;">(*)</span></label>
														<input id="edit_DapAnDung" type="text" required  class="form-control"  name="txt_DapAnDung" >
													</div> -->
												</div>
												<div class="col-md-6">
													<div class="form-group form-group-default" >
														<label><span style="color: blue; font-size: 13px;">  Mã câu hỏi </span> <span style="color: red; font-size: 13px;">(*)</span></label>
														<input id="edit_MaCH" type="text" class="form-control"  required  name="txt_MaCauHoi" >
													</div>
												</div>
												<div class="col-md-6">
												<div class="form-group form-group-default">
													<label for=""><span style="color: blue; font-size: 13px;">  Loại bằng láy </span> <span style="color: red; font-size: 13px;">(*)</span></label>
														<select   name="txt_MaLoaiBang" required="required"class="form-control" id="list_LoaiBang" onchange="getSelectedIndexMaLoaiBang();">
														<?php 
															include('dbcon.php');
															$ref_table = 'Loaibang';
															$fetchdata = $database->getReference($ref_table)->getValue();												
															if($fetchdata>0)
																{
																	foreach($fetchdata as $key=>$row)
																	{?>

																	<option><?php echo $row['TenLoaiBang'];?></option>																						
													   <?php
																	}											
																}?>
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

												<div class="col-md-6">
													<div class="form-group form-group-default">
													<label for=""><span style="color: blue; font-size: 13px;">  Loại câu hỏi </span> <span style="color: red; font-size: 13px;">(*)</span></label>
														<select name="txt_LoaiCauHoi" required="required"class="form-control" id="list_LoaiCH" onchange="getSelectedIndexMaLoaiCH();">
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
														<input  required value="0" hidden id="temp_list_LoaiBang" name="ma_loaiBang" type="text">																																																														
														<input required  value="0" hidden id="temp_list_LoaiCH" name="ma_loaiCH" type="text" >
														<input required  value="0" hidden id="temp_list_DapAn" name="ma_dapAn" type="text" >																																					
												</div>																									
										</div>
												
										<div class="modal-footer no-bd">		
											<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>													
											<button  onclick="uploadImg()" type="submit"  class="btn btn-primary"  name="btn_insert" >Thêm</button>	
											<script>       
												  const firebaseConfig = {
														apiKey: "AIzaSyD_BZXiArNZE239ajjH9KZu3iF6MFfPNBQ",
														authDomain: "thitracngiembanglayxe.firebaseapp.com",
														databaseURL: "https://thitracngiembanglayxe-default-rtdb.firebaseio.com",
														projectId: "thitracngiembanglayxe",
														storageBucket: "thitracngiembanglayxe.appspot.com",
														messagingSenderId: "909858309729",
														appId: "1:909858309729:web:e1d64800bf2905b9414c20",
														measurementId: "G-3XF9V2EW6P"
													};
												firebase.initializeApp(firebaseConfig);                       
												</script>
												<script>           
														function uploadImg(){                   
														const file=document.querySelector('#photo').files[0];
														const name=file.name;
														const ref=firebase.storage().ref('CauHoi/'+name);
														const metadata={
															contentType: file.type
														};                                              
														const upLoadIMG=ref.put(file,metadata);
														upLoadIMG
														.then(snapshot => snapshot.ref.getDownloadURL())
														.then(url=>{console.log(url);
													})
														.catch(console.error)
													}
											</script>

										</div>
										
								   </form>																						
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
	     <?php 
			 session_destroy();
		 ?>
		 
			<!-- end footer -->
		</div>

	</div>

        </script>
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






