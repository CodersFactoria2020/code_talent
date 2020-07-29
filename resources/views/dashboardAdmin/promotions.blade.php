@extends('dashboardAdmin.dashboard')

@section('content')
    <section>
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tabla Promociones</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                            <li class="breadcrumb-item active">Promoción</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Tabla de datos promociones
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>

                                                <th>Promoción</th>

                                                <th>Fecha</th>

                                            </tr>
                                        </thead>
                                        @yield('content')
                                        <tbody>

                                        @if($promotions->count())

                                            @foreach($promotions as $promotion)


                                                <tr>

                                                    <td><a href="{{ route('candidate.store') }}" class="btn btn-outline-secondary" >{{$promotion->name}}</a></td>

                                                    <td>{{$promotion->promotion}}</td>

                                                    <td>{{$promotion->created_at}}</td>



                                                    <td><a class="btn btn-primary btn-xs" href="{{action('PromotionController@edit', $promotion->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>

                                                    <td>
                                                        <form action="{{action('PromotionController@destroy', $promotion->id)}}" method="DELETE">

                                                            @csrf
                                                            @method('DELETE')

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
                        </div>
                    </div>
                </main>
        </div>
    </section>
@endsection
