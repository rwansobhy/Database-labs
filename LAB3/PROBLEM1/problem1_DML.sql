INSERT INTO EMPLOYEE (fname,lname,bdate,address,gender,salary,Dno) VALUES( 'David', 'bruth', '1990-10-01','55alm street' ,'M', 25000, NULL);
INSERT INTO DEPARTMENT(Dname,mgr_ssn,mgr_start_date) VALUES ('HR',1,'2006-02-09');
INSERT INTO PROJECT(Pname,Plocation,Dno) VALUES('New Villa','cairo',1);
-- requirement 1
DELETE FROM EMPLOYEE WHERE ssn = 1;
INSERT INTO EMPLOYEE (fname,lname,bdate,address,gender,salary,Dno) VALUES('william', 'clay', '1987-12-09','13 seatle street','M',30000,2);
INSERT INTO DEPARTMENT(Dname,mgr_ssn,mgr_start_date) VALUES ('innovators',3,'2007-02-09');
-- requirement2
INSERT INTO PROJECT(Pname,Plocation,Dno) VALUES('New design','alexandria', 5);
INSERT INTO EMPLOYEE (fname,lname,bdate,address,gender,salary,Dno) VALUES( 'espe', 'sepas', '1989-10-01','55murano street' ,'F', 25000, 7);
INSERT INTO DEPARTMENT(Dname,mgr_ssn,mgr_start_date) VALUES ('ceo',6,'2005-02-09');
INSERT INTO PROJECT(Pname,Plocation,Dno) VALUES('New holding','florida',7);

