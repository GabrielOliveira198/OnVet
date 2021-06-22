<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoTudoNutriManipulados extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '29',
                'menu' => '1',
                'position' => '4',
                'permission_id' => 25,
                'name' => 'menu.tudo.nutri.manipulados',
                'icon' => 'briefcase',
                'url' => 'tudonutri/manipulados',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 29)->delete();

        DB::table('permissions')->where('id', 29)->delete();
    }
}
