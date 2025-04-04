Database configuration guide (using XAMPP):

1) Ensure database is up and running. In the XAMPP control panel, make sure that Apache and MySQL are both successfully started.

2) Open phpMyAdmin by clicking the "Admin" button in the MySQL row.

3) In the new browser window, click on the SQL button in the task bar at the top of the window. A query window will appear.

4) Copy the SQL code from the DDL.sql file into the query window. Click the "Go" button down below. You should see several notifications that your SQL commands were successfully processed. The database will be ready for use at this point.

5) Optionally, you can add some users and books to the database. Copy the code from DML.sql into the same query window and click the "Go" button once again. You should see several notifications that your SQL commands were successfully processed. The database will have several users and books at this point.


Database DML users and books:

As a convenience for testing purposes, the DML.sql file contains a series of placeholder users and books. The following users are added and can be used to log in with their username and password. Note that the database itself stores a double-hashed version of their password.

USERNAME        PASSWORD
jonathan        password
nathan          password
mikaela         password
ryan            password

The following books are added:
ISBN, TITLE, AUTHOR(S), YEAR
'1111111111111', 'How to Impress your Professor', 'Student Etudiant', '2025',
'2222222222222', 'Learning WebDev in 24 Hours', 'Grey Squirrel', '1998', 
'3333333333333', 'Presentation Skills for the Busy Student', 'Power Point', '1993'
'9780771038525', 'Sapiens', 'Yuval Noah Harari', '2014-10-28'
'9780836218053', 'The Essential Calvin And Hobbes', 'Bill Watterson', '1988'
'9780007203543', 'The Fellowship of the Ring', 'J. R. R. Tolkien', '2005'
'9781101658055', 'Dune', 'Frank Herbert', '2003-08-26', 


- Jonathan Latkowcer
Team Leader