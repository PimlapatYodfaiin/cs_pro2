<?php 
include 'dbconnect.php';
$equipment_id = $_GET['equipment_id'];
$select = "SELECT * FROM`equipments` WHERE equipment_id='$equipment_id'";
$query = mysqli_query($connect, $select);
$row = mysqli_fetch_assoc($query);
$result = mysqli_query($connect, $select);
$count = mysqli_num_rows($result);

// $select= "SELECT personnel.*,districts.name_thd,amphures.name_tha,provinces.name_th FROM personnel
// WHERE per_id='$per_id'
// inner join districts on districts.id = personnel.cp_districts
// inner join amphures on amphures.id = personnel.cp_amphures
// inner join provinces on provinces.id = personnel.cp_provinces 
// ";
// $query= mysqli_query($connect, $select);




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
                        <h2 class="pageheader-title">ข้อมูลครุภัณฑ์</h2>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลหลัก</a></li>
                                    <li class="breadcrumb-item"><a href="#"
                                            class="breadcrumb-link">จัดการข้อมูลข้อมูลผู้ขาย</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลผู้ขายบริษัท/ห้าง/ร้าน</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">รายละเอียดข้อมูลผู้ขายบริษัท/ห้าง/ร้าน</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- striped table -->
            <!-- ============================================================== -->
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header">ข้อมูลครุภัณฑ์</h4>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                        <tbody>
                                <?php $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                            
                                <tr>
                                    <th style="width: 200px;">หมายเลขครุภัณฑ์</th>
                                    <td><?= $row['eq_number'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200 px;">ปีงบประมาณ</th>
                                    <td><?=$row['eq_fiscal_year'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">วัน/เดือน/ปี รับ</th>
                                    <td><?= $row['eq_buydate'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">สถานะ</th>
                                    <td><?= $row['eq_status_id'] ?></td>

                                </tr>
                                <tr>
                                    <th style="width: 200px;">ประเภทครุภัณฑ์</th>
                                    <td><?= $row['eq_type_id'] ?></td>
                                </tr>
                               
                                <tr>
                                    <th style="width: 200px;">รายการ</th>

                                    <td><?= $row['eq_sub_id']  ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 200px;">อายุการใช้งานตามที่กำหนด</th>

                                    <td><?= $row['eq_buydate']  ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 200px;">ขนาดและลักษณะ</th>
                                    <td><?= $row['eq_generation'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">ผู้ขาย(บริษัท,ห้าง,ร้าน)</th>
                                    <td><?= $row['eq_company'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">หน่วยงานที่รับผิดชอบ</th>
                                    <td><?= $row['eq_agency_id'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">สาขา</th>
                                    <td><?= $row['eq_branch_id'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">สถานที่ติดตั้ง/ใช้งาน</th>
                                    <td><?= $row['eq_location'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">งบที่ใช้</th>
                                    <td><?= $row['eq_money_id'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">หน่วยนับ</th>
                                    <td><?= $row['eq_unit_id'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">ราคาต่อหน่วย</th>
                                    <td><?= $row['eq_price'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">หมายเหตุ</th>
                                    <td><?= $row['eq_note'] ?></td>
                                </tr>
                               


                                <?php } ?>

                    </div>
                    </tbody>
                           
                    </table>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <a href="#" class="btn btn-primary">กลับหน้าแรก</a>

                        </div>
                    </div>
                </div>
            </div>
        



        </div>

    </div>
</body>

</html>