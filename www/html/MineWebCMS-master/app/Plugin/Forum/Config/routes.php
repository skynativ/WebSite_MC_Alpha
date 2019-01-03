<?php
Router::connect('/forum', ['controller' => 'forum', 'action' => 'index', 'plugin' => 'forum']);

Router::connect('/forum/:slug.:id/', ['controller' => 'forum', 'action' => 'forum', 'plugin' => 'forum'], ['pass' => ['id', 'slug'], 'id' => '[0-9]+']);
Router::connect('/forum/:slug.:id/:page', ['controller' => 'forum', 'action' => 'forum', 'plugin' => 'forum'], ['pass' => ['id', 'slug', 'page'], 'id' => '[0-9]+', 'page' => '[0-9]+']);

Router::connect('/topic/:slug.:id/', ['controller' => 'forum', 'action' => 'topic', 'plugin' => 'forum'], ['pass' => ['id', 'slug'], ['id' => '[0-9]+']]);
Router::connect('/topic/:slug.:id/:page', ['controller' => 'forum', 'action' => 'topic', 'plugin' => 'forum'], ['pass' => ['id', 'slug', 'page'], ['id' => '[0-9]+', 'page' => '[0-9]+']]);

Router::connect('/user/:slug.:id', ['controller' => 'user', 'action' => 'index', 'plugin' => 'forum'], ['pass' => ['id', 'slug'], 'id' => '[0-9]+']);
Router::connect('/user/:slug.:id/edit', ['controller' => 'user', 'action' => 'edit', 'plugin' => 'forum'], ['pass' => ['id', 'slug'], 'id' => '[0-9]+']);

Router::connect('/topic/add/:id', ['controller' => 'forum', 'action' => 'addTopic', 'plugin' => 'forum'], ['pass' => ['id'], 'id' => '[0-9]+']);
Router::connect('/topic/edit/:id', ['controller' => 'forum', 'action' => 'editTopic', 'plugin' => 'forum'], ['pass' => ['id'], 'id' => '[0-9]+']);

Router::connect('/forum/report', ['controller' => 'forum', 'action' => 'report', 'plugin' => 'forum']);
Router::connect('/forum/debug/:hash', ['controller' => 'forum', 'action' => 'debug', 'plugin' => 'forum'], ['pass' => ['hash']]);
Router::connect('/forum/banned', ['controller' => 'forum', 'action' => 'banned', 'plugin' => 'forum']);
Router::connect('/forum/action/:type/:act/:params', ['controller' => 'forum', 'action' => 'forumAction', 'plugin' => 'forum'], ['pass' => ['type', 'act', 'params']]);

Router::connect('/message', ['controller' => 'message', 'action' => 'index', 'plugin' => 'forum']);
Router::connect('/message/new', ['controller' => 'message', 'action' => 'newMessage', 'plugin' => 'forum']);
Router::connect('/message/new/:slug', ['controller' => 'message', 'action' => 'newMessage', 'plugin' => 'forum'], ['pass' => ['slug']]);
Router::connect('/message/delete/:id', ['controller' => 'message', 'action' => 'delete', 'plugin' => 'forum'], ['pass' => ['id'], 'id' => '[0-9]+']);
Router::connect('/message/:slug.:id', ['controller' => 'message', 'action' => 'view', 'plugin' => 'forum'], ['pass' => ['id', 'slug'], 'id' => '[0-9]+']);
Router::connect('/message/:slug.:id/:page', ['controller' => 'message', 'action' => 'view', 'plugin' => 'forum'], ['pass' => ['id', 'slug', 'page'], 'id' => '[0-9]+', 'page' => '[0-9]+']);

Router::connect('/forum/css/custom.css', ['controller' => 'theme', 'action' => 'generate', 'plugin' => 'forum']);

Router::connect('/forum/redirect/:type/:id', ['controller' => 'redirect', 'action' => 'redirectForum', 'plugin' => 'forum'], ['pass' => ['type', 'id'], 'id' => '[0-9]+']);