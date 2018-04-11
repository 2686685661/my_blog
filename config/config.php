<?php


return [

    'queenNav'=>[
        [
            'name' =>'aritcal',
            'hasSub' =>1,          //存在子导航

            'sub' =>[
                [
                    'name' => 'articallist',
                    'hasSub' =>0,       //不存在子导航
                    'url' => 'http://localhost/laravel/laravel/public/artical/list',
                    'childPage'=>1,     //在页面中存在子页面
                    'urlMap' => [
                        'http://laravel/laravel/public/artical/updateartical',
                    ]
                ],
                [
                    'name' => 'newartical',
                    'hasSub' => 0,
                    'url' => 'http://localhost/laravel/laravel/public/artical/newartical',
                    'childPage'=>0,     //在页面中不存在子页面
                    'urlMap' =>[]
                ]
            ],

        ],


        [
            'name' => 'diary',
            'hasSub' => 1,
            'sub' => [
                [
                    'name' => 'diarylist',
                    'hasSub' => 0,
                    'url' => 'http://localhost/laravel/laravel/public/diary/list',
                    'childPage'=>1,
                    'urlMap' =>[
                        'http://localhost/laravel/laravel/public/diary/updatediary'
                    ]

                ],
                [
                    'name' => 'newdiary',
                    'hasSub' =>0,
                    'url' => 'http://localhost/laravel/laravel/public/diary/newdiary',
                    'childPage'=>0,
                    'urlMap' => []
                ],
            ]
        ],

        [
            'name' => 'message',
            'hasSub' => 1,
            'sub' => [
                [
                    'name' => 'messagelist',
                    'hasSub' => 0,
                    'url' => 'http://localhost/laravel/laravel/public/message/messagelist',
                    'childPage'=>1,
                    'urlMap' => [
                        'http://localhost/laravel/laravel/public/message/newemail',
                        'http://localhost/laravel/laravel/public/message/reply'

                    ]

                ],
                [
                    'name' => 'artimentlist',
                    'hasSub' => 0,
                    'url' => 'http://localhost/laravel/laravel/public/artiment/artimentlist',
                    'childPage'=>0,
                    'urlMap' => []
                ],
                [
                    'name' => 'adoptlist',
                    'hasSub' =>0,
                    'url' => 'http://localhost/laravel/laravel/public/message/adoptlist',
                    'childPage'=>0,
                    'urlMap' => []
                ]

            ]
        ],

        [
            'name' => 'file',
            'hasSub' => 1,
            'sub' => [
                [
                    'name' => 'picturelist',
                    'hasSub' =>0,
                    'url' => 'http://localhost/laravel/laravel/public/files/picturelist',
                    'childPage'=>0,
                    'urlMap' => []

                ],
                [
                    'name' => 'doclist',
                    'hasSub' => 0,
                    'url' => 'http://localhost/laravel/laravel/public/files/doclist',
                    'childPage'=>0,
                    'urlMap' => []

                ],
                [
                    'name' => 'videolist',
                    'hasSub' => 0,
                    'url' => 'http://localhost/laravel/laravel/public/files/videolist',
                    'childPage'=>0,
                    'urlMap' => []
                ]
            ]
        ],

        [
            'name' => 'recovery',
            'hasSub' => 1,
            'sub' => [
                [
                    'name' =>'artylist',
                    'hasSub' =>0,
                    'url' => 'http://localhost/laravel/laravel/public/recovery/artylist',
                    'childPage'=>0,
                    'urlMap' => []
                ],
                [
                    'name' => 'dialist',
                    'hasSub' => 0,
                    'url' => 'http://localhost/laravel/laravel/public/recovery/dialist',
                    'childPage'=>0,
                    'urlMap' => []
                ],
                [
                    'name' => 'meagelist',
                    'hasSub' => 0,
                    'url' => 'http://localhost/laravel/laravel/public/recovery/meagelist',
                    'childPage'=>0,
                    'urlMap' => []

                ],
                [
                    'name' => 'fileslist',
                    'hasSub' => 0,
                    'url' => 'http://localhost/laravel/laravel/public/recovery/fileslist',
                    'childPage'=>0,
                    'urlMap' => []
                ]
            ]
        ],
    ],

];
