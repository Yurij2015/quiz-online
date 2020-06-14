<?php


class User
{
    function get()
    {
        return R::getAll('SELECT * FROM auth_user');
    }

    function getOne($username)
    {
        return R::getAll("SELECT * FROM auth_user WHERE username='{$username}'");
    }

    function getUser($id)
    {
        return R::getAll("SELECT * FROM auth_user WHERE id='{$id}'");

    }

    function update($username, $first_name, $last_name, $email, $id)
    {
        $user = R::load('auth_user', $id);
        $user->username = $username;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        return R::store($user);
    }

    function updateAdmin($username, $first_name, $last_name, $email, $is_staff, $id)
    {
        $user = R::load('auth_user', $id);
        $user->username = $username;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->is_staff = $is_staff;
        return R::store($user);
    }
}