<?
include "connect.inc.php";

/*$t = $_GET['test'];
echo $t;
*/

$id = $_POST['id'];
$pwd = $_POST['pwd'];
$dbname = 'teacher_logindata';
$dir = getcwd();

if (!$id || !$pwd) {
  header("Location: ./index.php?login=false");
}

$q = "SELECT pwd FROM $dbname WHERE id = $id";

mysql_select_db('student_regist', $conn) or die(mysql_error());
$res = mysql_query($q);

if (!$res) {
    echo mysql_error();
    header('Location: ./index.php?login=false');
} else {
    while ($row = mysql_fetch_assoc($res)) {
        $check = $row['pwd'];
    }
    if ($check == $pwd){
      header("Location: ./main.php?id=" . $id );
      exit();
    } else {
      header('Location: ./index.php?login=false');
      exit();
    }
}
?>
