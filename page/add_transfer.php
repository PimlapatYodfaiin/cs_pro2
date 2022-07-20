<?php
include 'dbconnect.php';

$select_agc = "SELECT * FROM `agencys`";
$query_agc = mysqli_query($connect, $select_agc);

$select_agency = "SELECT * FROM `agencys`";
$query_agency = mysqli_query($connect, $select_agency);



if (isset($_POST['submit_add'])) {
    $tr_document_num = $_POST['tr_document_num'];
    $tr_date = $_POST['tr_date'];
    $tr_location = $_POST['tr_location'];
    $tr_note = $_POST['tr_note'];
    $tr_agency_old = $_POST['tr_agency_old'];
    $tr_branch_old = $_POST['tr_branch_old'];
    $tr_agency_new = $_POST['tr_agency_new'];
    $tr_branch_new = $_POST['tr_branch_new'];



    $insert = "INSERT INTO `transfers` SET       
        tr_document_num ='$tr_document_num',        
        tr_date ='$tr_date',
        tr_note ='$tr_note', 
        tr_agency_old ='$tr_agency_old', 
        tr_branch_old ='$tr_branch_old', 
        tr_agency_new ='$tr_agency_new', 
        tr_branch_new ='$tr_branch_new',
        tr_document_status ='1',
        tr_approve_status = '1',
        tr_location ='$tr_location' ";

    $result = mysqli_query($connect, $insert);
    echo '<script>window.location.href= "?page=transfer";</script>';
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
                        <h2 class="pageheader-title">แบบฟอร์มเพิ่มข้อมูลโอนย้ายครุภัณฑ์ </h2>
                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">โอนย้ายครุภัณฑ์</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">เพิ่มรายการโอนย้าย</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        แบบฟอร์มเพิ่มข้อมูลโอนย้ายครุภัณฑ์</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">รายละเอียดรายการโอนย้ายครุภัณฑ์</h5>
                        <div class="card-body">
                            <form action="" method="POST" id="validationform" data-parsley-validate="" novalidate="">
                                <div class="row justify-content-around">
                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label for="validationCustom04">เลขที่เอกสาร</label>
                                        <input name="tr_document_num" type="text" class="form-control" id="validationCustom04" placeholder="เลขที่เอกสาร" required>
                                    </div>
                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label>วันที่โอน</label>
                                        <input name="tr_date" type="date" required="" class="form-control">
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label for="validationCustom04">หน่วยงานที่โอน</label>
                                        <select name="tr_agency_old" id="agencys" class="form-control" required="required">
                                            <option selected="" disabled> เลือกหน่วยงานที่โอน </option>
                                            <?php while ($res_agc = mysqli_fetch_assoc($query_agc)) : ?>
                                                <option value="<?= $res_agc['agency_id'] ?>"><?= $res_agc['agency_name'] ?> </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label for="validationCustom04">สาขาที่ที่โอน</label>
                                        <select name="tr_branch_old" id="branchs" class="form-control" required="required"> </select>
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label for="validationCustom04">หน่วยงานที่รับโอน</label>
                                        <select name="tr_agency_new" id="agencys1" class="form-control" required="required">
                                            <option selected="" disabled> เลือกหน่วยงานที่รับโอน </option>
                                            <?php while ($res_agency = mysqli_fetch_assoc($query_agency)) : ?>
                                                <option value="<?= $res_agency['agency_id'] ?>"><?= $res_agency['agency_name'] ?> </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label for="validationCustom04">สาขาที่รับโอน</label>
                                        <select name="tr_branch_new" id="branchs1" class="form-control" required="required"> </select>
                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label>ใช้ประจำที่ไหน(ที่ใหม่)</label>
                                        <input name="tr_location" type="text" required="" placeholder="เช่น ตึก 23" class="form-control">
                                    </div>

                                    <div class="col col-12 col-sm-5 mb-3">
                                        <label>หมายเหตุ</label>
                                        <div>
                                            <textarea name="tr_note" type="text" required="" placeholder="ใส่รายละเอียดหมายเหตุ" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                        <button name="submit_add" type="submit" class="btn btn-rounded btn-primary">บันทึก</button>
                                        <button class="btn btn-rounded btn-secondary">ยกเลิก</button>
                                    </div>
                                </div>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script type="text/javascript">
                                    $('#types').change(function() {
                                        var id_types = $(this).val();
                                        $.ajax({
                                            type: "POST",
                                            url: "page/ajax.php",
                                            data: {
                                                id: id_types,
                                                function: 'types'
                                            },
                                            success: function(data) {
                                                $('#subcategorys').html(data);

                                            }
                                        });
                                    });


                                    $('#agencys').change(function() {
                                        var id_agencys = $(this).val();
                                        $.ajax({
                                            type: "POST",
                                            url: "page/ajax.php",
                                            data: {
                                                id: id_agencys,
                                                function: 'agencys'
                                            },
                                            success: function(data) {
                                                $('#branchs').html(data);

                                            }
                                        });
                                    });

                                    $('#agencys1').change(function() {
                                        var id_agencys1 = $(this).val();
                                        $.ajax({
                                            type: "POST",
                                            url: "page/ajax.php",
                                            data: {
                                                id: id_agencys1,
                                                function: 'agencys1'
                                            },
                                            success: function(data) {
                                                $('#branchs1').html(data);

                                            }
                                        });
                                    });
                                </script>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


</body>

</html>