<?
	session_start();

	$tno = $_SESSION["tno"] = $_POST["tno"];
	$no = $_SESSION["no"] = $_POST["no"];
?>
<form action="ex10-07.php" method="POST">
* ���̺� :<p>
<? 
	for ($i=0; $i < $tno; $i++) { 
		echo "[".($i+1)." ] ��° ���̺� : 
			<input type=\"text\" name=\"tname[$i]\" size=10> <br>";
	}
?>
<p>* ���ǽ� :<p>
<? 
	for ($i=0; $i < $no; $i++) { 
		echo "<input type=\"text\" name=\"attrname[$i]\" size=10>&nbsp; &nbsp;";
		echo "<select name=\"op[$i]\">";
		echo "<option value=\"=\">=</option>";
		echo "<option value=\">=\">>=</option>";
		echo "<option value=\"<=\"><=</option>";
		echo "<option value=\">\">></option>";
		echo "<option value=\"<\"><</option>";
		echo "<option value=\"<>\"><></option>";
		echo "</select>";
		echo "<input type=\"text\" name=\"attrval[$i]\" size=10>&nbsp; &nbsp;";
		echo " / &nbsp; ";
	}
	echo "<input type=\"submit\" value=\"�˻��ϱ�\">";
?>
</form>