<?php
Router::connect('/code', array('controller' => 'Code', 'action' => 'index', 'plugin' => 'CodeCadeau', 'admin' => false));
Router::connect('/code/claim_code', array('controller' => 'Code', 'action' => 'claim_code', 'plugin' => 'CodeCadeau', 'admin' => false));

Router::connect('/admin/code', array('controller' => 'Code', 'action' => 'index', 'plugin' => 'CodeCadeau', 'admin' => true));
Router::connect('/admin/code/add_code', array('controller' => 'Code', 'action' => 'add_code', 'plugin' => 'CodeCadeau', 'admin' => true));
Router::connect('/admin/code/delete_code', array('controller' => 'Code', 'action' => 'delete_code', 'plugin' => 'CodeCadeau', 'admin' => true));