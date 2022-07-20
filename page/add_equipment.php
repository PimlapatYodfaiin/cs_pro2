    <?php
    include 'dbconnect.php';
    include 'ajax.php';



    $status_equipment = "SELECT * FROM status_equipment ";
    $query_status = mysqli_query($connect, $status_equipment);

    $select_agc = "SELECT * FROM `agencys` ";
    $query_agc = mysqli_query($connect, $select_agc);

    $select_money = "SELECT * FROM `moneys`";
    $query_money = mysqli_query($connect, $select_money);

    $select_type = "SELECT * FROM `types`";
    $query_type = mysqli_query($connect, $select_type);

    $select_unit = "SELECT * FROM `units`";
    $query_unit = mysqli_query($connect, $select_unit);

    

    if (isset($_POST['submit'])) {
        $eq_number = $_POST['eq_number'];
        $eq_buydate = $_POST['eq_buydate'];
        $eq_status_id = $_POST['status_equipment'];
        $eq_type_id = $_POST['types'];
        $eq_type_list_id = $_POST['type_list'];
        $eq_sub_id = $_POST['subcategorys'];
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
        $type_lifetime_low = $_POST['type_lifetime_low'];



        $insert = "INSERT INTO equipments SET
            eq_number='$eq_number',
            eq_sub_id ='$eq_sub_id',
            eq_type_id = '$eq_type_id',
            eq_type_list_id = '$eq_type_list_id',
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
            type_lifetime_low ='$type_lifetime_low',
            eq_branch_id ='$eq_branch_id'
            ";
        mysqli_query($connect, $insert);

        //         $insert = "INSERT INTO `equipments`(`eq_number`, `eq_list`, `eq_type_eq_id`, `eq_generation`, `eq_date`, `eq_location`, `eq_agc_id`,`eq_fo_study`, ` eq_mon_id`, `eq_unit`, `eq_price`, `eq_st_id`, `eq_note`, `eq_cp`)
        //  VALUES ('$eq_number','$eq_list','$eq_type_eq_id','$eq_generation','$eq_date','$eq_location','$eq_agc_id','$eq_fo_study','$eq_mon_id','$eq_unit','$eq_price','$eq_st_id','$eq_note','$eq_cp_id')";

        echo '<script>window.location.href="?page=equipment"</script>';
        // echo $insert;
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
                                            <input name="eq_number" type="text" required="" class="form-control">
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="eq_fiscal_year" class="col-12 col-sm-3 col-form-label text-sm-right">ปีงบประมาณ</label>
                                        <div class="col-12 col-sm-8 col-lg-6">

                                            <select name="eq_fiscal_year" id="input" class="form-control" required="" type="year">
                                                <option selected disabled> เลือกปีงบประมาณ </option>
                                                <?php

                                                for ($i = 0; $i <= 5; $i++) {
                                                    $year = date('Y', strtotime("last day of +$i year"));
                                                    $year1 = $year + 543;
                                                    echo "<option name='$year1'>$year1</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="eq_buydate" class="col-12 col-sm-3 col-form-label text-sm-right">วัน/เดือน/ปี รับ</label>

                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="date" id="date" required="" class="form-control" name="eq_buydate">


                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="status_equipment" class="col-12 col-sm-3 col-form-label text-sm-right">สถานะ</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select name="status_equipment" id="input" class="form-control" required="">
                                                <option selected="" disabled selected hidden> เลือกสถานะ </option>
                                                <?php while ($res_status = mysqli_fetch_assoc($query_status)) : ?>
                                                    <option value="<?= $res_status['status_name'] ?>"><?= $res_status['status_name'] ?>
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
                                                    <option value="<?= $res_type['type_id'] ?>"><?= $res_type['type_name'] ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>







                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="subcategorys">รายการ</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select name="subcategorys" id="subcategorys" class="form-control" required="required">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="type_lifetime_low">อายุการใช้งานตามที่กำหนด</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <!-- <select name="type_lifetime_low" id="type_lifetime_low" class="form-control" required="required"> -->
                                            <input name="type_lifetime_low" id="type_lifetime_low" type="text" required="" class="form-control">
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="eq_generation" class="col-12 col-sm-3 col-form-label text-sm-right">ขนาดและลักษณะ</label>
                                        <div class="col-12 col-sm-8 col-lg-6">

                                            <textarea name="eq_generation" required="" placeholder="ใส่รายละเอียดขนาดและลักษณะ" class="form-control"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="input-select">ผู้ขาย(บริษัท,ห้าง,ร้าน)</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <textarea name="eq_company" required="" placeholder="ใส่รายละเอียดผู้ขาย(บริษัท,ห้าง,ร้าน)" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="agencys" class="col-12 col-sm-3 col-form-label text-sm-right">หน่วยงานที่รับผิดชอบ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">

                                        <select name="agencys" id="agencys" class="form-control" required="required">
                                            <option selected="" disabled> เลือกสำนักงานที่รับผิดชอบ </option>
                                            <?php while ($res_agc = mysqli_fetch_assoc($query_agc)) : ?>
                                                <option value="<?= $res_agc['agency_id'] ?>"><?= $res_agc['agency_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="branchs" class="col-12 col-sm-3 col-form-label text-sm-right">สาขา</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="branchs" id="branchs" class="form-control" required="required">

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="eq_location" class="col-12 col-sm-3 col-form-label text-sm-right">สถานที่ติดตั้ง/ใช้งาน</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input name="eq_location" type="text" required="" placeholder="ใส่สถานที่ติดตั้ง/ใช้งาน" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-12 col-sm-3 col-form-label text-sm-right">งบที่ใช้</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="moneys" id="input" class="form-control" required="required">
                                            <option selected="" disabled> เลือกงบที่ใช้ </option>
                                            <?php while ($res_money = mysqli_fetch_assoc($query_money)) : ?>
                                                <option value="<?= $res_money['money_type'] ?>"><?= $res_money['money_type'] ?>
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
                                                <option value="<?= $res_unit['unit_name'] ?>"><?= $res_unit['unit_name'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="eq_price" class="col-12 col-sm-3 col-form-label text-sm-right">ราคาต่อหน่วย</label>
                                    <div class="col-12 col-sm-8 col-lg-6">


                                        <input name="eq_price" id="eq_pric" type="text" class="form-control" placeholder="ใส่ราคา" 
                                       >

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">หมายเหตุ</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <textarea name="eq_note" required="" placeholder="ใส่รายละเอียดหมายเหตุ" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                        <button name="submit" type="submit" class="btn btn-rounded btn-primary">บันทึก</button>
                                        <button class="btn btn-rounded btn-secondary">ยกเลิก</button>
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
                                                $('#type_lifetime_low').val(' ');

                                            }
                                        });
                                    });

                                    $('#subcategorys').change(function() {
                                        var id_subcategorys = $(this).val();
                                        $.ajax({
                                            type: "POST",
                                            url: "page/ajax.php",
                                            data: {
                                                id: id_subcategorys,
                                                function: 'subcategorys'
                                            },
                                            success: function(data) {

                                                // console.log(data);
                                                $('#type_lifetime_low').val(data);
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

                                    
    $(function () {
      $('#date').datetimepicker({
			locale: 'th',
			format: 'L'
				});
	             });
       

                                    // คอมม้า

                                    // function updateTextView(_obj) {
                                    //     var num = getNumber(_obj.val());
                                    //     if (num == 0) {
                                    //         _obj.val('');
                                    //     } else {
                                    //         _obj.val(num.toLocaleString());
                                    //     }
                                    // }

                                    // function getNumber(_str) {
                                    //     var arr = _str.split('');
                                    //     var out = new Array();
                                    //     for (var cnt = 0; cnt < arr.length; cnt++) {
                                    //         if (isNaN(arr[cnt]) == false) {
                                    //             out.push(arr[cnt]);
                                    //         }
                                    //     }
                                    //     return Number(out.join(''));
                                    // }
                                    // $(document).ready(function() {
                                    //     $('input[type=text]').on('keyup', function() {
                                    //         updateTextView($(this));
                                    //     });
                                    // });


                                </script>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </body>

    </html>