<?php

$router = new \Phalcon\Mvc\Router(false);
$router->removeExtraSlashes(true);
$router->setUriSource(\Phalcon\Mvc\Router::URI_SOURCE_SERVER_REQUEST_URI);
$router->setDefaultNamespace('Controllers');

$router->notFound(array('controller' => 'index', 'action' => 'route404'));

$router->add('/{action}', ['controller' => 'index'])->setName('action');
$router->add('/{owner}/{repo}', ['controller' => 'index', 'action' => 'view', 'owner' => 0, 'repo' => 1])->setName('view/item');
$router->add('/{controller:user|oauth}/{action}')->setName('controller/action');
$router->add('/{id}-{title}', ['controller' => 'index', 'action' => 'viewId', 'id' => 0, 'title' => 1])->setName('viewId/item');
$router->add('/category/{name}', ['controller' => 'index', 'action' => 'viewCategory', 'name' => 0])->setName('category');
$router->add('/owner/{owner}', ['controller' => 'index', 'action' => 'viewOwner', 'owner' => 0])->setName('owner');
$router->add('/{owner}/{repo}/{type}.svg', ['controller' => 'index', 'action' => 'badge', 'owner' => 0, 'repo' => 1, 'type' => 2])->setName('badge');

return $router;