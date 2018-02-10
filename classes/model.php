<?php
/**
 * Created by PhpStorm.
 * User: salle08
 * Date: 10/02/2018
 * Time: 09:19
 */

class model extends Pdo_connexion
{
    public function __construct($ini_file)
    {
        parent::__construct($ini_file);
    }

    // db list
    public function List_DB () {
        $SQL = "show databases";
        $RES = $this->PDO->prepare($SQL);
        $RES->execute();
        return $RES->fetchAll();
    }

    // table list
    public function List_Table () {
        $SQL = "show tables";
        $RES = $this->PDO->prepare($SQL);
        $RES->execute();
        return $RES->fetchAll();
    }
    // field list
    public function List_Field ($table) {
        $SQL = "show columns from ".$table;
        $RES = $this->PDO->prepare($SQL);
        $RES->execute();
        return $RES->fetchAll();
    }

    // data list
    public function Data_List($table)
    {
        $SQL = "SELECT * FROM ".$table;
        $RES = $this->PDO->prepare($SQL);
        $RES->execute();
        return $RES->fetchAll(PDO::FETCH_ASSOC);
    }

    //Suppr data
    public function supprData($table, $line)
    {
        $SQL = "DELETE FROM " . $table . " LIMIT 1 OFFSET " . $line;
        echo $SQL;
        $RES = $this->PDO->prepare($SQL);
        $RES->execute();
    }
}