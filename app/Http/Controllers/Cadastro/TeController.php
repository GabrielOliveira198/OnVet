<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Te;
use Maatwebsite\Excel\Facades\Excel;

class TeController extends Controller
{
    protected $model = Te::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/tes", 'name' => "Cadastrar protocolo TE"]
    ];

    public function index(Request $request)
    {
       
        $breadcrumbs = $this->breadcrumbs;
        $tes = Te::filtros($request)        
            ->orderBy('id', 'DESC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($tes);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($tes);
        }

        $tes = $tes->paginate(config('app.paginate'));

        //caminho para salvar o objeto no banco
        //errar aqui, gera um 404 !
        $dataView = compact('breadcrumbs', 'request', 'tes');
        return view('modules/cadastro/te/index', $dataView);  
    }

    private function indexPdf($tes)
    {
        $tes = $tes->get();
        return \PDF::loadView('modules/cadastro/te/indexPdf', compact('tes'))
            ->setPaper('a4')
            ->download('Tes.pdf')
        ;
    }

    private function indexExcel($tes)
    {
        $tes = $tes->get();
        $view = 'modules/cadastro/te/indexExcel';
        $arquivo = 'tes.xlsx';
        $dados = ['tes' => $tes];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $te = $this->model::findOrFail($id);
            $te->delete();
            session()->flash('flash_message', 'O protocolo foi apagado com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover o protocolo!');
        }
        return redirect('cadastros/tes');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $te = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'te');
        return view('modules/cadastro/te/create', $dataView);       
    }
}
