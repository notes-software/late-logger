<?php

return [
	'database' => [
		'name' => 'late-logger',
		'username' => 'root',
		'password' => '',
		'connection' => '127.0.0.1',
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
		]
	],

	'app' => [
		'base_url' => 'late-logger',
		'name' => 'Late-logger',

		// choices to encode: windows, macOS, linux
		'OS' => 'macOS',
	]
];