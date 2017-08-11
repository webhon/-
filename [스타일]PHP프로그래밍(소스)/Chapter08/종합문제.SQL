1.
create table FRUIT (
	fname varchar(15) not null,
	price int,
	kcal int,
	primary key (fname)
);

create table STORE (
	scode char(4) not null,
	sname varchar(10),
	telno char(15),
	hpage varchar(40),
	primary key (scode)
);

create table SALES (
	scode	char(4) not null,
 	fname	varchar(15) not null,
	qty	int,
	primary key (scode, fname)
);


2. 
alter table STORE add addr char(40);


3.
insert into FRUIT values
('apple', 400, 30),
('banana',200,50),
('orange',300,30),
('plum',100,20),
('melon',4000,80),
('watermelon',8000,210);

insert into STORE values
('s01', 'Apollo', '724-2133', 'http://www.crf.co.kr'),
('s02', 'Busan', '757-1234', 'http://www.pusan-f.co.kr'),
('s03', 'Top', '712-0343', 'http://www.tabfruit.co.kr'),
('s04', 'Jeju', '713-4700', 'http://www.idoshop.co.kr'),
('s05', 'Donam', '754-2039', 'http://www.donamf.co.kr');

insert into SALES values
('s01', 'apple', 40),
('s01', 'banana', 80),
('s01', 'plum', 70),
('s02', 'apple', 25),
('s02', 'orange', 35),
('s02', 'melon', 25),
('s03', 'apple', 60),
('s03', 'banana', 50),
('s03', 'melon', 20),
('s03', 'watermelon', 15),
('s04', 'apple', 20),
('s04', 'orange', 30),
('s04', 'plum', 40),
('s04', 'watermelon', 20);


4. 
update FRUIT
set kcal = 25
where fname= 'orange';


5. 
select price
from FRUIT
where fname = 'banana';


6.
select telno
from STORE
where sname = 'Busan';


7.
select scode
from SALES
where fname = 'apple';


8.
select sname, telno
from STORE, SALES
where STORE.scode = SALES.scode and SALES.fname = 'watermelon';


9.
select sum(qty)
from SALES
where scode = 's01';


10. 
select T.scode, T.sname, T.telno, T.hpage
from STORE T, SALES
where T.scode = SALES.scode and SALES.fname = 'banana';


11.
select T.scode, T.sname, T.telno, T.hpage
from FRUIT F, STORE T, SALES S
where F.fname = S.fname and T.scode = S.scode and F.kcal =  30;


12.
delete from STORE where sname = 'Busan';


13.
drop table SALES;




