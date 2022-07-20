<?php
include 'dbconnect.php';

$select_agc = "SELECT * FROM `agencys` ";
$query_agc = mysqli_query($connect, $select_agc);

$select_agency = "SELECT * FROM `agencys` ";
$query_agency = mysqli_query($connect, $select_agency);

$select_branch = "SELECT * FROM `branchs`";
$query_branch = mysqli_query($connect, $select_branch);

$select_branch1 = "SELECT * FROM `branchs`";
$query_branch1 = mysqli_query($connect, $select_branch1);

if (isset($_GET['transfer_id'])) {
    $transfer_id = mysqli_real_escape_string($connect, $_GET['transfer_id']);
    $select_transfer = "SELECT * FROM `transfers` WHERE transfer_id='$transfer_id'";
    $query_transfer = mysqli_query($connect, $select_transfer);
    $res_transfer = mysqli_fetch_array($query_transfer);

    $sql = "SELECT * FROM `tranfer_add` WHERE transfer_id='$transfer_id'";
    $result = mysqli_query($connect, $sql);
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
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">แบบฟอร์มเพิ่มข้อมูลโอนย้ายครุภัณฑ์ </h2>
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
                                        <input value="<?= $res_transfer['tr_document_num'] ?>" name="tr_document_num" type="text" class="form-control" id="validationCustom04" placeholder="เลขที่เอกสาร" required>
                                    </div>
                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label>วันที่โอน</label>
                                        <input value="<?= $res_transfer['tr_date'] ?>" name="tr_date" type="date" required="" class="form-control">
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label for="validationCustom04">หน่วยงานที่โอน</label>
                                        <select name="agencys" id="agencys" class="form-control" required="required">
                                            <option selected="" disabled> เลือกหน่วยงานที่โอน </option>
                                            <?php while ($res_agc = mysqli_fetch_assoc($query_agc)) : ?>
                                                <option value="<?= $res_agc['agency_id'] ?>" <?php if ($res_agc['agency_id'] == $res_transfer["tr_agency_old"]) {
                                                                                                        echo "selected";
                                                                                                    } ?>><?= $res_agc['agency_name'] ?> </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label for="validationCustom04">สาขาที่ที่โอน</label>
                                        <select name="branchs" id="branchs" class="form-control" required="required"> 
                                            
                                        <?php while ($res_branch = mysqli_fetch_assoc($query_branch)) : ?>
                                                <option value="<?= $res_branch['branch_id'] ?>" <?php if ($res_branch['branch_id'] == $res_transfer["tr_branch_old"]) {
                                                                                                    echo "selected";
                                                                                                } ?>><?= $res_branch['branch_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label for="validationCustom04">หน่วยงานที่รับโอน</label>
                                        <select name="agencys1" id="agencys1" class="form-control" required="required">
                                            <option selected="" disabled> เลือกหน่วยงานที่รับโอน </option>
                                            <?php while ($res_agency = mysqli_fetch_assoc($query_agency )) : ?>
                                                <option value="<?= $res_agency['agency_id'] ?>" <?php if ($res_agency['agency_id'] == $res_transfer["tr_agency_new"]) {
                                                                                                        echo "selected";
                                                                                                    } ?>><?= $res_agency['agency_name'] ?> </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label for="validationCustom04">สาขาที่รับโอน</label>
                                        <select name="branchs1" id="branchs1" class="form-control" required="required"> 
                                        <?php while ($res_branch1 = mysqli_fetch_assoc($query_branch1)) : ?>
                                                <option value="<?= $res_branch1['branch_id'] ?>" <?php if ($res_branch1['branch_id'] == $res_transfer["tr_branch_new"]) {
                                                                                                    echo "selected";
                                                                                                } ?>><?= $res_branch1['branch_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class=" col-12 col-sm-5 mb-3">
                                        <label>ใช้ประจำที่ไหน(ที่ใหม่)</label>
                                        <input value="<?= $res_transfer['tr_location'] ?>" name="tr_location" type="text" required="" placeholder="เช่น ตึก 23" class="form-control">
                                    </div>

                                    <div class="col col-12 col-sm-5 mb-3">
                                        <label>หมายเหตุ</label>
                                        <div>
                                            <textarea value="" name="tr_note" type="text" required="" placeholder="ใส่รายละเอียดหมายเหตุ" class="form-control"><?= $res_transfer['tr_note'] ?></textarea>
                                        </div>
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

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h4 class="card-header">รายการครุภัณฑ์ &nbsp<a href="?page=add_transfer1&transfer_id=<?= $res_transfer['transfer_id'] ?>" class="btn-success btn-sm">+เพิ่มข้อมูล
                            </a>
                        </h4>

                        <div class="card-body">
                            <div>
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped table-bordered first">

                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr role="row">

                                                            <th style="width: 5px;">#</th>
                                                            <th style="width: 150px;">หมายเลขครุภัณฑ์</th>
                                                            <th style="width: 200px;">รายการครุภัณฑ์</th>
                                                            <th style="width: 40px;">จำนวน</th>
                                                            <th style="width: 40px;">หน่วยนับ</th>
                                                            <th style="width: 40px;">หมายเหตุ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1;
                                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                                            <tr>
                                                                <td><?= $i++; ?></td>
                                                                <td><?= $row['tfeq_id'] ?></td>
                                                                <td><?= $row['listtf'] ?></td>
                                                                <td><?= $row['amount'] ?></td>
                                                                <td><?= $row['unit'] ?></td>
                                                                <td><?= $row['note'] ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

                                                </table>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col align-self-center">
                <button type="smubit" value="บันทึกข้อมูล" class="btn btn-space btn-primary">อัพเดทข้อมูล</button>
                <button class="btn btn-space btn-secondary">ยกเลิก</button>
            </div>
        </div>

    </div>

    </div>
</body>

</html>