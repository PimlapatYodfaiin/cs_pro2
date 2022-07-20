<?php
	//เริ่มต้น - คำนวณค่าเสื่อมราคา
	$life		='5' ;			//อายุการใช้งาน
	$unit		='20' ;			//จำนวนหน่วย
	$price	='3500';		//ราคาต่อหน่วย ต่อกลุ่ม ต่อชุด
	$cost		= $unit * $price ;		//มูลค่ารวม

	$start_m_budget	= '10';		//กำหนดเดือน เริ่มต้นปีงบประมาณ 1 ตุลาคม
	$start_d_budget	= '01';		//กำหนดวัน เริ่มต้นปีงบประมาณ 1 ตุลาคม
	$end_m_budget	= '09';		//กำหนดเดือน สิ้นปีงบประมาณ 30 กันยายน
	$end_d_budget	= '30';		//กำหนดวัน สิ้นปีงบประมาณ 30 กันยายน
	$day_POST			= date("d");		//วัน - ตรวจรับ
	$month_POST		= date("m");		//เดือน - ตรวจรับ
	$year_POST		= date("Y");		//ปี - ตรวจรับ
	$asset_date = $year_POST."-".$month_POST."-".$day_POST;	//วันเดือนปี ที่ตรวจรับทรัพย์สิน

	//การตรวจรับระหว่างวันที่ 16-28/29/30/31 ของเดือน ให้เริ่มคำนวณค่าเสื่อมราคาในเดือนถัดไป
	if($day_POST<=15){ 
		$month_budget=$month_POST; 
	}else{ 
		$month_budget=$month_POST+1; 
	} 
	echo "<table align=center>";
		echo "<tr><td colspan=2>สำนักงานเขตพื้นที่การศึกษาประถมศึกษาเลย เขต 1</td></tr>";
		echo "<tr><td>จำนวนหน่วย</td><td>".$unit."</td></tr>";
		echo "<tr><td>ราคาต่อหน่วย/ต่อกลุ่ม/ต่อชุด</td><td>".$price."</td></tr>";
		echo "<tr><td>มูลค่ารวม</td><td>".$cost."</td></tr>";
		echo "<tr><td>อายุการใช้งาน</td><td>".$life."</td></tr>";
		echo "<tr><td>วัน เดือน ปี - ที่ตรวจรับ</td><td>".$asset_date."</td></tr>";
	echo "</table>";
	echo "<table width=90% border=1 align=center>";
	echo "<tr>
		<th>ปีงบประมาณ</th>
		<th colspan=2>วัน เดือน ปี</th>
		<Th align=center width='120'>มูลค่ารวม</Th>
		<Th align=center width='200'>อายุใช้งาน</Th>
		<Th align=center width='135'>ค่าเสื่อมราคาประจำปี</Th>
		<Th align=center width='120'>ค่าเสื่อมราคาสะสม</Th>
		<Th align=center width='120'>มูลค่าสุทธิ</Th>
		</tr>";

	$life_end_budget=$life +1 ;		//ค่าคำนวณจำนวนเดือนในปีแรกกับปีสุดท้ายรวมเป็น 1 ปี =+1 
	for($i=1;$i<=$life_end_budget;$i++){
		if($i=='1'){	//ค่าคำนวณปีแรก
			if($month_budget<=9){
				$year_budget=$year_POST;
			}else{
				$year_budget=$year_POST + 1;
			}
			$start_period	=$year_POST."-".$month_POST."-".$day_POST;	
			$end_period	=$year_budget."-".$end_m_budget."-".$end_d_budget;
			$dif_year		=($year_budget - $year_POST)  * 12; 
			$dif_month		=$end_m_budget - $month_budget ;
			$life_inyear_budget	=$dif_year + $dif_month + 1;
			$depreciation			=round($cost / $life * $life_inyear_budget / 12, 2) ;
			$depreciation_plus	=round($depreciation_plus + $depreciation, 2);
			$net_value				=round($cost - $depreciation_plus, 2);
		}else if($i==$life_end_budget){	//ค่าคำนวณปีสุดท้าย
			if($month_budget=='10'){ exit; }
			$start_period	=$year_POST."-".$start_m_budget."-".$start_d_budget;
			if($month_budget <= 9){
				$year_budget	=$year_POST+1;
				$end_period	=$year_budget."-".$month_POST."-".$day_POST;
			}else{
				$year_budget	=$year_POST;
				$end_period	=$year_budget."-".$month_POST."-".$day_POST;
			}
			$dif_year		=($year_budget - $year_POST) * 12 ;
			$dif_month		=$month_budget - $start_m_budget ;
			$life_inyear_budget	=$dif_year + $dif_month;		
			$depreciation			=round($cost / $life * $life_inyear_budget / 12, 2);
			$depreciation_plus	=round($depreciation_plus + $depreciation - 1, 2);	//คงเหลือมูลค่าสุทธิของทรัพย์สินนั้นเท่ากับ 1 บาท
			$net_value				=round($cost - $depreciation_plus, 2);		
		}else{		//ค่าคำนวณระหว่างปี
			if( ($month_budget=='10') and ($i==$life) ){ $plus=1; }
			$year_budget	=$year_POST + 1;
			$start_period	=$year_POST."-".$start_m_budget."-".$start_d_budget;
			$end_period	=$year_budget."-".$end_m_budget."-".$end_d_budget;
			$life_inyear_budget	='12';
			$depreciation			=round($cost / $life,2) ;
			$depreciation_plus	=round($depreciation_plus + $depreciation - $plus,2);
			$net_value				=round($cost - $depreciation_plus,2);
		}

		$life_sum = $life_sum+$life_inyear_budget;
		$year_budget_th=$year_budget+543;
		echo "<tr>
			<th>$year_budget_th</th>
			<td align=center width='10%'>".$start_period."</td>
			<td align=center width='10%'>".$end_period."</td>
			<td align=center width='15%'>".number_format($cost,2)."</td>
			<td align=center width='10%'>".$life_inyear_budget."</td>
			<td align=center width='15%'>".number_format($depreciation,2)."</td>
			<td align=center width='15%'>".number_format($depreciation_plus,2)."</td>
			<td align=center width='15%'>".number_format($net_value,2)."</td>
		</tr>";
		$year_budget++;
		$year_POST++;
	}
	echo "</table>";
	//สิ้นสุด
echo "<table width=90% align=center>";
echo "<tr><td align=right><a href='http://www.loei1.go.th' target='_blank'>สพป.ลย ๑</a></td></tr>";
echo "<tr><td align=right><a href='http://dlict.loei1.go.th' target='_blank'>กลุ่มส่งเสริมการศึกษาทางไกล เทคโนโลยีสารสนเทศและการสื่อสาร</a></td></tr>";
echo "</table>";
?>