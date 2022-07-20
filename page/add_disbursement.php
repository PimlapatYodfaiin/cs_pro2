<?php
include 'dbconnect.php';

$select_title = "SELECT * FROM titles";
$query_title = mysqli_query($connect, $select_title);

$select_position = "SELECT * FROM positions";
$query_position = mysqli_query($connect, $select_position);




if (isset($_POST['submit'])) {
    $db_title = $_POST['titles'];
    $db_fname = $_POST['db_fname'];
    $db_lname = $_POST['db_lname'];
    $db_position = $_POST['positions'];

    $insert = "INSERT INTO `disbursements` SET       
    db_title ='$db_title',        
    db_fname ='$db_fname',
    db_lname ='$db_lname', 
    db_position ='$db_position',
    db_status ='1'
     ";

    $result = mysqli_query($connect, $insert);
    echo '<script>window.location.href= "?page=disbursement";</script>';
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
         
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">แบบฟอร์มเบิกจ่ายครุภัณฑ์ </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">เบิกจ่ายครุภัณฑ์</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">เพิ่มรายการเบิกจ่ายครุภัณฑ์</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">แบบฟอร์มเบิกจ่ายครุภัณฑ์</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <form id="validationform" method="POST">
                        <div class="card">
                            <h5 class="card-header">รายละเอียดผู้เบิกจ่ายครุภัณฑ์</h5>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">คำนำหน้า(ผู้เบิก)</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="titles" id="titles" class="form-control" required="">
                                            <option value="" disabled selected hidden> กรุณาเลือก </option>
                                            <?php while ($res_title = mysqli_fetch_array($query_title)) { ?>
                                                <option value="<?= $res_title['title_name'] ?>">
                                                    <?= $res_title['title_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">ชื่อ(ผู้เบิก)</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" class="form-control" name="db_fname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="per_lname">นามสกุล</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" class="form-control" name="db_lname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">ตำแหน่ง</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <!-- <input type="text" required="" placeholder="Type something" class="form-control"> -->
                                        <select name="positions" id="positions" class="form-control" required="">
                                            <option value="" disabled selected hidden> กรุณาเลือก </option>
                                            <?php while ($res_position = mysqli_fetch_array($query_position)) { ?>
                                                <option value="<?= $res_position['position_name'] ?>">
                                                    <?= $res_position['position_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                        <!-- <a  href="mpdf/dis.pdf" class="btn btn-rounded btn-success">ดำเนินการ</a> -->
                                        <button href="" type="submit" name="submit" class="btn btn-rounded btn-primary">Submit</button>
                                        <button class="btn btn-rounded btn-secondary">Cancel</button>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>