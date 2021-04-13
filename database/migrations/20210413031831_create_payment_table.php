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
$create_payment_table = [
	"mode" => "NEW",
	"table"	=> "payment",
	"primary_key" => "id",
	"up" => [
		"id" => "int(11) unsigned NOT NULL AUTO_INCREMENT",
		"user_id" => "int(11) NOT NULL",
		"amount" => "decimal(12,3) DEFAULT NULL",
		'date_created' => "datetime DEFAULT NULL"
	],
	"down" => [
		"" => ""
	]
];
