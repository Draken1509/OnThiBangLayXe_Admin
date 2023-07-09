<?php
include('dbcon.php');
session_start();
if(isset($_POST['btn_taoDeThi'])){
    $_SESSION['madethi'] = $_POST["txt_madethi"];	
	$maloaibang = $_POST["txt_loaibang"];
    $ref_table = "DeThi";
    $postData = [
        'MaDeThi'=>$_SESSION['madethi']*1,
        'MaLoaiBang'=>$maloaibang*1+1,            
    ];
	$postRef_result = $database->getReference($ref_table)->push($postData);
    if($postRef_result)
	{
		$_SESSION['status'] = "Tạo thành công";
		 header('Location: taodethi.php');
	}
	else
	{
		$_SESSION['status'] = "Tạo thất bại";
		 header('Location: taodethi.php');
	}
}
if(isset($_POST['btn_themch'])){    
	$_SESSION['madethi'] = $_POST["txt_madethi"];
	$mach = $_POST["txt_mach"];
	$maloaibang = $_POST["txt_loaibang"];
	$dapAnDung = "";
    //xu li lay thong tin cau dung
	include('dbcon.php');
	$ref_table = 'CauHoi';
	$fetchdata = $database->getReference($ref_table)->getValue();												
	if($fetchdata>0)
	{
		foreach($fetchdata as $key=>$row)
		{
			if ($row['MaCH'] == $mach) {
				$dapAnDung = $row['DapAnDung'];		
			}
		}
	}																								
	

    //
    $ref_table = "CauTraLoi";
    $postData = [
        'MaDeThi'=>$_SESSION ['madethi']*1,
        'MaCH'=>$mach*1,  
		'DapAnChon'=>$dapAnDung

    ];
	$postRef_result = $database->getReference($ref_table)->push($postData);
    if($postRef_result)
	{
		$_SESSION['status'] = "Thêm thành công";
		header('Location: taodethi.php');
	}
	else
	{
		$_SESSION['status'] = "Thêm thất bại";
		header('Location: taodethi.php');
	}

}
//  session_destroy();
?>