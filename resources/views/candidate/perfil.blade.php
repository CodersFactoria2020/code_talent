@extends('dashboardAdmin.dashboard')

@section('content')
    <section>
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <h1>Perfil {{$candidate->name}}</h1>
                                        <h3>Promoción {{$candidate->promotion}}</h3>
                                        <table id="mytable" class="table table-bordred table-striped">

                                            <thead>
                                            <th>ID</th>

                                            <th>Nombre</th>

                                            <th>Apellidos</th>

                                            <th>Estado</th>

                                            <th>Fecha de inicio</th>

                                            </thead>
                                            <td>{{$candidate->id}}</td>

                                            <td>{{$candidate->name}}</td>

                                            <td>{{$candidate->lastname}}</td>

                                            <td>{{$candidate->status}}</td>

                                            <td>{{$candidate->created_at}}</td>
                                        </table>
                                        <table id="mytable" class="table table-bordred table-striped">

                                            <thead>
                                            <th>Email</th>

                                            <th>Teléfono</th>

                                            <th>SoloLearn</th>

                                            <th>CodeAcademy</th>

                                            <th>Última modificación</th>

                                            </thead>
                                            <td>{{$candidate->email}}</td>

                                            <td>{{$candidate->phone_number}}</td>

                                            <td>{{$candidate->sololearn}}</td>

                                            <td>{{$candidate->codeacademy}}</td>

                                            <td>{{$candidate->updated_at}}</td>
                                        </table>

                                    </table>
                                    <div class="row">
                                        <div class="col-lg-6">

                                        <div class="card-header">
                                            <i class="fas fa-chart-area mr-1"></i>
                                            Área de progreso
                                        </div>
                                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>

                                </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </main>
        </div>
    </section>
@endsection
