<?php return [
    'member_pc' => [
        [
            'title' => '会员时长',
            'url' => route('edu.member.duration.index'),
            'permission' => '',
        ],
        [
            'title' => '学习记录',
            'url' => route('edu.front.user.lesson'),
            'permission' => '',
        ],
        [
            'title' => '我的贴子',
            'url' => route('edu.front.user.topic'),
            'permission' => '',
        ],
        [
            'title' => '我的收藏',
            'url' => route('edu.front.user.favorite.lesson'),
            'permission' => '',
        ]
    ],
    'user_pc' => [
        [
            'title' => 'TA 的学习',
            'url' => route('edu.front.user.lesson'),
            'permission' => '',
        ],
        [
            'title' => 'TA 的动态',
            'url' => route('edu.front.user.activity'),
            'permission' => '',
        ],
        [
            'title' => 'TA 的贴子',
            'url' => route('edu.front.user.topic'),
            'permission' => '',
        ],
        [
            'title' => 'TA 的收藏',
            'url' => route('edu.front.user.favorite.lesson'),
            'permission' => '',
        ]
    ],
];