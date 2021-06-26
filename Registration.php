<!DOCTYPE html>
 <html>
 <head>
 <style>
 </style>
 </head>
 <body>

<?php
 $message = '';  
 $error = '';   
$name= $email=  $uName= $pass= $conPass= $gender= $dd=$mm=$yyyy=  "";
$nameE= $emailE= $uNameE= $passE= $conPassE= $genderE= $dobE= $genderE= "";

if(isset($_POST["submit"])) 
 {
	if(empty($_POST["name"]))
	{
		$nameE="Name is requied";
	}
	else
	{
		$name = test_input($_POST["name"]);
		if( preg_match("/^[0-9]/", $name))
			{
				$nameE="Must start with letter";
			}
		else if (!preg_match("/^[a-zA-Z-. ?!]{2,}$/",$name)) {
      	{
      	    $nameE = "At least two words and can only contain letters,period,dash";
        }
	}
}

	if(empty($_POST["email"]))
	{
    	$emailE = "Email is required";
  	} 
  	else 
  	{
	    $email = test_input($_POST["email"]);
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	    {
	        $emailE = "Invalid email format. Format: example@something.com";
	    }
  	}

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

   if(empty($_POST["conPass"]))
	{
		$conPassE="Confirm Password is requied";
	}
	else
	{
		$conPass = test_input($_POST["conPass"]);
		if( preg_match("/^[0-9]/", $conPass))
			{
				$conPassE="Must match with password";
			}
		else if (!preg_match("/^[a-zA-Z-. ?!]{2,}$/",$conPass)) {
      	{
      	    $conPassE = "At least one capital & small letter, one number, one symbol";
        }
	}
}

  	if(empty($_POST["dd"]) or empty($_POST["mm"]) or empty($_POST["yyyy"]))
  	{
		$dobE="Full Date of birth input is requied";
		$dd = test_input($_POST["dd"]);
		$mm = test_input($_POST["mm"]);
		$yyyy = test_input($_POST["yyyy"]);

	}
	else
	{
		$dd = test_input($_POST["dd"]);
		$mm = test_input($_POST["mm"]);
		$yyyy = test_input($_POST["yyyy"]);

		if( !filter_var($dd,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1, 'max_range' => 31)))|
            !filter_var($mm,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1, 'max_range' => 12)))|
            !filter_var($yyyy,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1953, 'max_range' => 1998)))
        )
        
			{$dobE="Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1975-2000)";}
	}

	if(!isset($_POST["gender"]))
	{
		$genderE="At least one of them must be selected";
	}

else{

	 if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'                   =>     $_POST['name'],  
                     'email'               =>     $_POST["email"],  
                     'uName'              =>     $_POST["uName"],  
                     'pass'             =>     $_POST["pass"],
                     'conPass'        =>     $_POST["conPass"],
                     'gender'      =>     $_POST["gender"],  
                     'dd'      =>     $_POST["dd"],
                     'mm'      =>     $_POST["mm"],
                     'yyyy'      =>     $_POST["yyyy"]  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  

     }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<div class="Submit-div">
<div>
<h1 align="center"><font color="black">Registration Form</font></h1>
		<table align="center" width="60%">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 40px">
<table align="center">
</div>
 	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 		<?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?> 
<br>
<legend><b>Name</b></legend>
<input type="text" name="name" value="<?php echo $name;?>" ><span class="error">* <?php echo $nameE;?> </span><br>
<hr style="border: 0.px solid;">
<br>
<legend><b>E-mail</b></legend>
<input type="text" name="email" value="<?php echo $email;?>"><span class="error">* <?php echo $emailE;?></span><br>
<hr style="border: 0.1px solid;">
<br>
<legend><b>User Name</b></legend>
<input type="text" name="uName" value="<?php echo $uName;?>" ><span class="error">* <?php echo $uNameE;?> </span><br>
<hr style="border: 0.px solid;">
<br>
<legend><b>Password</b></legend>
<input type="Password" name="pass" value="<?php echo $pass;?>" ><span class="error">* <?php echo $passE;?> </span><br>
<hr style="border: 0.px solid;">
<br>
<legend><b>Confirm Password</b></legend>
<input type="Password" name="conPass" value="<?php echo $conPass;?>" ><span class="error">* <?php echo $conPassE;?> </span><br>
<hr style="border: 0.px solid;">
<br>
<fieldset style="width: 500px; ">
<legend><b>DATE OF BIRTH</b></legend>
<table>
<tr style="text-align: center;">
	<th style="font-weight: normal;"><label for="dd" >dd</label></th>
	<th></th>
	<th style="font-weight: normal;"><label for="mm" >mm</label></th>
	<th></th>
	<th style="font-weight: normal;"><label for="yyyy" >yyyy</label></th>
	<th></th>
</tr>
<tr>
<td><input type="text" name="dd" style="width: 30px" value="<?php echo $dd;?>"></td>
<td>/</td>
<td><input type="text" name="mm" style="width: 30px" value="<?php echo $mm;?>"></td>
<td>/</td>
<td><input type="text" name="yyyy" style="width: 30px;" value="<?php echo $yyyy;?>"></td>
<td style="padding-left: 10px"><span class="error">* <?php echo $dobE;?></span></td>
</tr>
</table>
<hr style="border: 0.1px solid;">
</fieldset>

<br>

<fieldset style="width: 500px; ">
<legend><b>GENDER</b></legend>
	<input  type="radio" name="gender"<?php if(isset($gender) && $gender=="female") echo "checked";?> value="female">Female

	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male	

	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other 
			 
	<br>	
	<span class="error" >* <?php echo $genderE;?></span	>			

<hr style="border: 0.1px solid;">
</fieldset>

<br>
<hr style="border: 1px solid;">
<input type="submit" name="submit" value="submit" style="width: 100px">
<input type="Reset"  style="width: 100px">
<?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
</form>
</table>
 </div>
 </body>
 </html>