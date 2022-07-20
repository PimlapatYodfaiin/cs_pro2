<?php
002.
//เริ่มต้น - คำนวณค่าเสื่อมราคา
003.
$life       ='5' ;          //อายุการใช้งาน
004.
$unit       ='20' ;         //จำนวนหน่วย
005.
$price  ='3500';        //ราคาต่อหน่วย ต่อกลุ่ม ต่อชุด
006.
$cost       = $unit * $price ;      //มูลค่ารวม
007.
 
008.
$start_m_budget = '10';     //กำหนดเดือน เริ่มต้นปีงบประมาณ 1 ตุลาคม
009.
$start_d_budget = '01';     //กำหนดวัน เริ่มต้นปีงบประมาณ 1 ตุลาคม
010.
$end_m_budget   = '09';     //กำหนดเดือน สิ้นปีงบประมาณ 30 กันยายน
011.
$end_d_budget   = '30';     //กำหนดวัน สิ้นปีงบประมาณ 30 กันยายน
012.
$day_POST           = date("d");        //วัน - ตรวจรับ
013.
$month_POST     = date("m");        //เดือน - ตรวจรับ
014.
$year_POST      = date("Y");        //ปี - ตรวจรับ
015.
$asset_date = $year_POST."-".$month_POST."-".$day_POST; //วันเดือนปี ที่ตรวจรับทรัพย์สิน
016.
 
017.
//การตรวจรับระหว่างวันที่ 16-28/29/30/31 ของเดือน ให้เริ่มคำนวณค่าเสื่อมราคาในเดือนถัดไป
018.
if($day_POST<=15){
019.
$month_budget=$month_POST;
020.
}else{
021.
$month_budget=$month_POST+1;
022.
}
023.
echo "<table align=center>";
024.
echo "<tr><td colspan=2>สำนักงานเขตพื้นที่การศึกษาประถมศึกษาเลย เขต 1</td></tr>";
025.
echo "<tr><td>จำนวนหน่วย</td><td>".$unit."</td></tr>";
026.
echo "<tr><td>ราคาต่อหน่วย/ต่อกลุ่ม/ต่อชุด</td><td>".$price."</td></tr>";
027.
echo "<tr><td>มูลค่ารวม</td><td>".$cost."</td></tr>";
028.
echo "<tr><td>อายุการใช้งาน</td><td>".$life."</td></tr>";
029.
echo "<tr><td>วัน เดือน ปี - ที่ตรวจรับ</td><td>".$asset_date."</td></tr>";
030.
echo "</table>";
031.
echo "<table width=90% border=1 align=center>";
032.
echo "<tr>
033.
<th>ปีงบประมาณ</th>
034.
<th colspan=2>วัน เดือน ปี</th>
035.
<Th align=center width='120'>มูลค่ารวม</Th>
036.
<Th align=center width='200'>อายุใช้งาน</Th>
037.
<Th align=center width='135'>ค่าเสื่อมราคาประจำปี</Th>
038.
<Th align=center width='120'>ค่าเสื่อมราคาสะสม</Th>
039.
<Th align=center width='120'>มูลค่าสุทธิ</Th>
040.
</tr>";
041.
 
042.
$life_end_budget=$life +1 ;     //ค่าคำนวณจำนวนเดือนในปีแรกกับปีสุดท้ายรวมเป็น 1 ปี =+1
043.
for($i=1;$i<=$life_end_budget;$i++){
044.
if($i=='1'){    //ค่าคำนวณปีแรก
045.
if($month_budget<=9){
046.
$year_budget=$year_POST;
047.
}else{
048.
$year_budget=$year_POST + 1;
049.
}
050.
$start_period   =$year_POST."-".$month_POST."-".$day_POST; 
051.
$end_period =$year_budget."-".$end_m_budget."-".$end_d_budget;
052.
$dif_year       =($year_budget - $year_POST)  * 12;
053.
$dif_month      =$end_m_budget - $month_budget ;
054.
$life_inyear_budget =$dif_year + $dif_month + 1;
055.
$depreciation           =round($cost / $life * $life_inyear_budget / 12, 2) ;
056.
$depreciation_plus  =round($depreciation_plus + $depreciation, 2);
057.
$net_value              =round($cost - $depreciation_plus, 2);
058.
}else if($i==$life_end_budget){ //ค่าคำนวณปีสุดท้าย
059.
if($month_budget=='10'){ exit; }
060.
$start_period   =$year_POST."-".$start_m_budget."-".$start_d_budget;
061.
if($month_budget <= 9){
062.
$year_budget    =$year_POST+1;
063.
$end_period =$year_budget."-".$month_POST."-".$day_POST;
064.
}else{
065.
$year_budget    =$year_POST;
066.
$end_period =$year_budget."-".$month_POST."-".$day_POST;
067.
}
068.
$dif_year       =($year_budget - $year_POST) * 12 ;
069.
$dif_month      =$month_budget - $start_m_budget ;
070.
$life_inyear_budget =$dif_year + $dif_month;       
071.
$depreciation           =round($cost / $life * $life_inyear_budget / 12, 2);
072.
$depreciation_plus  =round($depreciation_plus + $depreciation - 1, 2);  //คงเหลือมูลค่าสุทธิของทรัพย์สินนั้นเท่ากับ 1 บาท
073.
$net_value              =round($cost - $depreciation_plus, 2);     
074.
}else{      //ค่าคำนวณระหว่างปี
075.
if( ($month_budget=='10') and ($i==$life) ){ $plus=1; }
076.
$year_budget    =$year_POST + 1;
077.
$start_period   =$year_POST."-".$start_m_budget."-".$start_d_budget;
078.
$end_period =$year_budget."-".$end_m_budget."-".$end_d_budget;
079.
$life_inyear_budget ='12';
080.
$depreciation           =round($cost / $life,2) ;
081.
$depreciation_plus  =round($depreciation_plus + $depreciation - $plus,2);
082.
$net_value              =round($cost - $depreciation_plus,2);
083.
}
084.
 
085.
$life_sum = $life_sum+$life_inyear_budget;
086.
$year_budget_th=$year_budget+543;
087.
echo "<tr>
088.
<th>$year_budget_th</th>
089.
<td align=center width='10%'>".$start_period."</td>
090.
<td align=center width='10%'>".$end_period."</td>
091.
<td align=center width='15%'>".number_format($cost,2)."</td>
092.
<td align=center width='10%'>".$life_inyear_budget."</td>
093.
<td align=center width='15%'>".number_format($depreciation,2)."</td>
094.
<td align=center width='15%'>".number_format($depreciation_plus,2)."</td>
095.
<td align=center width='15%'>".number_format($net_value,2)."</td>
096.
</tr>";
097.
$year_budget++;
098.
$year_POST++;
099.
}
100.
echo "</table>";
101.
//สิ้นสุด
102.
echo "<table width=90% align=center>";
103.
echo "<tr><td align=right><a href='http://www.loei1.go.th' target='_blank'>สพป.ลย ๑</a></td></tr>";
104.
echo "<tr><td align=right><a href='http://dlict.loei1.go.th' target='_blank'>กลุ่มส่งเสริมการศึกษาทางไกล เทคโนโลยีสารสนเทศและการสื่อสาร</a></td></tr>";
105.
echo "</table>";
106.
?>