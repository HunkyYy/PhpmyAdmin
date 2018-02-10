<?php
/**
 * Created by PhpStorm.
 * User: salle08
 * Date: 10/02/2018
 * Time: 09:16
 */

class Pdo_connexion
{
    public $PDO = null;
    public function __construct ($ini_file) {
        if (file_exists($ini_file))	$this->PDO = $this->LoadIni ($ini_file);
    }

    // db connexion vars stored inifile
    private function LoadIni ($file) {
        $ini_array = parse_ini_file($file);
        if ((isset($ini_array['USER_db']) && !empty($ini_array['USER_db']))
            && (isset($ini_array['PASS_db']) && !empty($ini_array['PASS_db']))
            && (isset($ini_array['HOST_db']) && !empty($ini_array['HOST_db'])))
        {
            try {
                $DBSELECTED = (isset($_GET['DB'])) ? ";dbname=".$_GET['DB']: null;
                $dbh = new PDO("mysql:host=".$ini_array['HOST_db'].$DBSELECTED. ";charset=utf8", $ini_array['USER_db'], $ini_array['PASS_db']);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                return $dbh;
            }
            catch (PDOException $e) {
                echo "Connexion à la base de données impossible.<br>";
                die();
            }
        }
    }
}