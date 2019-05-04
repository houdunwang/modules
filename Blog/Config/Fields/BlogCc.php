<?php return array(
  'title' => 'cc',
  'model' => 'BlogCc',
  'fields' =>
  array(
    0 =>
    array(
      'title' => '标题',
      'name' => 'title',
      'type' => 'string',
      'length' => '100',
      'is_null' => false,
      'form' => 'radio',
      'params' => '1:开启,0:关闭',
      'index_show' => true,
      'allow_edit' => true,
    ),
  ),
  'name' => 'Cc',
  'table' => 'blog_ccs',
);
