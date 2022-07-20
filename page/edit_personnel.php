<?php
// session_start();
include 'dbconnect.php';
include 'ajax.php';


if(isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);
    $select_a = "SELECT * FROM users WHERE user_id ='$user_id'";
    $query_a = mysqli_query($connect, $select_a);
$res_users = mysqli_fetch_assoc($query_a);



// $user_id = $_GET['user_id'];
// $select_a = "SELECT * FROM users WHERE user_id ='$user_id'";
// $query_a = mysqli_query($connect, $select_a);
// $res_users = mysqli_fetch_assoc($query_a);


$select_userlevels = "SELECT * FROM userlevels";
$query_userlevels = mysqli_query($connect, $select_userlevels);

$select_titles = "SELECT * FROM `titles`";
$query_titles = mysqli_query($connect, $select_titles);

$sql = "SELECT * FROM provinces";
$query = mysqli_query($connect, $sql);


$sql_amphures = "SELECT * FROM `amphures`";
$query_amphures = mysqli_query($connect, $sql_amphures);

$sql_districts = "SELECT * FROM `districts`";
$query_districts = mysqli_query($connect, $sql_districts);
}


// if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST['submit'])) {
    $user_title_id = $_POST['user_title_id'];
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_username = $_POST['user_username'];
    
    $user_idcard = $_POST['user_idcard'];
    $user_birthday = $_POST['user_birthday'];
    $user_provinces = $_POST['provinces'];
    $user_address = $_POST['user_address'];
    $user_amphures = $_POST['amphures'];
    $user_districts = $_POST['districts'];
    $user_tel = $_POST['user_tel'];
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $user_userlevel_id = $_POST['user_userlevel_id'];
    $user_zip_code = $_POST['user_zip_code'];
   

    if ($_POST) {
        if (isset($_FILES['image'])) {
            $name_file =  $_FILES['image']['name'];
            $tmp_name =  $_FILES['image']['tmp_name'];
            $locate_img = "upload/";
            move_uploaded_file($tmp_name, $locate_img . $name_file);
        }
    }

    $insert = "UPDATE users SET
        user_title_id = '$user_title_id',
        user_fname = '$user_fname',
        user_lname = '$user_lname',
        user_address = '$user_address',
        user_username = '$user_username',
        user_idcard = '$user_idcard',
        user_birthday = '$user_birthday',
        user_provinces = '$user_provinces',
        user_amphures = '$user_amphures',
        user_districts = '$user_districts',
        user_tel = '$user_tel',
        user_email = '$user_email',
        user_pass = MD5('$user_pass'),
        user_userlevel_id = '$user_userlevel_id',
        user_zip_code = '$user_zip_code'
        WHERE user_id = '$user_id'";

    mysqli_query($connect, $insert);
    echo '<script>window.location.href="?page=personnel"</script>';
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
                        <h2 class="pageheader-title">แบบฟอร์มเเก้ไขข้อมูลบุคลากร </h2>
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <h4 class="card-header">เพิ่มข้อมูลบุคลากร</h4>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="image">รูปภาพ</label>
                                <img id="preview">
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="file" class="form-control" name="image" id="image" multiple="multiple" VALUE="<?php echo $res_users["user_image"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_username">Username</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="user_username" placeholder="Username" VALUE="<?php echo $res_users["user_username"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_pass">Password</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="password" required="" placeholder="Password" name="user_pass" class="form-control" VALUE="<?php echo $res_users["user_pass"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_userlevel">userlevel</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="user_userlevel_id" id="input" class="form-control" required="required">
                                        <option selected="" disabled>----- กรุณาเลือก ----- </option>
                                        <?php while ($res_userlevels = mysqli_fetch_assoc($query_userlevels)) { ?>
                                            <option value="<?= $res_userlevels['userlevel_name'] ?>" <?php if ($res_userlevels['userlevel_name'] == $res_users['user_userlevel_id']) {
                                                                                                            echo "selected";
                                                                                                        } ?>>
                                                <?= $res_userlevels['userlevel_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_title_id" class="col-12 col-sm-3 col-form-label text-sm-right">คำนำหน้าชื่อ</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="user_title_id" id="input" class="form-control" required="required">
                                        <option selected="" disabled>----- กรุณาเลือก ----- </option>

                                        <?php while ($res_titles = mysqli_fetch_assoc($query_titles)) : ?>
                                            <option value="<?= $res_titles['title_name'] ?>" <?php if ($res_titles['title_name'] == $res_users['user_title_id']) {
                                                                                                    echo "selected";
                                                                                                } ?>> <?= $res_titles['title_name'] ?>

                                            </option>
                                        <?php endwhile; ?>
                                    </select>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_fname">ชื่อ</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="user_fname"  VALUE="<?php echo $res_users["user_fname"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_lname">นามสกุล</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="user_lname"  VALUE="<?php echo $res_users["user_lname"] ?>">
                                </div>
                            </div>





                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_idcard">เลขประจำตัวประชาชน</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="user_idcard" VALUE="<?php echo $res_users["user_idcard"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_birthday">วัน/เดือน/ปีที่เกิด</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="date" required="" class="form-control" name="user_birthday" VALUE="<?php echo $res_users["user_birthday"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_tel">ช่องทางการติดต่อ</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="user_tel" VALUE="<?php echo $res_users["user_tel"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_email">Email</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="email" required="" class="form-control" name="user_email" VALUE="<?php echo $res_users["user_email"] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_address">ที่อยู่</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea name="user_address" required="" placeholder="ใส่รายละเอียดที่อยู่" class="form-control"  ><?php echo $res_users["user_address"] ?></textarea>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="provinces">จังหวัด</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="provinces" id="provinces" class="form-control" required="required">
                                        <option selected="" selected disabled>เลือกจังหวัด</option>

                                        <?php while ($res_provinces = mysqli_fetch_assoc($query)) : ?>
                                            <option value="<?= $res_provinces['id'] ?>" <?php if ($res_provinces['id'] == $res_users["user_provinces"]) {
                                                                                            echo "selected";
                                                                                        } ?>><?= $res_provinces['name_th'] ?>
                                            </option>
                                        <?php endwhile; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="amphures">อำเภอ</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="amphures" id="amphures" class="form-control">
                                        <option value="">เลือกอำเภอ</option>
                                        <?php while ($res_amphures = mysqli_fetch_assoc($query_amphures)) : ?>
                                            <option value="<?= $res_amphures['id'] ?>" <?php if ($res_amphures['id'] == $res_users["user_amphures"]) {
                                                                                            echo "selected";
                                                                                        } ?>><?= $res_amphures['name_tha'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="districts">ตำบล</label>
                                <div class="col-12 col-sm-8 col-lg-6">

                                    <select name="districts" id="districts" class="form-control">
                                        <?php while ($res_districts = mysqli_fetch_assoc($query_districts)) : ?>
                                            <option value="<?= $res_districts['id'] ?>" <?php if ($res_districts['id'] == $res_users["user_districts"]) {
                                                                                            echo "selected";
                                                                                        } ?>><?= $res_districts['name_thd'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">รหัสไปรษณีย์</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="user_zip_code" id="zip_code" type="text" required="" class="form-control" VALUE="<?php echo $res_users["user_zip_code"] ?>">
                                </div>
                            </div>

                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button type="submit" name="submit" class="btn btn-space btn-primary">บันทึก</button>
                                    <button class="btn btn-space btn-secondary">ยกเลิก</button>
                                </div>
                            </div>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script type="text/javascript">
                                $('#provinces').change(function() {
                                    var id_province = $(this).val();
                                    $.ajax({
                                        type: "POST",
                                        url: "page/ajax.php",
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
                                        url: "page/ajax.php",
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
                                        url: "page/ajax.php",
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


                                  // คอมม้า

                                  function updateTextView(_obj) {
                                        var num = getNumber(_obj.val());
                                        if (num == 0) {
                                            _obj.val('');
                                        } else {
                                            _obj.val(num.toLocaleString());
                                        }
                                    }

                                    function getNumber(_str) {
                                        var arr = _str.split('');
                                        var out = new Array();
                                        for (var cnt = 0; cnt < arr.length; cnt++) {
                                            if (isNaN(arr[cnt]) == false) {
                                                out.push(arr[cnt]);
                                            }
                                        }
                                        return Number(out.join(''));
                                    }
                                    $(document).ready(function() {
                                        $('input[type=text]').on('keyup', function() {
                                            updateTextView($(this));
                                        });
                                    });
                            </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <script type="text/javascript">
        < script >
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    preview.src = URL.createObjectURL(file)
                }
            }
    </> -->

</body>

</html>