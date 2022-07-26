<?php
// session_start();
include 'dbconnect.php';
include 'ajax_provinces.php';



$select = "SELECT * FROM company";
$query = mysqli_query($connect, $select);

$sql = "SELECT * FROM provinces";
$query = mysqli_query($connect, $sql);



if (isset($_POST['cp_name'])) {
    $cp_name = $_POST['cp_name'];
    $cp_provinces = $_POST['provinces'];
    $cp_amphures = $_POST['amphures'];
    $cp_districts = $_POST['districts'];
    $cp_tel = $_POST['cp_tel'];
    $cp_fax = $_POST['cp_fax'];
    $cp_list = $_POST['cp_list'];
    $cp_email = $_POST['cp_email'];
    $cp_address = $_POST['cp_address'];
    $zip_code = $_POST['zip_code'];



    $insert = "INSERT INTO company SET
        cp_name = '$cp_name',
        cp_provinces = '$cp_provinces',
        cp_amphures = '$cp_amphures',
        cp_districts = '$cp_districts',
        cp_tel = '$cp_tel',
        cp_list = '$cp_list',
        cp_fax = '$cp_fax',
        cp_email = '$cp_email',
        cp_address = '$cp_address',
        zip_code = '$zip_code'";

    $result = mysqli_query($connect, $insert);

    // echo '<script>window.location.href="company.php"</script>';
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
                        <h2 class="pageheader-title">แบบฟอร์มเพิ่มข้อมูลบริษัท/ห้าง/ร้านผู้ขาย </h2>
                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลบริษัท/ห้าง/ร้านผู้ขาย</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">
                                            เพิ่มข้อมูล</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        แบบฟอร์มเพิ่มข้อมูลบริษัท/ห้าง/ร้านผู้ขาย</li>
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
                    <form action="" method="POST">
                        <div class="card">
                            <h4 class="card-header">เพิ่มข้อมูลบริษัท/ห้าง/ร้านผู้ขาย</h4>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="cp_name">ชื่อบริษัท</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="cp_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="cp_list">รายละเอียดการค้า</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea required="" placeholder="ใส่รายละเอียดการค้า" class="form-control" name="cp_list"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="cp_tel">ช่องทางการติดต่อ(โทรศัพท์)</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" class="form-control" name="cp_tel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="cp_email">Email</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="email" required="" class="form-control" name="cp_email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="cp_fax">Fax</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="cp_fax">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="cp_address">ที่อยู่</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea required="" placeholder="ใส่รายละเอียดที่อยู่" class="form-control" name="cp_address"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="provinces">จังหวัด</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="provinces" id="provinces" class="form-control">
                                        <option value="" selected disabled>เลือกจังหวัด</option>
                                        <?php foreach ($query as $value) { ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['name_th'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="amphures">อำเภอ</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="amphures" id="amphures" class="form-control">
                                        <!-- <option value="">เลือกอำเภอ</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="districts">ตำบล</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <!-- <select name="per_tumbons" id="input" class="form-control" required=""> </select> -->
                                    <select name="districts" id="districts" class="form-control">
                                        <!-- <option value="">เลือกตำบล</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">รหัสไปรษณีย์</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="zip_code" id="zip_code" type="text" required="" class="form-control">

                                </div>
                            </div>

                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button type="submit" class="btn btn-space btn-primary">บันทึก</button>
                                    <button class="btn btn-space btn-secondary">ยกเลิก</button>
                                </div>
                            </div>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script type="text/javascript">
                                $('#provinces').change(function() {
                                    var id_province = $(this).val();
                                    $.ajax({
                                        type: "POST",
                                        url: "page/ajax_provinces.php",
                                        data: {
                                            id: id_province,
                                            function: 'provinces'
                                        },
                                        success: function(data) {
                                            $('#amphures').html(data);
                                            $('#districts').html(' ');
                                            $('#zip_code').val(' ');
                                        }
                                    });
                                });

                                $('#amphures').change(function() {
                                    var id_amphures = $(this).val();
                                    $.ajax({
                                        type: "POST",
                                        url: "page/ajax_provinces.php",
                                        data: {
                                            id: id_amphures,
                                            function: 'amphures'
                                        },
                                        success: function(data) {

                                            $('#districts').html(data);
                                        }
                                    });
                                });

                                $('#districts').change(function() {
                                    var id_districts = $(this).val();
                                    $.ajax({
                                        type: "POST",
                                        url: "page/ajax_provinces.php",
                                        data: {
                                            id: id_districts,
                                            function: 'districts'
                                        },
                                        success: function(data) {

                                            // console.log(data);
                                            $('#zip_code').val(data);
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </form>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end valifation types -->
            <!-- ============================================================== -->
        </div>


    </div>


    </div>

</body>

</html>