<!DOCTYPE html>
<html>
<head>
	<title>Administrator panel</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body style="">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:white; border:none;">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand na" href="#" style="margin-top:-10px;"><img src="../images/kymo.png" alt=""> </a>
                <a href="" class="navbar-brand na " style="float:right"><img src="../images/arrow.png" alt="" style="margin-left:-10px; margin-top:10px;">
            </a>
                <a href="" class="navbar-brand na" style="float:right"><img src="../images/vector.png" alt=""  width="22px"></a>
                <a href="" class="navbar-brand na drop-down" style="float:right"> Hi, Femi Jeffery</a>

        </div>
        <!-- /.container-fluid -->
      </nav>
      <div class="container-fluid" style="">
      <div class="row">
        <div style="min-height:100vh; background-color: #1032DE;" class="col-md-3 collapse navbar-collapse side-menu" id="bs-example-navbar-collapse-1">
          <div class="" style="margin-top: -30px; height: 150px;">
          </div>
          <ul class="nav" style="overflow-y: auto;">
            <li><a href="dashboard"><img src="../images/dash.png" alt="" width="18px"> Dashboard</a></li>
            <li><a href="addBudget"><img src="../images/add_circle_24px.png" alt=""  width="18px"> Add Budget</a></li>
            
          </ul>
        </div>
        <div class="col-md-9" style="padding-top: 50px; ">
          <?php
          if (isset($_GET['s'])) 
          {
            $allowed_pages = array('dashboard','addBudget');
            $s=$_GET['s'];
            if (in_array($s, $allowed_pages)) 
            {
              require $s . '.php';
            }else
              {
                require 'dashboard.php';
              } 
          }else
            {
              require 'dashboard.php';
            }
          ?>
        </div>
      </div>
      </div>
</body>
</html>
