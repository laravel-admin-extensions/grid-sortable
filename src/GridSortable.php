<?php

namespace Encore\Admin\GridSortable;

use Encore\Admin\Extension;
use Encore\Admin\Grid;
use Encore\Admin\Grid\Tools\ColumnSelector;
use Spatie\EloquentSortable\Sortable;

class GridSortable extends Extension
{
    public $name = 'grid-sortable';

    public $assets = __DIR__.'/../resources/assets';

    protected $column = '__sortable__';

    public function install()
    {
        ColumnSelector::ignore($column = $this->column);

        Grid::macro('sortable', function () use ($column) {

            $this->tools(function (Grid\Tools $tools) {
                $tools->append(new SaveOrderBtn());
            });

            $sortName = $this->model()->getSortName();

            if (!request()->has($sortName)
                && $this->model()->eloquent() instanceof Sortable
            ) {
                $this->model()->ordered();
            }

            $this->column($column, ' ')
                ->displayUsing(SortableDisplay::class);
        });
    }
}