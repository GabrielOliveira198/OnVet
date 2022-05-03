<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoDuvida extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '7',
                'menu' => '1',
                'position' => '1',
                'permission_id' => null,
                'name' => 'menu.duvida',
                'icon' => 'list',
                'url' => '',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 7)->delete();

        DB::table('permissions')->where('id',7)->delete();
    }
}
