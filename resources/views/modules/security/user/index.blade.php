@extends('layouts/contentLayoutMaster')

@section('title', 'Usuários')

@section('content')
<div class="row" id="table-hover-row">
    <div class="col-lg-12 col-12">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Quantidade de Usuários</h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text mr-25 mb-0"></p>
                        </div>
                    </div>

                    <div class="card-body statistics-body">

                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                                <div class="media">
                                    <div class="avatar bg-light-primary mr-2">
                                        <div class="avatar-content">
                                            <i data-feather='users'></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">
                                            {{ $resume->actives + $resume->inactives }}
                                        </h4>
                                        <p class="card-text font-small-3 mb-0">Usuarios</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                                <div class="media">
                                    <div class="avatar bg-light-primary mr-2">
                                        <div class="avatar-content">
                                            <i data-feather='check-square'></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">
                                            {{ $resume->actives }}
                                        </h4>
                                        <p class="card-text font-small-3 mb-0">Ativos</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0" style="padding-bottom: 20px;">
                                <div class="media">
                                    <div class="avatar bg-light-primary mr-2">
                                        <div class="avatar-content">
                                            <i data-feather='square'></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">
                                            {{ $resume->inactives }}
                                        </h4>
                                        <p class="card-text font-small-3 mb-0">Inativo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Listagem de Usuários</h4>
                        <div style="float: right;">
                            <a href="{{ url('security/users/create/0') }}" class="btn btn-outline-primary waves-effect">
                                <i data-feather="plus-circle" class="mr-50"></i>
                                <span>Novo</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('shared.alerts')
                        <form class="form-horizontal form-label-left" id="formSearch" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="page" id="page" value="{{ $request->page or " " }}" />
                            <div class="row d-flex">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Busca Livre..." id="search"
                                            name="search" value="{{ $request->search ?? "" }}">
                                    </div>
                                </div>

                                <div class="col-md-2 col-12 mb-50">
                                    <div class="form-group">
                                        <button class="btn btn-outline-success btn-block text-nowrap px-1 waves-effect"
                                            type="submit">
                                            <i data-feather='search'></i>
                                            <span>Pesquisar</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12 mb-50">
                                    <div class="form-group">
                                        <button
                                            class="btn btn-outline-secondary btn-block text-nowrap px-1 waves-effect"
                                            type="submit" name="export" value="XLS">
                                            <i data-feather='download'></i>
                                            <span>Excel</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12 mb-50">
                                    <div class="form-group">
                                        <button
                                            class="btn btn-outline-secondary btn-block text-nowrap px-1 waves-effect"
                                            type="submit" name="export" value="PDF">
                                            <i data-feather='download'></i>
                                            <span>PDF</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-Mail</th>
                                    <th>Telefone</th>
                                    <th>Celular</th>
                                    <th>Cargo</th>
                                    <th>Nível de Acesso</th>
                                    <th>Página Inicial</th>
                                    <th style="width: 5%;">Status</th>
                                    <th style="width: 5%;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->cellphone }}</td>
                                    <td>{{ $user->jobtitle }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>{{ isset($user->home->name) ? __('locale.'. $user->home->name) : '' }}</td>
                                    <td>
                                        {!! Helper::getAtivoInativo($user->active) !!}
                                    </td>
                                    <td nowrap>
                                        <a href="{{ url('security/users/create') }}/{{ $user->id }}" class="item-show"
                                            title="Editar">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="item-show" alt="Apagar" title="Apagar" {{-- @if($role->users_count > 0)
                                onclick="notification('warning', 'Não Permitido', 'Você não pode apagar porque há usuários com este Nivel de Acesso');" 
                                @else --}} onclick="deleteItem('{{ url('security/users/delete') }}/{{ $user->id }}');"
                                            {{-- @endif --}}>
                                            <i data-feather="trash" class="mr-50"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('shared.paginate', ['form' => 'formSearch', 'itens' => $users ?? null])
                </div>
            </div>
        </div>
        @endsection