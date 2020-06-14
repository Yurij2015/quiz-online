<?php


class Tutor
{
    function get()
    {
        return R::getAll('SELECT * FROM tutor');
    }

    function getTutor($tutor_id)
    {
        $tutor = R::load('tutor', $tutor_id);
        $tutor_name = $tutor->first_name . " " . $tutor->last_name;
        return $tutor_name;
    }
}