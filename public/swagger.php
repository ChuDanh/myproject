<?php
require_once __DIR__ . '/../vendor/autoload.php';

$swagger = \Swagger\scan(__DIR__ . '/../app');

header('Content-Type: application/json');
echo $swagger;
