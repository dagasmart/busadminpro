<?php

namespace Modules\Apis\Models;

class AdminUser extends \DagaSmart\BizAdmin\Models\AdminUser
{
    protected $table = 'apis_admin_users';

    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(AdminRole::class, 'apis_admin_role_users', 'user_id', 'role_id')->withTimestamps();
    }
}
