<?
	class Pclass {
		var $sex, $name;

		function Pclass($sex, $name) {
			$this->sex = $sex;
			$this->name = $name;
		}

		function print_name() {
			echo "[Pclass]내 이름 : $this->name<br>";
			echo "<hr>";
		}
		function print_sex() {
			echo "[Pclass]내 성별 : $this->sex<br>";
			echo "<hr>";
		}
	}

	class CClass extends Pclass {
		var $pname;

		function setPname($name) {
			$this->pname = $name;
		}

		function print_name() {
			echo "[Cclass]내 이름 : $this->name<br>";
			echo "[Cclass]부모 이름 : $this->pname<br>";
			echo "<hr>";
		}
	}

	$p = new Pclass("여자", "성춘향");
	$c = new Cclass("남자", "이도령");
	$c->setPname("성춘향");
	$p->print_name();
	$c->print_name();
	$c->print_sex();
?>