<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$id=$_GET[id];
	$name=$_POST[name];
	$gender=$_POST[gender];
	$program=$_POST[program];
	$faculty=$_POST[faculty];
	$adr=$_POST[adr];
	$game=$_POST[game];
	$movie=$_POST[movie];
	$music=$_POST[music];
	//ขั้นตอนที่ 1 เป็นการแปลงตัวแปรแบบ Global ที่ถูกส่งมาจาก Form หน้า index.php ซึ่งถูกส่งมาแบบ Post และ Get โดยสร้างตัวแปรฝั่ง PHP มารองรับ $.....
	//$_GET[id] มาจากแอทริบิวต์ action=update.php?.......... ในหน้า edit.php 
	
	include "config.inc.php";
	//ขั้นตอนที่ 2 เป็นการสร้าง Connection ระหว่าง PHP กับฐานข้อมูล MySQL โดยเป็นการดึง Library ของการเชื่อมต่อ MySQL มาใช้
	
	$sql="update student set name='$name',gender='$gender',program='$program',faculty='$faculty',adr='$adr',game='$game',movie='$movie',music='$music' where id='$id'";
	//ขั้นตอนที่ 3 เป็นการสั่งให้ MySQL ทำงาน จะต้องอาศัยภาษา SQL ซึ่ง PHP จะไม่สามารถสั่งการได้โดยตรง จะต้องอาศัยตัวแปร $.... มาเก็บข้อความ SQL ก่อน แล้วจึงค่อยนำไปรัน
	
	$result=mysql_db_query($dbname,$sql);
	//ขั้นตอนที่ 4 เป็นการนำ SQL ที่สร้างขึ้นมาทำงาน โดยผ่าน mysql_db_query("ชื่อฐานข้อมูล","ตัวแปรที่เก็บคำสั่ง SQL") $dbname มาจากไฟล์ config.inc.php ซึ่งเราใส่ชื่อฐานข้อมูลไว้แล้ว
	//ตัวแปร 	$result จะทำหน้าที่เก็บผลลัพธ์ การทำงานของ SQL
	
	if($result){
	//เป็นการตรวจสอบ ตัวแปร $result ว่าทำงานผิดปกติหรือเปล่า ถ้าไม่มีเครื่องหมาย ! ข้างหน้า แสดงว่าเป็นการตรวจสอบเงื่อนไขในกรณีที่ SQL ที่สร้างขึ้นทำงานได้ตามปกติ	
		echo "เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว<br>
					<a href='index.php'>กลับหน้าหลัก</a>";
	}else{
		echo "ไม่สามารถเปลี่ยนแปลงข้อมูลได้<br>
					<a href='index.php'>กลับหน้าหลัก</a>";
	}
?>





