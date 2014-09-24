@extends('layout.master')

@section('contents')
<div class="row">
    <div class="col-lg-6 col-md-offset-2 ">
        <section class="panel panel-success">
            <header class="panel-heading">
                Importation Form Mapping

            </header>
            <form class="form-horizontal" id="default" method="post" action='{{ url("formMapping/{$formName->id}") }}'>
            @foreach($tableNames as $key=>$table)
            <br>
            <br>
              <fieldset><legend>{{ $table }}</legend>
                  <input type="hidden" class="form-control" value="{{ $table }}" name="table_name[]">
              @foreach($response[$key] as $option)
                  <input type="hidden" class="form-control" value="{{ $option }}" name="{{$table}}_option_name[]">
                <div class="form-group">
                    <div class="form-group">
               <label>{{$option}}:</label>

               <select class="form-control col-lg-6" name="{{$option}}_columns">
                   <option value="0">No mapping required</option>
                   <?php $j=0?>
                  @foreach($formData as $formDetails)


                   @foreach($formDetails->dataForm->options as $option)


                                <option value="{{ $option->options->id }}">{{ $option->options->name }}</option>



                        @endforeach
                  @endforeach


               </select>
                    </div>
                </div>

                  @endforeach
              </fieldset>
            @endforeach
            <div class="form-group">
                <div class="col-md-6 text-center">
                    <input type="submit" value="Done Mapping" class="btn btn-info">
                </div>
            </div>
            </form>
        </section>
    </div>
</div>

@stop

