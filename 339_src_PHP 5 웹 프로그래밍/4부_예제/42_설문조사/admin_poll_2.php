 <?php
   include "./poll_con.php.inc";
   $title; $rep; $pass, $y; $m; $d; $y1; $m1; $d1;
   //�Է��� ����, �亯��, ���۳�¥, ���ᳯ¥�� �ڵ����� �� ���� �Ҵ�

   $sdat=$y."-".$m."-".$d;                                    //�������� ����
   $edat=$y1."-".$m1."-".$d1;                                 //�������� ����

  $sql="insert into poll_tbl (".
	"p_title,p_rep,p_sdat,p_edat,p_pass".
	") values (".
	"'$title',$rep,'$sdat','$edat',password('$pass')".
	")";
    //���̺� �����ϱ� ���� ���� ����, ��й�ȣ�� password() ��ȣȭ

  $result=mysql_query($sql,$db);          //insert ���� ���� �� ��� ��$result�� �Ҵ�
  $id=mysql_insert_id(); 
  //poll_tbl ���̺��� ���� ��ϵ� ���ڵ��� ��p_num�� �÷� ���� ���� ��
  mysql_close($db); 
 ?>
  <html>
   <head><title>�� ������ ������_2</title>
  </head>
 <body>

  <table align="center" border="0" cellpadding="0" cellspacing="0" width="800">
    <tr>
      <td width="1101">
        <p>&nbsp;</p>
        <p align="center"><font size="3">
        <b>�� ������ ������ 2</b></font></p>
  <form name="frm" action="./insert.php" method="post">
   <!-- �亯 �׸���� �Է¹ޱ� ���� �� ��� -->
  <table align="center" border="1" cellpadding="2" width="600">
   <tr>
    <td width="150"><p align="right"><font size="2">���� :</font></p></td>
    <td width="450"><p><font size="2"><? echo $title; ?>
    <input type='hidden' name='id' value='<? echo $id; ?>'></font></p></td>
    <!-- poll �� id�� hidden���� �����ϱ� ���� �� -->
   </tr>
   <tr>
    <td width="150"><p align="right"><font size="2">�亯 :</font></p></td>
    <td width="450"><p><font size="2">
      <?
         for($i=1;$i<=$rep;$i++)
	 {
         echo "&nbsp;�亯".$i." : <input type='text' name='repstr$i' size='50'><br>";
          //���� ���������� �Է��� �亯 ����ŭ �亯 �Է»��� ���
  	 }
     ?>
        <input type='hidden' name='rep' value='<? echo $rep; ?>'></font></p>
      </td>
   </tr>
 <tr>
     <td width="150">
         <p align="right"><font size="2">��¥ :</font></p>
     </td>
     <td width="450">
         <p><font size="2">
          <? echo $sdat; ?> &nbsp;~ &nbsp;<? echo $edat; ?></font></p>
     </td>
 </tr>
 <tr>
     <td width="150">
         <p align="right"><font size="2">��й�ȣ :</font></p>
     </td>
     <td width="450">
         <p><font size="2">&nbsp;<? echo $pass; ?></font></p>
     </td>
 </tr>
     <tr>
     <td width="588" colspan="2">
     <p align="right"><font size="2">
        <input type="submit" name="smt" value="�Ϸ�"></font></p>
        <!-- �Էµ� ���� ������ �����ϱ� ���� [�Ϸ�] ���� ���� -->
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
