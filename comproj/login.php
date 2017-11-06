<?
include "connect.inc.php";

$id = $_POST['id'];
$pwd = $_POST['pwd'];
$dbname = 'test';
$q = "SELECT pwd FROM $dbname WHERE id = $id";

mysql_select_db('student_autoregist', $conn) or die(mysql_error());
$res = mysql_query($q);
if (!$res) {
    die("Invalid query: " . mysql_error());
} else {
    while ($row = mysql_fetch_assoc($res)) {
        echo $row['pwd'];
    }
}
?>