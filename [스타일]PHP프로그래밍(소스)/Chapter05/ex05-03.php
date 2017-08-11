<?
	$Sequence = 1;

	function PrintHeading($string) {
		global $Sequence;
		echo "<p> <h3> [".$Sequence++."] $string </h3>";
	}
	function PrintBody($string) {
		echo "<p> $string ";
	}

	PrintHeading("PHP 개요");
	PrintBody("PHP는 하이퍼텍스트 전처리기(\"PHP: Hypertext Preprocessor\")를 의미하며, 널리 쓰이는 오픈 소스 일반 스크립트 언어이다.");
	PrintHeading("PHP 함수");
	PrintBody("함수(function)란 특정 작업(명령어들의 집합)이 반복되는 경우 프로그램 내의 한 곳에서 그 작업을 정의하고 필요할 때마다 호출할 수 있는 하나의 독립된 단위이다. 일반적으로 프로그래밍 언어에서는 부프로그램 또는 모듈(module)이라고 부른다. 함수는 필요할 때 언제든지 호출이 가능하기 때문에 특정 작업을 반복해야 하는 경우 매우 효율적이다. 또한, 한 곳에 모아두었기 때문에 수정이 용이하다.");

?>
