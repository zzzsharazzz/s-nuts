<?php

namespace Admin;

return array (
		'controllers' => array (
				'invokables' => array (
						'Admin\Controller\Index' => 'Admin\Controller\IndexController',
						'Admin\Controller\Auth' => 'Admin\Controller\AuthController',
						'Admin\Controller\Category' => 'Admin\Controller\CategoryController'
				) 
		),
		'router' => array (
				'routes' => array (
						'dashboard' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/dashboard',
										'constraints' => array (
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+' 
										),
										'defaults' => array (
												'controller' => 'Admin\Controller\Index',
												'action' => 'index' 
										) 
								) 
						),
						'admin' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/admin[/:action]',
										'constraints' => array (
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+' 
										),
										'defaults' => array (
												'controller' => 'Admin\Controller\Auth',
												'action' => 'login' 
										) 
								),
								'may_terminate' => true 
						),
						'categories' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/manager-category[/:action][/:id]',
										'constraints' => array (
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+' 
										),
										'defaults' => array (
												'controller' => 'Admin\Controller\Category',
												'action' => 'index' 
										) 
								),
								'may_terminate' => true 
						) 
				) 
		),
		'view_manager' => array (
				'template_path_stack' => array (
						'Admin' => __DIR__ . '/../view' 
				) ,
				'strategies' => array(
					'ViewJsonStrategy',
				),
		) 
);
