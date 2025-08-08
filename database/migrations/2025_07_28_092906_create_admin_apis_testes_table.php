<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    protected $connection = 'bus';

    private string $table = 'admin_apis_testes';

    /**
     * 执行迁移
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (!Schema::hasTable($this->table)) {
            //创建表
            Schema::create($this->table, function (Blueprint $table) {
            $table->comment('自由世界');
            $table->increments('id');
            $table->string('title')->default('')->comment('接口名称');
            $table->string('path')->default('')->comment('接口路径');
            $table->string('template')->default('')->comment('接口模板');
            $table->smallInteger('enabled')->default(1)->comment('是否启用');
            $table->text('args')->nullable()->comment('接口参数');
            $table->smallInteger('is_login')->default(1)->comment('登录鉴权');
            $table->string('module')->nullable()->comment('模块');
            $table->timestamps();
            $table->softDeletes();
            });
        }
    }

    /**
     * 迁移回滚
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (Schema::hasTable($this->table)) {
            //检查是否存在数据
            $exists = DB::table($this->table)->exists();
            //不存在数据时，删除表
            if (!$exists) {
                //删除 reverse
                Schema::dropIfExists($this->table);
            }
        }
    }
};
