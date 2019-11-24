<?php

// define variables and set to empty values
$title_Err = $area_Err = $house_detail_Err = $phone_number_Err = $address_Err = $image1 = $bed_Err = $washRoom_Err = $price_Err = $img1_err =$img2_err ="" ;

 $title = $area = $house_detail = $phone_number = $address = $bed = $washRoom = $price = "";

$point = 0; 

$dataPostResult = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
        if (empty($_POST["form_title"])) {
          $title_Err = "<br>"."Title is required";
        } else {
          $title = test_input($_POST["form_title"]);
          $point++;
          }
          
//form area

        // if (empty($_POST["form_area"])) {
        //   $area_Err = " <br>"."Area is required";
        // } else {
        //   $area = test_input($_POST["form_area"]);
        //   $point++;
        //   }


// House Detail

       if (empty($_POST["form_house_detail"])) {
          $house_detail_Err = " <br>"."Home detail is required";
        } else {
          $house_detail = test_input($_POST["form_house_detail"]);
           $point++;
          }

// phone number 

       if (empty($_POST["form_phone_number"])) {
          $phone_number_Err = " <br>"."Phone number is required";
        } else {
          $phone_number = test_input($_POST["form_phone_number"]);
           $point++;;
          }

 // Address

      if (empty($_POST["form_address"])) {
          $address_Err = " <br>"."Address is required";
        } else {
          $address = test_input($_POST["form_address"]);
           $point++;
          }

// Location Select
        if (strcmp($_POST["form_area"],"Location") == 0) {
                $area_Err = " <br>"."Area is required";
              } else {
                $area = $_POST["form_area"];
                 $point++;
              } 

// Bed Select
        if (strcmp($_POST["form_bed"],"BedRoom") == 0) {
                $bed_Err = " <br>"."Bed Room is required";
              } else {
                $bed = $_POST["form_bed"];
                 $point++;
              }  

// Washroom Select
        if (strcmp($_POST["form_washroom"],"Washroom") == 0) {
                $washRoom_Err = " <br>"."Wash Room is required";
              } else {
                $washRoom = $_POST["form_washroom"];
                 $point++;
              }

//price

        if (empty($_POST["form_price"])) {
                $price_Err = " <br>"."Price is required";
              } else {
                $price = $_POST["form_price"];
                $price = floatval($price);
                 $point++;

                if($price < 100){
                    $price = "" ;
                    $price_Err = " <br>"."Price must be possabidae";
                     $point--;
                }
                }

// Image 1
           if(isset($_FILES['image1'])){
                  $img1 = addslashes($_FILES['image1']['tmp_name']);
                  
                  if( $img1 == true) {
                      $img1 =file_get_contents($img1);
                      $img1 = base64_encode($img1);
                      $point++;

                    }  else {
                        $img1_err = "<br> Image 2 not set ";
                    }

              
          } else {
                  $img1_err = " <br> Image 1 not set ";
          }


// Image 2
           if(isset($_FILES['image2'])){

                  $img2 = addslashes($_FILES['image2']['tmp_name']);
                      if( $img2 == true) {
                      $img2 =file_get_contents($img2);
                      $img2 = base64_encode($img2);
                      $point++;

                    } else {
                        $img1_err = "<br> Image 2 not set ";
                    }

              
          } else {
                  $img1_err = "<br> Image 2 not set ";
          }


            update_database($point);

 }



    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      return $data;
    }

    function update_database($rec_point){

          if($rec_point >= 10) {


                    $serverName = "localhost";
                    $userName = "root";
                    $passWord = "";
                    $database = "adminpanel";

                    
                    $conn = new mysqli($serverName, $userName, $passWord, $database);

                    $sql = "INSERT INTO post ( Post_tittle, Location, Bed, Bath, Price, Post_phone_number, Post_address, Image1, Image2, User_id, Post_details, Post_date) VALUES  ( '$GLOBALS[title]' , '$GLOBALS[area]' ,'$GLOBALS[bed]' ,'$GLOBALS[washRoom]', '$GLOBALS[price]' ,'$GLOBALS[phone_number]' ,'$GLOBALS[address]' , '$GLOBALS[img1]' , '$GLOBALS[img2]' , '$_SESSION[s_id]' , '$GLOBALS[house_detail]' , CURDATE())" ;

                    if ($conn->query($sql) === TRUE){
                      
                           $GLOBALS["title"] = $GLOBALS["area"] = $GLOBALS["bed"] = $GLOBALS["washRoom"] =$GLOBALS["price"] = $GLOBALS["phone_number"] = $GLOBALS["address"] = $GLOBALS["img1"] = $GLOBALS["img2"] = $GLOBALS["house_detail"] =$GLOBALS["price"] = "";
                            $GLOBALS["dataPostResult"] = "Successfully update";

                    } else {
                      $GLOBALS["dataPostResult"] = "Fail as : ".$conn->error ;
                    }
                  
          }

    }
?>