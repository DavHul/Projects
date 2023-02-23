<html>
<head>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$stoelen = [['Rij 1'],['Rij 2'],['Rij 3'],['Rij 4'],['Rij 5'],['Rij 6'],['Rij 7'],['Rij 8'],['Rij 9'],['Rij 10'],['Rij 11'],['Rij 12'],['Rij 13'],['Rij 14'],['Rij 15'],['Rij 16'],['Rij 17'],['Rij 18'],['Rij 19']];
$aantal_stoelen = [23,24,25,26,27,28,29,30,31,32,33,31,32,31,30,31,30,31,34];
/*   $conn = new mysqli($servername, $username, $password);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE DATABASE musical_reser";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
 echo "Error creating database: " . $conn->error;
}
mysqli_close($conn); 
 */
$dbname = "musical_reser";
$conn = new mysqli($servername, $username, $password, $dbname);

/* 
$sql = "DROP TABLE reserveringen";	
if ($conn->query($sql) === TRUE) {
	echo "tabel gemaakt";
}else{
			echo "fout <br>";
			echo("Error description: " . $conn -> error);
		}
$sql = "CREATE TABLE reserveringen(
id INT PRIMARY KEY,
voornaam VARCHAR(30) NOT NULL,
tussenvoegsel VARCHAR(30),
achternaam VARCHAR(63) NOT NULL,
email VARCHAR(63) NOT NULL,
aantal_tickets INT NOT NULL,
datum VARCHAR(31) NOT NULL,
kosten INT NOT NULL
)";	
if ($conn->query($sql) === TRUE) {
	echo "tabel gemaakt";
}else{
			echo "fout <br>";
			echo("Error description: " . $conn -> error);
		}

#status = 0 --> vrij, 1 --> gereserveerd, 2  --> bezet, 3 --> betaald
 $sql = "CREATE TABLE zaal_woensdag_avond(
id INT PRIMARY KEY,
stoelrij INT NOT NULL,
stoelnummer INT NOT NULL,
 status INT NOT NULL, 
reservingingsnummer INT
)";	
if ($conn->query($sql) === TRUE) {
	echo "tabel gemaakt";
}else{
			echo "fout <br>";
			echo("Error description: " . $conn -> error);
		}
$sql = "CREATE TABLE zaal_donderdag_avond(
id INT PRIMARY KEY,
stoelrij INT NOT NULL,
stoelnummer INT NOT NULL,
 status INT NOT NULL, 
reservingingsnummer INT
)";	
if ($conn->query($sql) === TRUE) {
	echo "tabel gemaakt";
}else{
			echo "fout <br>";
			echo("Error description: " . $conn -> error);
		}
$sql = "CREATE TABLE zaal_vrijdag_middag(
id INT PRIMARY KEY,
stoelrij INT NOT NULL,
stoelnummer INT NOT NULL,
 status INT NOT NULL, 
reservingingsnummer INT
)";	
if ($conn->query($sql) === TRUE) {
	echo "tabel gemaakt";
}else{
			echo "fout <br>";
			echo("Error description: " . $conn -> error);
		}
$sql = "CREATE TABLE zaal_vrijdag_avond(
id INT PRIMARY KEY,
stoelrij INT NOT NULL,
stoelnummer INT NOT NULL,
 status INT NOT NULL, 
reservingingsnummer INT
)";	  
if ($conn->query($sql) === TRUE) {
	echo "tabel gemaakt";
}else{
			echo "fout <br>";
			echo("Error description: " . $conn -> error);
		}


 $i = 0; 
for ($x = 0; $x < count($stoelen); $x++){
	for ($y = 0; $y < $aantal_stoelen[$x]; $y++){
		$sql = "INSERT INTO zaal_woensdag_avond (id,stoelrij, stoelnummer, status) VALUES ('".$i."', '".($x+1)."', '".($y+1)."', '0')";
		if ($conn->query($sql) === TRUE) {
			echo "gegevens ingevoerd <br>";
		}else{
			echo "fout <br>";
			echo("Error description: " . $conn -> error);
		}
		$i = $i + 1;
	}
}

 $i = 0;
for ($x1 = 0; $x1 < count($stoelen); $x1++){
	for ($y1 = 0; $y1 < $aantal_stoelen[$x1]; $y1++){
		$sql = "INSERT INTO zaal_donderdag_avond (id,stoelrij, stoelnummer, status) VALUES ('".$i."', '".($x1+1)."', '".($y1+1)."', '0')";
		if ($conn->query($sql) === TRUE) {
			echo "gegevens ingevoerd <br>";
		}else{
			echo "fout <br>";
		}
		$i = $i + 1;
	}
}
$i = 0;
for ($x2 = 0; $x2 < count($stoelen); $x2++){
	for ($y2 = 0; $y2 < $aantal_stoelen[$x2]; $y2++){
		$sql = "INSERT INTO zaal_vrijdag_avond(id,stoelrij, stoelnummer, status) VALUES ('".$i."', '".($x2+1)."', '".($y2+1)."', '0')";
		if ($conn->query($sql) === TRUE) {
			echo "gegevens ingevoerd <br>";
		}else{
			echo "fout <br>";
		}
		$i = $i + 1;
	}
}
$i = 0;
for ($x3 = 0; $x3 < count($stoelen); $x3++){
	for ($y3 = 0; $y3 < $aantal_stoelen[$x3]; $y3++){
		$sql = "INSERT INTO zaal_vrijdag_middag (id,stoelrij, stoelnummer, status) VALUES ('".$i."', '".($x3+1)."', '".($y3+1)."', '0')";
		if ($conn->query($sql) === TRUE) {
			echo "gegevens ingevoerd <br>";
		}else{
			echo "fout <br>";
		}
		$i = $i + 1;
	}
} */
$sql = "SELECT * FROM zaal_vrijdag_middag WHERE status=0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>stoelrij</th><th>stoelnummer</th><th>status</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["stoelrij"]."</td><td>".$row["stoelnummer"]."</td><td>".$row["status"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
</body>
</html>