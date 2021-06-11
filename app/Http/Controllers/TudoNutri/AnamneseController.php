<?php

namespace App\Http\Controllers\TudoNutri;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\TudoNutri\Anamnese;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AnamneseController extends Controller
{
    protected $model = Anamnese::class;
    protected $breadcrumbs = [
        ['name' => "TudoNutri"],
        ['link' => "/tudonutri/anamnese", 'name' => "Anamnese"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $anamnese = Anamnese::filtros($request)
            ->orderBy('nome_anamnese', 'ASC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($anamnese);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($anamnese);
        }

        $anamnese = $anamnese->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'anamnese');
        return view('modules/tudonutri/anamnese/index', $dataView);
    }

    private function indexPdf($anamnese)
    {
        $anamnse = $anamnse->get();
        return \PDF::loadView('modules/tudonutri/anamnese/indexPdf', compact('anamnese'))
            ->setPaper('a4')
            ->download('anamnese.pdf')
        ;
    }

    private function indexExcel($anamnese)
    {
        $anamnese = $anamnese->get();
        $view = 'modules/tudonutri/anamnese/indexExcel';
        $arquivo = 'anamnese.xlsx';
        $dados = ['anamnese' => $anamnese];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $anamnese = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'anamnese');
        return view('modules/tudonutri/anamnese/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $anamnese = $this->model::findOrFail($id);
            $anamnese->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('tudonutri/anamnese');
    }
}
