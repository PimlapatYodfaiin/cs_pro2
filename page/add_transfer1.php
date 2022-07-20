<?php
// session_start();
include 'dbconnect.php';


$select = "SELECT * FROM tranfer_add";
$query = mysqli_query($connect, $select);


$select_unit = "SELECT * FROM units";
$query_unit = mysqli_query($connect, $select_unit);

isset($_POST['search']) ? $search = $_POST['search'] : $search = "";
if (!empty($search)) {
    $c = mysqli_connect("$host", "$user", "$passwd", "$db");
    mysqli_query($c, "SET NAMES UTF8");


    $sql = " SELECT * FROM equipments WHERE ( eq_number LIKE '%" . $search . "%' ) ";
    $q = mysqli_query($c, $sql);
}


if (isset($_POST['submit'])) {
    $eq_number = $_POST['eq_sub_id'];
    $eq_sub_id = $_POST['eq_sub_id'];
  


    $insert = "INSERT INTO equipments SET
    eq_sub_id ='$eq_sub_id',    
    eq_number ='$eq_number',   
    equipment_id = '" . $_GET['equipment_id'] . "'";

    $result = mysqli_query($connect, $insert);
    echo '<script>window.location.href= "?page=edit_tranfer&equipment_id=' . $_GET['equipment_id'] . '";</script>';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
                        <h2 class="pageheader-title">โอนย้ายครุภัณฑ์
                            <!-- <a href="?page=add_personnel" class="btn-info btn-sm">+เพิ่มข้อมูล</a> -->
                        </h2>

                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">โอนย้ายครุภัณฑ์</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จัดการข้อมูลการโอนย้ายครุภัณฑ์</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลครุภัณฑ์</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">กรองค้นหาข้อมูล</h5>
                        <div class="card-body">
                            <form action="" class="inline" method="POST">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">หมายเลขครุภัณฑ์</span>
                                            </div>
                                            <input type="text" name="search" class="form-control" placeholder="หมายเลขครุภัณฑ์">
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <input type="submit" value="ค้นหา">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">ข้อมูลครุภัณฑ์</h5>
                        <div class="card-body">
                            <form method="POST" action="?page=edit_tranfer">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-striped table-bordered first">
                                                    <!-- <table id="example" class="table table-striped table-bordered second dataTable" style="width: 100%;" role="grid" aria-describedby="example_info"> -->
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr role="row">
                                                                <th style="width: 5px;">
                                                                    <label class="custom-control custom-checkbox" for="selectAll">
                                                                        <input class="custom-control-input checkboxes" type="checkbox" name="ch1" id="selectAll">
                                                                        <span class="custom-control-label"></span>
                                                                    </label>
                                                                </th>
                                                                <th>#</th>
                                                                <th>หมายเลขครุภัณฑ์</th>
                                                                <th>รายการครุภัณฑ์</th>
                                                               

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            while ($row = mysqli_fetch_assoc($q)) { ?>

                                                                <tr role="row" class="odd">
                                                                    <td>
                                                                        <label class="custom-control custom-checkbox">
                                                                            <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one">
                                                                            <span class="custom-control-label"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td><?= $i++; ?></td>
                                                                    <td><?= $row['eq_number'] ?></td>
                                                                    <td><?= $row['eq_sub_id'] ?></td>
                                                                    



                                                                </tr>
                                                            <?php } ?>
                                                            <div class="col ">
                                                                <button type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-space btn-primary">อัพเดทข้อมูล</button>
                                                            </div>
                                                        </tbody>

                                                    </table>
                                            </div>
                                        </div><br>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>