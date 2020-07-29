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
                                        <ul>
                                        <li>{{$candidate->id}}</li>

                                        <li>{{$candidate->name}}</li>

                                        <li>{{$candidate->lastname}}</li>

                                        <li>{{$candidate->email}}</li>

                                        <li>{{$candidate->phone_number}}</li>

                                        <li>{{$candidate->status}}</li>

                                        <li>{{$candidate->sololearn}}</li>

                                        <li>{{$candidate->codeacademy}}</li>

                                        <li>{{$candidate->created_at}}</li>
                                        </ul>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        </div>
    </section>
@endsection
