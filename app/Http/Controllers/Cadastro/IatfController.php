<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Iatf;
use Maatwebsite\Excel\Facades\Excel;

class IatfController extends Controller
{
    protected $model = Iatf::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/iatfs", 'name' => "Cadastrar protocolo IATF"]
    ];

    public function index(Request $request)
    {
       
        $breadcrumbs = $this->breadcrumbs;
        $iatfs = Iatf::filtros($request)        
            ->orderBy('id', 'DESC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($iatfs);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($iatfs);
        }

        $iatfs = $iatfs->paginate(config('app.paginate'));

        //caminho para salvar o objeto no banco
        //errar aqui, gera um 404 !
        $dataView = compact('breadcrumbs', 'request', 'iatfs');
        return view('modules/cadastro/iatf/index', $dataView);  
    }

    private function indexPdf($iatfs)
    {
        $iatfs = $iatfs->get();
        return \PDF::loadView('modules/cadastro/iatf/indexPdf', compact('iatfs'))
            ->setPaper('a4')
            ->download('iatfs.pdf')
        ;
    }

    private function indexExcel($iatfs)
    {
        $iatfs = $iatfs->get();
        $view = 'modules/cadastro/iatf/indexExcel';
        $arquivo = 'iatfs.xlsx';
        $dados = ['iatfs' => $iatfs];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $iatf = $this->model::findOrFail($id);
            $iatf->delete();
            session()->flash('flash_message', 'O protocolo foi apagado com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover o protocolo!');
        }
        return redirect('cadastros/iatfs');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $iatf = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'iatf');
        return view('modules/cadastro/iatf/create', $dataView);       
    }
}
