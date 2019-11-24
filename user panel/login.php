
<?php

session_start();


if (isset($_POST['login_user'])) {

  include 'connection.php';
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

if (empty($username)) { array_push($errors, "Username is required"); }
if (empty($password)) { array_push($errors, "password is required"); }

		if (count($errors) == 0) {


    $sql="SELECT * FROM user WHERE User_name='$username'";
    $result = mysqli_query($conn, $sql);





    $resultCheck= mysqli_num_rows($result);

    if($resultCheck < 1){

	  array_push($errors, "Wrong username/password combination");
        header("location: index.php");

    }



	else {

      if ($row=mysqli_fetch_assoc($result)) {

        $hashedPassCheck = $row['User_password'];
        if($hashedPassCheck == false){
          //legend = ?


          header("location: index.php");

        } elseif ($hashedPassCheck == true) {
          //session start
          $_SESSION['s_id'] = $row['ID'];
          $_SESSION['s_name'] = $row['User_name'];
          $_SESSION['s_email'] = $row['User_email'];
          $_SESSION['s_pNumber'] = $row['User_mobile_number'];
          $_SESSION['s_address'] = $row['User_address'];
          header("location: index.php");

        }

    }

  }
}}
 else{
  header("location: index.php");
}





?>
