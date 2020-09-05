@extends('dashboardAdmin.dashboard')

@section('content')

    <section>
        <main>
            <div class="container-fluid">
                <h2 class="mt-4">Hola de nuevo, {{ Auth::user()->name }}</h2>
                <div class="card-deck">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h2 class="card-title text-center"><strong> {{count($promotion->candidates)}} </strong></h2>
                            <h5 class="card-text text-center">Candidatos totales en esta promoción</h5>
                        </div>
                    </div>
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h2 class="card-title text-center"><strong> {{(count($promotion->candidates)-$have_finished)}} </strong></h2>
                            <h5 class="card-text text-center">Candidatos que estan en progreso</h5>
                        </div>
                    </div>
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h2 class="card-title text-center"><strong> {{$have_finished}} </strong></h2>
                            <h5 class="card-text text-center">Candidatos esperando ser aceptados</h5>
                        </div>
                    </div>
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h2 class="card-title text-center"><strong> {{count($promotion->candidates)}} </strong></h2>
                            <h5 class="card-text text-center">Candidatos aceptados en la próxima fase</h5>
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="{{ route('candidate.create') }}" class="btn btn-info" >Añadir Candidato</a>
                    </div>
                </div>


                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                    <li class="breadcrumb-item active">Vista General</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        <h4>{{ $promotion->name }}</h4>
                    </div>

                    <div class="container-fluid">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <thead>

                                    <th>Perfil</th>

                                    <th>ID</th>

                                    <th>Nombre</th>

                                    <th>Apellidos</th>

                                    <th>Progreso general</th>

                                    <th>Última Conexión</th>

                                    <th>Editar</th>

                                    <th>Eliminar</th>

                                    <th>Estado</th>

                                    </thead>

                                    <tbody>

                                    @if($promotion->candidates->count())

                                        @foreach($promotion->candidates as $candidate)


                                            <tr>

                                                <td><a class="btn btn-link btn-xs" href="{{action('CandidateController@show', $candidate->id)}}"><span class="glyphicon glyphicon-user"></span></a></td>

                                                <td>{{$candidate->id}}</td>

                                                <td>{{$candidate->name}}</td>

                                                <td>{{$candidate->lastname}}</td>

                                                <td class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" style="width: {{$candidate->percentage}}% ;" aria-valuenow="{{$candidate->percentage}}" aria-valuemin="0" aria-valuemax="100" >{{$candidate->percentage}}%</td>

                                                <td>{{\Carbon\Carbon::create($candidate->last_connection)->diffForHumans()}}</td>


                                                <td><a class="btn btn-primary btn-xs" href="{{action('CandidateController@edit', $candidate->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>

                                                <td>
                                                    <form action="{{action('CandidateController@destroy', $candidate->id)}}" method="post">

                                                        {{csrf_field()}}

                                                        <input name="_method" type="hidden" value="DELETE">

                                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                    </form>
                                                </td>

                                                <td>
                                                    @if($candidate->percentage != 100)
                                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-dash-circle-fill" fill="orange" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                                        </svg>
                                                    @else
                                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="green" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                        </svg>
                                                    @endif
                                                </td>

                                            </tr>

                                        @endforeach
                                    @else

                                        <tr>
                                            <td colspan="8">No hay registro !!</td>
                                        </tr>

                                    @endif

                                    </tbody>
                                </table>

                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#acceptedCandidates" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Ver Candidatos aceptados
                                </a>
                            </p>
                            <div class="collapse" id="acceptedCandidates">
                                <div class="card card-body">

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>

                                        <th>Perfil</th>

                                        <th>ID</th>

                                        <th>Nombre</th>

                                        <th>Apellidos</th>

                                        <th>Progreso general</th>

                                        <th>Última Conexión</th>

                                        <th>Editar</th>

                                        <th>Eliminar</th>

                                        </thead>

                                        <tbody>
                                        @foreach($promotion->candidates as $candidate)
                                            <td><a class="btn btn-link btn-xs" href="{{action('CandidateController@show', $candidate->id)}}"><span class="glyphicon glyphicon-user"></span></a></td>

                                            <td>{{$candidate->id}}</td>

                                            <td>{{$candidate->name}}</td>

                                            <td>{{$candidate->lastname}}</td>

                                            <td class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" style="width: {{$candidate->percentage}}% ;" aria-valuenow="{{$candidate->percentage}}" aria-valuemin="0" aria-valuemax="100" >{{$candidate->percentage}}%</td>

                                            <td>{{\Carbon\Carbon::create($candidate->last_connection)->diffForHumans()}}</td>


                                            <td><a class="btn btn-primary btn-xs" href="{{action('CandidateController@edit', $candidate->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>

                                            <td>
                                                <form action="{{action('CandidateController@destroy', $candidate->id)}}" method="post">

                                                    {{csrf_field()}}

                                                    <input name="_method" type="hidden" value="DELETE">

                                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                </form>
                                            </td>

                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </main>

    </section>
@endsection
