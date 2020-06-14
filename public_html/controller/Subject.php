<?php


class Subject
{
    function get()
    {
        return R::getAll('SELECT * FROM subject');
    }

    function getOne($id)
    {
        return R::getAll("SELECT * FROM subject WHERE id=$id");
    }

    function getCategory($subject_id)
    {
        $subject= R::load('subject', $subject_id);
        $subject_name = $subject->name;
        return $subject_name;
    }

    function update($name, $id)
    {
        $subject= R::load('subject', $id);
        $subject->name = $name;
        return R::store($subject);
    }

    function create($name)
    {
        $subject = R::dispense('subject');
        $subject->name = $name;
        return R::store($subject);
    }
}