<html>
<head>
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
?>
</head>
<body>
<?php
echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
echo '<input type="submit" value="Reserveringen" name="reserveringen">';
echo '<input type="submit" value="Zaal woensdag avond" name="zaal_woensdag_avond">';
echo '<input type="submit" value="Zaal donderdag avond" name="zaal_donderdag_avond">';
echo '<input type="submit" value="Zaal vrijdag middag" name="zaal_vrijdag_middag">';
echo '<input type="submit" value="Zaal vrijdag avond" name="zaal_vrijdag_avond">';
echo '</form>';

#---------------------------------------reserveringen---------------------------------------
if (isset($_POST['reserveringen']) or isset($_POST['bevestigen']) or isset($_POST['verwijder_gegevens'])or isset($_POST['aanpassen']) or isset($_POST['all']) or isset($_POST['woensdag_avond']) or isset($_POST['donderdag_avond']) or isset($_POST['vrijdag_avond']) or isset($_POST['vrijdag_middag'])){
	$all = true;
	echo "<h1> Reserveringen </h1>";
	echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
	echo '<input type="submit" value="Alles" name="all">';
	echo '<input type="submit" value="Woensdag avond" name="woensdag_avond">';
	echo '<input type="submit" value="Donderdag avond" name="donderdag_avond">';
	echo '<input type="submit" value="Vrijdag middag" name="vrijdag_middag">';
	echo '<input type="submit" value="Vrijdag avond" name="vrijdag_avond">';
	echo '</form>';
	
	if (isset($_POST['bevestigen'])){
		$id = $_POST['id_nr'];
		$voornaam = $_POST['voornaam'];
		$tussenvoegsel = $_POST['tussenvoegsel'];
		$achternaam = $_POST['achternaam'];
		$email = $_POST['email'];
		$datum = $_POST['datum'];
		$aantal_tickets = $_POST['aantal_tickets'];
		$sql = "UPDATE reserveringen SET voornaam='$voornaam',tussenvoegsel='$tussenvoegsel', achternaam='$achternaam', email='$email', datum='$datum', aantal_tickets=$aantal_tickets WHERE id=$id";
		if ($conn->query($sql) === TRUE) {
			echo "gegevens geupdate <br>";
		}else{
			echo "fout <br>". $conn->error;
		}
	}
	if (isset($_POST['verwijder_gegevens'])){
		$id = $_POST['id_nr'];
		$datum = $_POST['datum'];
		$sql = "DELETE FROM zaal_".$datum." WHERE reservingingsnummer = $id";
		if ($conn->query($sql) === TRUE) {
			echo "gegevens verwijderd <br>";
		}else{
			echo "fout <br>". $conn->error;
		}
		$aantal_tickets = $_POST['aantal_tickets'];
		$sql = "DELETE FROM reserveringen WHERE id = $id";
		if ($conn->query($sql) === TRUE) {
			echo "gegevens verwijderd <br>";
		}else{
			echo "fout <br>". $conn->error;
		}
	}
	if (isset($_POST['aanpassen']) ){
		$id = $_POST['aanpassen'];
		$sql = "SELECT * FROM reserveringen WHERE id=".$id;
		$result = $conn->query($sql);
		$status = $result->fetch_assoc();
		echo "ID : ".$id;
		echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
		echo "<input type='hidden' id='id_nr' name='id_nr' value='".$id."'>";
		echo "Voornaam:  <input type='text' id='voornaam' name='voornaam' value=".$status['voornaam']."><br>";
		echo "Tussenvoegsel: <input type='text' id='tussenvoegsel' name='tussenvoegsel'value=".$status['tussenvoegsel']."><br>";
		echo "Achternaam: <input type='text' id='achternaam' name='achternaam'value=".$status['achternaam']."><br>";
		echo "Email: <input type='text' id='email' name='email'value=".$status['email']."><br>";
		echo "Datum: ";
		if ($status['datum'] == "woensdag_avond"){
			echo '<select name="datum" id="datum">';
			echo '<option value="woensdag_avond" selected>Try-out - Woensdag avond</option>
			<option value="donderdag_avond">Premiere - Donderdag avond</option>
			<option value="vrijdag_middag">Vrijdag middag</option>
			<option value="vrijdag_avond">Vrijdag avond</option>';
			echo '</select><br>';
		}else if ($status['datum'] == "donderdag_avond"){
			echo '<select name="datum" id="datum">';
			echo '<option value="woensdag_avond">Try-out - Woensdag avond</option>
			<option value="donderdag_avond" selected>Premiere - Donderdag avond</option>
			<option value="vrijdag_middag">Vrijdag middag</option>
			<option value="vrijdag_avond">Vrijdag avond</option>';
			echo '</select><br>';
		}else if ($status['datum'] == "vrijdag_middag"){
			echo '<select name="datum" id="datum">';
			echo '<option value="woensdag_avond">Try-out - Woensdag avond</option>
			<option value="donderdag_avond">Premiere - Donderdag avond</option>
			<option value="vrijdag_middag" selected>Vrijdag middag</option>
			<option value="vrijdag_avond">Vrijdag avond</option>';
			echo '</select><br>';
		}else if ($status['datum'] == "vrijdag_avond"){
			echo '<select name="datum" id="datum">';
			echo '<option value="woensdag_avond">Try-out - Woensdag avond</option>
			<option value="donderdag_avond">Premiere - Donderdag avond</option>
			<option value="vrijdag_middag">Vrijdag middag</option>
			<option value="vrijdag_avond" selected>Vrijdag avond</option>';
			echo '</select><br>';
		}
		echo "Aantal tickets: <input type='number' id='aantal_tickets' name='aantal_tickets' min='1' max='150' value=".$status['aantal_tickets']."><br>";
		echo '<br><input type="submit" value="Bevestig gegevens" name="bevestigen"><input type="submit" value="Verwijderen" name="verwijder_gegevens">';
		echo '</form>';
	}
	if (isset($_POST['all'])){
		$sql = "SELECT * FROM reserveringen";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  echo "<table><tr><th>ID</th><th>Voornaam</th><th>tussenvoegsel</th><th>Achternaam</th><th>Email</th><th>Aantal tickets</th><th>Datum</th><th>Kosten</th><th>Aanpassen</th></tr>";
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["id"]."</td><td>".$row["voornaam"]."</td><td>".$row["tussenvoegsel"]."</td><td>".$row["achternaam"]."</td><td>".$row["email"]."</td><td>".$row["aantal_tickets"]."</td><td>".$row["datum"]."</td><td>".$row["kosten"]."</td>";
			echo "<td><form method='post' action=".htmlspecialchars($_SERVER["PHP_SELF"]).">";
			echo "<input type='submit' value=".$row["id"]." name='aanpassen'>";
			echo "</form></td></tr>";
		  }
		  echo "</table>";
		} else {
		  echo "0 results";
		}
	}
	if (isset($_POST['woensdag_avond'])){
		$sql = "SELECT * FROM reserveringen WHERE datum='woensdag_avond'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  echo "<table><tr><th>ID</th><th>Voornaam</th><th>tussenvoegsel</th><th>Achternaam</th><th>Email</th><th>Aantal tickets</th><th>Datum</th><th>Kosten</th><th>Aanpassen</th></tr>";
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["id"]."</td><td>".$row["voornaam"]."</td><td>".$row["tussenvoegsel"]."</td><td>".$row["achternaam"]."</td><td>".$row["email"]."</td><td>".$row["aantal_tickets"]."</td><td>".$row["datum"]."</td><td>".$row["kosten"]."</td>";
			echo "<td><form method='post' action=".htmlspecialchars($_SERVER["PHP_SELF"]).">";
			echo "<input type='submit' value=".$row["id"]." name='aanpassen'>";
			echo "</form></td></tr>";
		  }
		  echo "</table>";
		} else {
		  echo "0 results";
		}
	}
	if (isset($_POST['donderdag_avond'])){
		$sql = "SELECT * FROM reserveringen WHERE datum='donderdag_avond'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  echo "<table><tr><th>ID</th><th>Voornaam</th><th>tussenvoegsel</th><th>Achternaam</th><th>Email</th><th>Aantal tickets</th><th>Datum</th><th>Kosten</th><th>Aanpassen</th></tr>";
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["id"]."</td><td>".$row["voornaam"]."</td><td>".$row["tussenvoegsel"]."</td><td>".$row["achternaam"]."</td><td>".$row["email"]."</td><td>".$row["aantal_tickets"]."</td><td>".$row["datum"]."</td><td>".$row["kosten"]."</td>";
			echo "<td><form method='post' action=".htmlspecialchars($_SERVER["PHP_SELF"]).">";
			echo "<input type='submit' value=".$row["id"]." name='aanpassen'>";
			echo "</form></td></tr>";
		  }
		  echo "</table>";
		} else {
		  echo "0 results";
		}
	}
	if (isset($_POST['vrijdag_middag'])){
		$sql = "SELECT * FROM reserveringen WHERE datum='vrijdag_middag'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  echo "<table><tr><th>ID</th><th>Voornaam</th><th>tussenvoegsel</th><th>Achternaam</th><th>Email</th><th>Aantal tickets</th><th>Datum</th><th>Kosten</th><th>Aanpassen</th></tr>";
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["id"]."</td><td>".$row["voornaam"]."</td><td>".$row["tussenvoegsel"]."</td><td>".$row["achternaam"]."</td><td>".$row["email"]."</td><td>".$row["aantal_tickets"]."</td><td>".$row["datum"]."</td><td>".$row["kosten"]."</td>";
			echo "<td><form method='post' action=".htmlspecialchars($_SERVER["PHP_SELF"]).">";
			echo "<input type='submit' value=".$row["id"]." name='aanpassen'>";
			echo "</form></td></tr>";
		  }
		  echo "</table>";
		} else {
		  echo "0 results";
		}
	}
	if (isset($_POST['vrijdag_avond'])){
		$sql = "SELECT * FROM reserveringen WHERE datum='vrijdag_avond'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  echo "<table><tr><th>ID</th><th>Voornaam</th><th>tussenvoegsel</th><th>Achternaam</th><th>Email</th><th>Aantal tickets</th><th>Datum</th><th>Kosten</th><th>Aanpassen</th></tr>";
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["id"]."</td><td>".$row["voornaam"]."</td><td>".$row["tussenvoegsel"]."</td><td>".$row["achternaam"]."</td><td>".$row["email"]."</td><td>".$row["aantal_tickets"]."</td><td>".$row["datum"]."</td><td>".$row["kosten"]."</td>";
			echo "<td><form method='post' action=".htmlspecialchars($_SERVER["PHP_SELF"]).">";
			echo "<input type='submit' value=".$row["id"]." name='aanpassen'>";
			echo "</form></td></tr>";
		  }
		  echo "</table>";
		} else {
		  echo "0 results";
		}
	}
	
}

#---------------------------------------stoelverdeling woensdag avond ---------------------------------------
if (isset($_POST['zaal_woensdag_avond'])){
	echo "<h1> Woensdag avond </h1>";
	
	echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
	for ($z = 0; $z < count($stoelen); $z++){
		echo $stoelen[$z][0]." - ";
		for ($x = 0; $x < $aantal_stoelen[$z]; $x++){
			$sql = "SELECT * FROM zaal_woensdag_avond WHERE (stoelrij= ".($z+1)." and stoelnummer=".($x+1).")";
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
	echo '</form>';
	
	$sql = "SELECT * FROM zaal_woensdag_avond";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  echo "<table><tr><th>ID</th><th>stoelrij</th><th>stoelnummer</th><th>status</th><th>reserveringsnummer</th></tr>";
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["id"]."</td><td>".$row["stoelrij"]."</td><td>".$row["stoelnummer"]."</td><td>".$row["status"]."</td><td>".$row["reservingingsnummer"]."</td></tr>";
	  }
	  echo "</table>";
	} else {
	  echo "0 results";
	}
}

#---------------------------------------stoelverdeling donderdag avond ---------------------------------------
if (isset($_POST['zaal_donderdag_avond'])){
	echo "<h1>Donderdag avond </h1>";
	
	echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
	for ($z = 0; $z < count($stoelen); $z++){
		echo $stoelen[$z][0]." - ";
		for ($x = 0; $x < $aantal_stoelen[$z]; $x++){
			$sql = "SELECT * FROM zaal_donderdag_avond WHERE (stoelrij= ".($z+1)." and stoelnummer=".($x+1).")";
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
	echo '</form>';
	
	$sql = "SELECT * FROM zaal_donderdag_avond";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  echo "<table><tr><th>ID</th><th>stoelrij</th><th>stoelnummer</th><th>status</th><th>reserveringsnummer</th></tr>";
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["id"]."</td><td>".$row["stoelrij"]."</td><td>".$row["stoelnummer"]."</td><td>".$row["status"]."</td><td>".$row["reservingingsnummer"]."</td></tr>";
	  }
	  echo "</table>";
	} else {
	  echo "0 results";
	}
}

#---------------------------------------stoelverdeling vrijdag middag ---------------------------------------
if (isset($_POST['zaal_vrijdag_middag'])){
	echo "<h1> Vrijdag middag </h1>";
	
	echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
	for ($z = 0; $z < count($stoelen); $z++){
		echo $stoelen[$z][0]." - ";
		for ($x = 0; $x < $aantal_stoelen[$z]; $x++){
			$sql = "SELECT * FROM zaal_vrijdag_middag WHERE (stoelrij= ".($z+1)." and stoelnummer=".($x+1).")";
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
	echo '</form>';
	
	$sql = "SELECT * FROM zaal_vrijdag_middag";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  echo "<table><tr><th>ID</th><th>stoelrij</th><th>stoelnummer</th><th>status</th><th>reserveringsnummer</th></tr>";
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["id"]."</td><td>".$row["stoelrij"]."</td><td>".$row["stoelnummer"]."</td><td>".$row["status"]."</td><td>".$row["reservingingsnummer"]."</td></tr>";
	  }
	  echo "</table>";
	} else {
	  echo "0 results";
	}
}

#---------------------------------------stoelverdeling vrijdag avond ---------------------------------------
if (isset($_POST['zaal_vrijdag_avond'])){
	echo "<h1> Vrijdag avond </h1>";
	
	echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
	for ($z = 0; $z < count($stoelen); $z++){
		echo $stoelen[$z][0]." - ";
		for ($x = 0; $x < $aantal_stoelen[$z]; $x++){
			$sql = "SELECT * FROM zaal_vrijdag_avond WHERE (stoelrij= ".($z+1)." and stoelnummer=".($x+1).")";
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
	echo '</form>';
	
	$sql = "SELECT * FROM zaal_vrijdag_avond";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  echo "<table><tr><th>ID</th><th>stoelrij</th><th>stoelnummer</th><th>status</th><th>reserveringsnummer</th></tr>";
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["id"]."</td><td>".$row["stoelrij"]."</td><td>".$row["stoelnummer"]."</td><td>".$row["status"]."</td><td>".$row["reservingingsnummer"]."</td></tr>";
	  }
	  echo "</table>";
	} else {
	  echo "0 results";
	}
}


mysqli_close($conn);
?>
</body>
</html>