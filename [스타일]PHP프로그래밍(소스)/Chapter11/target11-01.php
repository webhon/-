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
			echo "���� : $this->age<br>";
			echo "�г� : $this->year<br>";
			echo "�̸� : $this->name<br>";
			echo "�а� : $this->dept<br>";
			echo "���� : $this->gpa<br>";
		}
		function aging() {
			$this->age++;
		}
	}
?>