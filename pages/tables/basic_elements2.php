<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Frutikha-Dashboard </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>
<?php
// define variables to empty values  
$nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = $priceErr = $sdescErr = $instockErr = $stocknoErr = "";
$name = $email = $mobileno = $gender = $website = $agree = $price = $shortdesc = $instock = $stockno = $fulldesc = "";
$vendorname = $age =  $image =  $productid = "";
$vendornameErr = $ageErr = "";
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function queryExecute($sql, $msg)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "fruthikha";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname, 3306);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

  if ($conn->query($sql) === TRUE) {
    echo "New record created  successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {



  if ($_POST["pro_submit"] == "pro_submit") {



    $productid = test_input($_POST["fruitid"]);


    // sql to delete a record

    queryExecute("DELETE FROM add_product WHERE product_id='" . $productid . "'", "deleted");
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $venderid = test_input($_POST["vendorid"]);

  queryExecute("DELETE FROM add_vender WHERE vender_id='" . $venderid . "'", "deleted");
}



?>


<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-xl-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search products">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <!-- <li class="nav-item  dropdown d-none d-md-block">
              <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> Reports </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-file-pdf mr-2"></i>PDF </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-file-excel mr-2"></i>Excel </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-file-word mr-2"></i>doc </a>
              </div>
            </li>
            <li class="nav-item  dropdown d-none d-md-block">
              <a class="nav-link dropdown-toggle" id="projectDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> Projects </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="projectDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-eye-outline mr-2"></i>View Project </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-pencil-outline mr-2"></i>Edit Project </a>
              </div>
            </li>
            <li class="nav-item nav-language dropdown d-none d-md-block">
              <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-language-icon">
                  <i class="flag-icon flag-icon-us" title="us" id="us"></i>
                </div>
                <div class="nav-language-text">
                  <p class="mb-1 text-black">English</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="#">
                  <div class="nav-language-icon mr-2">
                    <i class="flag-icon flag-icon-ae" title="ae" id="ae"></i>
                  </div>
                  <div class="nav-language-text">
                    <p class="mb-1 text-black">Arabic</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <div class="nav-language-icon mr-2">
                    <i class="flag-icon flag-icon-gb" title="GB" id="gb"></i>
                  </div>
                  <div class="nav-language-text">
                    <p class="mb-1 text-black">English</p>
                  </div>
                </a>
              </div>
            </li> -->
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="../../assets/images/faces/face28.png" alt="image">
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">Henry Klein</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
              <div class="p-3 text-center bg-primary">
                <img class="img-avatar img-avatar48 img-avatar-thumb" src="../../assets/images/faces/face28.png" alt="">
              </div>
              <div class="p-2">
                <h5 class="dropdown-header text-uppercase pl-2 text-dark">User Options</h5>
                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                  <span>Inbox</span>
                  <span class="p-0">
                    <span class="badge badge-primary">3</span>
                    <i class="mdi mdi-email-open-outline ml-1"></i>
                  </span>
                </a>
                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                  <span>Profile</span>
                  <span class="p-0">
                    <span class="badge badge-success">1</span>
                    <i class="mdi mdi-account-outline ml-1"></i>
                  </span>
                </a>
                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="javascript:void(0)">
                  <span>Settings</span>
                  <i class="mdi mdi-settings"></i>
                </a>
                <div role="separator" class="dropdown-divider"></div>
                <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                  <span>Lock Account</span>
                  <i class="mdi mdi-lock ml-1"></i>
                </a>
                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                  <span>Log Out</span>
                  <i class="mdi mdi-logout ml-1"></i>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <!-- <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-success"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0 bg-primary text-white py-4">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../../assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../../assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../../assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div> -->
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0 bg-primary text-white py-4">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                  <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-settings"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                  <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-link-variant"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                  <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">See all notifications</h6>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a class="nav-link" href="../../index.html">
              <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Add Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="D:\HTML Templates\connect-plus-1.0.0\connect-plus-1.0.0\pages\tables\basic-table.html">View Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="D:\HTML Templates\connect-plus-1.0.0\connect-plus-1.0.0\pages\tables\basic-table.html">Ordered Products</a></li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
              <a class="nav-link" href="../../pages/icons/mdi.html">
                <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                <span class="menu-title">Icons</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/forms/basic_elements.html">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Forms</span>
              </a>
            </li> -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
              <span class="menu-title">Details</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="basic_elements1.php">Update details</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Delete Details</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
              <span class="menu-title">Add Vendor</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
              <span class="menu-title">Registered Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
              <span class="menu-title">Stats History</span>
            </a>
          </li>
          <!-- <li class="nav-item">
              <a class="nav-link" href="../../pages/tables/basic-table.html">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Tables</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
                </ul>
              </div>
            </li> -->
          <li class="nav-item documentation-link">
            <a class="nav-link" href="http://www.bootstrapdash.com/demo/connect-plus-free/jquery/documentation/documentation.html" target="_blank">
              <span class="icon-bg">
                <i class="mdi mdi-file-document-box menu-icon"></i>
              </span>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
          <li class="nav-item sidebar-user-actions">
            <div class="user-details">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <div class="d-flex align-items-center">
                    <div class="sidebar-profile-img">
                      <img src="../../assets/images/faces/face28.png" alt="image">
                    </div>
                    <div class="sidebar-profile-text">
                      <p class="mb-1">Henry Klein</p>
                    </div>
                  </div>
                </div>
                <div class="badge badge-danger">3</div>
              </div>
            </div>
          </li>
          <!-- <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
                  <span class="menu-title">Settings</span>
                </a>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i>
                  <span class="menu-title">Take Tour</span></a>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title">Log Out</span></a>
              </div>
            </li> -->
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- <div class="page-header">
              <h3 class="page-title"> Form elements </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div> -->
          <!-- <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Remember me </label>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Horizontal Form</h4>
                    <p class="card-description"> Horizontal form layout </p>
                    <form class="forms-sample">
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Remember me </label>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div> -->
        </div>
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Delete Product Form</h4>
              <p class="card-description">Delete Product data </p>
              <form class="forms-sample" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                  <div class="form-group">
                    <label for="fruitid">Id No.</label>
                    <input type="text" class="form-control" id="fruitid" placeholder="Enter Id No." name="fruitid">
                  </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2" name="pro_submit" value="pro_submit">Delete</button>
                <button class="btn btn-light">Cancel</button>
              </form>
              <!-- <label for="exampleInputName1">Fruit Name</label>
                  <input type="text" class="form-control" id="fruitname" placeholder="Fruit Name" name="name">
                  <span class="error" style="color: red;">* <//?php echo $nameErr; ?> </span>
                
                <div class="form-group">
                  <label for="price">Price Of Product</label>
                  <input type="text" class="form-control" id="price" name="Price" placeholder="Enter Amount In Rs.">
                  <span class="error" style="color: red;">*</span>
                </div>!-->
              <!-- <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-append">
                            <span class="input-group-text bg-primary text-white"
                              >$</span
                            >
                          </div>
                          <input type="text" class="form-control"  aria-label="Amount (to the nearest dollar)" />
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div> -->
              <!-- <div class="form-group">
                  <label for="shortdesc">Short Description</label>
                  <textarea class="form-control" id="shortdesc" rows="3" name="Shortdesc" placeholder="Short Description Of Product"></textarea>
                  <span class="error" style="color: red;"> </span>
                </div>
                <div class="form-group">
                  <label for="instock">In Stock</label>
                  <select class="form-control" id="instock" name="Instock">
                    <option value="0">Please select option</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                  </select>
                  <span class="error" style="color: red;">*  </span>
                </div>
                <div class="form-group">
                  <label for="stockno">Number Of Stocks</label>
                  <input type="text" class="form-control" id="stockno" placeholder="Stocks Available(Nos.)" name="Stockno">
                  <span class="error" style="color: red;">* <</span>
                </div>
                <div class="form-group">
                  <label>Image Of Product</label>
                  <input type="file" name="img[]" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                 <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div> 
                <div class="form-group">
                  <label for="exampleTextarea1">Full Description</label>
                  <textarea class="form-control" id="exampleTextarea1" rows="6"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>

            <div class="card-body">
              <h4 class="card-title">Add A Vender</h4>
              <p class="card-description"> Vender Information </p>
              <form class="forms-sample" action="</?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                  <label for="vendorname">Vendor Name</label>
                  <input type="text" class="form-control" id="vendorname" placeholder="Vendor Name" name="vendorname">
                  <span class="error" style="color: red;">* </?php echo $vendornameErr; ?> </span>
                </div>
                <div class="form-group">
                  <label for="mobileno">Mobile Number</label>
                  <input type="text" class="form-control" id="mobileno" name="Mobileno" placeholder="Enter Mobile Number">
                  <span class="error" style="color: red;">* </?php echo $mobilenoErr; ?> </span>
                </div>
                <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-append">
                            <span class="input-group-text bg-primary text-white"
                              >$</span
                            >
                          </div>
                          <input type="text" class="form-control"  aria-label="Amount (to the nearest dollar)" />
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div> -->
              <!-- <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address">
                  <span class="error" style="color: red;">* <//?php echo $emailErr; ?> </span>
                </div>
                 <div class="form-group">
                                    <label for="instock">In Stock</label>
                                    <select class="form-control" id="instock" name="instock">
                                        <option value="0">Please select option</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <span class="error" style="color: red;">*  </span>
                                </div>-->
              <!-- <div class="form-group">
                  <label for="age">Age</label>
                  <input type="text" class="form-control" id="age" placeholder="Enter Age" name="Age">
                  <span class="error" style="color: red;">* <//?php echo $ageErr; ?> </span>
                </div>
               <div class="form-group">
                  <label>Select The Product Vendor Sells?</label> -->

              <!-- <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div> -->
              <!--<div class="form-group">
                  <label for="address">Address</label>
                  <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                </div>-->
              <br><br>
              <div class="card">

                <h4 class="card-title">Delete Product Form</h4>
                <p class="card-description">Delete Product data </p>
                <form class="forms-sample" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                  <div class="form-group">
                    <div class="form-group">
                      <label for="vendorid">Id No.</label>
                      <input type="text" class="form-control" id="vendorid" placeholder="Enter Id No." name="vendorid">

                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name="vender_submit" value="vender_submit">Delete</button>
                  <button class="btn btn-light">Cancel</button>
                </form>

              </div>
            </div>


          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="footer-inner-wraper">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../assets/vendors/select2/select2.min.js"></script>
  <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../../assets/js/file-upload.js"></script>
  <script src="../../assets/js/typeahead.js"></script>
  <script src="../../assets/js/select2.js"></script>
  <!-- End custom js for this page -->
</body>

</html>