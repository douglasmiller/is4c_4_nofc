<?php
require_once('mysql_connect.php');

$query = "SELECT * FROM departments WHERE dept_discount <> 0 ORDER BY dept_no";
$result = mysql_query($query);

echo "<td><font size='-1'>
	<p><input type='checkbox' value=1 name='allDepts' id='all' CHECKED><b><label for='all'>All SubDepartments</label></b><br>";
while ($row = mysql_fetch_assoc($result)) {
	if (!is_numeric($row['dept_name'])) {
		echo "<input type='checkbox' name='dept[]' value='".$row['dept_no']."' id='chkbox-" . $row['dept_no'] . "'>\n
			<label for='chkbox-" . $row['dept_no'] . "'>".ucwords(strtolower($row['dept_name']))."</label><br>";
	}
}
echo "</p></font></td>";

?>
