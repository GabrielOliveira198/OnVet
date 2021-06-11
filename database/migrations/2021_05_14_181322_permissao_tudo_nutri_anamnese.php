<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoTudoNutriAnamnese extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '26',
                'menu' => '1',
                'position' => '1',
                'permission_id' => 25,
                'name' => 'menu.tudo.nutri.anamnese',
                'icon' => 'briefcase',
                'url' => 'tudonutri/anamnese',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 26)->delete();

        DB::table('permissions')->where('id', 26)->delete();
    }
}
