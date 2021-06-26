<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN SYSTEM</title>
	<style>
		{
			color: darkgreen;
		}
	</style>
</head>
<body>
</body>
<?php
 $cPass=$nPass=$rnPass= "";
 $cPassE=$nPassE=$rnPassE= "";

 if(isset($_POST["submit"]))
 {
    if(empty($_POST["cPass"]))
	{
		$cPassE="Current password is requied";
	}
	
    if(empty($_POST["nPass"]))
	{
		$nPassE="New password is requied";
	}
	else
	{
		$nPass = test_input($_POST["nPass"]);
		if( preg_match("/^[0-9]/", $nPass))
			{
				$nPassE="Must contain with letter,symbol,number";
			}
		else if (!preg_match("/^[a-zA-Z-. ?!]{2,}$/",$nPass)) {
      	{
      	    $nPassE = "At least one capital & small letter, one number, one symbol";
        }
	}
}
 if(empty($_POST["rnPass"]))
	{
		$rnPassE="Retype New password";
	}
	else
	{
		$rnPass = test_input($_POST["rnPass"]);
		if( preg_match("/^[0-9]/", $rnPass))
			{
				$rnPassE="Must contain with letter,symbol,number";
			}
		else if (!preg_match("/^[a-zA-Z-. ?!]{2,}$/",$rnPass)) {
      	{
      	    $rnPassE = "At least one capital & small letter, one number, one symbol";
        }
	}
}
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 50px">
	<fieldset style=" width: 500px; ">
	 <legend> <b>Change Password</b></legend><br>
    <legend><b>Current Password</b></legend>
    <input type="Password" cPass="cPass" value="<?php echo $cPass;?>" ><span class="error">* <?php echo $cPassE;?> </span><br><br>
        <legend><b>New Password</b></legend>
    <input type="Password" nPass="nPass" value="<?php echo $nPass;?>" ><span class="error">* <?php echo $nPassE;?> </span><br><br>
    <legend><b>ReType New Password</b></legend>
    <input type="Password" rnPass="rnPass" value="<?php echo $rnPass;?>" ><span class="error">* <?php echo $rnPassE;?> </span><br><br>
    <hr style="border: 1.px solid;">
    <input type="submit" name="submit" value="submit" style="width: 300px">
</fieldset>
<br>
	
</form>

</body>
</html>