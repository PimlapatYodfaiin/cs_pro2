<?php
include 'dbconnect.php';
include 'ajax.php';


if (isset($_GET['equipment_id'])) {
    $equipment_id = mysqli_real_escape_string($connect, $_GET['equipment_id']);
    $select_equipment = "SELECT * FROM `equipments` WHERE equipment_id='$equipment_id'";
    $query_equipment = mysqli_query($connect, $select_equipment);
    $res_equipment = mysqli_fetch_array($query_equipment);


    $select_status = "SELECT * FROM status_equipment";
    $query_status = mysqli_query($connect, $select_status);

    $select_type = "SELECT * FROM `types`";
    $query_type = mysqli_query($connect, $select_type);

    $select_sub = "SELECT * FROM `subcategorys`";
    $query_sub = mysqli_query($connect, $select_sub);

    $select_agc = "SELECT * FROM `agencys` ";
    $query_agc = mysqli_query($connect, $select_agc);

    $select_branch = "SELECT * FROM `branchs`";
    $query_branch = mysqli_query($connect, $select_branch);



    $select_unit = "SELECT * FROM `units`";
    $query_unit = mysqli_query($connect, $select_unit);

    $select_money = "SELECT * FROM `moneys`";
    $query_money = mysqli_query($connect, $select_money);
}

if (isset($_POST['submit'])) {
    $eq_type_id = $_POST['types'];
    $eq_sub_id = $_POST['subcategorys'];
    $eq_number = $_POST['eq_number'];
    $eq_buydate = $_POST['eq_buydate'];
    $eq_status_id = $_POST['status_equipment'];
    $eq_generation = $_POST['eq_generation'];
    $eq_agency_id = $_POST['agencys'];
    $eq_branch_id = $_POST['branchs'];
    $eq_location = $_POST['eq_location'];
    $eq_money_id = $_POST['moneys'];
    $eq_unit_id = $_POST['units'];
    $eq_price = $_POST['eq_price'];
    $eq_company = $_POST['eq_company'];
    $eq_note = $_POST['eq_note'];
    $eq_fiscal_year = $_POST['eq_fiscal_year'];

    $insert = "UPDATE equipments SET
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
            eq_fiscal_year ='$eq_fiscal_year',
            eq_branch_id ='$eq_branch_id'
         WHERE equipment_id = '$equipment_id'";

    mysqli_query($connect, $insert);
    echo '<script>window.location.href="?page=equipment"</script>';
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
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">แบบฟอร์มเพิ่มข้อมูลครุภัณฑ์ </h2>
                        <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">ข้อมูลครุภัณฑ์</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">เพิ่มข้อมูล</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">แบบฟอร์มเพิ่มข้อมูลครุภัณฑ์</li>
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
                    <form action="" method="POST">
                        <div class="card">
                            <h5 class="card-header">รายละเอียดครุภัณฑ์</h5>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="eq_number" class="col-12 col-sm-3 col-form-label text-sm-right">หมายเลขครุภัณฑ์</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="eq_number" type="text" required=" " class="form-control" VALUE="<?php echo $res_equipment["eq_number"] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="eq_fiscal_year" class="col-12 col-sm-3 col-form-label text-sm-right">ปีงบประมาณ</label>
                                        <div class="col-12 col-sm-8 col-lg-6">

                                            <select name="eq_fiscal_year" id="input" class="form-control" required="">
                                                <option selected disabled> เลือกปีงบประมาณ </option>
                                                <?php for ($i = 0; $i <= 5; $i++) {
                                                    $year = date('Y', strtotime("last day of +$i year"));
                                                    // echo "<option name='$year'>$year</option> ";
                                                }

                                               

                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                <div class="form-group row">
                                    <label for="eq_buydate" class="col-12 col-sm-3 col-form-label text-sm-right">วัน/เดือน/ปี รับ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="date" required="" class="form-control" name="eq_buydate" VALUE="<?php echo $res_equipment["eq_buydate"] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status_equipment" class="col-12 col-sm-3 col-form-label text-sm-right">สถานะ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="status_equipment" id="input" class="form-control" required="">
                                            <option selected="" disabled selected hidden> เลือกสถานะ </option>
                                            <?php while ($res_status = mysqli_fetch_assoc($query_status)) : ?>
                                                <option value="<?= $res_status['status_name'] ?>" <?php if ($res_status['status_name'] == $res_equipment["eq_status_id"]) {
                                                                                                        echo "selected";
                                                                                                    } ?>>
                                                    <?= $res_status['status_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for=type_eq class=" col-12 col-sm-3 col-form-label text-sm-right ">ประเภทครุภัณฑ์</label>
                                    <div class=" col-12 col-sm-8 col-lg-6">
                                        <select name="types" id="types" class="form-control" required="required">
                                            <option selected disabled> เลือกประเภทครุภัณฑ์ </option>
                                            <?php while ($res_type = mysqli_fetch_assoc($query_type)) : ?>
                                                <option value="<?= $res_type['type_id'] ?>" <?php if ($res_type['type_id'] == $res_equipment["eq_type_id"]) {
                                                                                                echo "selected";
                                                                                            } ?>><?= $res_type['type_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="subcategorys">รายการ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="subcategorys" id="subcategorys" class="form-control" required="required">
                                            <option selected disabled> เลือกรายการ </option>
                                            <?php while ($res_sub = mysqli_fetch_assoc($query_sub)) : ?>
                                                <option value="<?= $res_sub['sub_id'] ?>" <?php if ($res_sub['sub_id'] == $res_equipment["eq_sub_id"]) {
                                                                                                echo "selected";
                                                                                            } ?>><?= $res_sub['sub_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="eq_generation" class="col-12 col-sm-3 col-form-label text-sm-right">ขนาดและลักษณะ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <textarea name="eq_generation" required="" placeholder="ใส่รายละเอียดขนาดและลักษณะ" class="form-control"><?php echo $res_equipment["eq_generation"] ?></textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">ผู้ขาย(บริษัท,ห้าง,ร้าน)</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <textarea name="eq_company" required="" placeholder="ใส่รายละเอียดผู้ขาย(บริษัท,ห้าง,ร้าน)" class="form-control"><?php echo $res_equipment["eq_company"] ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="agencys" class="col-12 col-sm-3 col-form-label text-sm-right">หน่วยงานที่รับผิดชอบ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">

                                        <select name="agencys" id="agencys" class="form-control" required="required">
                                            <option selected="" disabled> เลือกหน่วยงานที่รับผิดชอบ </option>
                                            <?php while ($res_agc = mysqli_fetch_assoc($query_agc)) : ?>
                                                <option value="<?= $res_agc['agency_id'] ?>" <?php if ($res_agc['agency_id'] == $res_equipment["eq_agency_id"]) {
                                                                                                    echo "selected";
                                                                                                } ?>><?= $res_agc['agency_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="branchs" class="col-12 col-sm-3 col-form-label text-sm-right">สาขา</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="branchs" id="branchs" class="form-control" required="">

                                            <?php while ($res_branch = mysqli_fetch_assoc($query_branch)) : ?>
                                                <option value="<?= $res_branch['branch_id'] ?>" <?php if ($res_branch['branch_id'] == $res_equipment["eq_branch_id"]) {
                                                                                                    echo "selected";
                                                                                                } ?>><?= $res_branch['branch_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="eq_location" class="col-12 col-sm-3 col-form-label text-sm-right">สถานที่ติดตั้ง/ใช้งาน</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="eq_location" type="text" required="" placeholder="ใส่สถานที่ติดตั้ง/ใช้งาน" class="form-control" VALUE="<?php echo $res_equipment["eq_location"] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-12 col-sm-3 col-form-label text-sm-right">งบที่ใช้</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="moneys" id="input" class="form-control" required="required">
                                            <option selected="" disabled> เลือกงบที่ใช้ </option>
                                            <?php while ($res_money = mysqli_fetch_assoc($query_money)) : ?>
                                                <option value="<?= $res_money['money_type'] ?>" <?php if ($res_money['money_type'] == $res_equipment["eq_money_id"]) {
                                                                                                    echo "selected";
                                                                                                } ?>><?= $res_money['money_type'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="units" class="col-12 col-sm-3 col-form-label text-sm-right">หน่วยนับ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="units" id="input" class="form-control" required="required">
                                            <option selected="" disabled>--- เลือกทักษะความเชี่ยวชาญ --- </option>
                                            <?php while ($res_unit = mysqli_fetch_assoc($query_unit)) : ?>
                                                <option value="<?= $res_unit['unit_name'] ?>" <?php if ($res_unit['unit_name'] == $res_equipment["eq_unit_id"]) {
                                                                                                    echo "selected";
                                                                                                } ?>><?= $res_unit['unit_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="eq_price" class="col-12 col-sm-3 col-form-label text-sm-right">ราคาต่อหน่วย</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="eq_price" id="eq_price" type="text" class="form-control" placeholder="ใส่ราคา" VALUE="<?php echo $res_equipment["eq_price"] ?>">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">หมายเหตุ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <textarea name="eq_note" required="" placeholder="ใส่รายละเอียดหมายเหตุ" class="form-control"><?php echo $res_equipment["eq_note"] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                        <button name="submit" type="submit" class="btn btn-rounded btn-primary">อัพเดทข้อมูล</button>
                                        <button class="btn btn-rounded btn-secondary">ยกเลิก</button>
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

                                  // คอมม้า

                                  function updateTextView(_obj) {
                                        var num = getNumber(_obj.val());
                                        if (num == 0) {
                                            _obj.val('');
                                        } else {
                                            _obj.val(num.toLocaleString());
                                        }
                                    }

                                    function getNumber(_str) {
                                        var arr = _str.split('');
                                        var out = new Array();
                                        for (var cnt = 0; cnt < arr.length; cnt++) {
                                            if (isNaN(arr[cnt]) == false) {
                                                out.push(arr[cnt]);
                                            }
                                        }
                                        return Number(out.join(''));
                                    }
                                    $(document).ready(function() {
                                        $('input[type=text]').on('keyup', function() {
                                            updateTextView($(this));
                                        });
                                    });
                            </script>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


</body>

</html>