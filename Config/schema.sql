

create database if not exists TPLab4;
use TPLab4;

CREATE TABLE IF NOT EXISTS Company (
    companyId int not null auto_increment unique,
    nameCompany varchar (30) unique,
    city varchar (30),
    address varchar (30),
    size varchar (15),
    email varchar (45),
    phoneNumber bigint,
    cuit bigint not null unique
,CONSTRAINT PK_companid PRIMARY KEY (companyId)
);

CREATE TABLE IF NOT EXISTS JobOffer(
    id INT NOT NULL AUTO_INCREMENT,
    companyId INT NOT NULL,
    jobPositionId INT NOT NULL,
    requirements VARCHAR(120),
    flyer VARCHAR(100),
    dateExpiration VARCHAR(30)
    ,CONSTRAINT pk_jobOfferid PRIMARY KEY(id),
    CONSTRAINT fk_company_jobId FOREIGN KEY(companyId) REFERENCES Company(companyId) ON DELETE CASCADE ON UPDATE CASCADE
);

create TABLE if not exists Users (
    id int not null auto_increment,
    studentId int not null,
    `password` varchar (20),
    role int not null,
    email varchar (30) UNIQUE,
    companyId int not null,
    constraint pk_Userid primary key (id)
    -- constraint fk_companyId FOREIGN KEY (companyId) REFERENCES Company (companyId) ON DELETE  CASCADE
);
create TABLE if not exists appointment (
    apid int not null auto_increment,
    studentId int not null,
    jobOfferId int not null,
    cv varchar (50),
    message varchar (120),
    dateAppointment varchar (30),
    constraint PK_appointmentId primary key (apid),
    constraint fk_jobOfferId foreign key (jobOfferId) references JobOffer (id)
);
create TABLE if not exists appointmentOld (
    id int not null,
    nameCompany varchar (45),
    student varchar (45),
    jobPosition varchar (45),
    career varchar (45),
    date varchar (45)
);
create table if not exists career(
	careerId int not null unique,
	description varchar (45),
	active boolean,
	constraint PK_CAREER primary key(careerId)
)
--"jobPositionId": 1,
--    "careerId": 1,
--    "description": "Jr naval engineer"
INSERT INTO Users (studentId, `password`, role, email, companyId)
VALUES (-1, 'adminpassword', 2, 'admin@mail.com', -1);