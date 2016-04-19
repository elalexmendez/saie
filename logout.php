<?php
	session_start();
	session_destroy();
	echo '<script> window.location="login.php"; </script>';
?>

<!DOCTYPE HTML>
<html>
<head>

</head>

<body>
<script language="javascript">location.href = "login.php";</script>
</body>

</html>