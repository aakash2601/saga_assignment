<?php

namespace Saga\Controller;

class Course {

    const MAX_STUDENT = 30;

    protected $oUtil, $oModel;
    private $_iId;

    public function __construct() {
        $this->oUtil = new \Saga\Config\Util;
        $this->oUtil->getModel('Course');

        $this->oModel = new \Saga\Model\Course;

        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }

    public function index() {
        $this->oUtil->oPosts = $this->oModel->get(0, self::MAX_STUDENT); // Get only the latest X posts

        $this->oUtil->getView('Course/index');
    }

    public function add() {
        if (!empty($_POST['add_submit'])) {
            $aData = array(
                'course_name' => $_POST['course_name'],
                'course_detail' => $_POST['course_detail'],
                'created_at' => date('Y-m-d H:i:s'));

            if ($this->oModel->add($aData))
                $this->oUtil->sSuccMsg = 'Course has been added.';
            else
                $this->oUtil->sErrMsg = 'Please try again later.';
        }

        $this->oUtil->getView('Course/add_course');
    }

    public function edit() {
        if (!empty($_POST['edit_submit'])) {
            $aData = array(
                'id' => $_POST['id'],
                'course_name' => $_POST['course_name'],
                'course_detail' => $_POST['course_detail'],
            );

            if ($this->oModel->update($aData))
                $this->oUtil->sSuccMsg = 'The Course has been updated.';
            else
                $this->oUtil->sErrMsg = 'Please try again later';
        }

        $this->oUtil->oPost = $this->oModel->getById($_POST['id']);

        $this->oUtil->getView('Course/edit_Course');
    }

    public function update() {
        $this->oUtil->oPost = $this->oModel->getById($this->_iId); // Get the data of the post

        $this->oUtil->getView('Course/edit');
    }

    public function delete() {
        if ($this->_iId != 0 && $this->oModel->delete($this->_iId))
            header('Location: ' . ROOT_URL);
        else
            exit('Course cannot be deleted.');
    }

}
