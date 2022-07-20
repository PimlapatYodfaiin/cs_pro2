<?php
// session_start();ๅๅ 
include 'dbconnect.php';

$select_company= "SELECT * FROM company";
$query_company= mysqli_query($connect, $select_company);

$result = mysqli_query($connect, $select_company);
$count = mysqli_num_rows($result);




if (isset($_POST['cp_name'])) {
    $cp_id  = $_POST['cp_id'];
    $cp_name = $_POST['cp_name'];
    $cp_list = $_POST['cp_list'];
    $cp_email = $_POST['cp_email'];
    $cp_fax = $_POST['cp_fax'];
    $cp_fax = $_POST['cp_tel'];
    $cp_address = $_POST['cp_address'];
    $cp_provinces = $_POST['provinces'];
    $cp_amphures = $_POST['amphures'];
    $cp_districts = $_POST['
    districts'];
   



    $insert = "INSERT INTO company SET
        cp_id  = '$cp_id ',
        cp_name = '$cp_name',
        cp_list = '$cp_list',
        cp_email = '$cp_email',
        cp_fax = '$cp_fax',
        cp_tel = '$cp_tel',
        cp_address = '$cp_address',
        cp_provinces = '$cp_provinces',
        cp_amphures = '$cp_amphures',
        cp_tumbons = '$cp_tumbons'";

    mysqli_query($connect, $insert);
    // echo '<script>window.location.href="personal.php"</script>';
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
                        <h2 class="pageheader-title">ข้อมูลบริษัท/ห้าง/ร้านผู้ขาย <a href="?page=add_company"
                                class="btn-info btn-sm">+เพิ่มข้อมูล</a></h2>


                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลหลัก</a></li>
                                    <li class="breadcrumb-item"><a href="#"
                                            class="breadcrumb-link">จัดการข้อมูลบริษัท/ห้าง/ร้านผู้ขาย</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ข้อมูลบริษัท/ห้าง/ร้านผู้ขาย
                                    </li>
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
                    <h5 class="card-header">ข้อมูลบริษัท/ห้าง/ร้าน</h5>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"> บริษัทผู้ขาย</th>
                                    <th scope="col"> ช่องทางการติดต่อ</th>
                                    <th scope="col"> ที่อยู่</th>
                                    <th scope="col"><i class="fa fa-list-ul"></i> รายละเอียด</th>
                                    <th scope="col"><i class="fa fa-edit "></i> เเก้ไขข้อมูล</th>
                                    <th scope="col"><i class="fa fa-archive "></i> ลบข้อมูล</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>

                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['cp_name'] ?></td>
                                    <td><?= $row['cp_tel'] ?></td>
                                    <td>
                                        <?= $row['cp_address'] . "&nbsp;&nbsp;" . $row['cp_districts'] . "&nbsp;&nbsp;" .  $row['cp_amphures'] . "&nbsp;&nbsp;" . $row['cp_provinces']. "&nbsp;&nbsp;" . $row['zip_code'] ?>
                                    </td>

                                    <td>
                                    <a href="page/view_company.php?cp_id=<?= $row['cp_id'] ?>"
                                            class="badge badge-pill badge-primary"><i class="fa fa-list-ul"> </i>
                                            รายละเอียด </a>
                                    </td>
                                    <td>
                                        <a href="page/edit_company.php?cp_id" class="badge badge-pill badge-warning"><i class="fa fa-edit"> </i>
                                            เเก้ไขข้อมูล </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-archive "></i> ลบ</button>

                                    </td>

                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end striped table -->



        </div>

    </div>
</body>

</html>