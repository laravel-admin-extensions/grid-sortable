laravel-admin grid-sortable
======

This extension can help you sort by dragging the rows of the data list, the front end is based on [jQueryUI sortable](https://jqueryui.com/sortable/), and the back end is based on [eloquent-sortable](https://github.com/spatie/eloquent-sortable)

这个插件可以帮助你通过拖动数据列表的行来进行排序，前端基于[jQueryUI sortable](https://jqueryui.com/sortable/), 后端基于[eloquent-sortable](https://github.com/spatie/eloquent-sortable)

![Kapture 2019-06-25 at 10 14 51](https://user-images.githubusercontent.com/1479100/60064224-50b97080-9732-11e9-8023-431fc6fe81a5.gif)

## Installation

```shell
composer require laravel-admin-ext/grid-sortable -vvv
```

Publish asserts

```shell
php artisan vendor:publish --provider="Encore\Admin\GridSortable\GridSortableServiceProvider"
```

## Usage

Define your model

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

Use in grid

```php
$grid = new Grid(new MyModel);

$grid->sortable();
```

This will add a column to the grid. After dragging one row, a `Save order` button will appear at the top of the grid. Click  to save order.

## Translation

The default text for the button is `Save order`. If you use an other language, such as Simplified Chinese, you can add a translation to the `resources/lang/zh-CN.json` file.

```json
{
    "Save order": "保存排序"
}
```

## Donate

> Help keeping the project development going, by donating a little. Thanks in advance.

[![PayPal Me](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.me/zousong)

![-1](https://cloud.githubusercontent.com/assets/1479100/23287423/45c68202-fa78-11e6-8125-3e365101a313.jpg)

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
