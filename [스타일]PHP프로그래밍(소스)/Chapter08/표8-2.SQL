create table STUDENT (
	   sno		char(11)	NOT NULL,
	   name		varchar(10),
	   deptname	varchar(20),
	   year		int,
	   addr		varchar(10),
	   telno	char(15),
	   tcredits	int,
	   gpa		float,
	   primary key (sno)
	);


INSERT INTO STUDENT VALUES ('2008-31001','이몽룡','수학교육',2,'이도동','712-1234',41,3.8);
INSERT INTO STUDENT 
VALUES ('2008-30020','홍길동','국어교육',2,'건입동','702-0123',38,4.0),
('2009-37002','성춘향','컴퓨터교육',1,'이도동','725-2345',0,0.0),
('2009-37005','김홍도','컴퓨터교육',1,'노형동','746-3456',0,0.0),
('2008-31010','장영실','수학교육',2,'아라동','757-4567',19,3.6);

create table COURSE (
	   courseno	char(6)	NOT NULL,
	   coursename	varchar(20),
	   deptname	varchar(20),
	   profno	char(7),
	   credit	int,
	   primary key (courseno)
	);

INSERT INTO COURSE VALUES ('CS001', '컴퓨팅영어', '컴퓨터', 'J08002', 3);
INSERT INTO COURSE VALUES 
('EE204', '전자공학개론', '전자공학', 'J06010', 3),
('BK030', '고전 I', '교양', 'I04007', 3),
('CS010', '알고리즘', '컴퓨터', 'J07028', 3);

create table ENROLL (
	sno char(11) NOT NULL,
	courseno char(6) NOT NULL,
	mid	int,
	final int,
	primary key (sno, courseno));

insert into ENROLL values
('2008-30020', 'EE204', 70, 80),
('2008-30020', 'CS010', 65, 80),
('2008-31001', 'CS001', 75, 85),
('2008-31001', 'BK030', 85, 85),
('2008-31001', 'CS010', 80, 90),
('2009-37002', 'BK030', 80, 90),
('2009-37002', 'CS001', 70, 95),
('2009-37005', 'BK030', 70, 85),
('2009-37005', 'CS001', 85, 85),
('2008-31010', 'EE204', 85, 80),
('2008-31010', 'BK030', 90, 90);

