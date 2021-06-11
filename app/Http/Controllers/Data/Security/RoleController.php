<?php

namespace App\Http\Controllers\Data\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Security\Role;
use Exception;

class RoleController extends Controller
{
    protected $model = Role::class;
    public function save(Request $request)
    {
        try {
            $role = $this->model::findOrNew($request->id);
            $role->name = $request->name;
            $role->save();
            
            $role->permissions()->sync($request->permissions);
            return $role;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Nível de Acesso!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
