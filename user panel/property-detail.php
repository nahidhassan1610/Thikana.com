<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Buy</span>
    <h2>Buy</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

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
                  <h5><a href=#property-detail.php">Uddora 2 room flat</a></h5>
                  <p class="price">3,000,000 tk</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="#">Adabor new Flat</a></h5>
                  <p class="price">52,00,000 tk</p> </div>
              </div>


</div>


<?php 

      $userPostId = $_GET['id'];

      $serverName = "localhost";
      $userName = "root";
      $passWord = "";
      $database = "adminpanel";
                    
        $conn = new mysqli($serverName, $userName, $passWord, $database);    
        $sql = "SELECT * from post where Post_id = $userPostId";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

 ?>


<div class="advertisement">
  <h4>Advertisements</h4>

  <img src="images/ads.png" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<h2><?php echo $row['Post_tittle']; ?></h2>  
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
      </ol>
      <div class="carousel-inner">
        <!-- Item 1 -->
        <div class="item active">
          <img  src="<?php echo 'data:image;base64,'.$row['Image1'] ; ?> " class="properties" alt="properties" />
        </div>
        <!-- #Item 1 -->

        <!-- Item 2 -->
        <div class="item">
          <img src="<?php echo 'data:image;base64,'.$row['Image2'] ; ?> " class="properties" alt="properties" />
         
        </div>
        <!-- #Item 2 -->

        <!-- Item 3 -->
         <div class="item">
          <img  src="<?php echo 'data:image;base64,'.$row['Image1'] ; ?> " class="properties" alt="properties" />
        </div>
        <!-- #Item 3 -->

        <!-- Item 4 -->
        <div class="item ">
          <img  src="<?php echo 'data:image;base64,'.$row['Image2'] ; ?> " class="properties" alt="properties" />
          
        </div>
        <!-- # Item 4 -->

      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
  <p><?php echo $row['Post_details']; ?></p>
  

  </div>
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
<div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div>
  </div>

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">Price: <?php echo $row['Price']; ?>  tk</p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> Area: <?php echo $row['Location']; ?> </p>
  
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Owner Details
  <p>Phone: <?php echo $row['Post_phone_number']; ?></p>
  </div>
</div>

    <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $row['Bed']; ?></span>  <span data-toggle="tooltip" data-placement="bottom" data-original-title="Washroom"><?php echo $row['Bath']; ?></span> </div>


</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
  <form role="form">
                <input type="text" class="form-control" placeholder="Full Name"/>
                <input type="text" class="form-control" placeholder="you@yourdomain.com"/>
                <input type="text" class="form-control" placeholder="your number"/>
                <textarea rows="6" class="form-control" placeholder="Whats on your mind?"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
      </form>
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>