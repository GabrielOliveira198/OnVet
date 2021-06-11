<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoPacientePacientes extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '24',
                'menu' => '1',
                'position' => '1',
                'permission_id' => 23,
                'name' => 'menu.paciente.pacientes',
                'icon' => 'users',
                'url' => 'paciente/pacientes',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 24)->delete();

        DB::table('permissions')->where('id', 24)->delete();
    }
}
