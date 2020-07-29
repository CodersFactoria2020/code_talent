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
                                      <h1>perfil</h1>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        </div>
    </section>
@endsection
