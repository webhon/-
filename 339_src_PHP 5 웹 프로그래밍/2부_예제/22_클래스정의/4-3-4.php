<?
class BaseClass {				//�θ�Ŭ����[BaseClass]
    function __construct()
    {
        print "BaseClass Ŭ������ constructor(������)\n";
    }
    function __destruct()
    {
        print "BaseClass Ŭ������ destructor(�Ҹ���)\n";
    }
}
class SubClass extends BaseClass {		//��ӹ��� Ŭ����[SubClass]
    function __construct()
    {
        parent::__construct();
        print "SubClass Ŭ������ constructor(������)\n";
    }
    function __destruct()
    {
        parent::__destruct();
        print "Subclass Ŭ������ destructor(�Ҹ���)\n";
    }
}

$obj=new SubClass;		//��ӹ��� Ŭ���� ȣ��
?>
