 <?php
  include "./poll_con.php.inc";

  $id; $rep;               //�Էµ� �亯 ������� ��$id, $rep���ڵ� �Ҵ�

 for($i=1;$i<=$rep;$i++){
   $repstr="repstr".$i;
    //�亯�� ������ ��$rep�� ������ŭ �ݺ��ؼ� �������� ������ ��������
  
  if(!${$repstr}) { 
     echo "
	   <script>
	     alert('�亯�� �ۼ��ϼ���');       //�亯 ������ ������ ��� �޽��� ǥ��
	     history.go(-1);                     //�޽��� ��� �� ���������� �̵�
	   </script>
	  ";
    mysql_close($db); 
    exit; 
  }

	$sql="insert into poll_ret (".
		"r_id,r_repstr,r_vote".
		") values (".
		"$id,'${$repstr}',0".
		")";
      //�亯 ���̺� �亯 ������ insert ���� ����
    $result=mysql_query($sql,$db);         //���� ���� �� ��� $result ���� �Ҵ�
  }

  mysql_close($db);

  echo " <meta http-equiv='refresh' content='0; url=./list.php'>";
?>
