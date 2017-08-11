<?
	$orig = $_POST["orig"];
	$dupl = $_POST["dupl"];

	if(!copy($orig, $dupl)) {
		echo "파일을 복사하지 못했습니다.";
	}
	else {
		echo "성공적으로 [$dupl] 파일을 복사하였습니다.";
	}
?>  