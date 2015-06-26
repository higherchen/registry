<?php
require __DIR__ . '/Registry.php';

use higherchen\registry\Registry;

Registry::set('hello', 'world');
echo Registry::get('hello') . PHP_EOL;

Registry::set('database', ['host' => 'localhost', 'user' => 'root', 'password' => 'root']);
var_dump(Registry::get('database'));

Registry::set('user', (object) ['name' => 'higher', 'age' => '18']);
var_dump(Registry::get('user')->name);
