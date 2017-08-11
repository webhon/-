1. 
create table CLUB (
	clubno	int not null auto_increment,
	name	varchar(30) not null,
	nomembers int,
	bdate	date,
	bldname	char(10),
	sno	char(11),
	primary key (clubno)
);

create table MEMBER (
	sno	char(11) not null,
	name	varchar(30),
	clubno	int,
	primary key (sno)	
);

2. 

insert into CLUB values
(1, '테니스', 20, '2000-03-01', 'K301', '2007-30001'),
(2, '바둑', 35, '1980-09-01', 'X101', '2007-31010'),
(3, '산악', 40, '1990-03-01', 'R202', '2007-32003'),
(4, '컴퓨터', 25, '2007-03-01', 'D300', '2008-20015');

insert into MEMBER values
('2007-30001', '이현철', 1),
('2007-31010', '정나미', 2),
('2007-32003', '고승욱', 3),
('2008-20015', '강남철', 4),
('2008-24020', '김진욱', 1),
('2008-27017', '현진식', 1),
('2009-37001', '박영희', 2),
('2009-37002', '주민정', 2),
('2009-33011', '황윤석', 3),
('2009-35008', '홍성수', 4);

3. 
select M.name
from CLUB C, MEMBER M
where C.name = '테스트' and C.clubno = M.clubno;

4. 
select name, bdate
from CLUB
where nomembers >= 30;

5. 
select M.name
from CLUB C, MEMBER M
where C.name = '컴퓨터' and C.sno = M.sno;

6. 
select sno, name
from MEMBER
where clubno = (select clubno
		from MEMBER
		where NAME = '정나미');

7.
select C.name, count(M.sno) nomembers
	from CLUB C, MEMBER M
	where C.clubno = M.clubno
	group by M.clubno;
				