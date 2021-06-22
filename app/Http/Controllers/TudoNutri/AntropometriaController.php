<?php

namespace App\Http\Controllers\TudoNutri;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\TudoNutri\Antropometria;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AntropometriaController extends Controller
{
    protected $model = Antropometria::class;
    protected $breadcrumbs = [
        ['name' => "TudoNutri"],
        ['link' => "/tudonutri/antropometria", 'name' => "Antropometria"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $antropometria = Antropometria::filtros($request)
            ->orderBy('peso_atual', 'ASC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($antropometria);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($antropometria);
        }

        $antropometria = $antropometria->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'antropometria');
        return view('modules/tudonutri/antropometria/index', $dataView);
    }

    private function indexPdf($antropometria)
    {
        $antropometria = $antropometria->get();
        return \PDF::loadView('modules/tudonutri/antropometria/indexPdf', compact('antropometria'))
            ->setPaper('a4')
            ->download('antropometria.pdf')
        ;
    }

    private function indexExcel($antropometria)
    {
        $antropometria = $antropometria->get();
        $view = 'modules/tudonutri/antropometria/indexExcel';
        $arquivo = 'antropometria.xlsx';
        $dados = ['antropometria' => $antropometria];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $antropometria = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'antropometria');
        return view('modules/tudonutri/antropometria/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $antropometria = $this->model::findOrFail($id);
            $antropometria->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('tudonutri/antropometria');
    }
}
