@extends('layout.master')

@section('contents')

        <section class="panel panel-success">
            <header class="panel-heading">
               Mapping Section {{$dataRef->data->name }} with  Reference {{ $dataRef->referenceData->name }}
            </header>

            <div class="panel-body">


                    <form class="form-horizontal" id="default" method="post" action="{{ url("reference_mapping/{$tableId}") }}">

                            <?php $i=1; $j=1; $k=0; ?>

                            @foreach($dataArray as $opt)


                      <div class="form-group">
                            <label class="col-sm-2 control-label" id="DataCat">{{ $opt->name }}</label>


                           <input type="hidden" class="form-control" value="{{$opt->id}}" name="option_name{{$i++}}">
                           <select name="reference{{$j++}}" class="form-control">
                                <option value="0" id="option">No mapping</option>
                                @foreach($reference as $ref)
                                <option value="{{$ref->id}}" id="option">{{$ref->name}}</option>
                                @endforeach
                            </select>
                          <?php  $k++; ?>

                          </div>
                @endforeach
                         <div class="form-group">

                                <input type="submit" value="done" class="btn btn-info">

                        </div>
                    </form>
                </div>
                </section>
            </div>
        </section>


@stop