<?php
// session_start();
include 'dbconnect.php';

$agency_id   = $_GET['agency_id'];
$select_a = "SELECT * FROM agencys WHERE agency_id  ='$agency_id'";
$query_a = mysqli_query($connect, $select_a);
$row = mysqli_fetch_assoc($query_a);

if (isset($_POST['submit'])) {
    $agctype_id = $_POST['agency_id'];
    $agc_type = $_POST['agency_name'];

   
    $insert = "UPDATE INTO agencys SET
        agency_id = '$agency_id', 
        agency_name = '$agency_name', 
        WHERE agctype_id = '$agency_id'";

    mysqli_query($connect, $insert);
     echo '<script>window.location.href="agency.php"</script>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">

            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">แบบฟอร์มเเก้ไขข้อมูลประเภทเงิน </h2>
                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"
                                            class="breadcrumb-link">จัดการข้อมูลประเภทเงิน</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">
                                            เพิ่มข้อมูล</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        แบบฟอร์มเเก้ไขข้อมูลประเภทเงิน
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <h4 class="card-header">เเก้ไขข้อมูลหน่วยงาน/สาขา</h4>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                    for="agency_id">รหัสหน่วยงาน/สาขา</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="agency_id"
                                        VALUE="<?php echo $row["agency_id"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                    for="agency_name">หน่วยงาน/สาขา</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="agency_name"
                                        VALUE="<?php echo $row["agency_name"] ?>">
                                </div>
                            </div>

                          

                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button type="submit" class="btn btn-space btn-primary">บันทึก</button>
                                    <button class="btn btn-space btn-secondary">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>