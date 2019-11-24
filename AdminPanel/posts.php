<?php
session_start();
if (isset($_SESSION['s_id'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Posts</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">HomeRent</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li class="active"><a href="posts.php">Posts</a></li>
            <li><a href="users.php">Users</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome  <?php
        if (isset($_SESSION['s_id'])) {
          echo("{$_SESSION['s_name']}"."<br />");
         }else {?>
         abc <?php } ?></a></li>
         <li>
           <form action="logout.php" method="POST">
       <button type="submit" name="submit" class="btn btn-info">Logout</button> </form></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Posts<small>Manage Posts</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#">Add Post</a></li>
                <li><a href="#">Add User</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.php">Dashboard</a></li>
          <li class="active">Posts</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="posts.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts <span class="badge">
                                  <?php

                    include('connection.php');


                    $sql="SELECT COUNT(Post_id) as postNo FROM post";
                    $result=mysqli_query($conn,$sql);
                    $value=mysqli_fetch_assoc($result);
                    $numberOfPost=$value['postNo'];
                    echo $numberOfPost;
                    ?>

              </span></a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">
                    <?php

                        include('connection.php');

                        global $numberOfUser;
                        $sql="SELECT COUNT(ID) as userNo FROM user";
                        $result=mysqli_query($conn,$sql);
                        $value=mysqli_fetch_assoc($result);
                        $numberOfUser=$value['userNo'];
                        echo $numberOfUser;

     ?>

              </span></a>
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Posts</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Posts...">
                      </div>
                </div>
                <br>
                <table class="table table-striped table-hover">
                      <tr>
                        <th>Title</th>
                        <th>User Name</th>
                        <th>Created</th>
                        <th></th>
                      </tr>
                      <?php

                              $sql="SELECT Post_tittle, User_name, Post_date
                                    FROM post
                                    INNER JOIN user
                                    ON user.ID=post.User_id";
                              $result=mysqli_query($conn,$sql);

                              while ($row=mysqli_fetch_array($result)) { ?>
                      <tr>
                        <td><?php echo $row['Post_tittle']; ?></td>
                        <td><?php echo $row['User_name']; ?></td>
                        <td><?php echo $row['Post_date']; ?></td>
                        <td><a class="btn btn-default" href="#">View Post</a> <a class="btn btn-danger" href="#">Delete</a></td>
                      </tr>
                      <?php } ?>

                    </table>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright HomeRent, &copy; 2017</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php } else {
  header('HTTP/1.0 404 Not Found');
} ?>
