
CREATE DATABASE IF NOT EXISTS pharmacyApp;
USE pharmacyApp;

CREATE TABLE IF NOT EXISTS pharmacyDb(
id int(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
regNo varchar(50) NOT NULL UNIQUE KEY,
name varchar(50) NOT NUll,
username varchar(50) NOT NUll,
password varchar(50) NOT NULL
);

INSERT INTO pharmacyDb SET id=1, regNo="PMC/1", name="Yusuf Ibrahim", username="admin1", password="admin";
INSERT INTO pharmacyDb SET id=2, regNo="PMC/2", name="Yusuf Idris", username="admin2", password="admin";
INSERT INTO pharmacyDb SET id=3, regNo="PMC/3", name="Yusuf Ahmed", username="admin3", password="admin";

CREATE TABLE adminData
	(
		adminId int(100) NOT NULL AUTO_INCREMENT,
		adminName varchar(20) NOT NULL,
		username varchar(20) NOT NULL,
		password varchar(20) NOT NULL,
		PRIMARY KEY(adminId),
		UNIQUE(username)
	);
	
	INSERT INTO adminData SET adminId=1, adminName="Yusuf Ibrahim", username="admin", password="admin";
	
	
CREATE TABLE stock(
id int(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
name varchar(50) NOT NUll UNIQUE KEY,
price FLOAT(50) NOT NUll,
expiryDate date NOT NULL,
quantity int(50) NOT NULL
);

INSERT INTO stock SET id=1, name='Paracetamol', price=40 , expiryDate='2018-08-25' , quantity=50 ;
INSERT INTO stock SET id=2, name='Panadol', price=50 , expiryDate='2018-08-30' , quantity=3 ;
INSERT INTO stock SET id=3, name='Pectol', price=30 , expiryDate='2018-08-5' , quantity=7 ;
INSERT INTO stock SET id=4, name='Procold', price=100 , expiryDate='2018-08-6' , quantity=8 ;
INSERT INTO stock SET id=5, name='Cold Time', price=80 , expiryDate='2018-08-8' , quantity=80 ;
INSERT INTO stock SET id=6, name='Vitamin C', price=60 , expiryDate='2018-08-10' , quantity=6 ;
INSERT INTO stock SET id=7, name='Exiplon', price=120 , expiryDate='2018-08-9' , quantity=67 ;
INSERT INTO stock SET id=8, name='Asad', price=100 , expiryDate='2018-08-26' , quantity=23 ;
INSERT INTO stock SET id=9, name='Coff Off', price=100 , expiryDate='2018-08-27' , quantity=33 ;
INSERT INTO stock SET id=10, name='Ampicillin', price=100 , expiryDate='2018-08-28' , quantity=11 ;
INSERT INTO stock SET id=11, name='Aboniki', price=100 , expiryDate='2018-08-29' , quantity=12 ;
INSERT INTO stock SET id=12, name='Rub', price=70 , expiryDate='2018-08-30' , quantity=13 ;
INSERT INTO stock SET id=13, name='Limotin', price=40 , expiryDate='2018-08-31' , quantity=23 ;
INSERT INTO stock SET id=14, name='Emzolin', price=180, expiryDate='2018-08-25' , quantity=24 ;
INSERT INTO stock SET id=15, name='MMT', price=20 , expiryDate='2018-08-25' , quantity=25 ;

CREATE TABLE saleRecord(
id int(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
name varchar(50) NOT NUll,
price FLOAT(50) NOT NUll,
quantity int(50) NOT NULL,
dateSold date NOT NULL,
drugUsage TEXT NOT NULL,
soldBy varchar(20) NOT NULL
);

INSERT INTO saleRecord SET id=1, name='MMT', price=40 , dateSold='2018-08-04' , quantity=2, drugUsage='Two Par Day', soldBy='PMC/1'; 
INSERT INTO saleRecord SET id=2, name='MMT', price=40 , dateSold='2018-08-04' , quantity=2, drugUsage='Two Par Day', soldBy='PMC/2'; 
INSERT INTO saleRecord SET id=3, name='MMT', price=40 , dateSold='2018-08-04' , quantity=2, drugUsage='Two Par Day', soldBy='PMC/1'; 
INSERT INTO saleRecord SET id=4, name='Panadol', price=100 , dateSold='2018-08-03' , quantity=2, drugUsage='Two Par Day', soldBy='PMC/1'; 
INSERT INTO saleRecord SET id=5, name='Panadol', price=100 , dateSold='2018-08-03' , quantity=2, drugUsage='Two Par Day', soldBy='PMC/2'; 
INSERT INTO saleRecord SET id=6, name='Panadol', price=100 , dateSold='2018-08-05' , quantity=2, drugUsage='Two Par Day', soldBy='PMC/1'; 
INSERT INTO saleRecord SET id=7, name='Pectol', price=60 , dateSold='2018-08-06' , quantity=2, drugUsage='Two Par Day', soldBy='PMC/1'; 
INSERT INTO saleRecord SET id=8, name='Pectol', price=60 , dateSold='2018-08-06' , quantity=2, drugUsage='Two Par Day', soldBy='PMC/2'; 
INSERT INTO saleRecord SET id=9, name='Asad', price=200 , dateSold='2018-08-05' , quantity=2, drugUsage='Two Par Day', soldBy='PMC/2'; 
INSERT INTO saleRecord SET id=10, name='Asad', price=200 , dateSold='2018-08-05' , quantity=2, drugUsage='Two Par Day', soldBy='PMC/1'; 
INSERT INTO saleRecord SET id=11, name='Asad', price=200 , dateSold='2018-08-05' , quantity=2, drugUsage='Two Par Day', soldBy='PMC/3'; 
