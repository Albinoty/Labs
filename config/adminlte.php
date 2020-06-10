<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'Labs',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => 'Labs',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Extra Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#66-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand-md',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => false,
    'sidebar_collapse' => true,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => true,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => null,

    'password_reset_url' => null,

    'password_email_url' => null,

    'profile_url' => 'home',

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        [
            'text' => 'Retour site',
            'icon' => 'fas fa-home',
            'route' => 'index'
        ],
        // ADMIN
        [
            'header' => 'User',
            'can' => 'admin'
        ],
        [
            'text' => 'Information profil',
            'icon' => 'far fa-question-circle',
            'route' => 'info.edit'
        ],
        [
            'header' => 'Gestion du site',
            'can' => 'admin'
        ],
        [
            'text' => 'Utilisateur',
            'icon' => 'fas fa-user',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Ajouter un User',
                    'icon' => 'fas fa-plus',
                    'can' => 'admin',
                    'route' => 'users.create'
                ],
                [
                    'text' => 'Afficher les users du site',
                    'icon' => 'fas fa-user',
                    'route' => 'users.index',
                    'can' => 'admin'
                ]
            ]
        ],
        [
            'text' => 'Afficher les articles',
            'icon' => 'fas fa-eye',
            'can' => 'admin',
            'route' => 'articles.index'
        ],
        [
            'text' => 'Validation des articles',
            'icon' => 'fas fa-check',
            'can' => 'admin',
            'route' => 'article.validation'
        ],
        [
            'header' => 'Page Home',
            'can' => 'admin',
        ],
        [
            'text' => 'Contenu Textuel',
            'icon' => 'fas fa-pencil-alt',
            'route' => 'home.edit',
            'can' => 'admin',
            
        ],
        [
            'text' => 'Carousel',
            'icon' => 'far fa-images',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Ajout d\'une image',
                    'icon' => 'fas fa-plus',
                    'route' => 'medias.create',
                    'can' => 'admin'
                ],
                [
                    'text' => 'Voir les images',
                    'icon' => 'far fa-eye',
                    'route' => 'medias.index',
                    'can' => 'admin'
                ]
            ],
        ],
        [
            'text' => 'Testimonials',
            'icon' => 'fas fa-user-tag',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Ajouter un testimonial',
                    'icon' => 'fas fa-plus',
                    'route' => 'testimonials.create',
                    'can' => 'admin'
                ],
                [
                    'text' => 'Voir les testimonials',
                    'icon' => 'far fa-eye',
                    'route' => 'testimonials.index',
                    'can' => 'admin'
                ]
            ]
        ],
        [
            'text' => 'Section Team',
            'icon' => 'fas fa-users',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Ajout un membre de la team',
                    'icon' => 'fas fa-plus',
                    'route' => 'teams.create',
                    'can' => 'admin'
                ],
                [
                    'text' => 'Afficher les membres de la team',
                    'icon' => 'far fa-eye',
                    'route' => 'teams.index',
                    'can' => 'admin'
                ]
            ]
        ],
        [
            'text' => 'Section Contact',
            'icon' => 'fas fa-address-card',
            'route' => 'contact.edit',
            'can' => 'admin',
        ],
        [
            'text' => 'Bouton Browse',
            'icon' => 'fas fa-mouse',
            'route' => 'bouton.index',
            'can' => 'admin'

        ],
        [
            'header' => 'Page Services',
            'can' => 'admin',
        ],
        [
            'text' => 'Services',
            'icon' => 'fas fa-tools',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Ajouter un Service',
                    'icon' => 'fas fa-plus',
                    'can' => 'admin',
                    'route' => 'services.create',
                ],
                [
                    'text' => 'Afficher les Services',
                    'icon' => 'far fa-eye',
                    'can' => 'admin',
                    'route' => 'services.index'
                ]
            ]
        ],
        [
            'text' => 'Projet',
            'icon' => 'fas fa-project-diagram',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Ajouter un projet',
                    'icon' => 'fas fa-plus',
                    'can' => 'admin',
                    'route' => 'projets.create'
                ],
                [
                    'text' => 'Afficher les projets',
                    'icon' => 'far fa-eye',
                    'can' => 'admin',
                    'route' => 'projets.index'
                ]
            ]
        ],
        //article
        [
            'header' => 'Page Blog',
            'can' => 'admin'
        ],
        [
            'text' => 'Articles',
            'icon' => 'fas fa-newspaper',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Ajouter un article',
                    'icon' => 'fas fa-plus',
                    'can' => 'admin',
                    'url' => 'articles/create'
                ],
                [
                    'text' => 'Afficher les articles',
                    'icon' => 'fas fa-eye',
                    'can' => 'admin',
                    'url' => 'articles'
                ],
            ]
        ],
        [
            'text' => 'Categories',
            'icon' => 'fas fa-th',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Ajouter une categorie',
                    'icon' => 'fas fa-plus',
                    'can' => 'admin',
                    'url' => 'categories/create'
                ],
                [
                    'text' => 'Afficher les categories',
                    'icon' => 'fas fa-eye',
                    'can' => 'admin',
                    'url' => 'categories'
                ],
            ]
        ],
        [
            'text' => 'Tags',
            'icon' => 'fas fa-tags',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Ajouter un tag',
                    'icon' => 'fas fa-plus',
                    'can' => 'admin',
                    'url' => 'tags/create'
                ],
                [
                    'text' => 'Afficher les tags',
                    'icon' => 'fas fa-eye',
                    'can' => 'admin',
                    'url' => 'tags'
                ],
            ]
        ],
        
        //Editeur
        [
            'header' => 'Articles',
            'can' => 'editeur',
        ],
        [
            'text' => 'Articles',
            'icon' => 'fas fa-newspaper',
            'can' => 'editeur',
            'submenu' => [
                [
                    'text' => 'Ajouter un article',
                    'icon' => 'fas fa-plus',
                    'can' => 'editeur',
                    'url' => 'articles/create'
                ],
                [
                    'text' => 'Afficher les articles',
                    'icon' => 'fas fa-eye',
                    'can' => 'editeur',
                    'url' => 'articles'
                ],
            ]
        ],
        [
            'text' => 'Categories',
            'icon' => 'fas fa-th',
            'can' => 'editeur',
            'submenu' => [
                [
                    'text' => 'Ajouter une categorie',
                    'icon' => 'fas fa-plus',
                    'can' => 'editeur',
                    'url' => 'categories/create'
                ],
                [
                    'text' => 'Afficher les categories',
                    'icon' => 'fas fa-eye',
                    'can' => 'editeur',
                    'url' => 'categories'
                ],
            ]
        ],
        [
            'text' => 'Tags',
            'icon' => 'fas fa-tags',
            'can' => 'editeur',
            'submenu' => [
                [
                    'text' => 'Ajouter un tag',
                    'icon' => 'fas fa-plus',
                    'can' => 'editeur',
                    'url' => 'tags/create'
                ],
                [
                    'text' => 'Afficher les tags',
                    'icon' => 'fas fa-eye',
                    'can' => 'editeur',
                    'url' => 'tags'
                ],
            ]
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],
];
