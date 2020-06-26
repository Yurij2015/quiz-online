<?php


class Discipline
{
    function get()
    {
        return R::getAll('SELECT * FROM disciplines');
    }

    function getOne($id)
    {
        return R::getAll("SELECT * FROM disciplines WHERE id=$id");
    }

    function getDiscipline($subject_id)
    {
        $subject= R::load('disciplines', $subject_id);
        $subject_name = $subject->name;
        return $subject_name;
    }

    function update($name, $description, $id)
    {
        $disciplines = R::load('disciplines', $id);
        $disciplines->name = $name;
        $disciplines->description = $description;
        return R::store($disciplines);
    }

    function create($name, $description)
    {
        $disciplines = R::dispense('disciplines');
        $disciplines->name = $name;
        $disciplines->description = $description;
        return R::store($disciplines);
    }
}