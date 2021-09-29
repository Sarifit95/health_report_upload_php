<<<<<<< HEAD
# health_report_upload_php
User login or register and upload there Health record with document type
=======
1.create database with name documents and import documents.sql file 
		Database has two table 
		1.first table "users" -> fild name :1.(id (integer | Primary key |Auto increment))
											2.(name(varchar 250|utf8 general ci)).
											3.(phone(varchar 50)).
											4.(email(varchar 50)).
											5.(password(varchar 200)).
											6.(image(varchar 200)).
											
		2. second table "documents"->fild name:1.(id (integer | Primary key |Auto increment))
												2.(type(varchar 250|utf8 general ci)).
												3.(image(varchar 200)).
												4.(user_id(integer|Foreign key->users.id)).
											
2. if import documents.sql file then users table has one user phone:01777777777 and password:123456


