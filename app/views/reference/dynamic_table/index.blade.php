@extends('layout.master')
@section('contents')

<section class="panel panel-success">
    <header class="panel-heading ">
      Add data to reference
    </header>
    <div class="panel-body">
        <span id="responce" style="opacity: 0; color: "> Successful.. </span>
      <?php   $reference=Reference::all();
        $reference->toarray();?>
        <form class="form" action='{{url("dynamic_table/getColumn")}}' method="post">
            <div class="form-group">
                <label class="col-lg-2 control-label">Manually</label>
                <div class="col-lg-8">

                    <select name="select" class="form-control">
                        <option>-- select referenc Name --</option>
                        @foreach($reference as $ref)
                        <option value="{{ $ref->id }}">{{$ref->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <input style="margin-right: 10px" type="submit" class=" btn btn-info pull-right" value="Import">
        </form>
        <br><br>
        <br><br>
        <br>
        <br>
        <hr>
        <br>

        <form class="form" action='{{url("importExcelData")}}' method="post">
            <div class="form-group">
                <label class="col-lg-2 control-label">Importation of excel</label>
                <div class="col-lg-7">
                <input type="hidden" value="reference" name="type">
                <input type="hidden" value="0" name="formName">
                <input type="hidden" value="0" name="location">
                <input type="hidden" value="0" name="stakeholder">
                <select name="referenceName" class="form-control" required="required">
                        <option value="0" >-- select reference name --</option>
                        @foreach($reference as $refDetails)
                        <option value="{{ $refDetails->id }}">{{$refDetails->name}}</option>
                        @endforeach
                </select>
                </div>

            </div>
            {{ Form::submit('Import', array('class' => 'btn pull-right btn-info')) }}

        </form>

                @if ($errors->any())
                <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
                @endif
            </div>
</section>

@stop