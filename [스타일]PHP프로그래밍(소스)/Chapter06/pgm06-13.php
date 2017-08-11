<html>
	<head><title>프로그램 6-13</title>
	</head>
	<body>
		<h3>방명록 입력</h3>
		<form action="pgm06-13add.php" method="POST">
			<table border=1 cellpadding=5>
				<tr>
					<td bgcolor="#cccccc" align="center">이 름</td>
					<td> <input type="text" name="name" size=10></td>
				</tr>
				<tr>
					<td bgcolor="#cccccc" align="center">내 용</td>
					<td> <input type="text" name="msg" size=70></td>
				</tr>
				<tr>
					<td bgcolor="#cccccc" align="center">비밀번호</td>
					<td> <input type="password" name="passwd" size=8></td>
				</tr>
				<tr>
					<td colspan=2 align="center">
						<input type="submit" value="입력">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>