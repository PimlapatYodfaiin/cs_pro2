<?php
include 'dbconnect.php';





$select = "SELECT equipments.*,subcategorys.sub_name FROM equipments
INNER JOIN subcategorys on subcategorys.sub_id = equipments.eq_sub_id";
// -- INNER JOIN types ON types.type_id = equipments.eq_type_depreciation";
$query = mysqli_query($connect, $select);
$row = mysqli_fetch_assoc($query);
$result = mysqli_query($connect, $select);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$d =$row['eq_buydate'] ;
    $e = explode("-", $d);
    echo "วันที่แบบเดิม ".$d;
    echo "<br/>";
    echo "วันที่ ".$e[2]." / เดือน ".$e[1]." / ปี ".$e[0];
    $day_POST			= date("d");		//วัน - ตรวจรับ
	$month_POST		= date("m");		//เดือน - ตรวจรับ
	$year_POST		= date("Y");		//ปี - ตรวจรับ
    $asset_date = $year_POST."-".$month_POST."-".$day_POST;

    
	$start_m_budget	= '10';		//กำหนดเดือน เริ่มต้นปีงบประมาณ 1 ตุลาคม
	$start_d_budget	= '01';		//กำหนดวัน เริ่มต้นปีงบประมาณ 1 ตุลาคม
	$end_m_budget	= '09';		//กำหนดเดือน สิ้นปีงบประมาณ 30 กันยายน
	$end_d_budget	= '30';		//กำหนดวัน สิ้นปีงบประมาณ 30 กันยายน
	$day_POST			= date("d");		//วัน - ตรวจรับ
	$month_POST		= date("m");		//เดือน - ตรวจรับ
	$year_POST		= date("Y");		//ปี - ตรวจรับ

    if($year_POS=($row['eq_fiscal_year'])){
        if($month_POST<=$end_m_budget){
            

        }

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
                        <h2 class="pageheader-title"> ค่าเสื่อมราคาครุภัณฑ์ </h2>

                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ค่าเสื่อมราคา</a>
                                    </li>
                                    <!-- <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จัดการข้อมูลค่าเสื่อมราคา</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูลค่าเสื่อมราคา
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">รวมมูลค่าทรัพย์สินคงเหลือ</h5>
                                        <h2 class="mb-0"> $149.00</h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">รวมค่าเสื่อมงวดนี้</h5>
                                        <h2 class="mb-0"> 10,28,056</h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                        <i class="fas fa-calculator fa-fw fa-sm text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">รวมต้นทุนหลังค่าเสื่อมงวดนี้</h5>
                                        <h2 class="mb-0"> 24,763</h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                        <i class="fas fa-cubes fa-fw fa-sm text-primary"></i>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">รวมรายการครุภัณฑ์</h5>
                                        <h2 class="mb-0">14</h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                        <i class="fas fa-dolly fa-fw fa-sm text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card">
                    <h5 class="card-header">ตารางคำนวณค่าเสื่อมราคา</h5>
                    <div class="card-body">

                        <div class="table-responsive"> <br>
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered first">
                                            <table id="example"
                                                class="table table-striped table-bordered second dataTable"
                                                style="width: 100%;" role="grid" aria-describedby="example_info">
                                                <!-- <table class="table table-striped table-bordered"> -->
                                                <thead>
                                                    <th>#</th>
                                                    <th> หมายเลขครุภัณฑ์</th>
                                                    <th> รายการ</th>
                                                    <th> วันที่ซื้อ</th>
                                                    <!-- <th scope="col"> วันที่เริ่มคิดค่าเสื่อม</th> -->
                                                    <th> อายุ(ปี)</th>

                                                    <th> มูลค่าคิดค่าเสื่อม</th>
                                                    <th> ปีงบประมาณ</th>
                                                    <th> ค่าเสื่อมงวดนี้</th>
                                                   
                                                    <th> ค่าเสื่อมสะสมก่อนงวดนี้</th>

                                                    <th> ต้นทุนครุภัณฑ์คงเหลือ</th>

                                                    <th> ต้นทุนหลังค่าเสื่อมงวดนี้</th>

                                                    <th> มูลค่าครุภัณฑ์คงเหลือ</th>
                                                    <th> หมายเหตุ</th>


                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i = 1;
                                                    $year1=date("Y");
                                                    // $depreciation;
                                                    // $date_end = date("30-10-65");
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        // if ( =$year1 ) {
                                                        //     if ((strtotime(date("Y-m-d")) - strtotime($row['eq_buydate'])) >= 365) {  //ครบปี, สิ้นปี
                                                        //         $depreciation = ($row['eq_price'] - 1) / $row['type_lifetime_low'];
                                                        //         // $depreciation_plus	=round($depreciation_plus + $depreciation, 2);
                                                        //         if ($depreciation < 1) {
                                                        //             $depreciation = 1;
                                                        //         }
                                                        //     }else {   //ไม่ครบปี
                                                        //         $depreciation = (((strtotime(date("Y-m-d")) - strtotime($row['eq_buydate'])) / 365) * $row['eq_price']) / $row['type_depreciation'];
                                                        //     }
                                                        // }
                                                    ?>


                                                    <tr>

                                                        <td><?= $i++; ?></td>
                                                        <td><?= $row['eq_number'] ?></td>
                                                        <td><?= $row['sub_name'] ?></td>
                                                        <!-- <td><?= $e[2] ?></td> -->
                                                        <td><?= date('d/m/Y', strtotime($row['eq_buydate'])); ?></td>
                                                        <td><?= $row['type_lifetime_low'] ?></td>
                                                        <td><?= number_format($row['eq_price'], 2) ?></td>
                                                        
                                                        <td><?= $row['eq_fiscal_year'] ?></td>
                                                        <td></td>

                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
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

    </div>
    </div>
</body>

</html>