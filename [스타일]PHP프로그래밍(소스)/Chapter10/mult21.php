<?
	$no = $_POST["no"]; 

	for ($i=0; $i < $no; $i++) 
		$numbers[$i] = rand() % 100;

	session_register("numbers");
?>
<form action="mult21search.php" method="POST">
	ã�� Ű �� : <input type="text" name="key" size=3>
	<input type="submit" value="ã��">
</form>