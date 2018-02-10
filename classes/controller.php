<?php
/**
 * Created by PhpStorm.
 * User: salle08
 * Date: 10/02/2018
 * Time: 09:17
 */

class controller
{
    /** Attributes **/
    private $model;

    //Database menu
    private $dbMenu;
    //Table menu
    private $dbTable = null;
    //Fields menu
    private $dbFields;
    //Data list
    private $dataList;
    //Fields list
    private $fieldsList;

    public function __construct()
    {
        $this->model = new model(_CONFIG_ . "ID-VARS-Database.ini");

        //Set db menu
        $this->dbMenu = view::MenuDatabase($this->model->List_DB());

        if (!isset($_GET['Table'])) {
            //Set table menu
            $this->dbTable = view::MenuTable($_GET['DB'], $this->model->List_Table());
        }

        //Set fields list
        $this->fieldsList =$this->model->List_Field($_GET['Table']);

        //Set data list
        $this->dataList =$this->model->Data_List($_GET['Table']);

        //Set fields menu
        $this->dbFields = view::MenuDonnee($_GET['Table'], $this->fieldsList, $this->dataList);

        if (isset($_GET['Suppr']))
        {
            $this->model->supprData($_GET['Table'], $_GET['Suppr']);
        }

        //Display
        view::HTML("PDOMyAdmin", $this->dbMenu.$this->dbTable.$this->dbFields);
    }
}