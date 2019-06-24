laravel-admin grid-sortable
======

这个插件可以帮助你通过拖动数据列表的行来进行排序，前端基于[jQueryUI sortable](https://jqueryui.com/sortable/), 后端基于[eloquent-sortable](https://github.com/spatie/eloquent-sortable)

## Installation

```shell
composer require laravel-admin-ext/grid-sortable -vvv
```

## Usage

定义模型

```php
<?php

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class MyModel extends Model implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];
}
```

在Grid中使用

```php
$grid = new Grid(new MyModel);

$grid->sortable();
```

这样会给表格增加一列排序列，拖动之后在表格顶部会出现一个Save order的按钮，点击保存排序

## Translation

排序保存按钮默认的文字是`Save order`，如果使用其他语言，比如简体中文，那么可以在`resources/lang/zh-CN.json`文件中增加一项翻译

```json
{
    "Save order": "保存排序"
}
```

其他语言也是按照上面的方式操作。

## Donate

> Help keeping the project development going, by donating a little. Thanks in advance.

[![PayPal Me](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.me/zousong)

![-1](https://cloud.githubusercontent.com/assets/1479100/23287423/45c68202-fa78-11e6-8125-3e365101a313.jpg)

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
