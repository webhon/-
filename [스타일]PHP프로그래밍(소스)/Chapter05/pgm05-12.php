<?
    define(CHECKBOX, 0);
	define(RADIO, 1);

	$textno = $_POST["textno"];
	$tlen = $_POST["tlen"];
	$chkno = $_POST["chkno"];
	$citemno = $_POST["citemno"];
	$rdno = $_POST["rdno"]; 
	$ritemno = $_POST["ritemno"];
	$arearow = $_POST["arearow"];
	$areacol = $_POST["areacol"];

   function make_textwin($no, $tlen) {
	   echo "<p><b>�ؽ�Ʈ</b>\n";
	   for ($i=1; $i<=$no; $i++) {
		   echo "<p>�׸� ".$i.": <input type=text name=txt".$i."size=".$tlen.">\n";
	   }
   }

   function make_button($no, $noitem, $flag) {
	   switch ($flag) {
		   case CHECKBOX : echo "<p><b>üũ�ڽ�</b>\n"; break;
		   case RADIO : echo "<p><b>������ư</b>\n"; break;
	   }

	   for ($i=1; $i<=$no; $i++) {
		   echo "<p>�׸� ".$i.": \n";
		   for ($j=1; $j<=$noitem; $j++) {
			   switch ($flag) {
				   case CHECKBOX :
					   echo "�����׸�".$j."<input type=checkbox name=choice".$j."value=value".$j.">\n";
				       break;
				   case RADIO : 
					   echo "�����׸�".$j."<input type=radio NAME=choice".$j."value=value".$j.">\n";
				       break;
			   }
		   }
	   }
   }

   function make_textarea($row, $col) {
	   echo "<p><b>�ؽ�Ʈ ����</b>: <br>\n";
	   echo "<textarea name=choice rows=$row cols=$col>\n";
	   echo "</textarea>";
   }

   make_textwin($textno, $tlen);
   make_button($chkno, $citemno, CHECKBOX);
   make_button($rdno, $ritemno, RADIO);
   make_textarea($arearow, $areacol);

?>