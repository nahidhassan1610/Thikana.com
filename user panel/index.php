
<?php include'header.php';?>

<div class="">
    

            <div id="slider" class="sl-slider-wrapper">
        <div class="sl-slider">
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"></div>
              <h2><br><br><br><br> Chose your home</h2>
            </div>
          </div>
          

          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-2"></div>
              <h2><br><br><br><br>Save your time</h2>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-3"></div>
                 <h2><br><br><br><br> Live with smile</h2>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-4"></div>
                <h2><br><br><br><br>Chose your home</h2>
            </div>
          </div>
          
           <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-5"></div>
               <h2><br><br><br><br>Stay with us</h2>
              <!-- <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
              <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
              <cite>$ 20,000,000</cite>
              </blockquote> -->
            </div>
          </div> 
        </div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Buy, Sale & Rent</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <input type="text" class="form-control" placeholder="Search of Properties">
          <div class="row">
            <div class="col-lg-3 col-sm-3 ">
              <select class="form-control">
                <option>Buy</option>
                <option>Rent</option>
                <option>Sale</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
              <select class="form-control">
                <option>Price</option>
                <option>$150,000 - $200,000</option>
                <option>$200,000 - $250,000</option>
                <option>$250,000 - $300,000</option>
                <option>$300,000 - above</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
            <select class="form-control">
                <option>Property</option>
                <option>Apartment</option>
                <option>Building</option>
                <option>Office Space</option>
              </select>
              </div>
              <div class="col-lg-3 col-sm-4">
              <button class="btn btn-success"  onclick="window.location.href='buysalerent.php'">Find Now</button>
              </div>
          </div>
          
          
        </div>
                <?php 
        if (isset($_SESSION['s_id'])) {?>
          <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <form action="logout.php" method="POST">
          <button class="btn btn-info" type="submit" name="submit">Logout</button> </form>   </div>
        <?php }
        else {?>
        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Join now and get updated with all the properties deals.</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button></div>
      
      <?php } ?> 
      </div>
    </div>
  </div>
</div>


<!-- banner -->


<div class="container">
  <div class="properties-listing spacer"> <a href="buysalerent.php" class="pull-right viewall">View All Listing</a>
    <h2>Featured Properties</h2>
    <div id="owl-example" class="owl-carousel">


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
                      $GLOBALS["dataPostResult"] = "No post yeat" ;
                }



 while ($row = $result->fetch_assoc()){   ?>

      <div class="properties">
        <div class="image-holder"><img height="180" width="200" src="<?php echo 'data:image;base64,'.$row['Image1'] ; ?> ">
          <div class="status sold"> new </div>
        </div>
        <h4><a href="<?php echo 'property-detail.php?id='.$row['Post_id'] ?>"><?php echo $row['Location']; ?></a></h4>
        <p class="price">Price: <?php echo $row['Price']; ?>  tk</p>
        <div class="listing-detail">
          <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"> <?php echo $row['Bed']; ?></span> 
          <span data-toggle="tooltip" data-placement="bottom" data-original-title="Washroom"><?php echo $row['Bath']; ?></span>
           </div>
        <a class="btn btn-primary" href="<?php echo 'property-detail.php?id='.$row['Post_id'] ?>">View Details</a>
      </div>

   <?php  } ?>

        </div>
  </div>


  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>About Us</h3>
        <p>Welcome to SRMTEC Bangladesh Ltd. One of the best software companies in Bangladesh. Welcome to a company where your ideas count, where your determination creates a new world, where your talent and hard-works are rewarded. At SRMTEC we always endeavor to lead towards development and creating a flexible, dynamic and<br><a href="about.php">Learn More</a></p>
      
      </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <h3>Recommended Properties</h3>
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="#">Kagipara 2 room flat</a></h5>
                  <p class="price">9,700,000</p>
                  <a href="#" class="more">More Detail</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/2.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="#">Uddora 4 room flat</a></h5>
                  <p class="price">3,000,000</p>
                  <a href="#" class="more">More Detail</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/3.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="#">Kagipara 2 room flat</a></h5>
                  <p class="price">$34,00,000 tk</p>
                  <a href="#" class="more">More Detail</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/4.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="#">Adabor new Flat</a></h5>
                  <p class="price">300,000 tk</p>
                  <a href="#" class="more">More Detail</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>