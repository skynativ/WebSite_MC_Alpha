<?php
Router::connect('/admin/support', array('controller' => 'Support', 'action' => 'index', 'plugin' => 'Support', 'admin' => true));
Router::connect('/admin/support/config', array('controller' => 'Support', 'action' => 'config', 'plugin' => 'Support', 'admin' => true));
Router::connect('/support/ajax_clos', array('controller' => 'Support', 'action' => 'ajax_clos', 'plugin' => 'Support', 'admin' => false));
Router::connect('/admin/support/unclosa_adm/*', array('controller' => 'Support', 'action' => 'unclosa_adm', 'plugin' => 'Support', 'admin' => true));
Router::connect('/admin/support/closa_adm/*', array('controller' => 'Support', 'action' => 'closa_adm', 'plugin' => 'Support', 'admin' => true));
Router::connect('/admin/support/ticket/*', array('controller' => 'Support', 'action' => 'ticket', 'plugin' => 'Support', 'admin' => true));
Router::connect('/admin/support/ajax_replya', array('controller' => 'Support', 'action' => 'ajax_replya', 'plugin' => 'Support', 'admin' => true));
Router::connect('/admin/support/ajax_create_categorie', array('controller' => 'Support', 'action' => 'ajax_create_categorie', 'plugin' => 'Support', 'admin' => true));
Router::connect('/admin/support/ajax_edit_categorie', array('controller' => 'Support', 'action' => 'ajax_edit_categorie', 'plugin' => 'Support', 'admin' => true));
Router::connect('/admin/support/ajax_delete_categorie', array('controller' => 'Support', 'action' => 'ajax_delete_categorie', 'plugin' => 'Support', 'admin' => true));
Router::connect('/admin/support/ajax_refrposicategorie', array('controller' => 'Support', 'action' => 'ajax_refrposicategorie', 'plugin' => 'Support', 'admin' => true));
Router::connect('/support', array('controller' => 'Support', 'action' => 'index', 'plugin' => 'Support'));
Router::connect('/support/ajax_create', array('controller' => 'Support', 'action' => 'ajax_create', 'plugin' => 'Support', 'admin' => false));
Router::connect('/support/ticket/ajax_reply', array('controller' => 'Support', 'action' => 'ajax_reply', 'plugin' => 'Support', 'admin' => false));
Router::connect('/support/create', array('controller' => 'Support', 'action' => 'create', 'plugin' => 'Support'));
Router::connect('/admin/support/delete_adm/*', array('controller' => 'Support', 'action' => 'delete_adm', 'plugin' => 'Support', 'admin' => true));
Router::connect('/support/ticket/*', array('controller' => 'Support', 'action' => 'ticket', 'plugin' => 'Support'));
Router::connect('/admin/support/categories', array('controller' => 'Support', 'action' => 'categories', 'plugin' => 'Support', 'admin' => true));
