<?php 
  
   include'header.php';
  if (isset($_SESSION['s_id'])) {
          
    
    include'postUpload.php';

     ?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Post</span>
    <h2>Post</h2>
</div>
</div>

<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

          <span class="error" style="text-align: center; color: green"><?php echo $dataPostResult ;?></span>

          <span class="error" style="text-align: center; color: red"><?php echo $title_Err . $area_Err . $house_detail_Err . $phone_number_Err . $address_Err . $bed_Err .$washRoom_Err . $price_Err .$img1_err .$img2_err;?></span>

          

          <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ;?>" enctype="multipart/form-data">

                <input type="text" class="form-control" placeholder="Title" name="form_title" value="<?php echo $title;?>">

               

                <select name="form_area" class="form-control">
                  <option value="Location">Location</option>
                  <option value="Mirpur">Mirpur</option>              
                  <option value="Adabor">Adabor</option>                 
                  <option value="Badda">Badda</option>
                  <option value="Bonani">Bonani</option>
                  <option value="Dhanmondi">Dhanmondi</option>                
                  <option value="Gulsan">Gulsan</option>
                  <option value="Lalbag">Lalbag</option>
                  <option value="Malibag">Malibag</option>
                  <option value="New Market">New Market</option>
                  <option value="Polton">Polton</option>
                  <option value="Shamoil">Shamoil</option>
                  <option value="Uttara">Uttara</option>
                <select>

                <select name="form_bed" class="form-control">
                  <option value="BedRoom">Bed Room</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                <select>

                <select name="form_washroom" class="form-control">
                  <option value="Washroom">Washroom</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                <select>
  
                
                <textarea rows="4" class="form-control" placeholder="House Detail" name="form_house_detail" value="<?php echo $house_detail;?>"></textarea>

                <input type="number" class="form-control" placeholder="Price  (tk) " name="form_price" value="<?php echo $price;?>">

                <input type="number" class="form-control" placeholder="Phone Number (+88)" name="form_phone_number" value="<?php echo $phone_number;?>">

                <textarea rows="6" class="form-control" placeholder="Address" name="form_address" value="<?php echo $address;?>" ></textarea>

                 Photo: <input type="file" class="form-control" name="image1">
                        <input type="file" class="form-control" name="image2">

                <button type="submit" class="btn btn-success" name="Submit">Post</button>

          </form>
                  
        </div>
  
</div>
</div>
</div>   


<?php include'footer2.php';  }
else{
  header("Location: index.php");
}

?>