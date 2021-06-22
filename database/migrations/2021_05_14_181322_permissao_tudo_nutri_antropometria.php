<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoTudoNutriAntropometria extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '28',
                'menu' => '1',
                'position' => '5',
                'permission_id' => 25,
                'name' => 'menu.tudo.nutri.antropometria',
                'icon' => 'briefcase',
                'url' => 'tudonutri/antropometria',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 26)->delete();

        DB::table('permissions')->where('id', 26)->delete();
    }
}
