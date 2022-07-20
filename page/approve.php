<?php
include 'dbconnect.php';

// $select ="SELECT `disbursements`.*,subcategorys.sub_name FROM disbursements
// inner join subcategorys on subcategorys.sub_id = disbursements.db_sub_id";
$select = "SELECT * FROM `disbursements`";
$query = mysqli_query($connect, $select);


$result = mysqli_query($connect, $select);
$count = mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
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
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">รายการอนุมัติ </h2>

                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">อนุมัติ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูลอนุมัติ</li>
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
                        <h5 class="card-header">รายการรออนุมัติ</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">


                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">เบิกจ่ายครุภัณฑ์ <span class="badge badge-light">4</span></button>

                                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">โอนย้ายครุภัณฑ์ <span class="badge badge-light">4</span></button>

                                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">แทงจำหน่าย <span class="badge badge-light">4</span></button>


                                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">อืนๆ <span class="badge badge-light">4</span></button>



                                               
                                            </div><br><br>
                                            <table class="table table-striped table-bordered first">
                                                <!-- <table id="example" class="table table-striped table-bordered second dataTable" style="width: 100%;" role="grid" aria-describedby="example_info"> -->
                                                <table class="table table-striped  table-bordered">
                                                    <thead>
                                                        <tr role="row">
                                                            <!-- <th style="width: 3px;">
                                                                <span class="custom-checkbox">
                                                                    <input type="checkbox" id="selectAll">
                                                                    <label for="selectAll"></label>
                                                                </span>
                                                            </th> -->
                                                            <th style="width: 5px;">
                                                                <label class="custom-control custom-checkbox" for="selectAll">
                                                                    <input class="custom-control-input checkboxes" type="checkbox" id="selectAll">
                                                                    <span class="custom-control-label"></span>
                                                                </label>
                                                            </th>
                                                            <th style="width: 3px;">#</th>
                                                            <th style="width: 100px;">หมายเลขครุภัณฑ์</th>
                                                            <th style="width: 150px;">รายการครุภัณฑ์</th>
                                                            <th style="width: 40px;">ปีที่ซื้อ</th>
                                                            <th style="width: 40px;">ราคา</th>
                                                            <th style="width: 100px;"><i class=" fa fa-edit"></i>สถานะ</th>
                                                            <th style="width: 80px;"><i class="fa fa-list-ul"> </i> รายละเอียด</th>
                                                            <th style="width: 80px;"><i class="fa fa-edit"></i> อนุมัติ</th>
                                                            <th style="width: 50px;"><i class="fa fa-archive"></i> ไม่อนุมัติ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php $i = 1;
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $db_status = $row['db_status'] ?>

                                                            <tr role="row" class="odd">
                                                                <td>
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one">
                                                                        <span class="custom-control-label"></span>
                                                                    </label>
                                                                </td>
                                                                <td><?= $i++; ?></td>
                                                                <td><?= $row['db_number'] ?></td>
                                                                <td><?= $row['sub_name'] ?></td>
                                                                <td><?= $row['db_date'] ?></td>
                                                                <td><?= $row['db_price'] ?></td>
                                                                <td><?php if ($db_status == "1") {
                                                                        echo "รออนุมัติ";
                                                                    } else {
                                                                        echo " ";
                                                                    }
                                                                    ?></td>
                                                                <!-- <td><span class="badge badge-success">พร้อมใช้งาน</span> </td> -->
                                                                <td>
                                                                    <a href="#" class="badge badge-pill badge-primary"><i class="fa fa-list-ul"> </i> รายละเอียด </a>
                                                                </td>
                                                                <td>
                                                                    <a href="" class="btn btn-success btn-sm"><i class=" "> </i> อนุมัติ </a>

                                                                </td>
                                                                <td>
                                                                    <a href="" class="btn btn-warning btn-sm"><i class=""> </i> ไม่อนุมัติ</a>

                                                                </td>
                                                                <!-- <td align="center"><span class="badge badge-pill badge-brand">แก้ไข</span></td> -->
                                                            </tr>
                                                        <?php } ?>


                                                    </tbody>
                                                    <!-- <tfoot>
                                                        <tr> <th rowspan="1" colspan="1">#</th>
                                                            <th rowspan="1" colspan="1">#</th>
                                                            <th rowspan="1" colspan="1">หมายเลขครุภัณฑ์</th>
                                                            <th rowspan="1" colspan="1">รายการครุภัณฑ์</th>
                                                            <th rowspan="1" colspan="1">ปีที่ซื้อ</th>
                                                            <th rowspan="1" colspan="1">ราคา</th>
                                                            <th rowspan="1" colspan="1">สถานะ</th>
                                                            <th rowspan="1" colspan="1">รายละเอียด</th>
                                                            <th rowspan="1" colspan="1">แก้ไข</th>
                                                            <th rowspan="1" colspan="1">ลบ</th>
                                                        </tr>
                                                    </tfoot> -->
                                                </table>
                                        </div>
                                    </div><br>
                                    <!-- <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                    <li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>