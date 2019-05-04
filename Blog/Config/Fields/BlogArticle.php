<?php return array(
  'title' => '文章',
  'model' => 'BlogArticle',
  'fields' =>
  array(
    0 =>
    array(
      'title' => '标题',
      'name' => 'title',
      'type' => 'string',
      'length' => '100',
      'is_null' => false,
      'form' => 'markdown',
      'index_show' => true,
      'allow_edit' => true,
      'params' => '1:开启,0:关闭',
    ),
    1 =>
    array(
      'title' => '内容',
      'name' => 'content',
      'type' => 'string',
      'length' => '1000',
      'is_null' => false,
      'form' => 'checkbox',
      'index_show' => true,
      'allow_edit' => true,
      'params' => function () {
        return [
          [
            'title' => '开启',
            'value' => 1
          ], [
            'title' => '关闭',
            'value' => 0
          ],
        ];
      }
    ),
    2 =>
    array(
      'title' => '缩略图',
      'name' => 'thumb',
      'type' => 'string',
      'length' => '1000',
      'is_null' => true,
      'form' => 'image',
      'index_show' => true,
      'allow_edit' => true,
      'params' => '',
    ),
  ),
  'name' => 'Article',
  'table' => 'blog_articles',
);
