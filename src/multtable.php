<?php
//Activate error reporting. Taken from lecture code
error_reporting(E_ALL);
ini_set('display_errors','On');
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Multiplication Table PHP Assignment</title>
  	<link rel="stylesheet" type="text/css" href="multtable.css">
  <head>
  <body>
<?php
//Assign variable names to paramaters passed in url
$min1 = $_GET['min-multiplier'];
$max1 = $_GET['max-multiplier'];
$min2 = $_GET['min-multiplicand'];
$max2 = $_GET['max-multiplicand'];

$error = false;

//Test that input for each parameter was passed 
//isset() function taken from us2.php.net documentation
if (!isset($min1)) {
	echo "Missing parameter: minimum multiplier<br>";
	$error = true;
}

if (!isset($max1)) {
	echo "Missing parameter: maximim multiplier<br>";
	$error = true;
}

if (!isset($min2)) {
	echo "Missing parameter: minimum multiplicand<br>";
	$error = true;
}

if (!isset($max2)) {
	echo "Missing parameter: maximum multiplicand<br>";
	$error = true;
}

//Test that each input is a valid integer
//numeric() functin taken from us2.php.net documentation
if (!is_numeric($min1)) {
	echo "Minimum multiplier must be an integer.<br>";
	$error = true;
}

if (!is_numeric($min2)) {
	echo "Minimum multiplicand must be an integer.<br>";
	$error = true;
}

if (!is_numeric($max1)) {
	echo "Maximum multiplier must be an integer.<br>";
	$error = true;
}

if (!is_numeric($max2)) {
	echo "Maximum multiplicand must be an integer.<br>";
	$error = true;
}

if ($min1 < 0 || $max1 < 0 || $min2 < 0 || $max2 < 0) {
	echo "All multipliers and multiplicands must be nonnegative integers.<br>";
	$error = true;
}

//Test that minimum values are <= maximum values
if ($min1 > $max1) {
	echo "Minimum multiplier larger than maximum<br>";
	$error = true;	
}

if ($min2 > $max2) {
	echo "Minimum multiplicand larger than maximum<br>";
	$error = true;
}

//Create table if no errors were found
if (!$error) {
//Establish size of table	
echo "<p>Multiplication Table</p>";
$cols = $max1 - $min1 + 2;
$rows = $max2 - $min2 + 2;

echo '<table>';
//Create table with nested for loop
for ($r = 0; $r < $rows; $r++) {
	echo '<tr>';
	if ($r != 0)
		echo '<th>' . ($min2 + $r - 1) . '</th>';

	for ($c = 0; $c < $cols; $c++) {
		if ($c == 0 && $r == 0)		//Top left cell is empty
			echo '<th></th>';
		else if ($r == 0)
			echo '<th>' . ($min1 + $c - 1)	 .'</th>';
		else if ($c > 0 && $r > 0)
			echo '<td>' . ($min1 + $c - 1) * ($min2 + $r - 1) . '</td>';
	}
}
	

}

echo '</table>';

?>
  <body>