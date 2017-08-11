<?
	class Student {
		var $age, $year, $name, $dept, $gpa;

		function setAge($value) {
			$this->age = $value;
		}
		function setYear($value) {
			$this->year = $value;
		}
		function setName($value) {
			$this->name = $value;
		}
		function setDept($value) {
			$this->dept = $value;
		}
		function setGpa($value) {
			$this->gpa = $value;
		}
		function print_property() {
			echo "나이 : $this->age<br>";
			echo "학년 : $this->year<br>";
			echo "이름 : $this->name<br>";
			echo "학과 : $this->dept<br>";
			echo "평점 : $this->gpa<br>";
		}
		function aging() {
			$this->age++;
		}
	}
?>