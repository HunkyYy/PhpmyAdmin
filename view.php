<?php
	
	class Vue
	{
		public static function MenuDatabase ($array_database) //Construction Fonction Database
		{
			$menuDB = "<div id='menudatabase'>";

			foreach ($array_database as $Database) 
			{
				$menuDB .= "<a href='?Database=".$Database[0]"'> ".strtoupper($Database[0])." /</a>";
			}
			$menuDB .="</div><br>";
			return $menuDB;
		}	

		public static function MenuTable ($database_nom,$array_table) //Construction Fonction Table
		{
			$menuTable = "<div id='menutable'>
						<p>Nom des Tables :".$database_nom"</p>";

			foreach ($array_table as $Table) 
			{
				$menuTable .= "<li><a href='?Database=".$database_nom."&Table=".$Table[0]."'> ".strtoupper($Table[0])."</a></li>";
			}
			$menuTable .="</div>";
			return $menuTable;
		}	

		public static function MenuDonnee ($table_nom, $array_donnee) 
		{
			$menuDonnee = "<div id='menufield'><p>Table : ".$tb_name."</p>";
			
			foreach ($array_donnee as $Donnee) 
			{
				$menuDonnee .= "<li>".strtoupper($Donnee[0])."</li>";
			}
	      
			$menuDonnee .= "</div>";
	      
			return $menuDonnee;
		}

		public static function HTML ($titre, $contenu)
		{
			"<!DOCTYPE html>
			<html>
			<head>
				<title>".$titre."</title>
			</head>
			<body>
				<img src='https://www.phpmyadmin.net/static/images/logo-og.png'><br><hr><br>
				<div id='contenu'>
					".$contenu."
				</div>
			</body>
			</html>"
		}
	}
?>