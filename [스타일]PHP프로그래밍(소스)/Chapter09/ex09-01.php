<html><head><title>���չ��� 9-1 (���α׷� 9-14�� ȸ������ ������)</title></head>
	<body>
		<h3>ȸ������</h3> 
		<table border=1 cellpadding=4>
			<tr bgcolor="#cccccc">
				<th>�׸�</th>
				<th>�Է�</th>
			</tr>
		<form action="ex09-01registerdb.php" method="POST">
			<tr>
				<td>���̵�</td>
				<td><input type="text" name="id" size=10 maxlength=10> (10�� �̳�)</td>
			</tr>
			<tr>
				<td>��й�ȣ</td><td>
				<input type="password" name="passwd1" size=12 maxlength=12> (12�� �̳�)</td>
			</tr>
			<tr>
				<td>��й�ȣ(��Ȯ��)</td><td>
				<input type="password" name="passwd2" size=12 maxlength=12> (12�� �̳�)</td>
			</tr>
			<tr>
				<td>�̸�</td><td><input type="text" name="sname" size=12></td>
			</tr>
			<tr>
				<td>�й�</td><td><input type="text" name="sno" size=12></td>
			</tr>
			<tr>
				<td>�а�</td><td><input type="text" name="dept" size=12></td>
			</tr>
			<tr>
				<td>�г�</td>
				<td><input type="radio" name="year" value=1>1 �г� 
				    <input type="radio" name="year" value=2>2 �г� 
				    <input type="radio" name="year" value=3>3 �г� 
				    <input type="radio" name="year" value=4>4 �г� 
				</td>
			</tr>
			<tr>
				<td>�̸��� �ּ�</td><td><input type="text" name="email" size=40></td>
			</tr>
			<tr>
				<td colspan=2 align="center">
					<input type="submit" value="���">
					<input type="reset" value="���">
				</td>
			</tr>
		</form>
	</table>
</body></html>