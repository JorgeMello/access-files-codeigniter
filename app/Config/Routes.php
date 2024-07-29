<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/uploadEnvio', 'ArquivoUpload::index');
$routes->get('/ArquivoUpload', 'ArquivoUpload::index');
$routes->get('/ArquivoUpload/criar', 'ArquivoUpload::criar');
$routes->post('/ArquivoUpload/editar', 'ArquivoUpload::editar');
$routes->post('/ArquivoUpload/atualizar', 'ArquivoUpload::atualizar');
$routes->post('ArquivoUpload/excluir', 'ArquivoUpload::excluir');
$routes->post('/ArquivoUpload/upload', 'ArquivoUpload::upload');
