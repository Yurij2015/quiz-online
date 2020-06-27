<?php

class Userstat
{
    function get()
    {
        return R::getAll('SELECT * FROM usertest');
    }

    function getOne($username)
    {
        return R::getAll("SELECT * FROM usertest WHERE userid='{$username}'");
    }

    function getRеsult($anser)
    {
        return count(R::getAll("SELECT * FROM anser WHERE id=$anser AND rightanswer = ansnuminques"));
    }

    function create($userid, $questionid, $answer)
    {
        $usertest = R::dispense('usertest');
        $usertest->date = date("Y-m-d H:i:s");
        $usertest->userid = $userid;
        $usertest->questionid = $questionid;
        $usertest->answer = $answer;
        return R::store($usertest);
    }
}