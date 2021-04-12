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
$create_role_table = [
	"mode" => "NEW",
	"table"	=> "role",
	"primary_key" => "id",
	"up" => [
		"id" => "int(11) unsigned NOT NULL AUTO_INCREMENT",
		"role" => "varchar(200) DEFAULT NULL",
		'date_created' => "datetime DEFAULT NULL"
	],
	"down" => [
		"" => ""
	]
];
