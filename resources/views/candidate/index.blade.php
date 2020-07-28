@extends('layouts.layouts')

@section('content')

    <div class="row">

        <section class="content">

            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">

                    <div class="panel-body">

                        <div class="pull-left"><h3>Lista Candidatos</h3></div>

                        <div class="pull-right">

                            <div class="btn-group">

                                <a href="{{ route('candidate.create') }}" class="btn btn-info" >Añadir Candidato</a>

                            </div>

                        </div>

                        <div class="table-container">

                            <table id="mytable" class="table table-bordred table-striped">

                                <thead>

                                <th>Nombre</th>

                                <th>Apellidos</th>

                                <th>Email</th>

                                <th>Estado</th>

                                <th>Fecha de inicio</th>

                                </thead>


                                <tbody>

                                @if($candidates->count())

                                    @foreach($candidates as $candidate)


                                        <tr>

                                            <td>{{$candidate->name}}</td>

                                            <td>{{$candidate->lastname}}</td>

                                            <td>{{$candidate->email}}</td>

                                            <td>{{$candidate->status}}</td>

                                            <td>{{$candidate->date}}</td>

                                            <td><a class="btn btn-primary btn-xs" href="{{action('CandidateController@edit', $candidate->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>

                                            <td>
                                                <form action="{{action('CandidateController@destroy', $candidate->id)}}" method="post">

                                                    {{csrf_field()}}

                                                    <input name="_method" type="hidden" value="DELETE">

                                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
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

                        </div>

                    </div>

                    {{ $candidates->links() }}

                </div>

            </div>

        </section>
@endsection
