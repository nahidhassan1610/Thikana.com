

<?php



    include ('connection.php');
	  $errors = array();
    if (isset($_POST['reg_user'])) {


      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);

	     $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

      $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);


		if (empty($username)) { array_push($errors, "Username is required"); }



		 if (empty($email)) { array_push($errors, "Email is required"); }

     else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	   array_push($errors, "Enter a valid email");
       }


		if (empty($password_1)) { array_push($errors, "Password is required");
     }  else if ($password_1 != $password_2) {
  	     array_push($errors, "The two passwords do not match");
    }

 else if(strlen($password_1) < 5){
	array_push($errors, "The password length must be > 5");
}




  if (empty($password_2)) { array_push($errors, "confirm your password"); }





  if (empty($phone)) {
	  array_push($errors, "phone is required"); }

  else if(strlen($phone) !=11){
	array_push($errors, "The Mobile_No length must be 11");
}
  else if(strlen($phone) >11){
	array_push($errors, "The Mobile_No length must be between 11 digit");
}

  if (empty($address)) {
	  array_push($errors, "address is required"); }


    else{

        $sql ="SELECT * FROM user WHERE User_name ='$username'";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        if ($resultcheck > 0) {
          array_push($errors, "username alrady exists");
        
        } }  

        



		if (count($errors) == 0) {
          
          $sql="INSERT INTO user (User_name,User_email,User_password,User_mobile_number, User_address) VALUES('$username','$email','$password_1','$phone','$address');";
            $result = mysqli_query($conn,$sql);
           // header("location: register.php");
             array_push($errors, "Loging Successfully");
    
		}  

        }



?>
