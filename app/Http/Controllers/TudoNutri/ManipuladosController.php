<?php

namespace App\Http\Controllers\TudoNutri;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\TudoNutri\Manipulados;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ManipuladosController extends Controller
{
    protected $model = Manipulados::class;
    protected $breadcrumbs = [
        ['name' => "TudoNutri"],
        ['link' => "/tudonutri/manipulados", 'name' => "Manipulados"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $manipulados = Manipulados::filtros($request)
            ->orderBy('nome_formula', 'ASC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($manipulados);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($manipulados);
        }

        $manipulados = $manipulados->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'manipulados');
        return view('modules/tudonutri/manipulados/index', $dataView);
    }

    private function indexPdf($manipulados)
    {
        $manipulados = $manipulados->get();
        return \PDF::loadView('modules/tudonutri/manipulados/indexPdf', compact('manipulados'))
            ->setPaper('a4')
            ->download('manipulados.pdf')
        ;
    }

    private function indexExcel($manipulados)
    {
        $manipulados = $manipulados->get();
        $view = 'modules/tudonutri/manipulados/indexExcel';
        $arquivo = 'manipulados.xlsx';
        $dados = ['manipulados' => $manipulados];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $manipulados = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'manipulados');
        return view('modules/tudonutri/manipulados/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $manipulados = $this->model::findOrFail($id);
            $manipulados->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('tudonutri/manipulados');
    }
}
