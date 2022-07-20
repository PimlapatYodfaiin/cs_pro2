<?php
include 'dbconnect.php';
$select = " SELECT equipments.*,subcategorys.sub_name,types.type_name,agencys.agency_name,branchs.branch_name FROM equipments
INNER JOIN subcategorys on subcategorys.sub_id = equipments.eq_sub_id
INNER JOIN types on types.type_id = equipments.eq_type_id
INNER JOIN agencys on agencys.agency_id = equipments.eq_agency_id
INNER JOIN branchs on branchs.branch_id = equipments.eq_branch_id
";
$query = mysqli_query($connect, $select);

$result = mysqli_query($connect, $select);
$count = mysqli_num_rows($result);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->

    <style type="text/css">
        input[type="date"]::-webkit-datetime-edit,
        input[type="date"]::-webkit-inner-spin-button,
        input[type="date"]::-webkit-clear-button {
            color: #fff;
            position: relative;
        }

        input[type="date"]::-webkit-datetime-edit-year-field {
            position: absolute !important;
            border-left: 1px solid #8c8c8c;
            padding: 2px;
            color: red;
            left: 56px;
        }

        input[type="date"]::-webkit-datetime-edit-month-field {
            position: absolute !important;
            border-left: 1px solid #8c8c8c;
            padding: 2px;
            color: red;
            left: 26px;
        }

        input[type="date"]::-webkit-datetime-edit-day-field {
            position: absolute !important;
            color: red;
            padding: 2px;
            left: 4px;
        }

        /* ตัวอย่าง css จาก  : https://stackoverflow.com/questions/7372038/is-there-any-way-to-change-input-type-date-format */
    </style>
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
                        <h2 class="pageheader-title">ทะเบียนครุภัณฑ์ <a href="?page=add_equipment" class="btn btn-rounded btn-success "> <i class="fas fa-plus"> </i> เพิ่มข้อมูล</a></h2>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลครุภัณฑ์</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูลครุภัณฑ์</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">

                                <form action="" method="get">

                                    <div class="row g-9">
                                        <div class="col-auto">
                                            <label class="col-form-label">เริ่มต้น</label>
                                        </div>
                                        <div class="col-auto">
                                            <!-- ใน value สร้างเงื่อนไขตรวจสอบถ้ามีการส่ง $_GET มาถึงจะแสดงค่าที่เคยเลือก ถ้าไม่มีจะแสดง 2021-08-06-->
                                            <input type="date" name="start_date" data-date-format="dd-mm-Y" class="form-control" required value="<?php if (isset($_GET['start_date'])) {
                                                                                                                                                        echo $_GET['start_date'];
                                                                                                                                                    } else {
                                                                                                                                                        echo '2021-08-06';
                                                                                                                                                    } ?>">
                                        </div>
                                        <div class="col-auto">
                                            <label class="col-form-label">ถึง</label>
                                        </div>
                                        <div class="col-auto">
                                            <!-- ใน value สร้างเงื่อนไขตรวจสอบถ้ามีการส่ง $_GET มาถึงจะแสดงค่าที่เคยเลือก ถ้าไม่มีจะแสดง 2021-10-30-->
                                            <input type="date" name="end_date" data-date-format="dd-mm-Y" max="" class="form-control" required value="<?php if (isset($_GET['end_date'])) {
                                                                                                                                                            echo $_GET['end_date'];
                                                                                                                                                        } else {
                                                                                                                                                            echo '2021-10-30';
                                                                                                                                                        } ?>">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary">ค้นหาข้อมูล</button>
                                            <a href="callDataBetweenDate.php" class="btn btn-warning">เคลียร์ข้อมูล</a>
                                        </div>
                                    </div>
                                </form>

                            </div><br>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">ข้อมูลครุภัณฑ์</h5>
                        <div class="card-body">
                            <!-- <div class="table-responsive"> -->
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">



                                <br>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered first">
                                            <!-- <table id="example" class="table table-striped table-bordered second dataTable" style="width: 100%;" role="grid" aria-describedby="example_info"> -->
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr role="row">

                                                        <th>#</th>
                                                        <th>หมายเลขครุภัณฑ์</th>
                                                        <!-- <th>รายการครุภัณฑ์</th> -->
                                                        <th>ปีที่ซื้อ</th>
                                                        <th>ราคา</th>
                                                        <th>อายุการใช้งานตามที่กำหนด</th>

                                                        <th><i class=" fa fa-edit"></i>สถานะ</th>
                                                        <!-- <th style="width: 80px;"><i class="fa fa-list-ul"> </i> รายละเอียด</th> -->
                                                        <th><i class="fa fa-edit"></i> จัดการข้อมูล</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    while ($row = mysqli_fetch_assoc($result)) { ?>

                                                        <tr role="row" class="odd">

                                                            <td><?= $i++; ?></td>
                                                            <td><?= $row['eq_number'] ?></td>
                                                            <!-- <td><?= $row['sub_name'] ?></td> -->
                                                            <td><?= date('d/m/Y', strtotime($row['eq_buydate'])); ?></td>
                                                            <td><?= $row['eq_price'] ?></td>
                                                            <td><?= $row['type_lifetime_low'] ?></td>
                                                            <td><?= $row['eq_status_id'] ?></td>

                                                            <th>
                                                                <a href="?page=view_equipment&equipment_id=<?php echo $row["equipment_id"] ?>"><i class="fas fa-eye"> </i></a>&nbsp &nbsp

                                                                <a href="?page=edit_equipment&equipment_id=<?php echo $row["equipment_id"] ?>"><i class="fas fa-pencil-alt"> </i></a>&nbsp &nbsp

                                                                <a href=""><i class="fa fa-trash "> </i></a>
                                                            </th>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            </script>
                                    </div>
                                </div><br>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>


</html>