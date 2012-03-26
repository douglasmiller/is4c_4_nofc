<?php
include('../src/header.php');
include('./includes/header.html');

echo "<form action='export.php' method=GET>";

$currentQ = "SELECT periodID FROM is4c_log.payperiods WHERE now() BETWEEN periodStart AND periodEnd";
$currentR = mysql_query($currentQ);
list($ID) = mysql_fetch_row($currentR);

$query = "SELECT date_format(periodStart, '%M %D, %Y') as periodStart, date_format(periodEnd, '%M %D, %Y') as periodEnd, periodID FROM is4c_log.payperiods WHERE periodStart < now() ORDER BY periodID DESC";
$result = mysql_query($query);

echo '<p>Pay Period: <select name="period">
    <option>Please select a payperiod to view.</option>';

while ($row = mysql_fetch_array($result)) {
    echo "<option value=\"" . $row['periodID'] . "\"";
    if ($row['periodID'] == $ID) { echo ' SELECTED';}
    echo ">(" . $row['periodStart'] . " - " . $row['periodEnd'] . ")</option>";
}
echo '</select><button value="export" name="Export">Export</button></p></form>';

if ($_GET['Export'] == 'export') {
	$periodID = $_GET['period'];
	$dumpQ = "SELECT * FROM is4c_log.timesheet WHERE periodID = " . $periodID;
	// echo $dumpQ;
	$result = mysql_query($dumpQ);
	echo "<table cellpadding='3'><thead><tr>
		<th>emp#</th><th>starttime</th><th>endtime</th><th>area</th><th>date</th><th>period</th><th>id</th></tr></thead><tbody>";
	while ($row = mysql_fetch_array($result)) {
		echo "<tr><td>".$row['emp_no']."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td></tr>";
	}
	echo "</tbody></table>";
}




include('../src/footer.php');

?>
