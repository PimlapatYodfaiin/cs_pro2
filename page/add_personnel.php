<?php
// session_start();
include 'dbconnect.php';
include 'ajax.php';

$select_users = "SELECT * FROM users";
$query_user = mysqli_query($connect, $select_users);

$select_titles = "SELECT * FROM titles";
$query_titles = mysqli_query($connect, $select_titles);

$select_userlevels = "SELECT * FROM userlevels";
$query_userlevels = mysqli_query($connect, $select_userlevels);

$sql = "SELECT * FROM provinces";
$query = mysqli_query($connect, $sql);

if (isset($_POST) && !empty($_POST)) {
    // echo'<pre>';
    // print_r($_FILES);
    // echo'</pre>';
    // exit();
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


    //     if(isset($_FILES['image']['name'])&& !empty($_FILES['image']['name'])){
    //     $extension = array("jpeg","jpg","png");
    //     $target = 'upload/';
    //     $filename = $_FILES['image']['name'];
    //     $filetmp =$_FILES['image']['tmp_name'];
    //     $ext= pathinfo($filename,PATHINFO_EXTENSION);
    //     if(in_array($ext,$extension)){
    //         if(!file_exists($target.$filename)){
    //             if(move_uploaded_file($filetmp.$target.$filename)){
    //                 $filename =$filename;
    //             }else{
    //                 echo 'เพิ่มไฟล์เข้า folder ไม่สำเร็จ';
    //             }
    //         }else{
    //             $newfilename =time().$filename;
    //             if(move_uploaded_file($filetmp.$target.$newfilename)){
    //                 $filename =$newfilename;
    //             }else{

    //                 echo 'เพิ่มไฟล์เข้า folder ไม่สำเร็จ';

    //         }
    //     }
    //     }else{
    //         echo'ประเภทไฟล์ไม่ถูกต้อง';
    //     }
    // }else{
    //     $filename ="";
    // }
    // echo $filename;




    $insert = "INSERT INTO users SET
        user_title_id = '$user_title_id',
        user_fname = '$user_fname',
        user_lname = '$user_lname',
        user_address = '$user_address', 
        user_idcard = '$user_idcard',
        user_birthday = '$user_birthday',
        user_provinces = '$user_provinces',
        user_amphures = '$user_amphures',
        user_districts = '$user_districts',
        user_tel = '$user_tel',
        user_email = '$user_email',
        user_pass = MD5('$user_pass'),
        user_username = ('$user_username'),
        user_userlevel_id = '$user_userlevel_id',
        user_zip_code = '$user_zip_code'";

    $result = mysqli_query($connect, $insert);

    // echo '<script>window.location.href="ยำพฟ.php"</script>';
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <h4 class="card-header">เพิ่มข้อมูลบุคลากร</h4>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="image">รูปภาพ</label>
                                <img id="preview">
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_username">Username</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="user_username" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_pass">Password</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="password" required="" placeholder="Password" name="user_pass" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_userlevel_id">userlevel</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="user_userlevel_id" id="input" class="form-control" required="">
                                        <option value="" disabled selected hidden> กรุณาเลือก </option>
                                        <?php while ($res_userlevels = mysqli_fetch_array($query_userlevels)) { ?>
                                            <option value="<?= $res_userlevels['userlevel_name'] ?>">
                                                <?= $res_userlevels['userlevel_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_title_id" class="col-12 col-sm-3 col-form-label text-sm-right">คำนำหน้าชื่อ</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="user_title_id" id="input" class="form-control" required="">
                                        <option value="" disabled selected hidden> กรุณาเลือก </option>
                                        <?php while ($res_titles = mysqli_fetch_array($query_titles)) { ?>
                                            <option value="<?= $res_titles['title_name'] ?>">
                                                <?= $res_titles['title_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_fname">ชื่อ</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="user_fname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_lname">นามสกุล</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="user_lname">
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                        <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="radio-inline" class="custom-control-input"><span
                                        class="custom-control-label">Option 3</span>
                                </label>
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_gender">เพศ</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="radio" required="" class="form-control" name="user_gender" value="1">ชาย
                                <input type="radio" required="" class="form-control" name="user_gender" value="2">หญิง
                            </div>
                        </div> -->


                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_idcard">เลขประจำตัวประชาชน</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="user_idcard">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_birthday">วัน/เดือน/ปี
                                    ที่เกิด</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="date" required="" class="form-control" name="user_birthday">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_tel">ช่องทางการติดต่อ</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" class="form-control" name="user_tel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_email">Email</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="email" required="" class="form-control" name="user_email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="user_address">ที่อยู่</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <textarea required="" placeholder="ใส่รายละเอียดที่อยู่" class="form-control" name="user_address"></textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="provinces">จังหวัด</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="provinces" id="provinces" class="form-control">
                                        <option value="" selected disabled>เลือกจังหวัด</option>
                                      
                                        <?php while ($res_provinces = mysqli_fetch_assoc($query)) : ?>
                                                <option value="<?= $res_provinces['id'] ?>"><?= $res_provinces['name_th'] ?>
                                                </option>
                                            <?php endwhile; ?>
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
                                    
                                    <!-- <select name="user_tumbons" id="input" class="form-control" required=""> </select> -->
                                    <select name="districts" id="districts" class="form-control">
                                        <!-- <option value="">เลือกตำบล</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">รหัสไปรษณีย์</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input name="user_zip_code" id="zip_code" type="text" required="" class="form-control">

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
                            </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onlode = fuction(e) {
                    $('#preview').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.file[0]);

            }
            $("#image").chang(function()) {
                readerURL(this);
            }
        }
    </script> -->
</body>

</html>