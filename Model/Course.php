<?php

namespace Saga\Model;

class Course {

    protected $oDb;

    public function __construct() {
        $this->oDb = Database::getConnection();
    }

    public function get($iOffset, $iLimit) {
        $oStmt = $this->oDb->prepare('SELECT * FROM student ORDER BY createdDate DESC LIMIT :offset, :limit');
        $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
        $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function add(array $aData) {
        $oStmt = $this->oDb->prepare('INSERT INTO student (firstname, lastname, dob, contact_no,created_at) VALUES(:firstname, :lastname, :dob, :contact_no,:created_at)');
        return $oStmt->execute($aData);
    }

    public function getById($iId) {
        $oStmt = $this->oDb->prepare('SELECT * FROM student WHERE id = :id LIMIT 1');
        $oStmt->bindParam(':id', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function update(array $aData) {
        $oStmt = $this->oDb->prepare('UPDATE student SET firstname = :firstname, lastname = :lastname,dob=:dob,contact_no=:contact_no WHERE id = :id');
        $oStmt->bindValue(':id', $aData['id'], \PDO::PARAM_INT);
        $oStmt->bindValue(':firstname', $aData['firstname']);
        $oStmt->bindValue(':lastname', $aData['lastname']);
        $oStmt->bindValue(':dob', $aData['dob']);
        $oStmt->bindValue(':contact_no', $aData['contact_no']);
        return $oStmt->execute();
    }

    public function delete($iId) {
        $oStmt = $this->oDb->prepare('DELETE FROM student WHERE id = :id LIMIT 1');
        $oStmt->bindParam(':id', $iId, \PDO::PARAM_INT);
        return $oStmt->execute();
    }

}
