<?php

namespace Modules\School\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AdminPermission extends \DagaSmart\BizAdmin\Models\AdminPermission
{
    protected $table = 'school_admin_permissions';

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(AdminMenu::class, 'school_admin_permission_menu', 'permission_id', 'menu_id')
            ->withTimestamps();
    }

    public function operOption2(): array
    {
        return [
            ['label' => '新增', 'value' => 'create'],
            ['label' => '删除', 'value' => 'delete'],
            ['label' => '编辑', 'value' => 'update'],
            ['label' => '查询', 'value' => 'select'],
        ];
    }

}
