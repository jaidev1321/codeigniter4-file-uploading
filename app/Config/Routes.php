<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('file-upload', 'Home::fileUploadForm');
$routes->post('file-upload', 'Home::fileUploadHandler');
