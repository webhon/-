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
			echo "<b>�л� ����:</b><br><hr>";
			echo " * �� &nbsp; &nbsp; �� : $this->sno <br>";
			echo " * �� &nbsp; &nbsp; �� : $this->name <br>";
			echo " * �� &nbsp; &nbsp; �� : $this->dept <br>";
			echo " * �� &nbsp; &nbsp; �� : $this->addr <br>";
			echo " * ��ȭ��ȣ : $this->telno <br>";
			echo " * �� �� �� : $this->tcredits <br>";
			echo " * �� &nbsp; &nbsp; �� : $this->gpa <br>";
			echo "<hr>";
		}
		function getCredits() {
			echo " * �̹��б� ��û ���� : $this->ncredits<br>";
		}
		function getCourses() {
			foreach ($this->courses as $c) {
				echo "* ���� : [$c]<br>";
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
		if (!$dbconnect) die("[����ȵ�]".mysql_error());
		if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());
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
	echo "<b>�������� ��� :</b><br><hr>";
	foreach (unserialize($_SESSION["courses"]) as $cno) {
		$s->addCourses($cno);
		$dbconnect = mysql_connect("localhost", "wellbook", "password");
		if (!$dbconnect) die("[����ȵ�]".mysql_error());
		if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());
		$query = "select courseno, coursename, deptname, credit from COURSE where courseno = '$cno'";
		$result = @mysql_query($query);
		$crow = mysql_fetch_object($result);
		$s->setNcredits($crow->credit);

		echo "<p> * $crow->courseno ($crow->coursename) $crow->credit ���� ";
	}
	mysql_close($dbconnect);
	echo "<br><hr> $s->no �� ����, �� ".$s->ncredits."���� �Դϴ�.<br>\n";
 ?>
 <p>
 <a href="pgm11-08.php">��� ��û�ϱ�</a>