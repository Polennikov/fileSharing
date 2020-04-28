<?php

class Users
{
    var $dbconn;
    var $email;
    var $password;
    var $id_users;
    var $name_users;
    var $role;

    public function setDbconn($dbconn)
    {
        $this->dbconn = $dbconn;
    }

    public function getUsers($log)
    {
        $sql1 = "SELECT *FROM users WHERE email_users=:log";
        $result = $this->dbconn->prepare($sql1);
        $result->bindParam(':log', $log, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        $this->id_users = $row[0];
        $this->email = $row[1];
        $this->name_users = $row[2];
        $this->password = $row[4];
        $this->role = $row[6];
    }

    public function getNameUsers($email, $id_users)
    {
        $sql = "SELECT name_users FROM users WHERE email_users=:email_users OR id_users=:id_users ";
        $result = $this->dbconn->prepare($sql);
        $result->bindParam(':email_users', $email);
        $result->bindParam(':id_users', $id_users);
        $result->execute();
        $row = $result->fetch();
        return $row[0];
    }

    public function setUsers($email_users, $name_users, $adres_users, $password_users, $number_phone)
    {
        $sql = "INSERT INTO users (email_users,name_users,adres_users,password_users,number_phone)
                VALUES (:email_users,:name_users,:adres_users,:password_users,:number_phone)";
        $result = $this->dbconn->prepare($sql);
        $result->bindValue(':email_users', $email_users);
        $result->bindValue(':number_phone', $number_phone);
        $result->bindValue(':name_users', $name_users);
        $result->bindValue(':adres_users', $adres_users);
        $result->bindValue(':password_users', md5($password_users));
        $result->execute();
    }

    public function UpdatePasswordUsers($password, $email)
    {
        $sql = "UPDATE users SET password_users=:password_users WHERE email_users=:email_users;";
        $result = $this->dbconn->prepare($sql);
        $result->bindParam(':password_users', $password);
        $result->bindParam(':email_users', $email);
        $result->execute();
    }

}