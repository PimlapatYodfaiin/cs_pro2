<?php
// session_start();
include 'dbconnect.php';

$select_per = "SELECT * FROM personnel";
$query_per = mysqli_query($connect, $select_per);

$select_title = "SELECT * FROM title";
$query_title = mysqli_query($connect, $select_title);

$select_userlevel = "SELECT * FROM userlevel";
$query_userlevel = mysqli_query($connect, $select_userlevel);

$sql = "SELECT * FROM provinces";
$query = mysqli_query($connect, $sql);



// if (isset($_POST['per_user'])) {
//     $per_title = $_POST['per_title'];
//     $per_fname = $_POST['per_fname'];
//     $per_lname = $_POST['per_lname'];

//     $per_user = $_POST['per_user'];
//     $per_idcard = $_POST['per_idcard'];
//     $per_birthday = $_POST['per_birthday'];
//     $per_provinces = $_POST['Ref_prov_id'];
//     $per_address = $_POST['per_address'];
//     $per_amphures = $_POST['per_amphures'];
//     $per_tumbons = $_POST['per_tumbons'];
//     $per_tel = $_POST['per_tel'];
//     $per_email = $_POST['per_email'];
//     $per_pass = $_POST['per_pass'];
//     $per_userlevel = $_POST['per_userlevel'];
//     $zip_code = $_POST['zip_code'];


//     $insert = "INSERT INTO personnel SET
//         per_title = '$per_title',
//         per_fname = '$per_fname',
//         per_lname = '$per_lname',
//         per_address = '$per_address',
//         per_user = '$per_user',
//         per_idcard = '$per_idcard',
//         per_birthday = '$per_birthday',
//         per_provinces = '$per_provinces',
//         per_amphures = '$per_amphures',
//         per_tumbons = '$per_tumbons',
//         per_tel = '$per_tel',
//         per_email = '$per_email',
//         per_pass = MD5('$per_pass'),
//         per_userlevel = '$per_userlevel',
//         zip_cod = '$zip_code'";

//     $result = mysqli_query($connect, $insert);

//     echo '<script>window.location.href="personal.php"</script>';
// }
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
                        <h2 class="pageheader-title">แบบฟอร์มเพิ่มข้อมูลบุคลากร </h2>
                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จัดการข้อมูลบุคลากร</a></li>
                                    <li class="breadcrumb-item"><a href="?page=personnel" class="breadcrumb-link">
                                            เพิ่มข้อมูล</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">แบบฟอร์มเพิ่มข้อมูลบุคลากร
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
                    <form action="" method="POST">
                        <div class="card">
                            <h5 class="card-header">เพิ่มข้อมูลบุคลากร</h5>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_user">Username</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="per_user" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_pass">Password</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="password" required="" placeholder="Password" name="per_pass" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_userlevel">userlevel</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="per_userlevel" id="input" class="form-control" required="">
                                        <option value="" disabled selected hidden> กรุณาเลือก </option>
                                        <?php while ($res_userlevel = mysqli_fetch_array($query_userlevel)) { ?>
                                            <option value="<?= $res_userlevel['userlevel_name'] ?>">
                                                <?= $res_userlevel['userlevel_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="per_title" class="col-12 col-sm-3 col-form-label text-sm-right">คำนำหน้าชื่อ</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="per_title" id="input" class="form-control" required="">
                                        <option value="" disabled selected hidden> กรุณาเลือก </option>
                                        <?php while ($res_title = mysqli_fetch_array($query_title)) { ?>
                                            <option value="<?= $res_title['title_name'] ?>">
                                                <?= $res_title['title_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_fname">ชื่อ</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="per_fname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_lname">นามสกุล</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="per_lname">
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                        <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="radio-inline" class="custom-control-input"><span
                                        class="custom-control-label">Option 3</span>
                                </label>
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_gender">เพศ</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="radio" required="" class="form-control" name="per_gender" value="1">ชาย
                                <input type="radio" required="" class="form-control" name="per_gender" value="2">หญิง
                            </div>
                        </div> -->


                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_idcard">เลขประจำตัวประชาชน</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="per_idcard">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_birthday">วัน/เดือน/ปี
                                    ที่เกิด</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="date" required="" class="form-control" name="per_birthday">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_tel">ช่องทางการติดต่อ</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="per_tel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_email">Email</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="email" required="" class="form-control" name="per_email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_address">ที่อยู่</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea required="" placeholder="ใส่รายละเอียดที่อยู่" class="form-control" name="per_address"></textarea>
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
                                        url: "ajax_address2_db.php",
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
                                        url: "ajax_address2_db.php",
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
                                        url: "ajax_address2_db.php",
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
