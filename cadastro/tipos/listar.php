<?php

header('Content-Type: application/json');

print json_encode([
	'type' => 'array',
	'items' => [
		1 => 'Residencial (casas, etc)',
		2 => 'Residencial em Condomínio Vertical (Apartamentos)',
		3 => 'Residencial em Condônio Horizontal',
		4 => 'Terreno',
		5 => 'Comercial'
	]
]);