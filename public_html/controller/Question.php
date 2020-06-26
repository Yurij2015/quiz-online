<?php

class Question
{
    function get()
    {
        return R::getAll('SELECT * FROM question');
    }

    function getOne($id)
    {
        return R::getAll("SELECT * FROM question WHERE id=$id");
    }

    function getQuestion($id)
    {
        $questions = R::load('question', $id);
        $question = $questions->question;
        return $question;
    }

    function update($question, $id)
    {
        $questions = R::load('question', $id);
        $questions->question = $question;
        return R::store($question);
    }

    function create($question, $testid)
    {
        $questions = R::dispense('question');
        $questions->question = $question;
        $questions->testid = $testid;
        $questionid = R::store($questions);
//        return R::store($questions);
        return $questionid;
    }


}