<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoTudoNutri extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '25',
                'menu' => '1',
                'position' => '1',
                'permission_id' => null,
                'name' => 'menu.tudo.nutri',
                'icon' => 'list',
                'url' => '',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 25)->delete();

        DB::table('permissions')->where('id',25)->delete();
    }
}
