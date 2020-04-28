<?php

class Posters
{
    var $dbconn;
    var $id_posters;
    var $massPoster;
    var $massFilePoster;

    public function setDbconn($dbconn)
    {
        $this->dbconn = $dbconn;
    }

    public function setPosters($title_posters, $text_posters, $id_users)
    {
        $sql = "INSERT INTO posters (title_posters,text_posters,id_users,data_posters)
                           VALUES (:title_posters,:text_posters,:id_users,:data_posters)";

        $result = $this->dbconn->prepare($sql);
        $result->bindValue(':title_posters', $title_posters);
        $result->bindValue(':text_posters', $text_posters);
        $result->bindValue(':id_users', $id_users);
        $result->bindValue(':data_posters', (string)date("d.m.y,H:i"));
        $result->execute();
        $this->id_posters = $this->dbconn->lastInsertId();
    }

    public function setFilePosters($filenameMass)
    {
        $sql = "INSERT INTO file_posters (filename_posters,id_posters)
                            VALUES (:filename_posters,:id_posters)";
        $result = $this->dbconn->prepare($sql);
        foreach ($filenameMass as $item) {
            $result->bindValue(':filename_posters', $item);
            $result->bindValue(':id_posters', $this->id_posters);
            $result->execute();
        }
    }

    public function readPosters()
    {
        $this->massPoster = array();
        $sql = "SELECT * FROM posters;";
        $result = $this->dbconn->prepare($sql);
        $result->execute();
        while ($row = $result->fetch()) {
            array_unshift($this->massPoster, $row);
        }
        return $this->massPoster;
    }

    public function readFilePosters()
    {
        $this->massFilePoster = array();
        $sql = "SELECT *FROM file_posters WHERE id_posters=:id_posters";
        $result = $this->dbconn->prepare($sql);
        foreach ($this->massPoster as $item) {
            $result->bindValue(':id_posters', $item[2]);
            $result->execute();
            while ($row = $result->fetch()) {
                array_unshift($this->massFilePoster, $row);
            }
        }
        return $this->massFilePoster;
    }

    public function getOnePosters($id_posters)
    {
        $sql = "SELECT *FROM posters WHERE id_posters=:id_posters";
        $result = $this->dbconn->prepare($sql);
        $result->bindParam(':id_posters', $id_posters);
        $result->execute();
        $row = $result->fetch();
        return $row;
    }

    public function getFilePosters($id_posters)
    {
        $sql = "SELECT *FROM file_posters WHERE id_posters=:id_posters";
        $result = $this->dbconn->prepare($sql);
        $result->bindParam(':id_posters', $id_posters);
        $result->execute();
        $rowFile = array();
        while ($row = $result->fetch()) {
            array_unshift($rowFile, $row);
        }
        return $rowFile;
    }

    public function updatePosters($title_posters, $text_posters, $id_posters)
    {
        $sql = "UPDATE posters SET title_posters=:title_posters, text_posters=:text_posters  WHERE id_posters=:id_posters;";
        $result = $this->dbconn->prepare($sql);
        $result->bindParam(':title_posters', $title_posters);
        $result->bindParam(':text_posters', $text_posters);
        $result->bindParam(':id_posters', $id_posters);
        $result->execute();
    }

    public function deletePosters($id_posters)
    {
        $sql = "DELETE FROM file_posters WHERE id_posters=:id_posters;";
        $result = $this->dbconn->prepare($sql);
        $result->bindParam(':id_posters', $id_posters);
        $result->execute();
        $sql = null;
        $result = null;
        $sql = "DELETE FROM posters WHERE id_posters=:id_posters;";
        $result = $this->dbconn->prepare($sql);
        $result->bindParam(':id_posters', $id_posters);
        $result->execute();
    }

}