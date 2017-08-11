<?
	session_start();

	class Student {
		var $sno, $name, $dept, $year, $addr, $telno, $tcredits, $gpa, $ncredits, $courses, $no;

		function Student() {
			$this->ncredits = 0;
			$this->no = 0;
		}
		function setNo($v) {
			$this->sno = $v;
		}
		function setName($v) {
			$this->name = $v;
		}
		function setDept($v) {
			$this->dept = $v;
		}
		function setYear($v) {
			$this->year = $v;
		}
		function setAddr($v) {
			$this->addr = $v;
		}
		function setTelno($v) {
			$this->telno = $v;
		}
		function setTC($v) {
			$this->tcredits = $v;
		}
		function setGpa($v) {
			$this->gpa = $v;
		}
		function setNcredits($v) {
			$this->ncredits += $v;
		}
		function addCourses($v) {
			$this->courses[$this->no++] = $v;
		}
		function getAll() {
			echo "<b>학생 정보:</b><br><hr>";
			echo " * 학 &nbsp; &nbsp; 번 : $this->sno <br>";
			echo " * 이 &nbsp; &nbsp; 름 : $this->name <br>";
			echo " * 학 &nbsp; &nbsp; 과 : $this->dept <br>";
			echo " * 주 &nbsp; &nbsp; 소 : $this->addr <br>";
			echo " * 전화번호 : $this->telno <br>";
			echo " * 총 학 점 : $this->tcredits <br>";
			echo " * 평 &nbsp; &nbsp; 점 : $this->gpa <br>";
			echo "<hr>";
		}
		function getCredits() {
			echo " * 이번학기 신청 학점 : $this->ncredits<br>";
		}
		function getCourses() {
			foreach ($this->courses as $c) {
				echo "* 과목 : [$c]<br>";
			}
		}
	};

	$row = unserialize($_SESSION["sinfo"]);

	$s = new Student;
	$s->setNo($row->sno);
	$s->setName($row->name);
	$s->setDept($row->deptname);
	$s->setYear($row->year);
	$s->setAddr($row->addr);
	$s->setTelno($row->telno);
	$s->setTC($row->tcredits);
	$s->setGpa($row->gpa);

	if (isset($_POST["courseno"])) {
		$cnos=$_POST["courseno"];
		$dbconnect = mysql_connect("localhost", "wellbook", "password");
		if (!$dbconnect) die("[연결안됨]".mysql_error());
		if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());
		foreach ($cnos as $cno) {
			$query = "insert into ENROLL(sno, courseno) values('$s->sno', '$cno')";
			$result = @mysql_query($query);
		}
		mysql_close($dbconnect);

		if (!empty($_SESSION["courses"])) {
			$courses = array_unique(
			array_merge(unserialize($_SESSION["courses"]), $_POST["courseno"]));
			$_SESSION["courses"] = serialize($courses);
		}
		else $_SESSION["courses"] = serialize($_POST["courseno"]);
	}
	$s->getAll();
	echo "<b>수강과목 목록 :</b><br><hr>";
	foreach (unserialize($_SESSION["courses"]) as $cno) {
		$s->addCourses($cno);
		$dbconnect = mysql_connect("localhost", "wellbook", "password");
		if (!$dbconnect) die("[연결안됨]".mysql_error());
		if (!mysql_select_db("wellbookdb")) die("[선택실패]".mysql_error());
		$query = "select courseno, coursename, deptname, credit from COURSE where courseno = '$cno'";
		$result = @mysql_query($query);
		$crow = mysql_fetch_object($result);
		$s->setNcredits($crow->credit);

		echo "<p> * $crow->courseno ($crow->coursename) $crow->credit 학점 ";
	}
	mysql_close($dbconnect);
	echo "<br><hr> $s->no 개 과목, 총 ".$s->ncredits."학점 입니다.<br>\n";
 ?>
 <p>
 <a href="pgm11-08.php">계속 신청하기</a>