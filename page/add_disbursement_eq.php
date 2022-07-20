<?php
include 'dbconnect.php';
include 'ajax.php';
$select_status = "SELECT * FROM status_equipment";
$query_status = mysqli_query($connect, $select_status);

$select_type = "SELECT * FROM `types`";
$query_type = mysqli_query($connect, $select_type);

$select_agc = "SELECT * FROM `agencys` ";
$query_agc = mysqli_query($connect, $select_agc);

$select_mon = "SELECT * FROM `moneys`";
$query_mon = mysqli_query($connect, $select_mon);

$select_unit = "SELECT * FROM units";
$query_unit = mysqli_query($connect, $select_unit);


if (isset($_POST['submit'])) {
    $db_status_eq_id = $_POST['db_status_eq_id'];
    $db_type_id = $_POST['db_type_id'];
    $db_sub_id = $_POST['db_sub_id'];
    $db_number = $_POST['db_number'];
    $db_date = $_POST['db_date'];
    $db_contract_num = $_POST['db_contract_num'];
    $db_generation = $_POST['db_generation'];
    $db_company= $_POST['db_company'];
    $db_agency_id = $_POST['db_agency_id'];
    $db_branch_id = $_POST['db_branch_id'];
    $db_location = $_POST['db_location'];
    $db_money_id = $_POST['db_money_id'];
    $db_amount = $_POST['db_amount'];
    $db_unit_id= $_POST['db_unit_id'];
    $db_price = $_POST['db_price'];
    $db_note = $_POST['db_note'];


    $insert = "INSERT INTO disbursements_eq SET
    db_status_eq_id='$db_status_eq_id',
    db_type_id ='$db_type_id',
    db_sub_id = '$db_sub_id',
    db_number = '$db_number',
    db_date =  '$db_date',
    db_contract_num = '$db_contract_num',
    db_generation ='$db_generation',
    db_company = '$db_company',
    db_agency_id ='$db_agency_id',
    db_branch_id ='$db_branch_id',
    db_location ='$db_location',
    db_money_id ='$db_money_id',
    db_amount ='$db_amount',
    db_unit_id ='$db_unit_id',
    db_price ='$db_price',
    db_note ='$db_note',
    disbursement_id = '" . $_GET['disbursement_id'] . "'";
   
   mysqli_query($connect, $insert);
    echo '<script>window.location.href= "?page=edit_disbursement&disbursement_id=' . $_GET['disbursement_id'] . '";</script>';
    
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
                        <h2 class="pageheader-title">แบบฟอร์มเบิกจ่ายครุภัณฑ์ </h2>
                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
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
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->


            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <form id="validationform" method="POST">
                        <div class="card">
                            <h5 class="card-header">รายละเอียดเบิกจ่ายครุภัณฑ์</h5>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">สถานะ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="db_status_eq_id" id="db_status_eq_id" class="form-control" required="">
                                            <option selected="" disabled selected hidden> เลือกสถานะ </option>
                                            <?php while ($res_status = mysqli_fetch_assoc($query_status)) : ?>
                                                <option value="<?= $res_status['status_id'] ?>"><?= $res_status['status_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for=type_eq class=" col-12 col-sm-3 col-form-label text-sm-right ">ประเภทครุภัณฑ์</label>
                                    <div class=" col-12 col-sm-8 col-lg-6">
                                        <select name="db_type_id" id="types" class="form-control" required="required">
                                            <option selected disabled> เลือกประเภทครุภัณฑ์ </option>
                                            <?php while ($res_type = mysqli_fetch_assoc($query_type)) : ?>
                                                <option value="<?= $res_type['type_id'] ?>"><?= $res_type['type_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="subcategory_eq">รายการ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="db_sub_id" id="subcategorys" class="form-control" required="required">

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">หมายเลขครุภัณฑ์</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name='db_number' type="text" required="" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">วัน/เดือน/ปี รับ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="date" required="" class="form-control" name="db_date">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">เลขที่สัญญา(สอบราคา)</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name='db_contract_num' type="text" required="" placeholder="ใส่เลขที่สัญญา(สอบราคา)" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">ขนาดและลักษณะ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <textarea name="db_generation" required="" placeholder="ใส่รายละเอียดขนาดและลักษณะ" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">ผู้ขาย(บริษัท,ห้าง,ร้าน)</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <textarea name="db_company" required="" placeholder="ใส่รายละเอียดผู้ขาย(บริษัท,ห้าง,ร้าน)" class="form-control"></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="agc" class="col-12 col-sm-3 col-form-label text-sm-right">หน่วยงานที่รับผิดชอบ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <!-- <input type="text" required="" placeholder="Type something" class="form-control"> -->
                                        <select name="db_agency_id" id="agencys" class="form-control" required="required">
                                            <option selected="" disabled> เลือกหน่วยงานที่รับผิดชอบ </option>
                                            <?php while ($res_agc = mysqli_fetch_assoc($query_agc)) : ?>
                                                <option value="<?= $res_agc['agency_id'] ?>"><?= $res_agc['agency_name'] ?> </option>
                                            <?php endwhile; ?>
                                        </select>
                                            
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="agc" class="col-12 col-sm-3 col-form-label text-sm-right">สาขา</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <!-- <input type="text" required="" placeholder="Type something" class="form-control"> -->
                                        <select name="db_branch_id" id="branchs" class="form-control" required="required"></select>
                                        
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">สถานที่ติดตั้ง/ใช้งาน</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <!-- <input type="text" required="" placeholder="Type something" class="form-control"> -->
                                        <input name="db_location" type="text" required="" placeholder="ใส่สถานที่ติดตั้ง/ใช้งาน" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">งบที่ใช้</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="db_money_id" id="moneys" class="form-control" required="required">
                                            <option selected="" disabled> เลือกงบที่ใช้ </option>
                                            <?php while ($res_mon = mysqli_fetch_assoc($query_mon)) : ?>
                                                <option value="<?= $res_mon['money_type'] ?>"><?= $res_mon['money_type'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">จำนวน(หน่วย)</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <!-- <input type="text" required="" placeholder="Type something" class="form-control"> -->
                                        <input name="db_amount" id="inputText4" type="number" class="form-control" placeholder="ใส่จำนวน">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="db_unit" class="col-12 col-sm-3 col-form-label text-sm-right">หน่วยนับ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="db_unit_id" id="units" class="form-control" required="required">
                                            <option selected="" disabled>--- เลือกทักษะความเชี่ยวชาญ --- </option>
                                            <?php while ($res_unit = mysqli_fetch_assoc($query_unit)) : ?>
                                                <option value="<?= $res_unit['unit_name'] ?>"><?= $res_unit['unit_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">ราคาต่อหน่วย</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name='db_price' id="inputText4" type="number" class="form-control" placeholder="ใส่ราคา">
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">รวมเงิน</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input id="inputText4" type="number" class="form-control" placeholder="ใส่ราคารวมเงิน">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">หมายเหตุ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <textarea name='db_note' required="" placeholder="ใส่รายละเอียดหมายเหตุ" class="form-control"></textarea>
                                    </div>
                                </div>
                               
                                

                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                        <!-- <a  href="mpdf/dis.pdf" class="btn btn-rounded btn-success">ดำเนินการ</a> -->
                                        <button name="submit" type="submit" class="btn btn-rounded btn-primary">Submit</button>
                                        <button class="btn btn-rounded btn-secondary">Cancel</button>
                                    </div>
                                </div>
                    </form>
                </div>



            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end valifation types -->
        <!-- ============================================================== -->
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
    </script>
    </div>

    </div>
</body>

</html>