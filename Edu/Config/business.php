<?php return [
    '业务管理' =>
        [
            [
                'title' => '标签管理',
                'url' => module_link('edu.admin.tag.index'),
                'permission' => 'tag-manage',
            ],
            [
                'title' => '课程管理',
                'url' => module_link('edu.admin.lesson.index'),
                'permission' => 'lesson-manage',
            ],
            [
                'title' => '订阅设置',
                'url' => module_link('edu.admin.subscribe.index'),
                'permission' => 'lesson-manage',
            ],
            [
                'title' => '广告推荐',
                'url' => module_link('edu.admin.ad.index'),
                'permission' => 'ad-manage',
            ],
        ],
];