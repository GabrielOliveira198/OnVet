<?php

namespace App\Http\Controllers\Paciente;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Paciente\Paciente;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PacienteController extends Controller
{
    protected $model = Paciente::class;
    protected $breadcrumbs = [
        ['name' => "Paciente"],
        ['link' => "/paciente/pacientes", 'name' => "Pacientes"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $paciente = Paciente::filtros($request)
            ->orderBy('nome', 'ASC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($paciente);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($paciente);
        }
        
        $paciente = $paciente->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'paciente');
        return view('modules/paciente/pacientes/index', $dataView);
    }

    private function indexPdf($paciente)
    {
        $paciente = $paciente->get();
        return \PDF::loadView('modules/paciente/pacientes/indexPdf', compact('pacientes'))
            ->setPaper('a4')
            ->download('pacientes.pdf')
        ;
    }

    private function indexExcel($pacientes)
    {
        $paciente = $paciente->get();
        $view = 'modules/paciente/pacientes/indexExcel';
        $arquivo = 'paciente.xlsx';
        $dados = ['paciente' => $paciente];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }
    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $paciente = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'paciente');
        return view('modules/paciente/pacientes/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $paciente = $this->model::findOrFail($id);
            $paciente->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('paciente/pacientes');
    }
}
