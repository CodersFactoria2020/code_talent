@extends('layouts.layouts')

@section('content')

    <div class="row">

        <section class="content">

            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">

                    <div class="panel-body">

                        <div class="pull-left"><h3>Promocion</h3></div>

                        <div class="pull-right">

                            <div class="btn-group">

                                <a href="{{ route('promotion.create') }}" class="btn btn-info" >Añadir Promotion</a>

                            </div>

                        </div>

                        <div class="table-container">

                            <table id="mytable" class="table table-bordred table-striped">

                                <thead>

                                <th>Nombre</th>

                                <th>Promotion</th>

                                <th>Fecha</th>



                                </thead>


                                <tbody>

                                @if($promotions->count())

                                    @foreach($promotions as $promotion)


                                        <tr>

                                            <td>{{$promotion->name}}</td>

                                            <td>{{$promotion->promotion}}</td>

                                            <td>{{$promotion->created_at}}</td>



                                            <td><a class="btn btn-primary btn-xs" href="{{action('PromotionController@edit', $promotion->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>

                                            <td>
                                                <form action="{{action('PromotionController@destroy', $promotion->id)}}" method="post">

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



                </div>

            </div>

        </section>
@endsection

