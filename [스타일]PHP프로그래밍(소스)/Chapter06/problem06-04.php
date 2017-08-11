<?
    $string = "This tea smells good." ;

	echo "Original string : $string <BR>" ;

    echo ereg_replace("good", "great", $string) . "<BR>" ;

	echo ereg_replace("(g[[:alpha:]]+)", "very \\1", $string) . "<BR>" ;

	echo ereg_replace("(g[[:alpha:]]+)(\.)", "\\1 \\2 \\2 \\2", $string) . "<BR>" ;
?>