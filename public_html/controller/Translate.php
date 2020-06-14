<?php

class Translate
{
    function get()
    {
        return R::getAll('SELECT * FROM tasktranslate');
    }

    function getWords($lesson_id)
    {
        return R::getAll("SELECT * FROM tasktranslate WHERE lesson_id=$lesson_id");
    }

    function checkAnswer($id, $text_english, $text_russian)
    {
        return R::getAll("SELECT * FROM tasktranslate WHERE id=$id AND text_english='{$text_english}' AND text_russian='{$text_russian}'");
    }


    function create($lesson_id, $text_english, $text_russian)
    {
        $tasktranslate = R::dispense('tasktranslate');
        $tasktranslate->lesson_id = $lesson_id;
        $tasktranslate->text_english = $text_english;
        $tasktranslate->text_russian = $text_russian;
        return R::store($tasktranslate);
    }


    function update($lesson_id, $text_english, $text_russian, $id)
    {
        $tasktranslate = R::load('tasktranslate', $id);
        $tasktranslate->lesson_id = $lesson_id;
        $tasktranslate->text_english = $text_english;
        $tasktranslate->text_russian = $text_russian;
        return R::store($tasktranslate);
    }

}