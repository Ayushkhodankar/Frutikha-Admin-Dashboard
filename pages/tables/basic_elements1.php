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
$vendorname = $age =  $image = $productid = "";
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


    /* $filename = $_FILES["img"]["name"];
  $tempname = $_FILES["img"]["tmp_name"];
  $folder = "./image/" . $filename;

*/
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

    //name validation
    if (($_POST["name"]) == "") {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace  
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only alphabets and white space are allowed";
      }
    }

    //price validation
    if (!preg_match("/^[0-9]+(\.[0-9]{2})?$/", isset($_POST["Price"])) == '0') {
      $priceErr = "Enter Correct Format with 2 decimals";
    } else {
      $price = isset($_POST["Price"]);
    }
    //short description validation
    if (isset($_POST["Shortdesc"]) == "") {
      $sdescErr = "Please provide short description";
    } else {
      $shortdesc = ($_POST["Shortdesc"]);
    }
    //in stock validation
    if (isset($_REQUEST['Instock']) && $_REQUEST['Instock'] == '') {
      $instockErr = 'Please select an option.';
    } else {
      $instock = isset($_POST["Instock"]);
    }

    //no. of stock validation
    if (isset($_POST["Stockno"]) == "") {
      $stocknoErr = "no. of stock is required";
    } else {
      $stockno = isset($_POST["Stockno"]);
    }
    $productid = test_input($_POST["  "]);
    $name = test_input($_POST["name"]);
    $price = test_input($_POST["Price"]);
    $shortdesc = test_input($_POST["Shortdesc"]);
    $instock = test_input($_POST["Instock"]);
    $stockno = test_input($_POST["Stockno"]);
    $fulldesc = test_input($_POST["fulldesc"]);

    queryExecute("UPDATE add_product SET product_name='" . $name . "'	,product_price='" . $price . "',	short_desc='" . $shortdesc . "'	,in_stock='" . $instock . "',	stock_no='" . $stockno . "',	full_desc='" . $fulldesc . "' WHERE product_id='" . $productid . "'", "updated");
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["vender_submit"] == "vender_submit") {
    //name validation
    if (isset($_POST["vendorname"]) == "") {
      $vendornameErr = "Name is required";
    } else {
      $vendorname = ($_POST["vendorname"]);
      // check if name only contains letters and whitespace  
      if (!preg_match("/^[a-zA-Z ]*$/", $vendorname)) {
        $vendornameErr = "Only alphabets and white space are allowed";
      }
    }

    //Number Validation  
    if (isset($_POST["Mobileno"]) == 0) {
      $mobilenoErr = "Mobile no is required";
    } else {
      $mobileno = ($_POST["Mobileno"]);
      // check if mobile no is well-formed  
      if (!preg_match("/^[0-9]*$/", $mobileno)) {
        $mobilenoErr = "Only numeric value is allowed.";
      }
      //check mobile no length should not be less and greator than 10  
      if (strlen($mobileno) != 10) {
        $mobilenoErr = "Mobile no must contain 10 digits.";
      }
    }

    //email  validation
    $email = isset($_POST["email"]);
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    if (!preg_match($pattern, $email)) {
      $emailErr = "Email is not valid.";
    } else {
      $email = ($_POST["email"]);
    }
    //age validation
    $age = strlen(isset($_POST["Age"]));
    $length = strlen($age);

    if ($length < 0 && $length > 3) {
      $ageErr = "Age must have 2 digits.";
    } else {
      $age = isset($_POST["Age"]);
    }
    $vender_id = test_input($_POST["vendorid"]);
    queryExecute("UPDATE add_vender SET vender_name='" . $vender_name . "'	,vender_mob='" . $vender_mob . "',	vender_email='" . $vender_email . "'	,vender_age='" . $vender_age . "',	vender_address='" . $vender_address . "' WHERE vender_id='" . $vender_id . "'", "upddated ");
  }
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
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
              <span class="menu-title">Details</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Update details</a></li>
                <li class="nav-item"> <a class="nav-link" href="basic_elements2.php">Delete Details</a></li>
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
          
        </div>
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Update Product Form</h4>
              <p class="card-description"> Update Product data </p>
              <form class="forms-sample" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                  <label for="fruitid">Id No.</label>
                  <input type="text" class="form-control" id="fruitid" placeholder="Enter Id No." name="fruitid" value="">

                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Fruit Name</label>
                  <input type="text" class="form-control" id="fruitname" placeholder="Fruit Name" name="name">
                  <span class="error" style="color: red;">* <?php echo $nameErr; ?> </span>
                </div>
                <div class="form-group">
                  <label for="price">Price Of Product</label>
                  <input type="text" class="form-control" id="price" name="Price" placeholder="Enter Amount In Rs.">
                  <span class="error" style="color: red;">* <?php echo $priceErr; ?> </span>
                </div>
                
                <div class="form-group">
                  <label for="shortdesc">Short Description</label>
                  <textarea class="form-control" id="shortdesc" rows="3" name="Shortdesc" placeholder="Short Description Of Product"></textarea>
                  <span class="error" style="color: red;">* <?php echo $sdescErr; ?> </span>
                </div>
                <div class="form-group">
                  <label for="instock">In Stock</label>
                  <select class="form-control" id="instock" name="Instock">
                    <option value="0">Please select option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                  <span class="error" style="color: red;">* <?php echo $instockErr; ?> </span>
                </div>
                <div class="form-group">
                  <label for="stockno">Number Of Stocks</label>
                  <input type="text" class="form-control" id="stockno" placeholder="Stocks Available(Nos.)" name="Stockno">
                  <span class="error" style="color: red;">* <?php echo $stocknoErr; ?> </span>
                </div>
                
                <div class="form-group">
                  <label for="fulldesc">Full Description</label>
                  <textarea class="form-control" id="fulldesc" rows="6" name="fulldesc"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="pro_submit" value="pro_submit">Update</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>

            <div class="card-body">
              <h4 class="card-title">Update Vender</h4>
              <p class="card-description"> Update Vender Information </p>
              <form class="forms-sample" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                  <label for="vendorid">Id No.</label>
                  <input type="text" class="form-control" id="vendorid" placeholder="Enter Id No." name="vendorid">

                </div>
                <div class="form-group">
                  <label for="vendorname">Vendor Name</label>
                  <input type="text" class="form-control" id="vendorname" placeholder="Vendor Name" name="vendorname">
                  <span class="error" style="color: red;">* <?php echo $vendornameErr; ?> </span>
                </div>
                <div class="form-group">
                  <label for="mobileno">Mobile Number</label>
                  <input type="text" class="form-control" id="mobileno" name="Mobileno" placeholder="Enter Mobile Number">
                  <span class="error" style="color: red;">* <?php echo $mobilenoErr; ?> </span>
                </div>
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
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address">
                  <span class="error" style="color: red;">* <?php echo $emailErr; ?> </span>
                </div>
                <!-- <div class="form-group">
                                    <label for="instock">In Stock</label>
                                    <select class="form-control" id="instock" name="instock">
                                        <option value="0">Please select option</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <span class="error" style="color: red;">*  </span>
                                </div>-->
                <div class="form-group">
                  <label for="age">Age</label>
                  <input type="text" class="form-control" id="age" placeholder="Enter Age" name="Age">
                  <span class="error" style="color: red;">* <?php echo $ageErr; ?> </span>
                </div>
                <!-- <div class="form-group">
                  <label>Select The Product Vendor Sells?</label> -->

                <!-- <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div> -->
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="vender_submit" value="vender_submit">Submit</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
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