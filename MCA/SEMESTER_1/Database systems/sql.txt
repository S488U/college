select fname,address from employee,department where dno=dnumber and dname='Research';


select pnumber,dnum,fname from project,department,employee where dno=dnumber and dnumber=dnum and plocation='Bangalore' and mgreno=eno;


select distinct fname from employee, department,project where dnumber=dnum and dno=dnumber and dnumber=4;


select pname from employee,project,department where dnum=dnumber and dnumber=dno and lname='Kumar';


select distinct fname from employee, dependent where eeno=eno and eeno in (select eeno from dependent group by eeno having count(*)>=2);


select distinct fname from employee,department,dependent where dno=dnumber and eno=eeno and mgreno=eno;


select fname from employee,works_on where eeno=eno and pno in(select pno from works_on where eeno=(select eno from employee where fname='Priya')) and fname<>'Priya';


select fname from employee, works_on, project where eno=eeno and pno=pnumber and pname='Reorganization' and hours>10 group by fname;


select fname from employee where supereno=(select eno from employee where fname='Gaurav');





QP:
6: select fname from employee where eno not in(select eeno from dependent);

11: select pname,sum(hours) from project,works_on where pno=pnumber group by pname;

12: select dname,avg(salary) from employee,department where dno=dnumber group by dname;

13: select avg(salary) from employee where sex='F';

14: select lname from employee,department where eno=mgreno and mgreno not in (select eeno from dependent);

17: select sum(salary),min(salary),max(salary),avg(salary) from employee;

18: select dno, count(fname), avg(salary) from employee,department where dno=dnumber group by dno;

19: select pnumber,pname, count(pno) as "EMP COUNT" from project,works_on where pnumber=pno group by pnumber,pname;

20: select pnumber,pname, count(pno) as "EMP COUNT" from project,works_on where pnumber=pno group by pnumber,pname having count(pno)>2;

21:

22: select distinct fname from employee, dependent where eeno=eno and eeno in (select eeno from dependent group by eeno having count(*)>=2);

23: 

24: select dname, count(fname) as "EMP COUNT"  from employee,department where sex='M' and dno=dnumber group by dname;

28: select fname, hiredate from employee where hiredate > (select hiredate from employee where fname='Ramesh');


