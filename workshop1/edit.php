<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
	$id=$_GET[id];
	//ขั้นตอนที่ 1 เป็นการแปลงตัวแปรแบบ Global ที่ถูกส่งมาจาก Form หน้า index.php ซึ่งถูกส่งมาแบบ Get โดยสร้างตัวแปรฝั่ง PHP มารองรับ $.....
	//$_GET[id] มาจากปุ่มแก้ไขข้อมูล ในหน้า index.php 
	
	include "config.inc.php";
	//ขั้นตอนที่ 2 เป็นการสร้าง Connection ระหว่าง PHP กับฐานข้อมูล MySQL โดยเป็นการดึง Library ของการเชื่อมต่อ MySQL มาใช้
	
	$sql="select * from student where id='$id'";
	//ขั้นตอนที่ 3 เป็นการสั่งให้ MySQL ทำงาน จะต้องอาศัยภาษา SQL ซึ่ง PHP จะไม่สามารถสั่งการได้โดยตรง จะต้องอาศัยตัวแปร $.... มาเก็บข้อความ SQL ก่อน แล้วจึงค่อยนำไปรัน
	
	$result=mysql_db_query($dbname,$sql);
	//ขั้นตอนที่ 4 เป็นการนำ SQL ที่สร้างขึ้นมาทำงาน โดยผ่าน mysql_db_query("ชื่อฐานข้อมูล","ตัวแปรที่เก็บคำสั่ง SQL") $dbname มาจากไฟล์ config.inc.php ซึ่งเราใส่ชื่อฐานข้อมูลไว้แล้ว
	//ตัวแปร $result จะทำหน้าที่เก็บข้อมูลที่ถูกดึงมาจากฐานข้อมูล โดยคำสั่ง SQL (select * from....)
	
	$record=mysql_fetch_array($result);
	//ขั้นตอนที่ 5 คำสั่ง SQL สำหรับดึงข้อมูล (select * from ...) ในหน้านี้จะแตกต่างจาก SQL ในหน้า index.php จะมีใช้คำสั่งวนลูป while(...) เนื่องจากคำสั่ง SQL ข้างบน จะไม่มีวันดึงข้อมูลมากกว่า 1 แถวได้ เพราะเงื่อนไขฟิลด์ id เป็น primary key 
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
	//ขั้นตอนที่ 6 หลังจากดึงออกมาทีละ แถว (record) แล้ว ข้อมูลจะยังไม่สามารถนำไปใช้ได้ จะต้องมีการดึงข้อมูลระดับ Cell ซึ่งเป็นระดับที่เล็กที่สุดก่อน จึงจะสามารถนำไปแสดงผลตามที่โปรแกรมเมอร์ต้องการได้
	//$...=$record[...] เป็นการสร้างตัวแปร $... แล้วนำค่าจาก $record[...] มาใส่ 
	//$record[...] เป็นการดึงข้อมูลออกมาจาก Cell โดยใช้ Array ซึ่งตำแหน่งของ Array จะไม่ใช่ตัวเลข 0,1,2,...... แต่จะแทนด้วยชื่อฟิลด์ ตามคำสั่งข้างบน ซึ่งจะต้องตรงกับชื่อฟิลด์ในฐานข้อมู
?>
<form method="post" action="update.php?id=<?=$id?>">
ชื่อ : <input type="text" name="name" value="<?=$name?>" /><br />

	<?
		if($gender=="1"){
		//หาก ค่า $gender ที่ดึงมาจากฐานข้อมูลมีค่าเท่ากับ 1 จะมีแอทริบิวต์ checked="checked" เพื่อเป็นการเลือกอัตโนมัติให้อยู่ที่เพศชาย
	?>
	เพศ : <input type="radio" name="gender" value="1" checked="checked" />ชาย
			<input type="radio" name="gender" value="2" />หญิง
	<?
			}else{
			//หาก ค่า $gender ที่ดึงมาจากฐานข้อมูลมีค่าที่ไม่ใช่ 1 จากเงื่อนไขแรก จะมีแอทริบิวต์ checked="checked" เพื่อเป็นการเลือกอัตโนมัติให้อยู่ที่เพศหญิง
	?>  
   
	เพศ : <input type="radio" name="gender" value="1" />ชาย
			<input type="radio" name="gender" value="2" checked="checked" />หญิง
	<? 
			}//ปิด Loop if 
	?>      
<br />
สาขาวิชา : <input type="text" name="program" value="<?=$program?>" /><br />
คณะ : <input type="text" name="faculty" value="<?=$faculty?>" /><br />
ที่อยู่ : <textarea name="adr"><?=$adr?></textarea><br />
<input type="checkbox" name="game" value="1" <? if($game==1){ ?> checked="checked"<? } ?> />เล่นเกมส์
<input type="checkbox" name="movie" value="1" <? if($movie==1){ ?> checked="checked"<? } ?> />ดูหนัง
<input type="checkbox" name="music" value="1" <? if($music==1){ ?> checked="checked"<? } ?>  />ฟังเพลง<br />
<input type="submit" value="แก้ไขข้อมูล" />
</form>
</body>
</html>





