<?
$year=date("Y");
$month=date("m");
$day=date("d");

echo "<form>";
echo "<input type='text' value='$year �� $month �� $day ��' size='17'>";
echo "<br>==========================<br>";
echo "<input type='text' value='$year' size='4'> �� ";
echo "<input type='text' value='$month' size='2'> �� ";
echo "<input type='text' value='$day' size='2'> �� ";
echo "<br>==========================<br>";
echo "<select name='y'>";
echo "<option>$year";
echo "</select>�� ";
echo "<select name='m'>";
echo "<option selected>$month</p>";
echo "</select>�� ";
echo "<select name='d'>";
echo "<option selected>$day";
echo "</select>��";
echo "</form>";

?>
