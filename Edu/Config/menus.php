<?php return [
    'member_pc' => [
        [
            'title' => '会员时长',
            'url' => module_link('edu.member.duration.index'),
            'permission' => '',
        ],
    ],
    'user_pc' => [
        [
            'title' => 'TA 的学习',
            'url' => module_link('edu.front.user.lesson'),
            'permission' => '',
        ],
        [
            'title' => 'TA 的动态',
            'url' => module_link('edu.front.user.activity'),
            'permission' => '',
        ],
        [
            'title' => 'TA 的贴子',
            'url' => module_link('edu.front.user.topic'),
            'permission' => '',
        ],
        [
            'title' => 'TA 的收藏',
            'url' => module_link('edu.front.user.favorite.lesson'),
            'permission' => '',
        ]
    ],
];