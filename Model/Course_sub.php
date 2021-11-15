<?php

namespace Saga\Model;

class Student {

    protected $oDb;

    public function __construct() {
        $this->oDb = Database::getConnection();
    }

    public function get() {
        $oStmt = $this->oDb->prepare('SELECT student.firstname,student.lastname,course.course_name FROM student_sub_course ssc'
                . 'left join student ON ssc.student_id = student.id'
                . 'left join courses On ssc.course_id = course.id');
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function get_Students() {
        $oStmt = $this->oDb->prepare('SELECT id, firstname,lastname FROM student');
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function get_Courses() {
        $oStmt = $this->oDb->prepare('SELECT id, course_name FROM courses');
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function add(array $aData) {
        $oStmt = $this->oDb->prepare('INSERT INTO student_sub_course (student_id, course_id, subcribed_at) VALUES(:student_id, :course_id, :subcribed_at)');
        return $oStmt->execute($aData);
    }

}
