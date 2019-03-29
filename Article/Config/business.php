<?php return [
    '内容管理' => [
        [
            'title' => '模型管理',
            'url' => module_link('article.admin.model.index'),
            'permission' => 'user-manage',
        ],
        [
            'title' => '栏目管理',
            'url' => '/',
            'permission' => 'user-manage',
        ],
        [
            'title' => '文章管理',
            'url' => '/',
            'permission' => 'user-manage',
        ],
    ],
    '扩展功能' => [
        [
            'title' => '友情链接',
            'url' => '/',
            'permission' => 'user-manage',
        ],
    ],
];