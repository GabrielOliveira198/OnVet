<?php

namespace App\Models\Paciente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Paciente extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $table = "pacientes";
    
    public function scopeFiltros($query, $request)
    {
        if (isset($request->search) && $request->search != "") {
            $query->where(function ($q) use ($request) {
                $q->where('nome', 'like', "%{$request->search}%");
            });
        }

        return $query;
    }
}
