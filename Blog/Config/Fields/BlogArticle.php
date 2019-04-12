<?php return [
    'model' => 'BlogArticle',
    'title' => '内容',
    'fields' =>
        [
            [
                'title' => '标题',
                'name' => 'title',
                'type' => 'string',
                'length' => '100',
                'is_null' => false,
                'form' => 'input',
                'index_show' => false,
                'allow_edit' => true,
            ],
            [
                'title' => '内容',
                'name' => 'content',
                'type' => 'text',
                'length' => null,
                'is_null' => false,
                'form' => 'ueditor',
                'index_show' => true,
                'allow_edit' => true,
            ],
        ],
    'name' => 'Article',
    'table' => 'blog_articles',
];