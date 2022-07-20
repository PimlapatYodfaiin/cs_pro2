<?php
include 'dbconnect.php';
include 'ajax.php';


$db_id = $_GET['db_id'];
$select_db="SELECT * FROM `disbursement` WHERE db_id ='$db_id'";
$query_db = mysqli_query($connect, $select_db);
$row = mysqli_fetch_assoc($query_db);

$select_st = "SELECT * FROM status_eq";
$query_st = mysqli_query($connect, $select_st);

$select_type = "SELECT * FROM `type_eq`";
$query_type = mysqli_query($connect, $select_type);

$select_title = "SELECT * FROM title";
$query_title = mysqli_query($connect, $select_title);

$select_userlevel = "SELECT * FROM userlevel";
$query_userlevel = mysqli_query($connect, $select_userlevel);

$select_agc = "SELECT * FROM `agency` ";
$query_agc = mysqli_query($connect, $select_agc);

$select_mon = "SELECT * FROM `money_type`";
$query_mon = mysqli_query($connect, $select_mon);

$select_userlevel = "SELECT * FROM userlevel";
$query_userlevel = mysqli_query($connect, $select_userlevel);


if (isset($_POST['submit'])) {
    // $db_status = $_POST['db_status'];
    // $db_type_id = $_POST['db_type_id'];
    // $db_sub_id = $_POST['db_sub_id'];
    // $db_number = $_POST['db_number'];
    // $db_date = $_POST['db_date'];
    // $db_contract_num = $_POST['db_contract_num'];
    // $db_generation = $_POST['db_generation'];
    // $db_company= $_POST['db_company'];
    // $db_agency_id = $_POST['db_agency_id'];
    // $db_branch_id = $_POST['db_branch_id'];
    // $db_location = $_POST['db_location'];
    // $db_money_id = $_POST['db_money_id'];
    // $db_amount = $_POST['db_amount'];
    // $db_unit_id= $_POST['db_unit_id'];
    // $db_price = $_POST['db_price'];
    // $db_note = $_POST['db_note'];


    $db_status = $_POST['db_status'];
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
    eq_number='$eq_number',
    eq_sub_id ='$eq_sub_id',
    eq_type_id = '$eq_type_id',
    eq_generation = '$eq_generation',
    eq_buydate =  '$eq_buydate',
    eq_location = '$eq_location',
    eq_agency_id ='$eq_agency_id',
    eq_money_id = '$eq_money_id',
    eq_unit_id ='$eq_unit_id',
    eq_price ='$eq_price',
    eq_status_id ='$eq_status_id',
    eq_note ='$eq_note',
    eq_company ='$eq_company',
    eq_branch_id ='$eq_branch_id'
    ";



    $insert = "INSERT INTO `disbursement`(`db_agc_id`, `db_eq_number`, `db_eq_list`, `db_amount`, `db_ st_id`, `db_type_eq_id`, `db_date`, `db_contract_num`, `db_cp_id`, `db_location`, `db_mon_id`, `db_price`, `db_note`, `db_title_id`, `db_fname`, `db_lname`, `db_per_userlevel`, `db_generation`, `db_unit`, `db_fo_study`, `db_status`) 
    VALUES ('$db_agc_id','$db_eq_number','$db_list','$db_amount','$db_st_id','$db_type_eq_id','$db_date','$db_contract_num','$db_cp_id','$db_location','$db_mon_id','$db_price','$db_note','$db_title_id','$db_fname','$db_lname','$db_per_userlevel','$db_generation','$db_unit','$db_fo_study','1')";
    mysqli_query($connect, $insert);
    echo '<script>window.location.href="disbursement.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
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
                                        <select name="status_eq" id="input" class="form-control" required="">
                                            <option selected="" disabled selected hidden> เลือกสถานะ </option>
                                            <?php while ($res_st = mysqli_fetch_assoc($query_st)) : ?>
                                                <option value="<?= $res_st['st_name'] ?>"><?= $res_st['st_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for=type_eq class=" col-12 col-sm-3 col-form-label text-sm-right ">ประเภทครุภัณฑ์</label>
                                    <div class=" col-12 col-sm-8 col-lg-6">
                                        <select name="type_eq" id="type_eq" class="form-control" required="required">
                                            <option selected disabled> เลือกประเภทครุภัณฑ์ </option>
                                            <?php while ($res_type = mysqli_fetch_assoc($query_type)) : ?>
                                                <option value="<?= $res_type['type_eq_id'] ?>" 
                                                <?php if ($row['db_id'] ==$res_type['type_eq_id']) {echo "selected";} ?>>
                                                <?= $res_type['type_eq'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="subcategory_eq">รายการ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="subcategory_eq" id="subcategory_eq" class="form-control" required="required">

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">หมายเลขครุภัณฑ์</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name='db_number' type="text" required="" class="form-control" 
                                        VALUE="<?php echo $row["db_number"]?>">
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
                                        <textarea name="db_cp_id" required="" placeholder="ใส่รายละเอียดผู้ขาย(บริษัท,ห้าง,ร้าน)" class="form-control"></textarea>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="agc" class="col-12 col-sm-3 col-form-label text-sm-right">หน่วยงานที่รับผิดชอบ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <!-- <input type="text" required="" placeholder="Type something" class="form-control"> -->
                                        <select name="agency" id="input" class="form-control" required="required">
                                            <option selected="" disabled> เลือกหน่วยงานที่รับผิดชอบ </option>
                                            <?php while ($res_agc = mysqli_fetch_assoc($query_agc)) : ?>
                                                <option value="<?= $res_agc['agc_id'] ?>"><?= $res_agc['agc_type'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="agc" class="col-12 col-sm-3 col-form-label text-sm-right">สาขา</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <!-- <input type="text" required="" placeholder="Type something" class="form-control"> -->
                                        <select name="fo_study" id="fo_study" class="form-control" required="required">
                                            <option selected="" disabled> เลือกสาขา </option>
                                            <?php while ($res_fo_study = mysqli_fetch_assoc($query_fo_study)) : ?>
                                                <option value="<?= $res_fo_study['fo_name'] ?>"><?= $res_fo_study['fo_name'] ?>
                                                </option>
                                            <?php endwhile; ?>

                                        </select>
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
                                        <select name="money_type" id="input" class="form-control" required="required">
                                            <option selected="" disabled> เลือกงบที่ใช้ </option>
                                            <?php while ($res_mon = mysqli_fetch_assoc($query_mon)) : ?>
                                                <option value="<?= $res_mon['mon_type'] ?>"><?= $res_mon['mon_type'] ?>
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
                                        <select name="db_unit" id="input" class="form-control" required="required">
                                            <option selected="" disabled>--- เลือกทักษะความเชี่ยวชาญ --- </option>
                                            <option value="ตัว">ตัว</option>
                                            <option value="อัน">อัน</option>
                                            <option value="เครื่อง">เครื่อง</option>
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
                                <hr>
                                

                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <!-- <a  href="mpdf/dis.pdf" class="btn btn-rounded btn-success">ดำเนินการ</a> -->
                                        <button href="mpdf/dis.pdf" type="submit" class="btn btn-rounded btn-primary">Submit</button>
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
        $('#type_eq').change(function() {
            var id_type_eq = $(this).val();
            $.ajax({
                type: "POST",
                url: "page/ajax_type_eq.php",
                data: {
                    id: id_type_eq,
                    function: 'type_eq'
                },
                success: function(data) {
                    $('#subcategory_eq').html(data);

                }
            });
        });
    </script>
    </div>

    </div>
</body>

</html>