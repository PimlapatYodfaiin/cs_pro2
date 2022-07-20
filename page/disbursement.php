<?php
include 'dbconnect.php';

$select_disbursement="SELECT * FROM `disbursements`";
$query_disbursement = mysqli_query($connect, $select_disbursement);
$result = mysqli_query($connect, $select_disbursement);
$count = mysqli_num_rows($result);

// $select = "SELECT `disbursements_eq`.*,subcategorys.sub_name,agencys.agency_name FROM disbursements_eq
// inner join subcategorys on subcategorys.sub_id = disbursements_eq.db_sub_id
// inner join agencys on agencys.agency_id=disbursements_eq.db_agency_id";
// $query = mysqli_query($connect, $select);




// $result = mysqli_query($connect, $select);
// $count = mysqli_num_rows($result);
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
                        <h2 class="pageheader-title">เบิกจ่ายครุภัณฑ์ <a href="?page=add_disbursement" class="btn btn-rounded btn-success">+เพิ่มรายการเบิก</a></h2>

                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">เบิกจ่ายครุภัณฑ์</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูลเบิกจ่ายครุภัณฑ์</li>
                                </ol>
                            </nav>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row">
                
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="card">
                       
                            <h5 class="card-header">รายการเบิกจ่ายครุภัณฑ์ <p></p></h5>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-striped table-bordered first">
                                                    <!-- <table id="example" class="table table-striped table-bordered second dataTable" style="width: 100%;" role="grid" aria-describedby="example_info"> -->
                                                    <table class="table table-striped  table-bordered">
                                                        <thead>
                                                            <tr role="row">

                                                                <th style="width: 5px;">
                                                                    <label class="custom-control custom-checkbox" for="selectAll">
                                                                        <input class="custom-control-input checkboxes" type="checkbox" id="selectAll">
                                                                        <span class="custom-control-label"></span>
                                                                    </label>
                                                                </th>
                                                                <th>#</th>
                                                                
                                                                <th>ผู้เบิก</th>
                                                              
                                                                <th ><i class=" fa fa-edit"></i>ตำแหน่ง</th>
                                                                <th ><i class=" fa fa-edit"></i>สถานะ</th>
                                                                <th ><i class="fa fa-list-ul"> </i> รายละเอียด</th>
                                                                <th ><i class="fa fa-list-ul"> </i> ดาวน์โหลด</th>
                                                                <th ><i class="fa fa-edit"></i> เเก้ไขข้อมูล</th>
                                                                <th ><i class="fa fa-archive"></i> ยกเลิก</th>
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
                                                                    <td> <?= $row['db_title'] . $row['db_fname'] . "&nbsp;&nbsp;" . $row['db_lname'] ?></td>
                                                                    <td> <?= $row['db_position']?></td>
                                                                    <td><?php if ($db_status== "1") {
                                                                            echo "กำลังดำเนินการ";
                                                                        } else {
                                                                            echo " ";
                                                                        }
                                                                        ?></td>
                                                                    <!-- <td><span class="badge badge-success">พร้อมใช้งาน</span> </td> -->

                                                                    <td><a href="" class="badge badge-pill badge-primary"><i> </i> รายละเอียด </a></td>
                                                                    <td><a href="mpdf/dis.pdf" class="badge badge-pill badge-primary"><i > </i> ดาวน์โหลด </a></td>
                                                                    <th>
                                                                    <a href=""><i class="fas fa-eye"> </i></a>&nbsp &nbsp

                                                                    <a href="?page=edit_disbursement&disbursement_id=<?= $row['disbursement_id'] ?>"><i class="fas fa-pencil-alt"> </i></a>&nbsp &nbsp

                                                                    <a href=""><i class="fa  fa-trash "> </i></a>
                                                                </th>
                                                                    <td>  <a href="" class="badge badge-pill badge-warning"><i class=""> </i> ยกเลิก</a></td>

                                                                </tr>
                                                            <?php } ?>


                                                        </tbody>

                                                    </table>

                                                  
                                            </div>
                                        </div><br>

                                    </div>

                                </div>
                            </div>
                       


                    </div>

                </div>
            </div>
        </div>
</body>

</html>