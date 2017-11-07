<html>
<head>
    <?
    $login_attempt = $_GET['login'];
    function addspace($i){
        for ($n = 0; $n < $i; $n++){
            echo "&nbsp;";
        }
    }
    ?>
    <meta charset = 'utf-8'>
    <title>Student Registration System</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Kanit');
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
    ft {
      font-family: 'Kanit', sans-serif;
      font-size: 16px
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
    height: 30vh;
    width: 40vw;
    background-color: black;
    position: relative;
    display: block;
    text-align: center;
    margin: auto"
>
    <font color="#fff">
        <div id="pdiv">
            <br>
            <?
            if (!$login_attempt){
                echo "กรุณาใส่ชื่อผู้ใช้ / รหัสผ่าน";
            } else {
                echo "<font color=#f00>รหัสผ่าน / ชื่อผู้ใช้งานไม่ถูกต้อง</font>";
            }
            ?>
            <form method="post" action="login.php">
                ID <? addspace(10) ?><input type="text" name="id"><br>
                Password &nbsp;<input type="password" name="pwd"><br>
                <input type="submit"><? addspace(9) ?><input type="reset">
            </form>
        </div>
    </font>
</div>
<div style="position: absolute; top: 85vh; width: 101vw; height: 15vh; background-color: #000;">
      <div id="ctr">
        <font color="white">
          <ft> © Copyright; 2017, Potisarn Pittayakorn <br> All rights reserved. </ft>
        </font>
      </div>
</div>
