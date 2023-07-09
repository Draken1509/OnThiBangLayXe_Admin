<?php
session_start();
include("dbcon.php");
if (isset($_POST['btn_update'])) {

		$key = $_POST["key"];
	
		$CauA = $_POST["txt_CauA"];
		$CauB = $_POST["txt_CauB"];
		$CauC = $_POST["txt_CauC"];
		$CauD = $_POST["txt_CauD"];
		$HinhAnh = $_POST["txt_HinhAnh"];
		$GiaiThich = $_POST["txt_GiaiThich"];
		$DapAnDung1 = $_POST["ma_dapAn"];
		$DapAnDung = "";
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
		$MaCauHoi = $_POST["txt_MaCauHoi"];
		$MaLoaiBang = $_POST["ma_loaiBang"];
		$MaLoaiCH = $_POST["ma_loaiCH"];
		$NoiDung = $_POST["txt_NoiDung"];
		$updateData = [
			'DapAnA' => $CauA,
			'DapAnB' => $CauB,
			'DapAnC' => $CauC,
			'DapAnD' => $CauD,
			'HinhAnh' => $HinhAnh,
			'DapAnDung' => $DapAnDung,
			'MaCH' => $MaCauHoi * 1,
			'MaLoaiBang' => $MaLoaiBang * 1+1,
			'MaLoaiCH' => $MaLoaiCH * 1+1,
			'NoiDung' => $NoiDung,
			'GiaiThich' => $GiaiThich,
			'Luu' => 0,
			'HaySai' => 0,
		];
		$ref_table = "CauHoi/".$key;
		$queryUpdate_result = $database->getReference($ref_table)->update($updateData);

		if ($queryUpdate_result) {
			$_SESSION['status'] = "Cập nhật thành công";
			header('Location: index.php');
		} else {
			$_SESSION['status'] = "Cập nhật thất bại";
			header('Location: index.php');
		

	}

}
?>