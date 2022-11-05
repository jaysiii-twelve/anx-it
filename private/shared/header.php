<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>AAA - <?php echo $title_page ?></title>
  <!-- Jquery DataTable-->
  <link href="../content/css/jquery_datatable.css" rel="stylesheet"/>
  <!-- loader-->
  <link href="../content/css/pace.min.css" rel="stylesheet"/>
  <script src="../content/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="../content/images/logo.png" type="image/ico" />
  <!-- Vector CSS -->
  <!-- <link href="../content/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/> -->
  <!-- simplebar CSS-->
  <link href="../content/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="../content/css/bootstrap.min.css" rel="stylesheet"/>

  <!-- Bootstrap core CSS-->
  <!-- <link href="../content/css/bootstrap5.min.css" rel="stylesheet"/> -->
  <!-- animate CSS-->
  <link href="../content/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="../content/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="../content/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="../content/css/app-style.css" rel="stylesheet"/>


  
</head>

<body class="bg-theme bg-theme2">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="#">
       <h5 class="logo-text">ANX - IT</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li>
        <a href="dashboard.php">
          <i class="zmdi zmdi-view-dashboard <?php echo $active_page == 'Dashboard' ? 'active' : ''  ?>"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="gad_7.php">
          <i class="zmdi zmdi-library <?php echo $active_page == 'GAD-7' ? 'active' : ''  ?>"></i> <span>GAD - 7</span>
        </a>
      </li>

      <li>
        <a href="dass_21.php">
          <i class="zmdi zmdi-library <?php echo $active_page == 'DASS-21' ? 'active' : ''  ?>"></i> <span>DASS - 21</span>
        </a>
      </li>

      <li>
        <a href="kessler_10.php">
          <i class="zmdi zmdi-library <?php echo $active_page == 'KESSLER-10' ? 'active' : ''  ?>"></i> <span>KESSLER - 10</span>
        </a>
      </li>

      <li>
        <a href="messages.php">
          <i class="zmdi zmdi-email <?php echo $active_page == 'MESSAGES' ? 'active' : ''  ?>"></i> <span>Messages</span>
        </a>
      </li>
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
  </ul>

  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item" >
      <a class="nav-link" data-toggle="modal" data-target="#modalInstructions" style="cursor: pointer;"> 
        <span class="user-profile"><img src="../content/images/question_mark.png" class="img-circle" alt="user avatar"></span>
      </a>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="../content/images/uploadedImage/<?php echo $_SESSION['ImageName']; ?>" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="../content/images/uploadedImage/<?php echo $_SESSION['ImageName']; ?>" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $_SESSION['FirstName'] . ' ' . $_SESSION['LastName']; ?></h6>
            <p class="user-subtitle"><?php echo $_SESSION['EmailAddress']; ?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item" >
            <!-- <i class="icon-envelope mr-2"></i> Profile -->
            <a data-toggle="modal" data-target="#exampleModalCenter" aria-expanded="true"><i class="icon-envelope mr-2"></i><span>Profile</span></a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item">
            <!-- <i class="icon-power mr-2"></i> Logout -->
            <a href="<?php echo url_for('controller/login/logout.php') ?>" aria-expanded="true"><i class="icon-power mr-2"></i><span>Logout</span></a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<!-- Modal -->
<div class="modal fade" id="modalInstructions" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content" style="background-image: url(../content/images/bg-themes/2.png);">
      <div class="modal-header">
        <h5 class="modal-title">Instructions on how to use</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container d-flex justify-content-left">
          
          <ul>
            <li>On the left navigation panel, you can select what anxiety scale measure or questionnaire you want to view first. </li>
            <li>This is a dashboard where you can see the three anxiety scale measure scores.</li>
            <li>
              And below that, you can read the description of the three anxiety scales. 
              There is also a shortcut where you can redirect to anxiety scale surveys.
            </li>
            <li>
              You can also see and edit your profile by clicking your picture in top-right and click the pen logo.
            </li>
          </ul>
          
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content" style="background-image: url(../content/images/bg-themes/2.png);">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container d-flex justify-content-center">

          <div class="card card-authentication1-profile p-5">

            <div class="card-body">
              <div class="card-content p-2" >
                <div class="d-flex align-items-center" style="width: 450px;">

                  <div class="image">
                    <img src="../content/images/uploadedImage/<?php echo $_SESSION['ImageName']; ?>" class="rounded" width="155" >
                  </div>

                  <div class="ml-3 w-100">

                    <h4 class="mb-0 mt-0">
                      <?php echo $_SESSION['FirstName'] . ' ' . $_SESSION['LastName']; ?>
                      <i class="icon icon-pencil" style="cursor: pointer" onclick="updateProfile(<?php echo $_SESSION['UserId']; ?>)"></i>
                    </h4>
                    <span><?php echo $_SESSION['EmailAddress']; ?></span>

                    <!-- <div class="p-2 mt-2 bg-block d-flex justify-content-between rounded text-white stats text-center">

                      <div class="d-flex flex-column">

                        <span class="articles">GAD7</span>
                        <span class="number1">38</span>

                      </div>

                      <div class="d-flex flex-column">

                          <span class="followers">DASS21</span>
                          <span class="number2">980</span>
                          
                      </div>


                      <div class="d-flex flex-column">

                          <span class="rating">K10+</span>
                          <span class="number3">8.9</span>
                          
                      </div>

                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function updateProfile(userId) {
    console.log("test");
    window.sessionStorage.setItem("userId", userId);

    window.location = "http://localhost:8080/AAA/public/views/update_user.php";
  }
</script>

<div class="clearfix"></div>