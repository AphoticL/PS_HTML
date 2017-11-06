<style>
    @import url('https://fonts.googleapis.com/css?family=Kanit');
    #red {
        font-family: 'Kanit', sans-serif;
        font-size: 72px;
        color: #F00;
        display: block;
        margin: auto;
        text-align: center;
    }
</style>
<meta charset = 'utf-8'>
<?
    $conn = mysql_connect("localhost", "root", "11111111");
    if (!$conn) {
        echo "<h id=\"red\"> DATABASE ERROR </h>";
    }
?>