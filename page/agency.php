<?php
// session_start();
include 'dbconnect.php';

$select_agencys = "SELECT * FROM agencys";
$query_agencys = mysqli_query($connect, $select_agencys);

$result = mysqli_query($connect, $select_agencys);
$count = mysqli_num_rows($result);



if (isset($_POST['agency_name'])) {
    $agency_id  = $_POST['agency_id'];
    $agency_name = $_POST['agency_name'];
   

   


    $insert = "INSERT INTO agencys SET
        agctype_id = '$agctype_id', 
        agency_name = '$agency_name'";
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

                        <h1 class="pageheader-title"><b>ข้อมูลหน่วยงาน/สาขา</b>

                            <button type="button" class="btn badge badge-pill badge-info" data-toggle="modal"
                                data-target=".bd-example-modal-lg">+ เพิ่มข้อมูล </button>

                        </h1>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลหลัก</a></li>
                                    <li class="breadcrumb-item"><a href="#"
                                            class="breadcrumb-link">จัดการข้อมูลหน่วยงาน</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ข้อมูลหน่วยงาน</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">

                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <!-- <h4 class="modal-title">Modal Header</h4> -->
                                    </div>
                                    <div class="modal-body">
                                        <h4>เพิ่มข้อมูลหน่วยงาน/สาขา</h4>

                                        <form action="" method="POST">
                                            <content>
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                                        for="agctype_id">รหัสหน่วยงาน</label>
                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                        <input type="text" required="" class="form-control"
                                                            name="agctype_id">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                                        for="agc_type ">หน่วยงาน</label>
                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                        <input type="text" required="" class="form-control"
                                                            name="agc_type">
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group row">
                                                    <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                                        for="last_update_agc">อัพเดตล่าสุด</label>
                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                        <input type="date" required="" class="form-control"
                                                            name="last_update_agc">
                                                    </div>
                                                </div> -->

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
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">ข้อมูลประเภทเงิน</h5>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>

                                        <th scope="col">#</th>
                                        <th scope="col"> รหัสหน่วยงาน/สาขา</th>
                                        <th scope="col"> หน่วยงาน/สาขา</th>
                                        <!-- <th scope="col"> อัพเตดครั้งล่าสุด</th> -->
                                        <th scope="col"><i class="fa fa-edit"></i> เเก้ไขข้อมูล</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>

                                        <td><?= $i++; ?></td>
                                        <td><?= $row['agency_id'] ?></td>
                                        <td><?= $row['agency_name'] ?></td>
                                      
                                        <td>
                                            <a href="?page=edit_agency&agc_id&agency_id=<?php echo $row["agency_id"] ?>" class="badge badge-pill badge-warning"><i class="fa fa-edit"> </i> เเก้ไขข้อมูล </a>

                                               
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