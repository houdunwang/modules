<?php return array(
    'title' => '系统课程',
    'model' => 'EduSystem',
    'fields' =>
    array(
        0 =>
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
            'placeholder' => '请输入标题',
            'required' => true
        ),
        1 =>
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
        ),
        2 =>
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
            'placeholder' => '请输入包含的课程编号',
            'required' => true
        ),
        3 =>
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
            'placeholder' => '请输入标题',
            'required' => true
        ),
    ),
    'name' => 'System',
    'table' => 'edu_systems',
);
