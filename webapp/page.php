<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Yet another megamenu for Bootstrap 3">
    <meta name="author" content="@geedmo">
    <title><?php
echo $title;
 ?></title>
    <!-- Bootstrap and demo CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <link href="style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')

    -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css"></script>
    <script>
      $(function() {
        window.prettyPrint && prettyPrint()
        $(document).on('click', '.yamm .dropdown-menu', function(e) {
          e.stopPropagation()
        })
      })
    </script>
  </head>
  <body>
<?php

require_once("warnings.php");

if(isset($_GET['warn']) && isset($_GET['t'])){
$warning = $_GET['warn'];
$t = $_GET['t'];

$message = $n[$warning];


?>

<div class="alert
<?php
if($t == "success"){
echo "alert-success";
$warn = "Well done!";
}
elseif($t == "info"){
echo "alert-info";
$warn = "Heads up!";
}
elseif($t == "warning"){
echo "alert-warning";
$warn = "Warning!";
}
elseif($t == "danger"){
echo "alert-danger";
$warn = "Oh snap!";
}

 ?> alert-dismissible" role="alert">
<form>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
</form>
<strong><?php echo $warn; ?></strong> <?php echo $message?>
</div>
<?php }?>







        <!-- Extra components navbar -->
        <div class="navbar navbar-default yamm">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-2" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="index.php" class="navbar-brand">Refrigerator</a>
          </div>
          <div id="navbar-collapse-2" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <!-- Media Example -->

            </ul>






            <ul class="nav navbar-nav navbar-right">
              <!-- Forms -->



















<?php if(isset($_SESSION['logged'])){ ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="newcategory.php">Create Category</a></li>
            <li><a href="newproduct.php">Create Product</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>


            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $_SESSION['username'];?><b class="caret"></b></a>
              <ul role="menu" class="dropdown-menu">
                <li><a tabindex="-1" href="profile.php"> Profile </a></li>
                <li><a tabindex="-1" href="#"> Another action </a></li>
                <li><a tabindex="-1" href="#"> Something else here </a></li>
                <li class="divider"></li>
                <li><a tabindex="-1" href="logout.php">Logout</a></li>
              </ul>
            </li>




<?php }else{ ?>



	<li class="dropdown"><a href="#" data-toggle="modal" data-target="#myModal" class="dropdown-toggle">Register<b class="caret"></b></a>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">

<form action="register.php" method="get">
    <div class="form-group">
      <label for="usr">Username:</label>
      <input type="text" class="form-control" name="username" id="usr">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="pass" id="pwd">
    </div>
    <div class="form-group">
      <label for="pwdc">Password (confirm):</label>
      <input type="password" class="form-control" name="verify" id="pwdc">
    </div>
    <div class="form-group">
      <label for="mail">Email:</label>
      <input type="email" class="form-control" name="email" id="mail">
    </div>
    <div class="form-group">
      <label for="mailc">Email (confirm):</label>
      <input type="email" class="form-control" name="email2" id="mailc">
    </div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Register</button>
  </form>
      </div>
    </div>
  </div>
</div>














              <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Sign in<b class="caret"></b></a>

<?php }?>





<ul class="dropdown-menu">
                  <li>













                    <div class="yamm-content">
                      <form action="login.php" method="get">
                        <div class="form-group">
                          <label class="sr-only" for="Email">Email</label>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Email" autofocus required>
                                    </div>



                        </div>



                        <div class="form-group">



<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" name="pass" class="form-control" name="password" placeholder="password" required>
                                    </div>


                        </div>

                        <div class="form-group">
              <button type="submit" class="btn btn-success">Sign in</button>
                        </div>
                      </form>






                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

      </div>
