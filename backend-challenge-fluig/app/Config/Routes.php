<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/createAlbum', 'AlbumsController::createAlbum');
$routes->post('/buscarAlbums', 'AlbumsController::buscarAlbums');