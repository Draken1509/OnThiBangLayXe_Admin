<!DOCTYPE html>
<html lang="en">
<head>

<?php

	set_error_handler(function(int $errno, string $errstr) {
	if ((strpos($errstr, 'Undefined array key') === false) && (strpos($errstr, 'Undefined variable') === false)) {
		return false;
	} else {
		return true;
	}
	}, E_WARNING);
	
// -----------------------------------------------------------------------------------
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

	// if(isset($_POST['id']))
	// {
	// 	$del_id = $_POST['id'];
	// 	$ref_table = 'CauHoi/'.$del_id;
	// 	$deleteQuerry_rusult = $database->getReference($ref_table)->remove();
	// 	//-------------------------------
	// 	if($deleteQuerry_rusult)
	// 	{
	// 		$_SESSION['status'] = "Xóa thành công";
			
	// 		//echo "Record deleted successfully";
									
	// 	}
	// 	else
	// 	{
	// 		$_SESSION['status'] = "Xóa thất bại";
	// 		//echo "Record deleted successfully";
	// 		//header('Location: index.php');
			
	// 	}
	// 	//header('Location: index.php');
	// 	echo 0;
	// 	exit;
	
	// }

	
	
?>

	






<!-- Xử lý xóa ------------------------------------------------------------------------------------------- -->

