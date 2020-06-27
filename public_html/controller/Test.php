<?php

class Test
{
    function get()
    {
        return R::getAll('SELECT * FROM test');
    }

    function getAcitveTests()
    {
        return R::getAll('SELECT * FROM test WHERE status = 1');
    }

    function getOne($id)
    {
        return R::getAll("SELECT * FROM test WHERE id=$id");
    }

    function getParent($id)
    {
        $test = R::load('test', $id);
        $parent = $test->name;
        return $parent;
    }

    function getTestViaDiscipline($disciplinesid)
    {
        return R::getAll("SELECT * FROM test WHERE disciplinesid=$disciplinesid");
    }

    function create($name, $disciplinesid, $status, $parent)
    {
        $test = R::dispense('test');
        $test->name = $name;
        $test->disciplinesid = $disciplinesid;
        $test->status = $status;
        $test->parent = $parent;
        return R::store($test);
    }


    function update($name, $disciplinesid, $status, $id)
    {
        $test = R::load('test', $id);
        $test->name = $name;
        $test->disciplinesid = $disciplinesid;
        $test->status = $status;
        return R::store($test);
    }

}