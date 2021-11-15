<?php

namespace Saga\Controller;

class Course_sub {

    protected $oUtil, $oModel;
    private $_iId;

    public function __construct() {
        $this->oUtil = new \Saga\Config\Util;
        $this->oUtil->getModel('Course_sub');

        $this->oModel = new \Saga\Model\Course_sub;

        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }

    public function index() {
        $this->oUtil->oCourses = $this->oModel->get(); // Get only the latest X posts

        $this->oUtil->getView('Course_sub/index');
    }

    public function add() {
        if (!empty($_POST['add_submit'])) {
            $aData = array(
                'student_id' => $_POST['student_id'],
                'course_id' => $_POST['course_id'],
                'subcribed_at' => date('Y-m-d H:i:s'));


            if ($this->oModel->add($aData))
                $this->oUtil->sSuccMsg = 'Course_sub has been added.';
            else
                $this->oUtil->sErrMsg = 'Please try again later.';
        }

        $this->oUtil->oStudents = $this->oModel->get_Students(); // Get only the latest X posts
        $this->oUtil->oCourses = $this->oModel->get_Courses(); // Get only the latest X posts
        $this->oUtil->getView('Course_sub/add');
    }

}
