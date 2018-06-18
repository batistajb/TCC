<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => '',

    'title_prefix' => 'SGA - ',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>S</b>istema de <b>G</b>estão de <b>A</b>lunos</b>',

    'logo_mini' => '<b>SGA</b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => true,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'admin/dashboard',

    'logout_url' => 'admin/logout',

    'logout_method' => 'POST',

    'login_url' => 'admin/login',

    'register_url' => 'admin/register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'MENU',
        [
            'text'        => 'Dashboard',
            'url'         => 'admin/dashboard',
            'icon'        => 'dashboard',
        ],
        'PRINCIPAL',
        [
            'text'        => 'Matrícula',
            'icon'        => 'fas ion-compose',
            'submenu'     =>[
	            [
		            'text'      =>'Matrícula',
		            'url'         => 'admin/enroll',
		            'icon'        => 'check-square-o',
	            ],
	            [
		            'text'      =>'Rematrícula',
		            'url'         => 'admin/renew',
		            'icon'        => 'copy',
	            ],
	            [
		            'text'      =>'Lista de espera',
		            'url'         => 'admin/enrolment',
		            'icon'        => 'list',
	            ],
	       ]
        ],
        [
            'text'        => 'Enturmação',
            'icon'        => 'fas ion-ios-people',
            'submenu'     =>[
	            [
		            'text'      =>'Enturmação',
		            'url'         => 'admin/enturm',
		            'icon'        => 'fas ion-ios-people',
	            ],
	            [
		            'text'      =>'Listagem',
		            'url'         => 'admin/enturm/show',
		            'icon'        => 'fas ion-clipboard',
	            ],
            ],
        ],
        [
            'text'        => 'Documentos',
            'icon'        => 'archive',
            'submenu'     =>[
            	[
            		'text'      =>'Histórico',
		            'url'       => 'admin/history/create',
		            'icon'      =>'history'
	            ],
            	[
            		'text'      =>'Boletim',
		            'url'       => 'admin/bulletin',
		            'icon'      =>'file'
	            ],
            	[
            		'text'      =>'Arquivo morto',
		            'url'       => 'admin/history/old',
		            'icon'      =>'folder-open'
	            ]
            ],
        ],
        [
            'text'        => 'Diários',
            'url'         => 'admin/dailies',
            'icon'        => 'book',
        ],
	    [
	    'text'        => 'Cadastrar',
	    'icon'        => 'fas ion-clipboard',
	    'submenu'     =>[
		    [
			    'text'        => 'Alunos',
			    'url'         => 'admin/students',
			    'icon'        => 'fas ion-university',
		    ],
		    [
			    'text'        => 'Professores',
			    'url'         => 'admin/teacher',
			    'icon'        => 'fas ion-person-add',
		    ],
		    [
			    'text'        => 'Grade',
			    'url'         => 'admin/degree',
			    'icon'        => 'fas ion-grid',
		    ],
		    [
			    'text'        => 'Turmas',
			    'url'         => 'admin/team',
			    'icon'        => 'fas ion-erlenmeyer-flask',
		    ],
		    [
			    'text'        => 'Disciplinas',
			    'url'         => 'admin/subjects',
			    'icon'        => 'fas ion-folder',
		    ],
		    [
			    'text'        => 'Usuários',
			    'url'         => 'admin/users',
			    'icon'        => 'fas ion-person-stalker',
		    ],
	    ]
	    ],
        [
        	'text'=>'Conta',
	        'icon' => 'user',
	        'submenu'=>[
		        [
			        'text' => 'Perfil',
			        'url'  => 'admin/myProfile',
			        'icon' => 'user',
		        ],
	        ]
        ],

        /*[
            'text'    => 'Multilevel',
            'icon'    => 'share',
            'submenu' => [
                [
                    'text' => 'Level One',
                    'url'  => '#',
                ],
                [
                    'text'    => 'Level One',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Level Two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'Level Two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'Level Three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'Level Three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'Level One',
                    'url'  => '#',
                ],
            ],
        ],
        'LABELS',
        [
            'text'       => 'Important',
            'icon_color' => 'red',
            'label'       => 4,
            'label_color' => 'success',
        ],
        [
            'text'       => 'Warning',
            'icon_color' => 'yellow',
        ],
        [
            'text'       => 'Information',
            'icon_color' => 'aqua',
        ],*/
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
