<?php
//count.txt������ �а�,���� ���� ����
$fp=fopen("./count.txt","r+");

//count.txt���Ͽ��� 10byte��ŭ �о�´�
$num=fgets($fp,10);

$num+=1;

//���� �����͸� count.txt������ ���� ó������ �̵�
rewind($fp);

//count.txt���Ͽ� 10byteũ��� $num���� ����
fputs($fp,$num,10);

/* ����, $num�� ���� '123'�̶��
$num_ar[0]=1, $num_ar[1]=2, $num_ar[2]=3 �� ���Ե˴ϴ�
��, strval(�μ�)�Լ��� �μ��� �迭�� ����� �Լ��Դϴ� */
$num_ar=strval($num);

//strlen()�Լ��� $num�� ���̸� ���ϴ� �Լ��Դϴ�
$len=strlen($num);

for($i=0;$i<=$len-1;$i++)
{
	echo "<img src='$num_ar[$i].gif'>";
}
?>