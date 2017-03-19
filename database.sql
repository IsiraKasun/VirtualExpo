CREATE DATABASE virtualExpo;

USE virtualExpo;

CREATE TABLE curriculumGroup(

groupId VARCHAR(10) PRIMARY KEY,
description VARCHAR(255) 

);

CREATE TABLE qualification(

qualId VARCHAR(10) PRIMARY KEY,
description VARCHAR(255) 

);

CREATE TABLE curriculum (

curriculumId VARCHAR(10) PRIMARY KEY,
description VARCHAR(255),
groupId VARCHAR(10),

FOREIGN KEY(groupId) REFERENCES curriculumGroup(groupId)

);

CREATE TABLE course (

courseId VARCHAR(10) PRIMARY KEY,
description VARCHAR(255)



);

CREATE TABLE node(

nodeId VARCHAR(10) PRIMARY KEY,
curriculumId VARCHAR(10),
qualId VARCHAR(10),

FOREIGN KEY(curriculumId) REFERENCES curriculum(curriculumId),
FOREIGN KEY(qualId) REFERENCES qualification(qualId)

);

CREATE TABLE designation (

desgId VARCHAR(10) PRIMARY KEY,
description VARCHAR(255)

);

CREATE TABLE nodeDesignation (

nodeId VARCHAR(10),
desgId VARCHAR(10),
PRIMARY KEY(nodeId,desgId),
FOREIGN KEY(nodeId) REFERENCES node(nodeId),
FOREIGN KEY(desgId) REFERENCES designation(desgId)


);

CREATE TABLE paths (

pathId VARCHAR(10) PRIMARY KEY,
startNode VARCHAR(10),
endNode VARCHAR(10),
description VARCHAR(255),

FOREIGN KEY(startNode) REFERENCES node(nodeId),
FOREIGN KEY(endNode) REFERENCES node(nodeId)

);

CREATE TABLE pathCourses(


pathId VARCHAR(10),
courseId VARCHAR(10),
FOREIGN KEY(pathId) REFERENCES paths(pathId),
FOREIGN KEY(courseId) REFERENCES course(courseId),

PRIMARY KEY (pathId,courseId)
);

CREATE TABLE institution(

intstId VARCHAR(10) PRIMARY KEY,
description VARCHAR(255)


);



CREATE TABLE courseInstitutions (

courseInt VARCHAR(10) PRIMARY KEY,
courseId VARCHAR(10),
intstId VARCHAR(10),
duration VARCHAR(10),
cost DECIMAL(12,2),

FOREIGN KEY(courseId) REFERENCES course(courseId),
FOREIGN KEY(intstId) REFERENCES institution(intstId)


);


