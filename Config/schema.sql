create   database if not exists TPLab4;
use TPLab4;
CREATE TABLE IF NOT EXISTS Company (
   companyId int not null auto_increment,
   nameCompany varchar(30) unique,
   city varchar (30),
   address varchar(30),
   size varchar (15),
   email varchar(45),
   phoneNumber bigint,
   cuit bigint not null unique,
    CONSTRAINT PK_id PRIMARY KEY (companyId)
);
drop table JobOffer;
Create TABLE  if not exists  JobOffer(
    id int not null auto_increment,
    companyId int not null,
    jobPositionId int not null,
    requirements varchar(120),
   constraint fk_companyId FOREIGN KEY  (companyId) REFERENCES Company (id) ON DELETE ON CASCADE,
    constraint pk_id primary key (id)
);
create TABLE  if not exists Users(
    id int not null auto_increment,
    studentId int not null,
    `password` varchar(20),
    admin boolean,
    email varchar(30),
    constraint pk_id primary key (id)
);
create TABLE  if not exists appointment(
    id int not null auto_increment,
    studentId int not null,
    jobOfferId int not null,
    cv varchar(50),
    message varchar(120),
    constraint PK_Id primary key (id),
    constraint fk_jobOfferId foreign key (jobOfferId) references JobOffer (id)
);
create table if not exists record(
  id int not null auto_increment,
  dateAppointment varchar (45),
    appointmentId int not null,
    constraint fk_appointment foreign key (appointmentId) references appointment (id)

);
