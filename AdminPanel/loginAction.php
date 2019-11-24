
<?php

session_start();


if (isset($_POST['login_user'])) {

  include 'connection.php';
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

if (count($errors) == 0) {


    $sql="SELECT * FROM admin WHERE Admin_email='$username'";
    $result = mysqli_query($conn, $sql);





    $resultCheck= mysqli_num_rows($result);

    if($resultCheck < 1){

        header("location: login.php?invalid=user/password");

    }



	else {

      if ($row=mysqli_fetch_assoc($result)) {

        $hashedPassCheck = $row['Admin_password'];
        if($hashedPassCheck == false){
          //legend = ?


          header("location: login.php");

        } elseif ($hashedPassCheck == true) {
          //session start
          $_SESSION['s_id'] = $row['Admin_id'];
          $_SESSION['s_name'] = $row['Admin_name'];
          $_SESSION['s_email'] = $row['Admin_email'];

          header("location: index.php");

        }

    }
  }

  }
 else{
  header("location: login.php?");
}
}




?>
