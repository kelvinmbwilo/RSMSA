@extends('layout.master')

@section('contents')
<div class="row">
    <div class="col-lg-8">
        <section class="panel panel-success">
            <header class="panel-heading">
                Excel Mapping

            </header>

            <div class="panel-body">
                @if(isset($msg))
                <div class="alert alert-success fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                    <strong>SUCCESS!</strong> Data Reference Mapping Was Successful.
                </div>
                @endif
                <form class="form-horizontal" id="default" method="post" action='{{ url("excelMapping/{$excel->type}") }}'>
                    <?php $i=0 ?>
                @foreach($val as $column)
                <input type="hidden" value="{{$column}}" name="column_name[]">
                <input type="hidden" class="form-control" value="{{ $columnVal[$i++] }}" name="columnId[]">
                <div class="form-group">
                    <div class="form-group">
                        <label >{{$column}}:</label>

                  <select name="selection[]" class="form-control col-md-4">

                     @if($excel->type=="form")
                    @foreach($formData as $formDetails)
                    <option value="0">No mapping required</option>
                    @foreach($formDetails->dataForm->options as $option)

                    <option value="{{ $option->options->id }}">{{ $option->options->name }}</option>
                    @endforeach
                    @endforeach
                     @endif
                    @if($excel->type=="reference")
                      <option value="0">No mapping required</option>
                    @foreach($formData as $formDetails)

                    <option value="{{ $formDetails->id }}">{{ $formDetails->name }}</option>
                    @endforeach

                    @endif
                    </select>
                     </div>
                    </div>
                @endforeach
                <br>
                <div class="form-group">
                    <div class="col-md-6 text-center">
                        <input type="submit" value="Done Mapping" class="btn btn-info">
                    </div>
                </div>
                </form>
</div>
        </section>

    </div>

</div>
<!-- page end-->

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>
@stop