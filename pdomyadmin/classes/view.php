<?php
/**
 * Created by PhpStorm.
 * User: salle08
 * Date: 10/02/2018
 * Time: 09:44
 */

class view
{

    public static function MenuDatabase ($array_database) //Construction Fonction Database
    {
        $menuDB = "<div id='menudatabase'>";
        foreach ($array_database as $Database)
        {
            $menuDB .= "<a href='?DB=".$Database[0]."'> ".strtoupper($Database[0])." /</a>";
			}
        $menuDB .="</div><br>";
        return $menuDB;
    }
    public static function MenuTable ($database_nom,$array_table) //Construction Fonction Table
    {
        $menuTable = "<div id='menutable'>
						<p>Nom des Tables :".$database_nom."</p>";
			foreach ($array_table as $Table)
            {
                $menuTable .= "<li><a href='?DB=".$database_nom."&Table=".$Table[0]."'> ".strtoupper($Table[0])."</a></li>";
            }
			$menuTable .="</div>";
			return $menuTable;
		}
    public static function MenuDonnee ($table_nom, $array_head, $array_donnee)
    {

        $menuDonnee = "<div id='menufield'><p>Table : ".$table_nom."</p>";

        $Thead = array();

        foreach ($array_head as $Donnee)
        {
            array_push($Thead, $Donnee[0]);
        }

        $menuDonnee = BootstrapGenerator::genTable($array_donnee, "table-bordered", $Thead, true, null, null, null);

        return $menuDonnee;
    }
    public static function HTML ($titre, $contenu)
    {
        echo "<!DOCTYPE html>
			<html>
			<head>".
            BootstrapGenerator::setSources(_TOOLS_ . "bootstrap-3.3.7-dist/", "css/bootstrap.css", "js/jquery-3.3.1.js", "js/bootstrap.js")
				."<title>".$titre."</title>
			</head>
			<body>
				<img src='https://www.phpmyadmin.net/static/images/logo-og.png' style='width: 200px; height: auto'><br><hr><br>
				<div id='contenu'>
					".$contenu."
				</div>
			</body>
			</html>";
		}
}