<?php
	@extract($_GET); 
	@extract($_POST); 
	@extract($_SERVER);

	$host="localhost";
	$usr="master";
	$pwd="123";

	$connect=MySQL_connect($host,$usr,$pwd) or die("���� ���� ����");
 	$result = mysql_select_db("guestboard",$connect);

	if($result == 1) {
		$tb_name = mysql_list_tables("guestboard");
		$tb_count = mysql_num_rows($tb_name);
		for($k = 0; $k < $tb_count; $k++){
			if(mysql_tablename($tb_name, $k) == "memo_tbl") {
				$flag = "OK";
 				break;
 			} 
 		}
		if($flag != "OK") {
			$query = "create table memo_tbl (
 				num int(4) NOT NULL auto_increment,
 				name varchar(20),
 				memo text,
 				ndate int(12),
 				PRIMARY KEY(num)
			)";
			$result = mysql_query($query, $connect) or die("Error : ".mysql_error());               
 		}
 	} else {
 		echo "MySQL ������ �Բ� �۾��� �����ͺ��̽��� ���� ����";
		exit;
	}
	$listnum=10;
	if(!$pagenum) {
		$pagenum = 1;
	}
	$query = "select count(num) from memo_tbl";
	$result = mysql_query($query);
	$total = mysql_fetch_array($result);
	$all_data = $total[0];
	$pagesu = ceil($all_data/$listnum);
	$start = $listnum*($pagenum - 1);
	$pagestart=1; 
	$pageend=$pagesu;
	$query = "select * from memo_tbl order by num desc limit $start,$listnum"; 
	$result = mysql_query($query,$connect);
	$rtotal = mysql_num_rows($result);
	echo "<center>
		�� <b> $all_data </b> ���� �޸� 
		<table cellspacing=0 cellpadding=4 border=1 bordercolor=#ffffff> 
		<tr align=center bgcolor=#dcdcdc>
    	 	    	<td width=50>��ȣ</td>
			<td width=100>�̸�</td>	
			<td width=300>�޸�</td>
			<td width=100>�ð�</td>
		</tr>"; 
	for($i=0;$i<$rtotal;$i++){
		$data=mysql_fetch_array($result); 
		$data[ndate]=date('y'.'��'.'m'.'��'.'d'.'��',$data[ndate]);
		$data[name]=stripslashes($data[name]); 
		$data[memo]=stripslashes($data[memo]); 
		echo "
			<tr bgcolor=#eeeeee>
				<td align=center>$data[num]</td>
				<td align=center>$data[name]</td>
				<td align=left>$data[memo]</td>
				<td align=center>$data[ndate]</td>
			</tr>";
	}
	echo "<tr>
			<td colspan=4 align=center>";
	if($pagenum > 1){ 
		echo"[<a href=memolist.php?pagenum=$pagestart>����������</a>] "; 
	} 
	if($pagenum > 1){ 
		$prevpage=$pagenum-1; 
		echo"[<a href=memolist.php?pagenum=$prevpage>��</a>] "; 
	}
	for($i=$pagestart;$i <= $pageend;$i++){ 
		if($i == $pagenum){
			echo "$i ";
		}else{
			echo "[<a href=memolist.php?pagenum=$i>$i</a>] ";
		} 
	} 
	if($pagenum < $pageend){ 
		$nextpage=$pagenum+1; 
		echo"[<a href=memolist.php?pagenum=$nextpage>��</a>] "; 
	} 
	if($pagenum < $pageend){
		echo"[<a href=memolist.php?pagenum=$pageend>������������</a>] ";
	} 
	echo"</td></tr></table>";
	echo("	
		<form method=post action=memowrite.php> 
			�̸� <input type=text name=name size=10 maxlength=10>   
			�޸� <input type=text name=memo size=30 maxlength=50> 
			<input type=submit value=�Է�> 
		</form> </center>
	");
 ?>
