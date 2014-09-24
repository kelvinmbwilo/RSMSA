@extends('layout.master')
@section('contents')

<section class="panel panel-success">
    <header class="panel-heading ">
       Selecting a Method of data Input
    </header>
    <div class="panel-body">
        <span id="responce" style="opacity: 0; color: "> Successful.. </span>

        <form class="form" action='{{url("form_creation")}}' method="post">
            <div class="form-group">
                <label class="col-lg-2 control-label">Manually</label>
                <div class="col-lg-7">

                    <select name="select" class="form-control" required="required">
                        <option>-- select a Form Name --</option>
                        @foreach($fom as $formDetails)
                        <option value="{{ $formDetails->id }}">{{$formDetails->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{ Form::submit('Insert', array('class' => 'btn pull-right btn-info')) }}
                {{ Form::close() }}

                @if ($errors->any())
                <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
                @endif
            </div>
            <br><br>
            <br>
            <hr>
            <br>
            <form class="form" action='{{url("importData")}}' method="post">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Importation </label>
                    <div class="col-lg-7">

                        <select name="formName" class="form-control" required="required">
                            <option>-- select form name --</option>
                            @foreach($fom as $formDetails)
                            <option value="{{ $formDetails->id }}">{{$formDetails->name}}</option>
                            @endforeach
                        </select>
                        </div>

                    <div class="col-lg-7 col-lg-offset-2">
                        <select name="location" class="form-control" required="required">
                            <option>-- Select Location of Stakeholder Branch --</option>
                           @foreach($location as $loc)
                            <option value="{{ $loc->id }}">{{$loc->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-7 col-lg-offset-2">
                        <select name="stakeholder" class="form-control" required="required">
                            <option>-- Select Branch Name --</option>
                            @foreach($stakeholder as $branch)
                            <option value="{{ $branch->id }}">{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                 </div>
                {{ Form::submit('Import', array('class' => 'btn pull-right btn-info')) }}

            </form>
</section>

@stop