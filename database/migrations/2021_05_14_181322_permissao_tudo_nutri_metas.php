<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoTudoNutriMetas extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '27',
                'menu' => '1',
                'position' => '2',
                'permission_id' => 25,
                'name' => 'menu.tudo.nutri.metas',
                'icon' => 'briefcase',
                'url' => 'tudonutri/metas',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 27)->delete();

        DB::table('permissions')->where('id', 27)->delete();
    }
}
