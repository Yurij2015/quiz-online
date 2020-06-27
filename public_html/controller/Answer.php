<?php

class Answer
{
    function get()
    {
        return R::getAll('SELECT * FROM anser');
    }

    function getOne($id)
    {
        return R::getAll("SELECT * FROM anser WHERE id=$id");
    }

    function getAnswer($id)
    {
        $answers = R::load('anser', $id);
        $answer = $answers->anser;
        return $answer;
    }

    function getAnswers($questionid)
    {
        return R::getAll("SELECT * FROM anser WHERE questionid=$questionid");
    }

    function update($anser, $id)
    {
        $ansers = R::load('anser', $id);
        $ansers->anser = $anser;
        return R::store($anser);
    }

    function create($questionid, $anser, $rightanswer, $ansnuminques)
    {
        $ansers = R::dispense('anser');
        $ansers->anser = $anser;
        $ansers->questionid = $questionid;
        $ansers->rightanswer = $rightanswer;
        $ansers->ansnuminques = $ansnuminques;
        $anser = R::store($ansers);
//        return R::store($questions);
        return $anser;
    }


}