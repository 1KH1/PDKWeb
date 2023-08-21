<?php

    require_once('include/init.php');
    if(session_status()== PHP_SESSION_NONE)
    {
        session_start();
    }
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Trainee Information</title>
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
                    <li class="nav-item"><a class="nav-link active" href="traineeinfo.php"><i class="fas fa-table"></i><span style="margin-left: 5px;">Trainee Information</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="join.php"><i class="fas fa-user"></i><span style="margin-left: 5px;">Trainee's Emergency Contact</span></a></li>
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
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-lg-9 offset-lg-0" style="padding-right: 12px;padding-left: 12px;">
                                    <p class="text-primary d-xxl-flex justify-content-xxl-start align-items-xxl-center m-0 fw-bold" style="font-size: 18px;">Trainee Info</p>
                                </div>
                                <div class="col-lg-3 offset-lg-0">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter-1"><a class="btn btn-primary d-block d-lg-flex align-items-lg-center" role="button" style="margin-left: 100px;" href="addtrainee.php"><i class="fas fa-plus" style="margin-right: 12px;"></i>Add trainee</a><label class="form-label"></label></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th style="width: 130px;">Name</th>
                                            <th style="width: 142px;">IC / Passport No.</th>
                                            <th>OKU Reg. No.</th>
                                            <th>Gender</th>
                                            <th>Etnicity</th>
                                            <th>Religion</th>
                                            <th>Phone No.</th>
                                            <th>Address</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        
                                        <tr>
                                            
                                             <?php
                                                
                                                $sql = "SELECT * FROM trainee";

                                                $result = mysqli_query($db, $sql);

                                                if($result->num_rows > 0)
                                                    {
                                                        while($row = $result->fetch_assoc())
                                                        {
                                                            echo '<tr><td>'.$row['TR_Name'].'</td>';
                                                            echo '<td>'.$row['TR_Ic'].'</td>';
                                                            echo '<td>'.$row['TR_Reg'].'</td>';
                                                            echo '<td>'.$row['TR_Gender'].'</td>';
                                                            echo '<td>'.$row['TR_Ethnicity'].'</td>';
                                                            echo '<td>'.$row['TR_Religion'].'</td>';
                                                            echo '<td>'.$row['TR_Phone'].'</td>';
                                                            echo '<td>'.$row['TR_Address'].'</td>';
                                                            // echo '<td><a href="update.php?updateid='.$row['TR_Id'].'">Update</a></td>';
                                                            // echo '<td><a href="update.php?updateid='.$row['TR_Id'].'">Update</a></td></tr>';
                                                            echo "<td><a class='btn btn-primary' role='button' style='background:rgb(78,115,223);border-style:none;' href='update.php?updateid=".$row['TR_Id']."'>Edit</a></td>";
                                                            echo "<td><a class='btn btn-primary' role='button' style='background:rgb(234,12,12);border-style:none;' href='delete.php?deleteid=".$row['TR_Id']."'>Delete</a></td>";
                                                            

                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "There is no entry";
                                                    }
                                            ?>
    
                                        </tr>

                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                                <?php
                                    $db->close();
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">

                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © PDKWeb Group&nbsp;</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>