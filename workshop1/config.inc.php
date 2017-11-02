<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$conn=mysql_connect("localhost","root","2712");			
	//เปิดการเชื่อมต่อระหว่างไฟล์สคริปต์ PHP กับ ฐานข้อมูล MySQL โดยใช้คำสั่ง mysql_connect("ชื่อเครื่องเซิร์ฟเวอร์หรือไอพี","user","password")
	
	if(!$conn){				
	//เป็นการตรวจสอบ $conn ที่เก็บผลลัพธ์ของ mysql_connect ว่า สามารถเชื่อมต่อ MySQL ได้หรือเปล่า ถ้ามีเครื่องหมาย ! ข้างหน้า แสดงว่าเป็นการตรวจสอบเงื่อนไขในกรณีที่ mysql_connect ไม่สามารถเชื่อมต่อได้
	
		echo "<h1>Error : Database Failed</h1>";
		exit();
		//เป็นการแสดงข้อความ Error เพื่อแจ้ง User ว่า ฐานข้อมูล MySQL มีปัญหา
		//exit(); เป็นการสั่งให้สคริปต์ PHP ทั้งหมดหยุดการทำงาน
	}
	$dbname="faculty";
	//ตัวแปร $dbname เป็นตัวแปรสำหรับจำชื่อฐานข้อมูล
?>