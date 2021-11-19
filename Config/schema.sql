create
database if not exists TPLab4;
use
TPLab4;
CREATE TABLE IF NOT EXISTS Company
(
    companyId
    int
    not
    null
    auto_increment,
    nameCompany
    varchar
(
    30
) unique,
    city varchar
(
    30
),
    address varchar
(
    30
),
    size varchar
(
    15
),
    email varchar
(
    45
),
    phoneNumber bigint,
    cuit bigint not null unique,
    CONSTRAINT PK_id PRIMARY KEY
(
    companyId
)
    );
drop table JobOffer;
CREATE TABLE IF NOT EXISTS JobOffer( id INT NOT NULL AUTO_INCREMENT, companyId INT NOT NULL, jobPositionId INT NOT NULL, requirements VARCHAR(120), flyer VARCHAR(100), dateExpiration VARCHAR(30), CONSTRAINT pk_id PRIMARY KEY(id), CONSTRAINT fk_companyId FOREIGN KEY(companyId) REFERENCES Company(companyId) ON DELETE CASCADE ON UPDATE CASCADE );
create TABLE if not exists Users
(
    id
    int
    not
    null
    auto_increment,
    studentId
    int
    not
    null,
    `password`
    varchar
(
    20
),
    role int not null,
    email varchar
(
    30
),companyId int not null
    , constraint pk_id primary key
(
    id
), constraint fk_companyId FOREIGN KEY
(
    companyId
) REFERENCES Company
(
    id
) ON DELETE
  ON CASCADE
    );
create TABLE if not exists appointment
(
    apid
    int
    not
    null
    auto_increment,
    studentId
    int
    not
    null,
    jobOfferId
    int
    not
    null,
    cv
    varchar
(
    50
),
    message varchar
(
    120
),
    dateAppointment varchar
(
    30
),
    constraint PK_Id primary key
(
    id
),
    constraint fk_jobOfferId foreign key
(
    jobOfferId
) references JobOffer
(
    id
)
    );
create TABLE if not exists appointmentOld
(
    id
    int
    not
    null,
    nameCompany
    varchar
(
    45
), student varchar
(
    45
), jobPosition varchar
(
    45
), career varchar
(
    45
), date varchar
(
    45
) );