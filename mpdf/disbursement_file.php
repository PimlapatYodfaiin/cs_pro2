<?php
include '../page/dbconnect.php';
include '../view/head.php';
require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'

        ]
    ],
    'default_font' => 'sarabun'
]);


$select = "SELECT `disbursement`.*,subcategory_eq.sub_name,agency.agc_type FROM disbursement 
inner join subcategory_eq on subcategory_eq.sub_id = disbursement.db_eq_list
inner join agency on agency.agc_id=disbursement.db_agc_id";

$query = mysqli_query($connect, $select);
$res = mysqli_fetch_assoc($query);
$result = mysqli_query($connect, $select);
$count = mysqli_num_rows($result);

ob_start();
?>

<div style="width: 95%;text-align: right;font-size: 21.3333px;">เลขที่ใบเบิก......</div><br>
<div style="width: 95%;text-align: center;font-size: 21.3333px;">ใบเบิกครุภัณฑ์</div><br>
<div style="width: 95%;text-align: right;font-size: 21.3333px;">มหาวิทยาลัยราชภัฏบุรีรัมย์</div>
<div style="width: 95%;text-align: right;font-size: 21.3333px;">วันที่......................</div>
<!-- <div style="width: 100%;text-align: center;font-size: 21.3333px;">................................................................................................................................................................</div> -->

<div style="width: 95%;overflow:wrap;margin-left: 90px;font-size: 21.3333px;"> ข้าพเจ้า <?= ($res['db_title_id'] . '&nbsp;' . $res['db_fname'] . '&nbsp;' . $res['db_lname']) ?> ตำแหน่ง <?= $res['db_per_userlevel'] ?></div>
<div style="width: 95%;overflow:wrap;margin-left: 50px;font-size: 21.3333px;"> ขอเบิกครุภัณฑ์ตามรายการต่อไปนี้ จากกองการพัสดุเพื่อนำไปใช้ในกิจกรรมของ <?= ($res['agc_type']) ?> สาขาวิชา <?= ($res['db_fo_study']) ?>โดยถือว่าครุภัณฑ์ที่เบิกมานี้อยู่ในความดูแลเก็บรักษาของข้าพเจ้าและปฎิบัติให้เป็นไปตามระเบียบพัสดุ พ.ศ. 2535 โดบเคร่งครัด</div>
<!-- <div style="width: 95%;overflow:wrap;margin-left: 50px;font-size: 21.3333px;"> </div> -->
<!-- <div style="width: 95%;overflow:wrap;margin-left: 50px;font-size: 21.3333px;"> </div> -->



<!-- <table width="100%"  class="table table-bordered"> -->
<table id="bg-table" width="95%" style="border-collapse: collapse;font-size:12pt;margin-left: 50px;">
    <thead>
        <tr role="row" style="border:1px solid #000;padding:4px;">
            <th style="width:1%;font-size: 21.3333px;border-right:1px solid #000;padding:4px;text-align:center;">ลำดับ</th>
            <th style="width:25%;font-size: 21.3333px;border-right:1px solid #000;padding:4px;text-align:center;">หมายเลขครุภัณฑ์</th>
            <th style="width:35%;font-size: 21.3333px;border-right:1px solid #000;padding:4px;text-align:center;">รายการครุภัณฑ์</th>
            <th style="width:5%;font-size: 21.3333px;border-right:1px solid #000;padding:4px;text-align:center;">จำนวน</th>
            <th style="width:12%;font-size: 21.3333px;border-right:1px solid #000;padding:4px;text-align:center;">ราคา</th>
            <th style="width:15%;font-size: 21.3333px;border-right:1px solid #000;padding:4px;text-align:center;"><i class=" fa fa-edit"></i>หมายเหตุ</th>

        </tr>
    </thead>
    <tbody>

        <?php $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr role="row" style="border:1px solid #000;padding:4px;">
           
                <td style="width:1%;border-right:1px solid #000;padding:3px;text-align: left; font-size: 21.3333px;"><?= $i++; ?></td>
                <td style="width:25%;border-right:1px solid #000;padding:3px;text-align: left; font-size: 21.3333px;"><?= $row['db_eq_number'] ?></td>
                <td style="width:35%;border-right:1px solid #000;padding:3px;text-align: left; font-size: 21.3333px;"><?= $row['sub_name'] ?></td>
                <td style="width:5%;border-right:1px solid #000;padding:3px;text-align: left; font-size: 21.3333px;"><?= $row['db_amount'] ?></td>
                <td style="width:12%;border-right:1px solid #000;padding:3px;text-align: left; font-size: 21.3333px;"><?= $row['db_price'] ?></td>
                <td style="width:15%;border-right:1px solid #000;padding:3px;text-align: left; font-size: 21.3333px;"><?= $row ['db_note']  ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div style="width: 95%;overflow:wrap;margin-left: 90px;font-size: 21.3333px;"> รายการครุภัณฑ์ตามที่กล่าวข้างต้นได้รับไว้ครบถ้วนถูกต้องแล้ว </div><br>

<div style="width: 95%;text-align: right;font-size: 21.3333px;">(ลงชื่อ)...........................................ผู้เบิก</div>
<div style="width: 93%;text-align: right;font-size: 21.3333px;"><?= ( '&nbsp;') ?> (..............................................) </div><br>
<div style="width: 95%;text-align: right;font-size: 21.3333px;">(ลงชื่อ)...........................................ผู้จ่าย</div>
<div style="width: 93%;text-align: right;font-size: 21.3333px;"><?= ( '&nbsp;') ?> (..............................................) </div><br>
<div style="width: 95%;margin-left: 50px;font-size: 21.3333px;">(ลงชื่อผู้อนุญาติ)..............................................................หัวหน้า/รองหัวหน้างานพัสดุ</div>
<div style="width: 80%;margin-left: 100px;font-size: 21.3333px;"> <?=('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;')?>(.............................................................)</div>
<?php
$html = ob_get_contents();
$mpdf->WriteHTML($html);
$mpdf->Output("ใบเบิกครุภัณฑ์.pdf");
ob_end_flush();
?>


