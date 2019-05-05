<?php return array(
    'title' => '系统课程',
    'model' => 'EduSystem',
    'fields' =>
    array(
        array(
            'title' => '标题',
            'name' => 'title',
            'type' => 'string',
            'length' => '100',
            'is_null' => false,
            'form' => 'input',
            'params' => '',
            'index_show' => true,
            'allow_edit' => true,
            'placeholder' => '请输入课程标题',
            'required' => true
        ),
        array(
            'title' => '课程编号',
            'name' => 'lessons',
            'type' => 'string',
            'length' => '100',
            'is_null' => false,
            'form' => 'textarea',
            'params' => '',
            'index_show' => true,
            'allow_edit' => true,
            'placeholder' => '请输入课程编号，并且课程必须存在',
            'required' => true
        ),
        array(
            'title' => '预览图片',
            'name' => 'thumb',
            'type' => 'string',
            'length' => '1000',
            'is_null' => false,
            'form' => 'image',
            'params' => '',
            'index_show' => true,
            'allow_edit' => true,
            'placeholder' => '图片尺寸要求为',
            'required' => true
        ),
        array(
            'title' => '课程介绍',
            'name' => 'introduce',
            'type' => 'string',
            'length' => '200',
            'is_null' => false,
            'form' => 'markdown',
            'params' => '',
            'index_show' => true,
            'allow_edit' => true,
            'placeholder' => '请输入标题',
            'required' => true
        )
    ),
    'name' => 'System',
    'table' => 'edu_systems',
);
