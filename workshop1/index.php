<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="1000" cellpadding="0" cellspacing="0" border="1" align="center">
	<tr><td colspan="2" height="200" align="center" valign="middle">ตัวอย่างการพัฒนาระบบฐานข้อมูลออนไลน์</td></tr>
    <tr>
    		<td width="200">
            		<table width="100%" cellpadding="0" cellspacing="0" border="1">	
                    	<tr><td align="center">หน้าหลัก</td></tr>
                        <tr><td align="center"><a href="add.php">เพิ่มข้อมูลใหม่</a></td></tr>
                    </table>
            </td>
    		<td width="800" align="center">
            	<?
					echo "<table width='85%' cellpadding='0' cellspacing='0' border='1'>";
					//เป็นการดึงข้อมูลมาจากฐานข้อมูล Faculty โดยประยุกต์ใช้ตารางใน Html จัดรูปแบบให้สวยงานและดูง่าย
					
					echo "<tr>
									<td>ลำดับ</td>
									<td>ชื่อ</td>
									<td>เพศ</td>
									<td>สาขาวิชา</td>
									<td>คณะ</td>
									<td>ที่อยู่</td>
									<td colspan='3'>งานอดิเรกที่ทำ</td>
									<td>แก้ไข</td>
									<td>ลบ</td>
							";
					//ส่วนหัวคำอธิบาย Column ของตาราง
					
					include "config.inc.php";
					//ขั้นตอนที่ 1 เป็นการสร้าง Connection ระหว่าง PHP กับฐานข้อมูล MySQL โดยเป็นการดึง Library ของการเชื่อมต่อ MySQL มาใช้
					
					$sql="select * from student order by id desc";
					//ขั้นตอนที่ 2 เป็นการสั่งให้ MySQL ทำงาน จะต้องอาศัยภาษา SQL ซึ่ง PHP จะไม่สามารถสั่งการได้โดยตรง จะต้องอาศัยตัวแปร $.... มาเก็บข้อความ SQL ก่อน แล้วจึงค่อยนำไปรัน
					
					$result=mysql_db_query($dbname,$sql);
					//ขั้นตอนที่ 3 เป็นการนำ SQL ที่สร้างขึ้นมาทำงาน โดยผ่าน mysql_db_query("ชื่อฐานข้อมูล","ตัวแปรที่เก็บคำสั่ง SQL") $dbname มาจากไฟล์ config.inc.php ซึ่งเราใส่ชื่อฐานข้อมูลไว้แล้ว
					//ตัวแปร 	$result จะทำหน้าที่เก็บข้อมูลที่ถูกดึงมาจากฐานข้อมูล โดยคำสั่ง SQL (select * from....)
	
					while($record=mysql_fetch_array($result)){
					//ขั้นตอนที่ 4 SQL สำหรับดึงข้อมูล (select * from ...) จะมีขั้นตอนที่แตกต่างจาก SQL อื่น ๆ คือ เมื่อสั่งให้ SQL ทำงานแล้ว จะมีก้อนข้อมูลกลับมาจากฐานข้อมูล สำหรับนำไปแสดงผล ซึ่งก้อนข้อมูลที่กลับมาจากมีขนาดใหญ่ ไม่สามารถแสดงผลได้ด้วยคำสั่งเพียงครั้งเดียว จึงต้องมีการใช้คำสั่งวนลูป while(...) ในการช่วยทำงานซ้ำจนกว่าก้อนข้อมูลจะถูกดึงมาทั้งหมด
					//ตัวแปร $record จะทำหน้าที่เป็นตัวพักข้อมูล ในการทำงานแต่ละครั้ง ซึ่งในการทำงานแต่ละครั้งก้อนข้อมูลจะถูกดึงออกมาทีละ แถว (record) และจะถูกนำไปจัดเก็บในตัวแปร $record เพื่อนำไปดึงข้อมูลย่อยระดับ Cell ต่อไป
					
						$id=$record[id];
						$name=$record[name];
						$gender=$record[gender];
						$program=$record[program];
						$faculty=$record[faculty];
						$adr=$record[adr];
						$game=$record[game];
						$movie=$record[movie];
						$music=$record[music];
						//ขั้นตอนที่ 5 หลังจากดึงออกมาทีละ แถว (record) แล้ว ข้อมูลจะยังไม่สามารถนำไปใช้ได้ จะต้องมีการดึงข้อมูลระดับ Cell ซึ่งเป็นระดับที่เล็กที่สุดก่อน จึงจะสามารถนำไปแสดงผลตามที่โปรแกรมเมอร์ต้องการได้
						//$...=$record[...] เป็นการสร้างตัวแปร $... แล้วนำค่าจาก $record[...] มาใส่ 
						//$record[...] เป็นการดึงข้อมูลออกมาจาก Cell โดยใช้ Array ซึ่งตำแหน่งของ Array จะไม่ใช่ตัวเลข 0,1,2,...... แต่จะแทนด้วยชื่อฟิลด์ ตามคำสั่งข้างบน ซึ่งจะต้องตรงกับชื่อฟิลด์ในฐานข้อมูล
						
						if($gender==1){
							$gender="ชาย";
						}else{
							$gender="หญิง";
						}
						//เป็นการเขียนคำสั่งสำหรับแปลงค่าข้อมูล ซึ่ง 1=เพศชาย และ 2=เพศหญิง
						
						if($game=="1"){
							$game="เล่นเกมส์";
						}else{
							$game="ไม่เล่นเกมส์";
						}
						
						if($movie=="1"){
							$movie="ดูหนัง";
						}else{
							$movie="ไม่ดูหนัง";
						}
						
						if($music=="1"){
							$music="ฟังเพลง";
						}else{
							$music="ไม่ฟังเพลง";
						}
						//เป็นการเขียนคำสั่งสำหรับแปลงค่าข้อมูล ซึ่ง 0=ไม่ทำกิจกรรมนั้น และ 1=ทำกิจกรรมนั้น
						
						echo "<tr>
									<td>$id</td>
									<td>$name</td>
									<td>$gender</td>
									<td>$program</td>
									<td>$faculty</td>
									<td>$adr</td>
									<td>$game</td>
									<td>$movie</td>
									<td>$music</td>
									<td><a href='edit.php?id=$id'><img src='edit.png' border='0'></a></td>
									<td><a href='delete.php?id=$id'><img src='delete.png' border='0'></a></td>
									</tr>
							";
						//ตัวแปรที่ถูกดึงออกมา มาแสดงผลในรูปแบบของตาราง html
						//<a href='edit.php?id=$id'><img src='edit.png' border='0'></a> เป็นการส่งตัวแปรแบบ Get ไปที่หน้า edit.php โดยส่งตัว id ไปแก้ไข
						//<a href='delete.php?id=$id'><img src='delete.png' border='0'></a> เป็นการส่งตัวแปรแบบ Get ไปที่หน้า delete.php โดยส่งตัว id ไปลบ
					}
					
					echo "</table>";
				?>            
            </td>
    </tr>
</table>
</body>
</html>
