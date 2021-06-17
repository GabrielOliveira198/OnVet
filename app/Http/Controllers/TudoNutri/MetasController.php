<?php

namespace App\Http\Controllers\TudoNutri;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\TudoNutri\Metas;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MetasController extends Controller
{
    protected $model = Metas::class;
    protected $breadcrumbs = [
        ['name' => "TudoNutri"],
        ['link' => "/tudonutri/metas", 'name' => "Metas"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $metas = Metas::filtros($request)
            ->orderBy('nome_metas', 'ASC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($metas);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($metas);
        }

        $metas = $metas->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'metas');
        return view('modules/tudonutri/metas/index', $dataView);
    }

    private function indexPdf($metas)
    {
        $metas = $metas->get();
        return \PDF::loadView('modules/tudonutri/metas/indexPdf', compact('metas'))
            ->setPaper('a4')
            ->download('metas.pdf')
        ;
    }

    private function indexExcel($metas)
    {
        $metas = $metas->get();
        $view = 'modules/tudonutri/metas/indexExcel';
        $arquivo = 'metas.xlsx';
        $dados = ['metas' => $metas];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $metas = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'metas');
        return view('modules/tudonutri/metas/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $metas = $this->model::findOrFail($id);
            $metas->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('tudonutri/metas');
    }
}
