<?php

Core\Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Core\Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Core\Router::connect('/registerAdd', ['controller' => 'user', 'action' => 'registerAction']);
Core\Router::connect('/login', ['controller' => 'user', 'action' => 'loginAction']);
