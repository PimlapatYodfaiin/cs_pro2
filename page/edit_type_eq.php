<?php
// session_start();
include 'dbconnect.php';

$eqtype_id = $_GET['type_eq_id'];
$select_a = "SELECT * FROM types WHERE type_eq_id ='$type_eq_id'";
$query_a = mysqli_query($connect, $select_a);
// $row = mysqli_fetch_assoc($query_a);

// if (isset($_POST['eq_type'])) {
//     $eqtype_id  = $_POST['eqtype_id'];
//     $eq_code = $_POST['eq_code'];
//     $eq_type = $_POST['eq_type'];
//     $last_update = $_POST['last_update'];
//     $eq_shelf_life = $_POST['eq_shelf_life'];
if (isset($_POST['types'])) {
    $type_eq_id  = $_POST['type_eq_id'];
    $eq_code = $_POST['eq_code'];
    $type_eq = $_POST['type_eq'];
    $last_update = $_POST['last_update'];
    $eq_shelf_life = $_POST['eq_shelf_life'];


    $insert = "UPDATE INTO types SET
        type_eq_id = '$type_eq_id', 
        eq_code = '$eq_code', 
        type_eq = '$type_eq',
        last_update = '$last_update',
        eq_shelf_life= '$eq_shelf_life'
        WHERE type_eq_id = '$type_eq_id'";


    mysqli_query($connect, $insert);
    echo '<script>window.location.href="equiment_type.php"</script>';
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
                        <h2 class="pageheader-title">แบบฟอร์มเเก้ไขข้อมูลประเภทครุภัณฑ์ </h2>
                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จัดการข้อมูลประครุภัณฑ์</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">
                                            เเก้ไขข้อมูล</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        แบบฟอร์มเเก้ไขข้อมูลประเภทครุภัณฑ์
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
                            <h4 class="card-header">เเก้ไขข้อมูลประเภทเงิน</h4>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="montype_id">รหัสประเภทเงิน</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="montype_id" VALUE="<?php echo $row["montype_id"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="mon_type">ประเภทเงิน</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="mon_type" VALUE="<?php echo $row["mon_type"] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="last_update ">อัพเดตล่าสุด</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="date" required="" class="form-control" name="last_update" VALUE="<?php echo $row["last_update"] ?>">
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