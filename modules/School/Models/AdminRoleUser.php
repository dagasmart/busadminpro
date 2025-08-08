<?php

namespace Modules\School\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;


class AdminRoleUser extends \DagaSmart\BizAdmin\Models\AdminRoleUser
{

    protected $table = 'school_admin_role_users';

    protected $hidden = ['mer_id', 'created_at', 'updated_at']; // 隐藏这些字段

    protected $visible = []; // 只显示这些字段

    public function children(): HasMany
    {
        return $this->hasMany(AdminUser::class, 'id', 'user_id')
            ->select('id','name')
            ->addSelect($this->query()->raw('name AS label'))
            ->addSelect($this->query()->raw('id AS value'));
    }

}
