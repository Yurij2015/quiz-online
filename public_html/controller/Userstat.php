<?php

class Userstat
{
    function get()
    {
        return R::getAll('SELECT * FROM usertest, anser, question WHERE usertest.answer = anser.id AND usertest.questionid = question.id');
    }

    function getOne($username)
    {
        return R::getAll("SELECT * FROM usertest, anser, question, test WHERE userid='{$username}' AND usertest.answer = anser.id AND usertest.questionid = question.id AND question.testid = test.id");
    }

    function getOneAll()
    {
        return R::getAll("SELECT * FROM usertest, anser, question, test WHERE usertest.answer = anser.id AND usertest.questionid = question.id AND question.testid = test.id");
    }

//    function getStatistic($username)
//    {
//        return R::getAll("SELECT DISTINCT name, SUM(usertest.status)/COUNT(usertest.status) as result, question.testid as testid, test.status as status, test.disciplinesid as disciplinesid  FROM usertest, question, test WHERE userid='{$username}' AND usertest.questionid = question.id AND question.testid = test.id GROUP BY test.name, question.testid, test.status, test.disciplinesid");
//    }

    function getStatistic($username)
    {
        return R::getAll("SELECT DISTINCT name, SUM(usertest.status) as result, question.testid as testid, test.status as status, test.disciplinesid as disciplinesid  FROM usertest, question, test WHERE userid='{$username}' AND usertest.questionid = question.id AND question.testid = test.id GROUP BY test.name, question.testid, test.status, test.disciplinesid");
    }

//    function getStatisticAll()
//    {
//        return R::getAll("SELECT DISTINCT name, SUM(usertest.status)/COUNT(usertest.status) as result, usertest.userid FROM usertest, question, test WHERE usertest.questionid = question.id AND question.testid = test.id GROUP BY test.name, question.testid, usertest.userid");
//    }

    function getStatisticAll()
    {
        return R::getAll("SELECT DISTINCT name, SUM(usertest.status) as result, usertest.userid FROM usertest, question, test WHERE usertest.questionid = question.id AND question.testid = test.id GROUP BY test.name, question.testid, usertest.userid");
    }

    function getParent($id)
    {
        $test = R::load('test', $id);
        $parent = $test->name;
        return $parent;
    }

    function getUsername($id)
    {
        $authuser = R::load('auth_user', $id);
        $username = $authuser->username . " " . $authuser->first_name . " " . $authuser->last_name;
        return $username;
    }

    function accessToQuestion($userid, $questionid)
    {
        return R::getCell("SELECT questionid FROM usertest WHERE userid = '{$userid}' AND questionid = $questionid LIMIT 1");
    }

    function getRеsult($anser)
    {
        return count(R::getAll("SELECT * FROM anser WHERE id=$anser AND rightanswer = ansnuminques"));
    }

    function updateResult($id, $anser)
    {
        $usertest = R::load('usertest', $id);
        $usertest->status = $this->getRеsult($anser);
        return R::store($usertest);
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