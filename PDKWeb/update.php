<?php 
    
    require_once('include/init.php');
    if(session_status()== PHP_SESSION_NONE)
    {
        session_start();
    }

    if(isset($_POST['sec1update']))
    { 
         $trainee = [];
      
         $trainee['id']= $_POST['hidden-id'];
         $trainee['trainee-name']= $_POST['trainee-name'];
         $trainee['trainee-ic']= $_POST['trainee-ic'];
         $trainee['trainee-reg']= $_POST['trainee-reg']; 
         $trainee['trainee-gender']= $_POST['trainee-gender']; 
         $trainee['trainee-ethnicity']= $_POST['trainee-ethnicity']; 
         $trainee['trainee-religion']= $_POST['trainee-religion']; 
         $trainee['trainee-phone']= $_POST['trainee-phone']; 
         $trainee['trainee-address']= $_POST['trainee-address']; 
        
         $result = update_trainee($trainee);

    

         if($result === true)
         {
            
            $message = "Record successfully saved";
             echo "<script type='text/javascript'>alert('$message');
             window.location.href='traineeinfo.php';</script>";
         }
         else
         {
             $errors= $result;
             $message = "Record not saved!\n".$errors; 
             echo "<script type='text/javascript'>alert('$message');
             window.location.href='javascript:history.back(0)';</script>";
         }
    }
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>New Entry Trainee Information</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink d-lg-flex align-items-lg-start"></i></div>
                    <div class="sidebar-brand-text mx-3"><span class="d-lg-flex align-items-lg-start" style="margin-top: 3px;margin-bottom: -8px;">PDK SRI SATOK</span><span class="d-lg-flex align-items-lg-start" style="margin-top: -7p;">pROFILING</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.html"><i class="fas fa-tachometer-alt"></i><span style="margin-left: 5px;">Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="addtrainee.php"><i class="fas fa-user"></i><span style="margin-left: 5px;">Add Trainee</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="traineeinfo.php"><i class="fas fa-table"></i><span style="margin-left: 5px;">Trainee Information</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 style="text-align: center">Edit Trainee entry</h3><p><p>
                    <div class="row mb-3">
                        <div class="col-lg-2">


                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card textwhite bg-primary text-white shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Trainee Information</p>
                                        </div>
                                        <div class="card-body">
    <!-- START OF SECTION 1 FORM START OF SECTION 1 FORMSTART OF SECTION 1 FORMSTART OF SECTION 1 FORMSTART OF SECTION 1 FORMSTART OF SECTION 1 FORMSTART OF SECTION 1 FORMSTART OF SECTION 1 FORMSTART OF SECTION 1 FORMSTART OF SECTION 1 FORMSTART OF SECTION 1 FORM -->
                                            <form method="post" action="update.php">
                                            <?php 
                                            if(isset($_GET['updateid'])){

                                                $id=$_GET['updateid'];

                                                if($result=find_trainee_by_id($id)){

                                                }
                                                    echo  '<div class="mb-3"><input class="form-control" type="hidden" id="hidden-id"  name="hidden-id" value="'.$result['TR_Id'].'"></div>';
                                                    echo  '<div class="mb-3"><label class="form-label" for="address"><strong>Trainee Name</strong></label><input class="form-control" type="text" id="trainee-address"  name="trainee-name" value="'.$result['TR_Name'].'"></div>';
                                                    echo  '<div class="mb-3"><label class="form-label" for="address"><strong>IC / Passport No.</strong></label><input class="form-control" type="text" id="trainee-address"  name="trainee-ic" value="'.$result['TR_Ic'].'"></div>';
                                                    echo  '<div class="mb-3"><label class="form-label" for="address"><strong>OKU Registration No.</strong></label><input class="form-control" type="text" id="trainee-address"  name="trainee-reg" value="'.$result['TR_Reg'].'"></div>';
                                                    echo  '<div class="mb-3"><label class="form-label" for="address"><strong>Gender</strong></label><input class="form-control" type="text" id="trainee-address"  name="trainee-gender" value="'.$result['TR_Gender'].'"></div>';
                                                    echo  '<div class="row"><div class="col">';
                                                    echo  '<div class="mb-3"><label class="form-label" for="first_name"><strong>Ethnicity</strong><br></label><input class="form-control" type="text" id="trainee-ethnicity"  name="trainee-ethnicity" value="'.$result['TR_Ethnicity'].'"></div></div>';
                                                    echo  '<div class="col">';
                                                    echo  '<div class="mb-3"><label class="form-label" for="address"><strong>Religion</strong></label><input class="form-control" type="text" id="trainee-address"  name="trainee-religion" value="'.$result['TR_Religion'].'"></div></div>';
                                                    echo  '<div class="mb-3"><label class="form-label" for="address"><strong>Phone No.</strong></label><input class="form-control" type="text" id="trainee-address"  name="trainee-phone" value="'.$result['TR_Phone'].'"></div>';
                                                    echo  '<div class="mb-3"><label class="form-label" for="address"><strong>Address </strong></label><input class="form-control" type="text" id="trainee-address"  name="trainee-address" value="'.$result['TR_Address'].'"></div>';

                                            }    
                                            ?>

                                            <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name="sec1update" style="height:45px;width:100%">Update Entry</button></div>
                                        </form>
                                            <!-- <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username"><strong>Name</strong><br></label><input class="form-control" type="text" id="trainee-name" name="trainee-name"></div>      
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3"><label class="form-label" for="username"><strong>IC / Passport No.</strong><br></label><input class="form-control" type="text" id="trainee-ic" name="trainee-ic"></div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="mb-3"><label class="form-label" for="username"><strong>OKU</strong>&nbsp;<strong>Registration No.</strong><br></label><input class="form-control" type="text" id="trainee-reg" name="trainee-reg"></div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="mb-3"><label class="form-label" for="username"><strong>Gender</strong><br></label><input class="form-control" type="text" id="trainee-gender" name="trainee-gender"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="mb-3"><label class="form-label" for="first_name"><strong>Ethnicity</strong><br></label><input class="form-control" type="text" id="trainee-ethnicity"  name="trainee-ethnicity"></div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="mb-3"><label class="form-label" for="last_name"><strong>Religion</strong></label><input class="form-control" type="text" id="trainee-religion"  name="trainee-religion"></div>
                                                                        </div>
                                                                    </div><label class="form-label" for="address"><strong>Phone No.</strong></label><input class="form-control" type="text" id="trainee-phone"  name="trainee-phone">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control" type="text" id="trainee-address"  name="trainee-address"></div>
                                                    </div>
                                                </div> -->
        <!--  END OF SECTION 1 FORM END OF SECTION 1 FORMEND OF SECTION 1 FORMEND OF SECTION 1 FORMEND OF SECTION 1 FORMEND OF SECTION 1 FORMEND OF SECTION 1 FORMEND OF SECTION 1 FORMEND OF SECTION 1 FORMEND OF SECTION 1 FORM END OF SECTION 1 FORM -->
                                        <!-- </div>
                                    </div>
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Guardian Information</p>
                                        </div>
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username"><strong>Guardian Full Name</strong><br></label><input class="form-control" type="text" id="tpp-name"  name="tpp-name"></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3"><label class="form-label" for="username"><strong>Guardian IC / Passport No.</strong><br></label><input class="form-control" type="text" id="tpp-ic" name="tpp-ic"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="address"><strong>Guardian relation with Trainee</strong></label><input class="form-control" type="text" id="tpp-relation"  name="tpp-relation"></div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3"><label class="form-label" for="address"><strong>Guardian Gender</strong></label><input class="form-control" type="text" id="tpp-gender"  name="tpp-gender"></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3"><label class="form-label" for="address"><strong>Guardian Phone Number</strong></label><input class="form-control" type="text" id="tpp-phone"  name="tpp-phone"></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3"><label class="form-label" for="address"><strong>Guardian Occupation</strong></label><input class="form-control" type="text" id="tpp-occupation"  name="tpp-occupation"></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3"><label class="form-label" for="address"><strong>Guardian Salary</strong></label><input class="form-control" type="text" id="tpp-salary"  name="tpp-salary"></div>
                
             
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name="sec1save" style="height:45px;width:100%">Add Entry</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © PDKWeb Group&nbsp;</span></div>
                </div>
            </footer> -->
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>