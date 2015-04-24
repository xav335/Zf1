<?php
use Courses\Controller\CourseController;

return array(
    'controllers' => array(
        'invokables' => array(
            'Courses\Controller\Index' => 'Courses\Controller\IndexController',
            'Courses\Controller\Coureur' => 'Courses\Controller\CoureurController',
        ),
        'factories' => array(
            'Courses\Controller\Course' => function($sm){
                $parentLocator = $sm->getServiceLocator();
                $serv = $parentLocator->get('EventService');
                $ctrl = new CourseController($serv);
                return $ctrl;
            }
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Courses\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'verb' => 'get',
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
//                     'default' => array(
//                         'type'    => 'Segment',
//                         'options' => array(
//                             'route'    => '/[:controller[/:action]]',
//                             'constraints' => array(
//                                 'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                                 'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
//                             ),
//                             'defaults' => array(
//                             ),
//                         ),
//                     ),
                        'coureur' => array(
                            'type' => 'Literal',
                            'options' => array(
                                'route' => 'coureur',
                                'defaults' => array(
                                    'controller' => 'Coureur',
                                    'action' => 'index',
                                ),
                            ),
                        ),
                        'courses' => array(
                            'type' => 'Segment',
                            'options' => array(
                                'route' => 'courses[/]',
                                'defaults' => array(
                                    'controller' => 'Course',
                                    'action' => 'list',
                                ), 
                            ),
                            'may_terminate' => true,
                            'child_routes' => array(
                                'ajouter' => array(
                                    'type' => 'Literal',
                                    'options' => array(
                                        'route' => 'ajouter',
                                        'defaults' => array(
                                            'action' => 'add',
                                        ),
                                    ),
                                ),
                                'chercher' => array(
                                    'type' => 'Literal',
                                    'options' => array(
                                        'route' => 'chercher',
                                        'defaults' => array(
                                            'action' => 'search',
                                        ),
                                    ),
                                ),
                                'supprimer' => array(
                                    'type' => 'Segment',
                                    'options' => array(
                                        'route' => 'supprimer/:id',
                                        'constraints' => array(
                                            'id' => '[0-9]+',
                                        ),
                                        'defaults' => array(
                                            'action' => 'delete',
                                        ),
                                    ),
                                ),
                                'voir' => array(
                                    'type' => 'Segment',
                                    'options' => array(
                                        'route' => 'voir[/:aJeter]/:id',
                                        'constraints' => array(
                                            'id' => '[0-9]+',
                                            'aJeter' => '[a-zA-Z][a-zA-Z0-9-]+',
                                        ),
                                        'defaults' => array(
                                            'action' => 'see',
                                        ),
                                    ),
                                ),
                                'modifier' => array(
                                    'type' => 'Segment',
                                    'options' => array(
                                        'route' => 'modifier/:id',
                                        'constraints' => array(
                                            'id' => '[0-9]+',
                                        ),
                                        'defaults' => array(
                                            'action' => 'edit',
                                        ),
                                    ),
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
            'layout/layoutFront'           => __DIR__ . '/../view/layout/layout.phtml',
            
        ),
        
    ),
    'view_helpers' => array(
        'invokables' => array(
            'uppercase' => 'Courses\View\Helper\UpperCase',
            'bootstrapformrow' => 'Courses\View\Helper\BootstrapFormRow',
        ),
    ),
    
    
);
