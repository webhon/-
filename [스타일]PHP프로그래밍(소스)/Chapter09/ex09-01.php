<html><head><title>종합문제 9-1 (프로그램 9-14의 회원가입 새버전)</title></head>
	<body>
		<h3>회원가입</h3> 
		<table border=1 cellpadding=4>
			<tr bgcolor="#cccccc">
				<th>항목</th>
				<th>입력</th>
			</tr>
		<form action="ex09-01registerdb.php" method="POST">
			<tr>
				<td>아이디</td>
				<td><input type="text" name="id" size=10 maxlength=10> (10자 이내)</td>
			</tr>
			<tr>
				<td>비밀번호</td><td>
				<input type="password" name="passwd1" size=12 maxlength=12> (12자 이내)</td>
			</tr>
			<tr>
				<td>비밀번호(재확인)</td><td>
				<input type="password" name="passwd2" size=12 maxlength=12> (12자 이내)</td>
			</tr>
			<tr>
				<td>이름</td><td><input type="text" name="sname" size=12></td>
			</tr>
			<tr>
				<td>학번</td><td><input type="text" name="sno" size=12></td>
			</tr>
			<tr>
				<td>학과</td><td><input type="text" name="dept" size=12></td>
			</tr>
			<tr>
				<td>학년</td>
				<td><input type="radio" name="year" value=1>1 학년 
				    <input type="radio" name="year" value=2>2 학년 
				    <input type="radio" name="year" value=3>3 학년 
				    <input type="radio" name="year" value=4>4 학년 
				</td>
			</tr>
			<tr>
				<td>이메일 주소</td><td><input type="text" name="email" size=40></td>
			</tr>
			<tr>
				<td colspan=2 align="center">
					<input type="submit" value="등록">
					<input type="reset" value="취소">
				</td>
			</tr>
		</form>
	</table>
</body></html>