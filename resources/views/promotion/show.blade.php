@extends('dashboardAdmin.dashboard')

@section('content')
    <section>
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <p>This is user {{ $promotion }}</p>

                                    @if($promotion->candidates->count())

                                        @foreach($promotion->candidates as $candidate)

                                        <p>This is candidate {{ $candidate }}</p>

                                        @endforeach
                                    @else

                                        <tr>
                                            <td colspan="8">No hay registro !!</td>

                                        </tr>

                                    @endif

                                    </div>

                            </div>
                        </div>

                    </div>
                </main>
        </div>
    </section>
@endsection
