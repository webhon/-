<?
	class Pclass {
		var $sex, $name;

		function Pclass($sex, $name) {
			$this->sex = $sex;
			$this->name = $name;
		}

		function print_name() {
			echo "[Pclass]�� �̸� : $this->name<br>";
			echo "<hr>";
		}
		function print_sex() {
			echo "[Pclass]�� ���� : $this->sex<br>";
			echo "<hr>";
		}
	}

	class CClass extends Pclass {
		var $pname;

		function setPname($name) {
			$this->pname = $name;
		}

		function print_name() {
			echo "[Cclass]�� �̸� : $this->name<br>";
			echo "[Cclass]�θ� �̸� : $this->pname<br>";
			echo "<hr>";
		}
	}

	$p = new Pclass("����", "������");
	$c = new Cclass("����", "�̵���");
	$c->setPname("������");
	$p->print_name();
	$c->print_name();
	$c->print_sex();
?>