<?php

namespace Encore\Admin\GridSortable;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class SortableDisplay extends AbstractDisplayer
{
    protected function script()
    {
        $id = $this->getGrid()->tableID;

        $script = <<<SCRIPT
        
(function () {
    $("#{$id} tbody").sortable({
        placeholder: "sort-highlight",
        handle: ".grid-sortable-handle",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).on("sortupdate", function(event, ui) {
    
        var sorts = [];
        $(this).find('.grid-sortable-handle').each(function () {
            sorts.push($(this).data());
        });
        
        var \$btn = $('#{$id}').closest('.box').find('.grid-save-order-btn');
        \$btn.data('sort', sorts).show();
    });
})();
SCRIPT;

        Admin::script($script);
    }

    protected function getRowSort()
    {
        $column = data_get($this->row->sortable, 'order_column_name', 'order_column');

        return $this->row->{$column};
    }

    public function display()
    {
        $this->script();

        $key = $this->getKey();
        $sort = $this->getRowSort();

        return <<<HTML
<a class="grid-sortable-handle" style="cursor: move;" data-key="{$key}" data-sort="{$sort}">
    <i class="fa fa-ellipsis-v"></i>
    <i class="fa fa-ellipsis-v"></i>
  </a>
HTML;
    }
}