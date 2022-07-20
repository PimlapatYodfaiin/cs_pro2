<?php 
include 'dbconnect.php';
$per_id = $_GET['per_id'];
$select = "SELECT * FROM personnel WHERE per_id='$per_id'";
$query = mysqli_query($connect, $select);
$row = mysqli_fetch_assoc($query);
$result = mysqli_query($connect, $select);
$count = mysqli_num_rows($result);

$select= "SELECT personnel.*,districts.name_thd,amphures.name_tha,provinces.name_th FROM personnel
WHERE per_id='$per_id'
inner join districts on districts.id = personnel.cp_districts
inner join amphures on amphures.id = personnel.cp_amphures
inner join provinces on provinces.id = personnel.cp_provinces 
";
$query= mysqli_query($connect, $select);




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
                        <h2 class="pageheader-title">ข้อมูลบุคลากร </h2>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลหลัก</a></li>
                                    <li class="breadcrumb-item"><a href="#"
                                            class="breadcrumb-link">จัดการข้อมูลบุคากร</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลบุคลากร</a>
                                    </li>

                                    <li class="breadcrumb-item active" aria-current="page">ข้อมูลส่วนตัวบุคลากร</li>
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
                    <h4 class="card-header">ข้อมูลส่วนตัวบุคลากร</h4>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <?php $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <th style="width: 40px;">รูปภาพ</th>
                                    <td>
                                        <img src="upload/<?php echo $row['per_image']?>"
                                            class="img-reponsive img-thumbnail" width="70px">
                                    </td>

                                </tr>

                                <tr>
                                    <th style="width: 200px;">ชื่อ-นามสกุล</th>
                                    <td><?= $row['per_title'] . $row['per_fname'] . "&nbsp;&nbsp;" . $row['per_lname'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200 px;">เพศ</th>
                                    <td><?=$row['per_gender'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">เลขประจำตัวประชาชน</th>
                                    <td><?= $row['per_idcard'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">วัน/เดือน/ปี ที่เกิด</th>
                                    <td><?= $row['per_birthday'] ?></td>

                                </tr>
                                <tr>
                                    <th style="width: 200px;">ช่องทางการติดต่อ</th>
                                    <td><?= $row['per_tel'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Email</th>
                                    <td><?= $row['per_email'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">ที่อยู่</th>

                                    <td><?= $row['per_address'] . "&nbsp;&nbsp;" . $row['per_districts'] . "&nbsp;&nbsp;" .  $row['per_amphures'] . "&nbsp;&nbsp;" . $row['per_provinces']. "&nbsp;&nbsp;" . $row['zip_code'] ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 200px;">Usernsme</th>
                                    <td><?= $row['per_user'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Password</th>
                                    <td><?= $row['per_pass'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">สถานะผู้ใช้งานระบบ</th>
                                    <td><?= $row['per_userlevel'] ?></td>
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
            <!-- ============================================================== -->
            <!-- end striped table -->



        </div>

    </div>
</body>

</html>