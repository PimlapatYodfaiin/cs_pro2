<?php
// session_start();
include 'dbconnect.php';

$select_moneys = "SELECT * FROM moneys";
$query_moneys = mysqli_query($connect, $select_moneys);

$result = mysqli_query($connect, $select_moneys);
$count = mysqli_num_rows($result);



if (isset($_POST['money_type'])) {
    // $montype_id = $_POST['montype_id'];
    $money_type = $_POST['money_type'];
    $last_update = $_POST['last_update'];

   


    $insert = "INSERT INTO moneys SET
        -- montype_id = '$montype_id', 
        money_type = '$money_type', 
        last_update = '$last_update'";

    mysqli_query($connect, $insert);
    // echo '<script>window.location.href="money.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

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

                        <h1 class="pageheader-title"><b>ข้อมูลประเภทเงิน</b>

                            <button type="button" class="btn badge badge-pill badge-info" data-toggle="modal"
                                data-target=".bd-example-modal-lg">+ เพิ่มข้อมูล </button>

                        </h1>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลหลัก</a></li>
                                    <li class="breadcrumb-item"><a href="#"
                                            class="breadcrumb-link">จัดการข้อมูลประเภทเงิน</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ข้อมูลประเภทเงิน</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลประเภทเงิน</h3>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <!-- <h4 class="modal-title">Modal Header</h4> -->
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">
                                            <content>
                                                <!-- <div class="form-group row">
                                                    <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                                        for="montype_id">รหัสประเภทเงิน</label>
                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                        <input type="text" required="" class="form-control"
                                                            name="montype_id">
                                                    </div>
                                                </div> -->
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                                        for="mon_type ">ประเภทเงิน</label>
                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                        <input type="text" required="" class="form-control"
                                                            name="mon_type">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                                        for="last_update ">อัพเดตล่าสุด</label>
                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                        <input type="date" required="" class="form-control"
                                                            name="last_update">
                                                    </div>
                                                </div>

                                                <div class="modal-footer ">
                                                    <footer>
                                                        <fieldset>
                                                            <button type="submit" value="บันทึกข้อมูล"
                                                                class="btn btn-space btn-primary">บันทึกข้อมูล</button>
                                                            <button class="btn btn-space btn-secondary">ยกเลิก</button>


                                                            <!-- <button type="button" class="btn btn-cancel ng-star-inserted">
                                                            ยกเลิก
                                                        </button>
                                                        <button type="submit" class="btn btn-success ng-star-inserted">
                                                            บันทึกและปิด
                                                        </button>
                                                         -->
                                                            <!---->
                                                            <!---->
                                                        </fieldset>
                                                    </footer>
                                                </div>

                                            </content>



                                    </div>
                                </div>
                            </div>



                        </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h4 class="card-header"> <b>โอนย้ายครุภัณฑ์</b></h4>
                        <div class="card-body">
                            <form action="">
                                <div class="form-row">
                                    <div class="col col-lg-2">
                                        <label for="validationCustom03">ปีที่โอน</label>
                                        <input type="text" class="form-control" id="myInput1" placeholder="ปีที่โอน">
                                    </div>

                                    <div class="col col-lg-2">
                                        <label for="validationCustom04">เลขที่เอกสาร</label>
                                        <input type="text" class="form-control" id="myInput2" placeholder="เลขที่เอกสาร"
                                            required>
                                    </div>

                                    <div class="col-4">
                                        <label for="validationCustom04">หน่วยงานที่โอน</label>
                                        <input type="text" class="form-control" id="myInput3"
                                            placeholder="หน่วยงานที่โอน" required>
                                    </div>

                                    <div class="col-4">
                                        <label for="validationCustom03">หน่วยงานที่รับโอน</label>
                                        <input type="text" class="form-control" id="myInput4"
                                            placeholder="หน่วยงานที่รับโอน" required>
                                    </div>

                                    <div class="col col-lg-2">
                                        <label for="validationCustom03">สถานะ</label>
                                        <input type="text" class="form-control" id="myInput5" placeholder="สถานะ"
                                            required>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">ข้อมูลประเภทเงิน</h5>
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="example" style="width:100%">
                                <thead class="thead-dark">
                                    <tr role="row">

                                        <th style="width: 5px;">#</th>
                                        <th style="width: 60px;"> รหัสประเภทเงิน</th>
                                        <th style="width: 100px;"> ประเภทเงิน</th>

                                        <th style="width: 50px;"> จัดการข้อมูล</th>


                                    </tr>
                                </thead>
                                <tbody >
                                    <?php $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>

                                        <td><?= $i++; ?></td>
                                        <td><?= $row['money_id'] ?></td>
                                        <td><?= $row['money_type'] ?></td>



                                        <td>
                                            <a href="?page=edit_money&money_id=<?php  echo $row["money_id"] ?>"><i class="fas fa-pencil-alt fa-lg"> </i></a>&nbsp &nbsp
                                            
                                                
                                            <a href=""><i class="fa  fa-trash fa-3g"> </i></a>

                                        </td>

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
    

</body>


</html>