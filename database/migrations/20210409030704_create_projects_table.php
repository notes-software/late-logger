<?php

/**
 * MIGRATION DOCUMENTATION
 * https://sprnva.000webhostapp.com/docs/migration
 *
 * Always remember:
 * "up" is for run migration
 * "down" is for the rollback, reverse the migration
 * 
 */
$create_projects_table = [
	"mode" => "NEW",
	"table"	=> "projects",
	"primary_key" => "id",
	"up" => [
		"id" => "INT(11) NOT NULL AUTO_INCREMENT",
		"project_code" => "VARCHAR(13) NOT NULL",
		"project_name" => "VARCHAR(100) NOT NULL",
		"description" => "TEXT NULL",
		"date_added" => "DATETIME DEFAULT NULL",
		"user_id" => "INT(11) NOT NULL"
	],
	"down" => [
		"" => ""
	]
];
