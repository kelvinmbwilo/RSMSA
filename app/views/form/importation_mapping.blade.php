@extends('layout.master')

@section('contents')
<div class="row">
    <div class="col-lg-6 col-md-offset-2 ">
        <section class="panel panel-success">
            <header class="panel-heading">
                Importation Form Mapping
                <a class="btn btn-success pull-right btn-xs" href="{{ url('form/add') }}">
                    New Form<i class="fa fa-plus"></i>
                </a>
            </header>
            <form class="form-horizontal" id="default" method="post" action="{{ url('formMapping/add') }}">
            @foreach($tableNames as $key=>$table)
            <br>
            <br>
              <fieldset><legend>{{ $table }}</legend>

              @foreach($response[$key] as $option)

                <div class="form-group">
                    <div class="form-group">
               <label>{{$option}}:</label>

               <select class="form-control col-lg-6" name="{{ $table}}_columns}}">
                   <option id="0">No mapping required</option>
                  @foreach($formData as $formDetails)

                        @foreach($formDetails->dataForm->options as $option)


                                <option id="option{{ $option->options->id }}">{{ $option->options->name }}</option>




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

