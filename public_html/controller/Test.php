<?php

class Test
{
    function get()
    {
        return R::getAll('SELECT * FROM lesson');
    }

    function getOne($id)
    {
        return R::getAll("SELECT * FROM lesson WHERE id=$id");
    }

    function getEdMatInCategory($id_subject)
    {
        return R::getAll("SELECT * FROM lesson WHERE subject_id=$id_subject");
    }

    function create($title, $summary, $content, $tutor_id, $subject_id)
    {
        $lesson = R::dispense('lesson');
        $lesson->title = $title;
        $lesson->summary = $summary;
        $lesson->content = $content;
        $lesson->tutor_id = $tutor_id;
        $lesson->subject_id = $subject_id;
        return R::store($lesson);
    }


    function update($title, $summary, $content, $tutor_id, $id_subject, $id)
    {
        $lesson = R::load('lesson', $id);
        $lesson->title = $title;
        $lesson->summary = $summary;
        $lesson->content = $content;
        $lesson->tutor_id = $tutor_id;
        $lesson->id_subject = $id_subject;
        return R::store($lesson);
    }

}