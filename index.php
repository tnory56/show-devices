<html>
<head>
	<title>Mac Addresses</title>
	<!-- choose a theme file -->
<!--	<link rel="stylesheet" href="node_modules/tablesorter/dist/css/theme.default.css"/>-->
	<link rel="stylesheet" href="tablesorter/css/theme.dark.css"/>

	<!-- load jQuery and tablesorter scripts -->
<!--	<script type="text/javascript" src="node_modules/requirejs/require.js"></script>-->
<!--	<script type="text/javascript" src="node_modules/jquery/src/jquery.js"></script>-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="tablesorter/js/jquery.tablesorter.js"></script>

	<!-- tablesorter widgets (optional) -->
	<script type="text/javascript" src="tablesorter/js/jquery.tablesorter.widgets.js"></script>
	<script type="text/javascript" src="tablesorter/js/parsers/parser-network.js"></script>
</head>
<body><?php
if(isset($_GET['password']) && $_GET['password'] === "FARTFROMPUKING!@()")
{
	$dir = 'sqlite:/home/pi/home.db';
	$dbh  = new PDO($dir) or die("cannot open the database");
	$query =  "SELECT * FROM macs ORDER BY mac_vendor";
?>
	<table id="macs" class="tablesorter-dark">
	<thead>
		<th>MAC</th>
		<th>Count</th>
		<th>Description</th>
		<th>IP Address</th>
		<th>Mac Vendor</th>
		<th>MDNS Local</th>
	<thead>
	<tbody>
<?php
	foreach ($dbh->query($query) as $row)
	{
		//echo "<pre>"; var_dump($row); echo "</pre>";
		echo "<tr>";
		foreach($row as $key => $result)
		{
			if(is_numeric($key))
			{
				echo "<td>$result</td>";
			}
		}
		echo "</tr>";
	}
?>
	</tbody>
	</table>
<?php
	$dbh = null; //This is how you close a PDO connection
}
?>
<script>
$(function() {
	$("#macs").tablesorter({
		headers: {
		    0: { sorter: 'MAC' },
		    3: { sorter: 'ipAddress' }, 
		}
	});
});
</script>
</body>
</html>
