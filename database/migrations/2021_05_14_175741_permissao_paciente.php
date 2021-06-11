<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoPaciente extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '23',
                'menu' => '1',
                'position' => '1',
                'permission_id' => null,
                'name' => 'menu.paciente',
                'icon' => 'database',
                'url' => '',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 23)->delete();

        DB::table('permissions')->where('id',23)->delete();
    }
}
