<?
	$no = $_POST["no"]; 

	for ($i=0; $i < $no; $i++) 
		$numbers[$i] = rand() % 100;

	session_register("numbers");
?>
<form action="mult21search.php" method="POST">
	찾을 키 값 : <input type="text" name="key" size=3>
	<input type="submit" value="찾기">
</form>