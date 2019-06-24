<?php

namespace Encore\Admin\GridSortable;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Tools\AbstractTool;

class SaveOrderBtn extends AbstractTool
{
    protected function script()
    {
        $route = route('laravel-admin-grid-sortable');

        $class = get_class($this->getGrid()->model()->getOriginalModel());

        $class = str_replace('\\', '\\\\', $class);

        $script = <<<SCRIPT
(function () {
    
    $('.grid-save-order-btn').click(function () {

        $.post('{$route}', {
            _token: $.admin.token,
            _model: '{$class}',
            _sort: $(this).data('sort'),
        },
        function(data){
        
            if (data.status) {
                $.admin.toastr.success(data.message, '', {positionClass:"toast-top-center"});
                $.admin.reload();
            } else {
                $.admin.toastr.error(data.message, '', {positionClass:"toast-top-center"});
            }
        });
    });
    
})();
SCRIPT;
        Admin::script($script);
    }

    public function render()
    {
        $this->script();

        $text = __('Save order');

        return <<<HTML
<button type="button" class="btn btn-sm btn-info grid-save-order-btn" style="margin-left: 10px;display: none;">
    <i class="fa fa-save"></i><span class="hidden-xs">&nbsp;&nbsp;{$text}</span>
</button>
HTML;
    }
}