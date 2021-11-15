CREATE TABLE IF NOT EXISTS student(
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  firstname varchar(125) NOT NULL,
  lastname varchar(125) NOT NULL,
  dob date NOT NULL,
  contact_no varchar(10),
  created_at datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
 
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS courses(
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  course_name varchar(120) NOT NULL,
  course_detail TEXT,
  created_at datetime NOT NULL DEFAULT '0000-00-00 00:00:00',

  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS student_sub_course(
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  student_id int(10) unsigned NOT NULL,
  course_id int(10) unsigned NOT NULL,
  subcribed_at datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id),
   FOREIGN KEY (`student_id`) REFERENCES student(`id`),
 FOREIGN KEY (`course_id`) REFERENCES courses(`id`)
) DEFAULT CHARSET=utf8;