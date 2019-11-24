<?php


 include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Buy, Sale & Rent</span>
    <h2>Buy, Sale & Rent</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
    <input type="text" class="form-control" placeholder="Search of Properties">
    <div class="row">
            <div class="col-lg-5">
              <select class="form-control">
                <option>Buy</option>
                <option>Rent</option>
                <option>Sale</option>
              </select>
            </div>
            <div class="col-lg-7">
              <select class="form-control">
                <option>Price</option>
                <option>$150,000 - $200,000</option>
                <option>$200,000 - $250,000</option>
                <option>$250,000 - $300,000</option>
                <option>$300,000 - above</option>
              </select>
            </div>
          </div>

          <div class="row">
          <div class="col-lg-12">
              <select class="form-control">
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
              </select>
              </div>
          </div>
          <button class="btn btn-primary">Find Now</button>

  </div>



<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/4.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="#">Home In Mirpur</a></h5>
                  <p class="price">1,000,000 tk</p> </div>
              </div>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/2.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="#">Kagipara 2 room flat</a></h5>
                  <p class="price">6,000,000 tk</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/3.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="#">Uddora 2 room flat</a></h5>
                  <p class="price">3,000,000 tk</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="#">Adabor new Flat</a></h5>
                  <p class="price">52,00,000 tk</p> </div>
              </div>

</div>

<div class="advertisement">
  <h4>Advertisements</h4>

  <img src="images/ads.png" class="img-responsive" alt="advertisement">

</div>


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<div class="pull-left result">Showing: 12 of 100 </div>
  <div class="pull-right">
  <select class="form-control">
  <option>Sort by</option>
  <option>Price: Low to High</option>
  <option>Price: High to Low</option>
</select></div>

</div>
<div class="row">

    


            <?php   

                    $serverName = "localhost";
                    $userName = "root";
                    $passWord = "";
                    $database = "adminpanel";

                                  
                      $conn = new mysqli($serverName, $userName, $passWord, $database);

                      $sql = "SELECT * from post order by Post_id DESC";

                       $result = $conn->query($sql);

                      if ($result->num_rows > 0 ){
                                    
                          $GLOBALS["dataPostResult"] = "";

                          } else {
                                $GLOBALS["dataPostResult"] = "No post yeat " ;
                          }



 while ($row = $result->fetch_assoc()){   ?>

       <div class="col-lg-4 col-sm-6">
      <div class="properties">

      <div class="properties">
        <div class="image-holder"><img height="180" width="200" src="<?php echo 'data:image;base64,'.$row['Image1'] ; ?> ">
          <div class="status sold"> new </div>
        </div>
        <h4><a href="#"><?php echo $row['Location']; ?></a></h4>
        <p class="price">Price: <?php echo $row['Price']; ?>  tk</p>
        <div class="listing-detail">
          <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"> <?php echo $row['Bed']; ?></span> 
          <span data-toggle="tooltip" data-placement="bottom" data-original-title="Washroom"><?php echo $row['Bath']; ?></span>
           </div>
        <a class="btn btn-primary" href="<?php echo 'property-detail.php?id='.$row['Post_id'] ?>">View Details</a>
      </div>

      </div>
      </div>

   <?php  } ?>

        </div>  
        <div class="center">
        <ul class="pagination">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">»</a></li>
                </ul>
        </div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>