<html>
<head>
    <?
    function addspace($i){
        for ($n = 0; $n < $i; $n++){
            echo "&nbsp;";
        }
    }
    ?>
    <meta charset = 'utf-8'>
    <title>Student Registration System</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <style>
    #ctr {
        display: block;
        margin: auto;
        text-align: center;
        position: relative;
        top: 5vh
    }
    ht {
        font-family: 'Kanit', sans-serif;
        font-size: 48px
    }
    #pdiv {
        margin: left:calc(50vw - 200px);
        font-family: 'Kanit', sans-serif;
        font-size: 24px
    }
    </style>
</head>
<body>
<ht id="ctr">ระบบลงทะเบียนเข้าเรียนอัตโนมัติ</ht>
<!--Blank div-->
<div style="height: 20vh"></div>
<div style="
    height: 20vh; 
    width: 30vw; 
    background-color: black; 
    position: relative; 
    display: block; 
    text-align: center; 
    margin: auto"
>
    <font color="#fff">
        <div id="pdiv">
            <? 
            if (!$login_attempt){
                echo "กรุณาใส่ชื่อผู้ใช้ / รหัสผ่าน";
            } else {
                echo "รหัสผ่าน / ชื่อผู้ใช้งานไม่ถูกต้อง";
            }
            ?>
            <form method="post" action="login.php">
                ID <? addspace(9) ?><input type="text" name="id"><br>
                Password &nbsp;<input type="text" name="pwd"><br>
                <br>
                <input type="submit"><? addspace(9) ?><input type="reset">
            </form>
        </div>
    </font>
</div>
<div style="position: absolute; top: 85vh; width: 101vw; height: 15vh; background-color: #000;">
    <font color="white">
        test footer
    </font>
</div>