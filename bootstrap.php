<?php
Autoloader::add_core_namespace('Jpaddress');

Autoloader::add_classes(array(
	'Jpaddress\\Jpaddress'   => __DIR__.'/classes/jpaddress.php',
	'Jpaddress\\Ken'   => __DIR__.'/classes/ken.php',
	'Jpaddress\\Jusho' => __DIR__.'/classes/Jusho.php',
));
