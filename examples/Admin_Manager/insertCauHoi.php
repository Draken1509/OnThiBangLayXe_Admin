


<?php
include('dbcon.php');
session_start();

if(isset($_POST['btn_insert']))
{		
	$CauA = $_POST["txt_CauA"];
	$CauB = $_POST["txt_CauB"];
	$CauC = $_POST["txt_CauC"];
	$CauD = $_POST["txt_CauD"];		
	// $HinhAnh = $_POST["txt_HinhAnh"];
	$HinhAnh = $_FILES["txt_HinhAnh"]["errol"] == 0 ? $_FILES["txt_HinhAnh"]["name"] : "";
	echo "hinh : " .$HinhAnh;
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
	echo "Dap an dung: " . $DapAnDung;		
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



