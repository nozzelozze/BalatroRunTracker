<?php

abstract class Service
{
    /*
    A service should be seperate from $_GET variables and such so they can be used in any context.
    They are only for making queries to the database.

    Utilizes CRUD principles
    */

    public abstract static function create($data = null);
    public abstract static function read($data = null);
    public abstract static function delete($data = null);
}

?>