<?php
include 'dbconnect.php';

$select_tans = "SELECT transfers.*,agencys.agency_name,branchs.branch_name FROM transfers
INNER JOIN agencys ON agencys.agency_id = transfers.tr_agency_old
INNER JOIN branchs ON branchs.branch_id = transfers.tr_agency_new";

$query_tans = mysqli_query($connect, $select_tans);
$result = mysqli_query($connect, $select_tans);
$count = mysqli_num_rows($result);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
</head>

<body>
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">โอนย้ายครุภัณฑ์
                            <!-- <a href="?page=add_transfer" class="btn-success btn-sm">+เพิ่มข้อมูล</a> -->
                        </h2>


                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">โอนย้ายครุภัณฑ์</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูลโอนย้ายครุภัณฑ์
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h4 class="card-header"> <b>โอนย้ายครุภัณฑ์</b></h4>
                        <div class="card-body">
                            <form action="">
                               
                                <div class="form-row">
                                    <div class="col col-lg-2">
                                        <label for="validationCustom03">ปีที่โอน</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="ปีที่โอน" required>
                                    </div>

                                    <div class="col col-lg-2">
                                        <label for="validationCustom04">เลขที่เอกสาร</label>
                                        <input type="text" class="form-control" id="validationCustom04" placeholder="เลขที่เอกสาร" required>
                                    </div>

                                    <div class="col-4">
                                        <label for="validationCustom04">หน่วยงานที่โอน</label>
                                        <input type="text" class="form-control" id="validationCustom04" placeholder="หน่วยงานที่โอน" required>
                                    </div>

                                    <div class="col-4">
                                        <label for="validationCustom03">หน่วยงานที่รับโอน</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="หน่วยงานที่รับโอน" required>
                                    </div>

                                    <div class="col col-lg-2">
                                        <label for="validationCustom03">สถานะ</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="สถานะ" required>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h4 class="card-header">
                            <a href="?page=add_transfer" class="btn-success btn-sm">+ เพิ่มข้อมูล</a>
                        </h4>
                        <div class="card-body">
                            <h4 class="card-header"> <b>รายการโอนย้ายครุภัณฑ์</b></h4>
                            <div>

                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped table-bordered first">
                                                <!-- <table id="example" class="table table-striped table-bordered second dataTable" style="width: 100%;" role="grid" aria-describedby="example_info"> -->
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr role="row">

                                                            <th style="width: 5px;"><b> # </b></th>
                                                            <th style="width: 40px;"><b>ปีที่โอน</b></th>
                                                            <th style="width: 40px;"><b>เลขที่เอกสาร</b></th>
                                                            <th style="width: 70px;"><b>หน่วยงานที่โอน</b></th>
                                                            <th style="width: 70px;"><b>หน่วยงานที่รับโอน</b></th>
                                                            <th style="width: 70px;"><b>สถานะเอกสาร</b></th>
                                                            <th style="width: 70px;"><b>สถานะการอนุมัติ</b></th>
                                                            <th style="width: 70px;"><b>จัดการข้อมูล</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1;
                                                        while ($row = mysqli_fetch_assoc($result)) { 
                                                            $tr_document_status = $row['tr_document_status'];
                                                            $tr_approve_status = $row['tr_approve_status'];?>

                                                            <tr role="row" class="odd">

                                                                <td><?= $i++; ?></td>
                                                                <td><?= $row['tr_date'] ?></td>
                                                                <td><?= $row['tr_document_num'] ?></td>
                                                                <td><?= $row['agency_name'] ?></td>
                                                                <td><?= $row['branch_name'] ?></td>
                                                                <td><?php if ($tr_document_status == "1") {
                                                                            echo "อยู่ระหว่างการดำเนินการ";
                                                                        } else {
                                                                            echo " ";
                                                                        }
                                                                        ?></td>
                                                                 <td><?php if ($tr_approve_status == "1") {
                                                                            echo "รอการอนุมัติ";
                                                                        } else {
                                                                            echo " ";
                                                                        }
                                                                        ?></td>

                                                                <th>
                                                                    <a href=""><i class="fas fa-eye"> </i></a>&nbsp &nbsp

                                                                    <a href="?page=edit_tranfer&transfer_id=<?= $row['transfer_id'] ?>"><i class="fas fa-pencil-alt"> </i></a>&nbsp &nbsp

                                                                    <a href=""><i class="fa  fa-trash "> </i></a>
                                                                </th>
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
        </div>
    </div>

</html>