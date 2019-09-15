<?php

class connection
{

    public static function connect()
    {

        $link = null;

        try {
            //Create connection DB
            $link = new PDO('mysql:host=localhost;dbname=apocryph_zip_dev_contacts_dir',
                'apocryph_admin', 'S1st3m2s', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );

        } catch (PDOException $exception) {
            return "Connection error: " . $exception->getMessage();
        }

        return $link;

    }

}

