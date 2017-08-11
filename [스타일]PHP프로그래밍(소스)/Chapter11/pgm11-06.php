<?
	class P {
		function F() {
			echo "[Class P] Method F ...<br>";
			echo "<hr>";
		}
	};

	class C extends P {
		function F() {
			parent::F();
			echo "[Class C] Method F ...<br>";
			echo "<hr>";
		}
	};

	$c = new C;
	$c->F();
	P::F();
?>