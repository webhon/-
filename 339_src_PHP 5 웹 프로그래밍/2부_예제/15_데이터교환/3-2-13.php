<?
if(copy("$upload", "$upload_name")) {
    echo "������ ���������� ���ε�Ǿ����ϴ�."."<p>";
    echo "<img src=$upload_name>"."<p>";
    echo "�����̸�(\$upload_name) : $upload_name"."<br>";
    echo "����ũ��(\$upload_size) : $upload_size"."<br>";
    echo "����Ÿ��(\$upload_type) : $upload_type"."<br>";
    echo "������ ������ ����� �ӽ� ���ϸ�(\$upload) : $upload";
} else {
    echo "���� ���ε尡 �����߽��ϴ�.";
}
?>
