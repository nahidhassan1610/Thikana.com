<?php include'header.php';?>
<?php include'server.php';?>
<head>
<style>
/* Popup container - can be anything you want */
.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popup .popuptext {
    visibility: hidden;
    width: 250px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 136%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
</style>
</head>
<body style="text-align:center">




<script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>

























<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

  
 
<form method="POST" action="register.php">



                <input type="text" class="form-control" placeholder="Full Name" name="username">   
            
                <input type="text" class="form-control" placeholder="Enter Email" name="email"> 
                <input type="password" class="form-control" placeholder="Password" name="password_1">
               <input type="password" class="form-control" placeholder="Confirm your Password" name="password_2">
        
                <input type="text" class="form-control" placeholder="Mobile Number" name="phone"> 
                <textarea rows="6" class="form-control" placeholder="Address" name="address"></textarea> 
        
                    <button type="submit" class="btn btn-success" name="reg_user">Register</button>
                        <div class="popup" onclick="myFunction()">  Do you forget to fill up some field?
                
                  <span class="popuptext" id="myPopup"><?php include('errors.php');?></span>
</div>
     

</form>
                
        </div>
  
</div>
</div>
</div></body>

<?php include'footer2.php';?>