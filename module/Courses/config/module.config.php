<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Courses\Controller\Index' => 'Courses\Controller\IndexController',
            'Courses\Controller\Coureur' => 'Courses\Controller\CoureurController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'courses' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/courses',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Courses\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'coureur' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/coureur',
                            'defaults' => array(
                                'controller'    => 'Coureur',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'add' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/add',
                            'defaults' => array(
                                'action'     => 'add',
                            ),
                        ),
                    ),
                    'delete' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/delete',
                            'defaults' => array(
                                'action'     => 'delete',
                            ),
                        ),
                    ),
                    
                    
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Courses' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        ),
    ),
);
