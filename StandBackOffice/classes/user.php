<?php

class User extends database
{
    public function __construct()
    {
        //
    }

    public function getTotalUsersNumber()
    {
        $query = $this->connect()->prepare(
            "SELECT count(*) 'user_nb'
            FROM user;"
        );
        $query->execute();
        return $query;
    }

    public function getAllUsernames()
    {
        $query = $this->connect()->prepare(
            "SELECT use_username
            FROM user;"
        );
        $query->execute();
        return $query;
    }

    public function updateUserAuthority($auth, $username)
    {
        $query = $this->connect()->prepare(
            "UPDATE user
            SET use_auth = ?
            WHERE use_username = ?;"
        );
        $query->execute([$auth, $username]);
        return $query;
    }
}
