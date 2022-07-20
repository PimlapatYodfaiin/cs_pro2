<?php 
include 'dbconnect.php';
$cp_id = $_GET['cp_id'];
$select = "SELECT * FROM company WHERE cp_id ='$cp_id'";
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
                        <h2 class="pageheader-title">ข้อมูลผู้ขายบริษัท/ห้าง/ร้าน</h2>

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
                    <h4 class="card-header">ข้อมูลผู้ขายบริษัท/ห้าง/ร้าน</h4>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <?php $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                            
                                <tr>
                                    <th style="width: 200px;">ชื่อ-ชื่อบริษัท</th>
                                    <td><?= $row['cp_name'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200 px;">รายละเอียดการค้า</th>
                                    <td><?=$row['cp_list'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">ช่องทางการติดต่อ(โทรศัพท์)</th>
                                    <td><?= $row['cp_tel'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Email</th>
                                    <td><?= $row['cp_email'] ?></td>

                                </tr>
                                <tr>
                                    <th style="width: 200px;">Fax</th>
                                    <td><?= $row['cp_fax'] ?></td>
                                </tr>
                               
                                <tr>
                                    <th style="width: 200px;">ที่อยู่</th>

                                    <td><?= $row['cp_address'] . "&nbsp;&nbsp;" . $row['cp_districts'] . "&nbsp;&nbsp;" .  $row['cp_amphures'] . "&nbsp;&nbsp;" . $row['cp_provinces']. "&nbsp;&nbsp;" . $row['zip_code'] ?>
                                    </td>
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