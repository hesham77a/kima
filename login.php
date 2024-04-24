<!--------------PHP CODE  التاكد من البريد وكلمة المرور---------->
<?php
               if (isset($_POST['loginButt'])) {
                    require_once 'connection.php';
                    $login = $database->prepare("SELECT * FROM MAIN WHERE MAIL = :email AND PASSWORD = :password ");
                    $login->bindParam("email", $_POST['MAIL']);
                    $login->bindParam("password", $_POST['PASSWORD']);
                    $login->execute();
                    if ($login->rowCount()===1) {
                        $user = $login->fetchObject();
                        if ($user->ACTIVATEDMADIL	== true) {
                          ob_end_clean();
                          //            انشاء سيشون
                         session_start();
                         // $_SESSION['email'] = $user->MAIL;
                         // $_SESSION['password'] = $user->PASSWORD	;
                         // $_SESSION['name'] = $user->NAME	;
                        
                         $_SESSION['user'] = $user;
                          //تحديد الصلاحية
                          if ($user->ROLE === "USER") {
                               //echo "<script> window.location.href='users/users/index.php';</script>";
                               
                              header("location:users/users/index.php", true);
                              //echo '<script type="text/javascript"> location.replace("users/users/index.php"); 			  </script>';
                          }elseif ($user->ROLE === "ADMIN") {
                           // echo "<script> window.location.href='users/admin/index.php';</script>";
                             header("location:users/admin/index.php", true);
                          }elseif ($user->ROLE === "SUPERADMIN") {
                           /// echo "<script> window.location.href='users/superadmin/index.php';</script>";
                          header("location:users/superadmin/index.php", true);
                          }
                          

                        }else {
                          echo '<div class="alert alert-danger text-white text-lg " role="alert">
                          <p class="m-0 text-sm text-center" Id="IdViewH4Label" >
                          يرجى تفعيل حسابك أولا، لقد تم ارسال كود التفعيل الى الايميل الذي ادخلته سابقا
                          </p> </div>       ';

                           
                        }
                    } else{
                      echo '<div class="alert alert-danger text-white text-lg " role="alert">
                      <p class="m-0 text-sm text-center" Id="IdViewH4Label" >
                      كلمة المرور أو البريد الالكتروني غير صحيح
                      </p> </div>       ';
                    }

              }
              ?>
              <!--------------PHP CODE  التاكد من البريد وكلمة المرور---------->


<!--

=========================================================
* Material Kit 2 - v3.0.4
=========================================================
 ========================================================= -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="image/apple-icon.png">
  <link rel="icon" type="image/png" href="image/favicon.png">
  <title> تسجيل الدخول للحساب  </title>
 <!------------------------------------- Descrition  for search ------------------------------------->
 <meta name="description" content="[عبدالباسط كريمة]" />
  <meta name="keywords"  content="الصحة , كريمة , ألمانيا, Medical"/>
  <meta name="author"  content="Libya" />
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-static/">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=El+Messiri:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&family=Amiri&display=swap" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="css/nucleo-icons.css" rel="stylesheet" />
  <link href="css/nucleo-svg.css" rel="stylesheet" />


  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="css/Login/material-kit.css?v=3.0.4" rel="stylesheet" />
   <!---------------------------------------------   css - start --------------------------------------------------------->   
         <!-- Font Awesome -->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"> 
        <!-- Bootstrap core CSS -->
        <link href="css/Login/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/Login/mdb.min.css" rel="stylesheet">
        <!-- my CSS -->
        <!-- <link href="css/myweb.css" rel="stylesheet"> -->
        <link href="css/Login/login.css" rel="stylesheet">

    <!---------------------------------------------    css - End  --------------------------------------------------------->   
</head>

<body class="sign-in-basic">
  <!-- Navbar Transparent -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent " style="background-color:#03054b">
    <div class="container">
      
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <!------------------------------------------------------------>

      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
        <ul class="navbar-nav navbar-nav-hover ms-auto">
          <li class="nav-item dropdown dropdown-hover mx-2 ms-lg-6">
            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
             id="dropdownMenuPages8" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: 'El Messiri', sans-serif; ">
              <i class="material-icons opacity-6 me-2 text-md"></i>
              الرئيسية
              <img src="image/down-arrow-white.svg" alt="down-arrow" class="arrow ms-2 d-lg-block d-none">
              <img src="image/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-2 d-lg-none d-block">
            </a>
            <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages8">
              <div class="d-none d-lg-block">
                <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1" Id="IdMenueItems">
طب الميدان
              </h6>
                <a href="index.php" class="dropdown-item border-radius-md" Id="IdMenueItems" Id="IdMenueItems">
                  <span>الصفحة الرئيسية</span>
                </a>
                
                
                <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3" Id="IdMenueItems">
                  معلومات الحساب
                </h6>
                
                <a href="login.php" class="dropdown-item border-radius-md" Id="IdMenueItems">
                  <span> تسجيل الدخول</span>
                </a>
                <a href="#" class="dropdown-item border-radius-md" Id="IdMenueItems">
                  <span>اللغة </span>
                </a>
              </div>
              <div class="d-lg-none">
                <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1" Id="IdMenueItems">
                  صندوق التكافل
                </h6>
                <a href="index.php" class="dropdown-item border-radius-md" Id="IdMenueItems">
                  <span>الرئيسية</span>
                </a>
                <a href="#" class="dropdown-item border-radius-md">
                </a>
                <a href="ProblemAndSolve.php" class="dropdown-item border-radius-md" Id="IdMenueItems">
                  <span>مشاكل شائعه </span>
                </a>
                <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3" Id="IdMenueItems">
                  معلومات الحساب
                </h6>
                <a href="Register.php" class="dropdown-item border-radius-md" Id="IdMenueItems">
                  <span>انشاء حساب</span>
                </a>
                <a href="login.php" class="dropdown-item border-radius-md" Id="IdMenueItems">
                  <span> تسجيل الدخول</span>
                </a>
                <a href="#" class="dropdown-item border-radius-md" Id="IdMenueItems">
                  <span>اللغة </span>
                </a>
              </div>
            </div>
          </li>
        
          
         
        </ul>
      </div>
      <!------------------------------------->

    
                        
         
        
      
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="page-header align-items-start min-vh-100" 
        style=" background: -webkit-linear-gradient(top, #06ffff, #074fbd);
        background: -o-linear-gradie">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto" >
          <div class="card z-index-0 fadeIn3 fadeInBottom" >
            <div class="card-header p-0 position-relative mt-n4 mx-4 z-index-2" >
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1" Id="IdLoginbox" >
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0" id="IdViewH4" style="padding-top:20px; text-align: right;" >
                 
                    <strong>  تسجيل الدخول  </strong>
                                
                
                </h4>
                <div class="row mt-3">
                  <div class="col-2 text-center ms-auto">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-facebook text-white text-lg"></i>
                    </a>
                  </div>
                  <div class="col-2 text-center px-1">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-github text-white text-lg"></i>
                    </a>
                  </div>
                  <div class="col-2 text-center me-auto">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-google text-white text-lg"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form role="form" class="text-start" method="POST">
                <div class="input-group input-group-outline my-3">
                  <label class="form-label" Id="IdViewH4Label" >
            اسم المستخدم                     
                  </label>
                  <input type="email" class="form-control" name="MAIL" required>
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label" Id="IdViewH4Label">كلمة المرور</label>
                  <input type="password" class="form-control" name="PASSWORD" required>
                </div>
                <div class="form-check form-switch d-flex align-items-center mb-3">
                  <input class="form-check-input" type="checkbox" id="rememberMe" checked >
                  <label class="form-check-label mb-0 ms-3" for="rememberMe" Id="IdViewH4Label">تذكير</label>
                </div>
                <div class="text-center">
                <button type="submit" name="loginButt" class="btn btn-outline-white btn-lg scrolly" id="IdViewA11"
                  style="font-family: 'El Messiri', sans-serif; font-size: large;width:270px;
                     background: -webkit-linear-gradient(top, #0c13cf, #038675);
                     background: -o-linear-gradie; color:#ffffff" >
                  دخول
                  <i class="fas fa-mouse ml-4"  ></i>
                  </button>
                 

                </div>
              
                <p class="mt-4 text-sm text-center" Id="IdViewH4Label">
                  <a class="mb-5 pb-lg-2" href="#!"  style="color: #393f81;" >نسيت كلمة المرور؟</a>
                                
                </p>
                <p class="mt-4 text-sm text-center" Id="IdViewH4Label">
                  <a href="#!" class="mb-5 pb-lg-2"  style="color: #393f81;">شروط الاستخدام</a>
                                
                </p>

              </form>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer position-absolute bottom-2 py-2 w-100">
      <div class="container">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-12 col-md-6 my-auto">
            <div class="copyright text-center text-sm text-white text-lg-start">
             <!-------------حقوق النشر-------------->
            
            </div>
          </div>
          <div class="col-12 col-md-6">
          
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="js/core/popper.min.js" type="text/javascript"></script>
  <script src="js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="js/plugins/parallax.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>
</body>

</html>
