<?php

require_once __DIR__ . '/lib/Psr4AutoloaderClass.php';

$loader = new Psr4AutoloaderClass();
$loader->register();

// Register your namespaces and their base directories
$loader->addNamespace('App', __DIR__ . '/src');
$loader->addNamespace('Support', __DIR__ . '/support');
$loader->addNamespace('Fig', __DIR__ . '/support/Fig');
$loader->addNamespace('Psr', __DIR__ . '/support/Psr');
