<?php

class Database
{
    const HOST = 'localhost';
    const USER_NAME = 'root';
    const PASSWORD = '';

    const DB_NAME = 'phpClass';

    public function connect()
    {
        $connect = mysqli_connect(self::HOST, self::USER_NAME, self::PASSWORD, self::DB_NAME);

        mysqli_set_charset($connect, "utf8");

        if (mysqli_connect_errno() === 0) {
            return $connect;
        }
        return false;
    }
}