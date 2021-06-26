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
 $uName=$pass="";
 $uNameE=$passE="";

 if(isset($_POST["submit"]))
 {
    if(empty($_POST["uName"]))
	{
		$uNameE="User Name is requied";
	}
	else
	{
		$uName = test_input($_POST["uName"]);
		if( preg_match("/^[0-9]/", $uName))
			{
				$uNameE="Must start with letter";
			}
		else if (!preg_match("/^[a-zA-Z-. ?!]{2,}$/",$uName)) {
      	{
      	    $uNameE = "At least two words and can only contain letters,period,dash";
        }
	}
}
    if(empty($_POST["pass"]))
	{
		$passE="password is requied";
	}
	else
	{
		$pass = test_input($_POST["pass"]);
		if( preg_match("/^[0-9]/", $pass))
			{
				$passE="Must contain with letter,symbol,number";
			}
		else if (!preg_match("/^[a-zA-Z-. ?!]{2,}$/",$pass)) {
      	{
      	    $passE = "At least one capital & small letter, one number, one symbol";
        }
	}
}
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 50px">
	<fieldset style=" width: 500px; ">
	<legend> <b> Log in</b></legend><br>
    <legend><b>User Name</b></legend>
    <input type="text" uName="uName" value="<?php echo $uName;?>" ><span class="error">* <?php echo $uNameE;?> </span><br><br>
        <legend><b>Password</b></legend>
    <input type="Password" name="pwd" value="<?php echo $pass;?>" ><span class="error">* <?php echo $passE;?> </span><br><br>
    <hr style="border: 1.px solid;">
    <input type="checkbox" name="remember" value="rm">
  <label for="remember me"> Remeber Me</label><br><br>
    <input type="submit" name="submit" value="submit" style="width: 200px">
</fieldset>
<br>
	
</form>

</body>
</html>