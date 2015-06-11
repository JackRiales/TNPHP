<?php
	session_start();

	if(isset($_POST['Submit'])):
		// Valid logins
		$logins = array('admin' => 'gh%44vfh','leann' => '1234');

		// Check
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';

		echo $username;

		// Either redirect or display a "wrong login" message
		if (isset($logins[$username]) && $logins[$username] == $password) {
			// Login successful
			$_SESSION['UserData']['Username'] = $logins[$username];
			header("location:index.php");
			exit;
		} else {
			// Login unsuccessful
			$failed_login_msg = "<span>Invalid Login.</span>";
		}
?>

<?php else: ?>

<form action="" method="post" name="Login-Form">
	<?php if (isset($failed_login_msg)) { echo $failed_login_msg; } ?>
	<input name="username" type="text" placeholder="Username"/><br>
	<input name="password" type="password" placeholder="Password"/><br>
	<button> SUBMIT </button>
</form>

<?php endif ?>