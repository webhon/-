<?php

include "./poll_con.php.inc";

$year=Date("Y");
$month=Date("m");
$day=Date("d");
?>

<html>
<head><title>�� ������ ������_1</title>
<script language="javascript">
<!--
function chk()
{
	if(frm.title.value.length==0)
	{
   alert("�� ������ ������");          //�Էµ� ���� ���� ��� �޽��� ǥ��
	  frm.title.focus();                              
   return false;
	}
	else if(frm.rep.value.length==0) 
	{
	 alert("�亯���� ������");       //�Էµ� �亯�� ���� ��� ��� �޽��� ǥ��
	 frm.rep.focus();            
  return false;
	}
	if(frm.pass.value.length==0)     
	{
  alert("��й�ȣ�� ������");        //�Էµ� ��й�ȣ ���� ��� ��� �޽��� ǥ��
	 frm.pass.focus();
	 return false;
	}
 return true;
}
//-->
</script>
</head>
 <body>
 <table align="center" border="0" cellpadding="0" cellspacing="0" width="800">
  <tr>
    <td width="1101"> <p align="center">
    <font size="3"><b>�� ������ ������ 1</b></font></p>
    <form name="frm" action="./admin_poll_2.php" method="post" onSubmit="return chk();">
       <!-- poll�� �����ϱ� ���� �Է� ���� ȭ�鿡 ��� -->

  <table align="center" border="1" width="600" cellpadding="2">
   <tr>
    <td width="150"><p align="right"><font size="2">���� :</font></p></td>
    <td width="450"> <p><font size="2">
    <input type="text" name="title" size="50"></font></p></td>
     <!-- ������ �Է¹ޱ� ���� �Է� ���� -->
   </tr>
   <tr>
    <td width="150"><p align="right"><font size="2">�亯 �� :</font></p></td>
    <td width="450"><p><font size="2">
     <input type="text" name="rep" size="10"></font></p></td>
      <!-- �亯���� �Է¹ޱ� ���� �Է� ���� -->
    </tr>
    <tr><
     <td width="150"><p align="right"><font size="2">�� ���� ��¥ :</font></p></td>
     <td width="450"><p><font size="2">
      <? echo "<select name='y'>"; 		//���� �⵵�� �Է¹ޱ� ���� �޺� ����
	$i=$year;
	while($i<=$year){                         
  	  if($year==$i)           			
	     echo "<option selected> $i </option>";     //���� �⵵�� ����Ʈ�� ���õ�
	  else
	     echo "<option> $i </option>";
		$i--;
  	     if($i<2000) break;  
	   }
	     echo "</select>��";     //���� �⵵���� 1�� �ٿ����鼭 2000�⵵���� ���
             
	 echo "<select name='m'>";             //���� ���� �Է¹ޱ� ���� �޺� ����
  	  $i=1;
      while($i<13){
	  if($month==$i)                                    //���� �� ����Ʈ�� ����
 	 echo "<option selected>$i</option>";
      else
	  echo "<option>$i</option>";
	  $i++;
	}
       	  echo "</select>��";
          echo "<select name='d'>";           //���� ���ڸ� �Է¹ޱ� ���� �޺� ����
       $i=1;
 	  while($i<32){
	if($day==$i)                       		//���� ���� ����Ʈ�� ����
          echo "<option selected>$i</option>";
       else
	  echo "<option>$i</option>";
	  $i++;
	}
	  echo "</select>��"; ?></font></p>
   </td>
  </tr>
  <tr>
   <td width="150"><p align="right"><font size="2">�� ���� ��¥ :</font></p></td>
   <td width="450"><p><font size="2">
    <? echo "<select name='y1'>";            //���� �⵵�� �Է¹ޱ� ���� �޺� ����
	$i=$year;
	while($i<=$year){
		if($year==$i)
			echo "<option selected>$i</option>";
		else
			echo "<option>$i</option>";
		$i--;
		
		if($i<2000) break;
	}
	echo "</select>��;";
	echo "<select name='m1'>";            //���� ���� �Է¹ޱ� ���� �޺� ����
	$i=1;
	
	while($i<13){
		if($month==$i)
			echo "<option selected>$i</option>";
		else
			echo "<option>$i</option>";
		$i++;
	}
	echo "</select>��";
		echo "<select name='d1'>";    //���� ���ڸ� �Է¹ޱ� ���� �޺� ����
		$i=1;
	while($i<32){
		if($day==$i)
			echo "<option selected>$i</option>";
		else
			echo "<option>$i</option>";
		$i++;
	}
	echo "</select>��"; ?></font></p>
    </td>
  </tr>
  <tr>
    <td width="150">
        <p align="right"><font size="2">��й�ȣ :</font></p>
    </td>
    <td width="450">
        <p><font size="2">&nbsp;
        <input type="password" name="pass" size="10" style="height=20;">
	      </font></p>
            </td>
        </tr>
        <tr>
            <td width="590" colspan="2">
                <p align="right"><font size="2">
                <input type="submit" name="smt" value="�� ��">&nbsp;</font></p>
                    </td>
                </tr>
            </table>
	    </form>
            </form>
        </td>
    </tr>
</table>
</body>
</html>
