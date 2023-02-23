<html>
<head>
<title>Musical</title>
<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "musical_reser";
$conn = new mysqli($servername, $username, $password, $dbname);
$stoelen = [['Rij 1'],['Rij 2'],['Rij 3'],['Rij 4'],['Rij 5'],['Rij 6'],['Rij 7'],['Rij 8'],['Rij 9'],['Rij 10'],['Rij 11'],['Rij 12'],['Rij 13'],['Rij 14'],['Rij 15'],['Rij 16'],['Rij 17'],['Rij 18'],['Rij 19']];
$aantal_stoelen = [23,24,25,26,27,28,29,30,31,32,33,31,32,31,30,31,30,31,34];
for ($x = 0; $x < count($stoelen); $x++){
	for ($y = 0; $y < $aantal_stoelen[$x]; $y++){
		array_push($stoelen[$x], (($x+1)."_".($y+1)));
	}
}
$show = $datum = '';
$fout = false;
$prijs_woensdag_avond = 6.00;
$prijs_donderdag_avond = 7.00;
$prijs_vrijdag_middag = 5.0;
$prijs_vrijdag_avond = 8.0;

?>
</head>
<body>
<a href="home.php">Home</a><a href="reserveren.php">Reserveren</a><br>
<?php
echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
echo '<select name="datum" id="datum">
	<option value="Empty" selected disabled hidden> </option>
	<option value="woensdag_avond">Try-out - Woensdag avond</option>
	<option value="donderdag_avond">Premiere - Donderdag avond</option>
    <option value="vrijdag_middag">Matineevoorstelling - Vrijdag middag</option>
    <option value="vrijdag_avond">Vrijdag avond</option>
</select>';
echo "Aantal tickets: <input type='number' id='aantal_tickets' name='aantal_tickets' min='1' max='150'>";
echo '<br><input type="submit" value="Bevestig keuze" name="datum_tickets">';
echo '</form>';

if (isset($_POST['datum_tickets'])){
	$datum = $_POST['datum'];
	$aantal_tickets = $_POST['aantal_tickets'];
	#echo $datum;
	#echo $aantal_tickets;
	
	$sql = "SELECT * FROM zaal_vrijdag_middag WHERE status=0";
	$result = $conn->query($sql);
	$aantal_plekken = $result->num_rows;
	if ($datum != "Empty" and $aantal_plekken >= $aantal_tickets){
		echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
		echo "Voornaam:  <input type='text' id='fname' name='fname'><br>";
		echo "Tussenvoegsel: <input type='text' id='Tussenvoegsel' name='Tussenvoegsel'><br>";
		echo "Achternaam: <input type='text' id='Achternaam' name='Achternaam'><br>";
		echo "Email: <input type='text' id='email' name='email'><br>";
		echo "<input type='hidden' id='info_hidden' name='datum' value=$datum>";
		echo "<input type='hidden' id='info_hidden' name='submit_tickets' value=$aantal_tickets>";
		echo '<br><input type="submit" value="Bevestig gegevens" name="bevestig_gegevens">';
		echo '</form>';
	}else{
		if ($aantal_plekken < $aantal_tickets){
			echo "Deze datum heeft niet voldoende plekken, kies alstublieft een andere datum.";
		}else{
			echo "Deze datum is niet beschikbaar, kies alstublieft een andere datum.";
		}
	}
}
if (isset($_POST['bevestig_gegevens'])){
	$datum = $_POST['datum'];
	$submit_tickets = $_POST['submit_tickets'];
	$fname = $_POST['fname'];
	$tussenvoegsel = $_POST['Tussenvoegsel'];
	$achternaam = $_POST['Achternaam'];
	$email = $_POST['email'];
	echo $datum."<br>";
	
	echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
	for ($z = 0; $z < count($stoelen); $z++){
		echo $stoelen[$z][0]." - ";
		for ($x = 0; $x < $aantal_stoelen[$z]; $x++){
			$sql = "SELECT * FROM zaal_".$datum." WHERE (stoelrij= ".($z+1)." and stoelnummer=".($x+1).")";
			$result = $conn->query($sql);
			$status = $result->fetch_assoc();
			if ($status["status"] == 0){
				echo ($x+1)."<input type='checkbox' name='stoel[]' value=".$stoelen[$z][$x+1]." >";
			}else{
				echo ($x+1)."<input type='checkbox' name='stoel[]' value=".$stoelen[$z][$x+1]." disabled>";
			}
		}
		echo "<br>";
	}
	echo "<input type='hidden' id='info_hidden' name='datum' value=$datum>";
	echo "<input type='hidden' id='info_hidden' name='submit_tickets' value=$submit_tickets>";
	echo "<input type='hidden' id='info_hidden' name='fname' value=$fname>";
	echo "<input type='hidden' id='info_hidden' name='between' value=$tussenvoegsel>";
	echo "<input type='hidden' id='info_hidden' name='lname' value=$achternaam>";
	echo "<input type='hidden' id='info_hidden' name='email' value=$email>";
	echo '<br><input type="submit" value="Stoelen kiezen" name="submit_stoelen">';
	echo '</form>';
}
 if(isset($_POST['submit_stoelen']) ){
	$datum = $_POST['datum'];
	$submit_tickets = $_POST['submit_tickets'];
	$fname = $_POST['fname'];
	$tussenvoegsel = $_POST['between'];
	$achternaam = $_POST['lname'];
	$stoelen = $_POST['stoel'];
	$email = $_POST['email'];
	$stoelen = $_POST['stoel'];
	if ($datum == 'woensdag_avond'){
		$kosten = $prijs_woensdag_avond * $submit_tickets;
	}else if ($datum == 'donderdag_avond'){
		$kosten = $prijs_donderdag_avond * $submit_tickets;
	}else if ($datum == 'vrijdag_avond'){
		$kosten = $prijs_vrijdag_avond * $submit_tickets;
	}else if ($datum == 'vrijdag_middag'){
		$kosten = $prijs_vrijdag_middag * $submit_tickets;
	}
	
	print_r($_POST['stoel']);
	echo $show." - ";
	echo $datum." - ";
	echo $submit_tickets." - ";
	echo $fname." ";
	echo $tussenvoegsel." ";
	echo $achternaam."<br>";
	
	if ($submit_tickets == sizeof($stoelen)){
		$sql = "SELECT * FROM reserveringen ORDER BY id DESC LIMIT 1";
		$result = $conn->query($sql);
		$status = $result->fetch_assoc();
		$id = $status['id'] + 1;
		
		$sql = "INSERT INTO reserveringen (id, voornaam, tussenvoegsel, achternaam, email, aantal_tickets, datum, kosten) VALUES ('$id', '$fname', '$tussenvoegsel', '$achternaam', '$email', $submit_tickets, '$datum', $kosten)";
		if ($conn->query($sql) === TRUE) {
			echo "gegevens ingevoerd <br>";
		}else{
			echo "fout <br>". $conn->error;
		}
		foreach ($stoelen as $value) {
			echo "$value <br>";
			$stoel = explode("_", $value);
			$rij = $stoel[0];
			$nr = $stoel[1];
			$sql = "UPDATE zaal_".$datum." SET status=2, reservingingsnummer = $id WHERE stoelrij=$rij and stoelnummer =$nr";
			if ($conn->query($sql) === TRUE) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . $conn->error;
			} 
		}
		echo "<h2>Bedankt voor het reserveren, we zullen spoedig contact opnemen voor de betaling</h2>";
		header("refresh:10;url='home.php'");
	}else{
		echo "Er is iets fout gegaan, kies andere stoelen.";
	}
 }
 mysqli_close($conn);
?>

</body>
</html>