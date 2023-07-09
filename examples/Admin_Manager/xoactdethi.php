

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
		$ref_table = 'CauTraLoi/'.$del_id;
		$deleteQuerry_rusult = $database->getReference($ref_table)->remove();
		//-------------------------------
		if($deleteQuerry_rusult)
		{			
			header('Location: taodethi.php');
            $_SESSION['status'] = "Xóa thành công";
		}
		else
		{			
			header('Location: taodethi.php');

		}
	}
?>

	






<!-- Xử lý xóa ------------------------------------------------------------------------------------------- -->

