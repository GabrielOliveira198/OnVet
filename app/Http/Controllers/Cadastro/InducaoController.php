<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Inducao;
use Maatwebsite\Excel\Facades\Excel;

class InducaoController extends Controller
{
    protected $model = Inducao::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/inducoes", 'name' => "Cadastrar protocolos indução"]
    ];

    public function index(Request $request)
    {
       
        $breadcrumbs = $this->breadcrumbs;
        $inducoes = Inducao::filtros($request)        
            ->orderBy('id', 'DESC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($inducoes);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($inducoes);
        }

        $inducoes = $inducoes->paginate(config('app.paginate'));

        //caminho para salvar o objeto no banco
        //errar aqui, gera um 404 !
        $dataView = compact('breadcrumbs', 'request', 'inducoes');
        return view('modules/cadastro/inducao/index', $dataView);  
    }

    private function indexPdf($inducoes)
    {
        $inducoes = $inducoes->get();
        return \PDF::loadView('modules/cadastro/inducao/indexPdf', compact('inducoes'))
            ->setPaper('a4')
            ->download('Inducao.pdf')
        ;
    }

    private function indexExcel($inducoes)
    {
        $inducoes = $inducoes->get();
        $view = 'modules/cadastro/inducao/indexExcel';
        $arquivo = 'inducao.xlsx';
        $dados = ['inducoes' => $inducoes];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $inducao = $this->model::findOrFail($id);
            $inducao->delete();
            session()->flash('flash_message', 'O protocolo foi apagado com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover o protocolo!');
        }
        return redirect('cadastros/inducoes');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $inducao = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'inducao');
        return view('modules/cadastro/inducao/create', $dataView);       
    }
}
