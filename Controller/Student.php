<?php

namespace Saga\Controller;

class Student {

    const MAX_STUDENT = 30;

    protected $oUtil, $oModel;
    private $_iId;

    public function __construct() {
        $this->oUtil = new \Saga\Config\Util;
        $this->oUtil->getModel('Student');

        $this->oModel = new \Saga\Model\Student;

        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }

    public function index() {
        $this->oUtil->oPosts = $this->oModel->get(0, self::MAX_STUDENT); // Get only the latest X posts

        $this->oUtil->getView('Student/index');
    }

    public function add() {
        if (!empty($_POST['add_submit'])) {
            $aData = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'dob' => $_POST['dob'],
                'contact_no' => $_POST['contact_no'],
                'created_at' => date('Y-m-d H:i:s'));

            if ($this->oModel->add($aData))
                $this->oUtil->sSuccMsg = 'Student has been added.';
            else
                $this->oUtil->sErrMsg = 'Please try again later.';
        }

        $this->oUtil->getView('Student/add');
    }

    public function update() {
        $this->oUtil->oPost = $this->oModel->getById($this->_iId); // Get the data of the post

        $this->oUtil->getView('Student/edit');
    }

    public function edit() {
        if (!empty($_POST['edit_submit'])) {
            $aData = array(
                'id' => $_POST['id'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'dob' => $_POST['dob'],
                'contact_no' => $_POST['contact_no'],
            );

            if ($this->oModel->update($aData))
                $this->oUtil->sSuccMsg = 'The Student has been updated.';
            else
                $this->oUtil->sErrMsg = 'Please try again later';
        }

        $this->oUtil->oPost = $this->oModel->getById($_POST['id']);

        $this->oUtil->getView('Student/edit');
    }

    public function delete() {
        if (!empty($_POST['delete']) && $this->oModel->delete($this->_iId))
            header('Location: ' . ROOT_URL);
        else
            exit('Student cannot be deleted.');
    }

}
