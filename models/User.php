<?php

namespace Models;

use Provider\Database;

class User extends Database
{

    public function getRowbyEmail($email)
    {
        $this->query('SELECT * FROM users WHERE email=:email');
        $this->bind(':email', $email);
        $this->exec();
        return $this->rowCount();
    }

    public function updateStatus($status, $email)
    {

        $this->query('UPDATE users SET status=:status WHERE email=:email');
        $this->bind(':status', $status);
        $this->bind(':email', $email);
        $this->exec();

    }

    public function getUser($email)
    {

        $this->query('SELECT id_user,firstname,lastname,password,is_connected,avatar,email FROM users WHERE email=:email');
        $this->bind(':email', $email);
        return $this->single();

    }

    public function getEmail($email)
    {

        $this->query('SELECT email FROM users WHERE email=:email');
        $this->bind(':email', $email);
        $this->exec();
        return $this->rowCount();
    }

    public function insertData($first, $last, $password, $is_connected, $avatar, $email)
    {

        $this->query('INSERT INTO users(firstname,lastname,password,is_connected,avatar,email) VALUES (:first,:last,:password,:is_connected,:avatar,:email)');
        $this->bind(':first', $first);
        $this->bind(':last', $last);
        $this->bind(':avatar', $avatar);
        $this->bind(':is_connected', $is_connected);
        $this->bind(':password', $password);
        $this->bind(':email', $email);
        return $this->exec();
    }

    public function getConnected($status, $email)
    {

        $this->query('SELECT id_user,firstname,lastname,status FROM users where status=:status AND email=:email');
        $this->bind(':status', $status);
        $this->bind(':email', $email);
        return $this->single();
    }

}
