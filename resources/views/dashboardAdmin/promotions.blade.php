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

                                                <th>Promocion</th>

                                            </tr>
                                        </thead>

                                        @foreach($promotions as $promotion)
                                            <li><a href="{{Route('promotion.edit', $promotion->name)}}"> {{$promotion->promotion}} </a>
                                                <form action="{{route('promotion.destroy', $promotion->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="Eliminar" class="btn btn-xs btn-danger">
                                                </form>
                                            </li>
                                        @endforeach


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        </div>
    </section>
@endsection
