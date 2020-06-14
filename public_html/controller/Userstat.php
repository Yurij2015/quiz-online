<?php

class Userstat
{
    function get()
    {
        return R::getAll('SELECT * FROM userstat');
    }

    function getOne($username)
    {
        return R::getAll("SELECT * FROM userstat WHERE username=$username");
    }

}