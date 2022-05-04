<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoInducoes extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '12',
                'menu' => '1',
                'position' => '5',
                'permission_id' => 1,
                'name' => 'menu.cadastros.inducoes',
                'icon' => 'briefcase',
                'url' => 'cadastros/inducoes',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 12)->delete();

        DB::table('permissions')->where('id', 12)->delete();
    }
}