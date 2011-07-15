<?
echo "<talent>".$DOCUMENT_ROOT."</talent>";
$con = @mysql_connect($host, $user, $pass);
$con2 = @mysql_select_db($dbname, $con);
if( empty($con2) == false )
{
	echo '<database>ok</database>';
} else {
	echo '<database>no</database>';
}
phpinfo();
?>
