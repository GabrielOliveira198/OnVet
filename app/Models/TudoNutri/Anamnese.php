<?php

namespace App\Models\TudoNutri;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Anamnese extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $table = "anamnese";
    
    public function scopeFiltros($query, $request)
    {
        if (isset($request->search) && $request->search != "") {
            $query->where(function ($q) use ($request) {
                $q->where('nome_anamnese', 'like', "%{$request->search}%");
            });
        }

        return $query;
    }
}
