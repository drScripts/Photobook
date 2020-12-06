<?php if (!isset($_SESSION['pelanggan'])) 
{
	echo "<script>alert('silahkan login terlebih dahulu')</script>";
	echo "<script>location='login.php'</script>";
} 


?>