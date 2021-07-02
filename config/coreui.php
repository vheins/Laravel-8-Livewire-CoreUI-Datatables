<?php
return [

    /*
     * Application title to display in <title> tag
     */
    'title' => env('APP_NAME','Digitama Enterprise System'),

    /*
     * Text to put in the top-left of the menu bar. logo_mini is shown when the navbar is collapsed.
     * NOTE: This is a non-escaped string, so you can put HTML in here
     */
    'logo' => env('APP_LOGO','Digitama Enterprise System'),

    /*
     * Menu builder
     */
    //'menu' => $menu::with('submenu')->whereNull('parent_id')->get()->toArray(),
    //array_remove_empty(Menu::with('submenu')->whereNull('parent_id')->get()->toArray())
    /*
    'menu' => [
        [
            'text' => 'Dashboard',          // The text to be displayed inside the menu.
            'url' => 'dashboard',     // The URL behind the text. Mutually exclusive with "route" option.
            'icon' => 'th',      // Name of FontAwesome icon to display. Note that you have to use the "far", "fas" or "fal" modifier behind the icon.
            'fa-family' => 'fas'
        ],
        'System Administrator',
        [
            'text' => 'Corporate Group',
            'icon' => 'city',
            'fa-family' => 'fas',
            'submenu' => [
                [
                    'text' => 'Company',
                    'icon' => 'building',
                    'fa-family' => 'fas',
                ],
                [
                    'text' => 'Principles',
                    'icon' => 'industry',
                    'fa-family' => 'fas',
                ],
                [
                    'text' => 'Warehouses',
                    'icon' => 'warehouse',
                    'fa-family' => 'fas',
                    'asdasd' => 'asdasd'
                ],
                [
                    'text' => 'Store',
                    'icon' => 'store-alt',
                    'fa-family' => 'fas',
                ],
            ],
        ],
        [
            'can'       => 'access-index',
            'text'      => 'Access',
            'icon'      => 'users',
            'fa-family' => 'fas',
            'submenu'   => [
                [
                    'can'       => 'user-index',
                    'text'      => 'Users',
                    'route'     => 'backoff.user',
                    'icon'      => 'user-edit',
                    'fa-family' => 'fas',
                ],
                [
                    'can'       => 'role-index',
                    'text'      => 'Roles',
                    'route'     => 'backoff.role',
                    'icon'      => 'user-shield',
                    'fa-family' => 'fas',
                ],
                [
                    'can'       => 'permission-index',
                    'text'      => 'Permissions',
                    'icon'      => 'user-lock',
                    'route'     => 'backoff.permission',
                    'fa-family' => 'fas',
                ],
            ],
        ],
//
//            'badge' => [                    // Optional. Displays a badge behind the text of the menu item.
//                'text' => 'New!',           // Text to display in badge.
//                'context' => 'danger',      // Coloring of the badge, uses CoreUI/Bootstrap context: primary, danger, warning, etc. Default is 'primary'.
//                'pill' => true              // Whether badge should have rounded corners. Defaults to false;
//            ]

//        'First section',                    // Section header
//        [
//            'text' => 'Users',
//            'route' => 'admin.users',       // The route behind the text. Mutually exclusive with "url" option.
//            'icon' => 'users',
//            'fa-family' => 'fas'            // Change the FontAwesome family: fas, far, fab, etc. Default is 'fas'
//        ],
//        'Admin only',
//        [
//            'can' => 'edit-settings',       // Use Laravel's Gate functionality via the 'can' keyword to show menu items according to your Gate. Note that you need to uncomment the GateFilter in the Filters array below!
//            'text' => 'Settings',
//            'icon' => 'cog',
//            'submenu' => [
//                [
//                    'text' => 'Level one',
//                    'icon' => 'bell',       // Tip: always set icons. It's more accessible and user friendly.
//                    'url' => 'admin/settings/level-one'
//                ],
//                [
//                    'text' => 'Level two',
//                    'icon' => 'clock',
//                    'submenu' => [
//                        [
//                            'text' => 'Add as many as you like',
//                            'url' => '#'
//                        ]
//                    ]
//                ]
//            ]
//        ]
    ],

    /**
     * Filters that parse above menu configuration and add some sparkling things, like .active classes on active
     * menu items and parsing routes and URLs into the correct href attributes.
     */
    'filters' => [
        HzHboIct\LaravelCoreUI\Menu\Filters\HrefFilter::class,
        HzHboIct\LaravelCoreUI\Menu\Filters\ActiveFilter::class,
        HzHboIct\LaravelCoreUI\Menu\Filters\SubmenuFilter::class,
        HzHboIct\LaravelCoreUI\Menu\Filters\ClassesFilter::class,
        // Uncomment below filter if you want to use the 'can' functionality of the menu builder.
        HzHboIct\LaravelCoreUI\Menu\Filters\GateFilter::class,
    ],
];
