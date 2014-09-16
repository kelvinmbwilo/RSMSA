@extends('layout.master')

@section('contents')

<section class="panel panel-success">
    <header class="panel-heading">
        Enter Details for the Form <b>{{$formD->name}}</b>
    </header>

    <div class="panel-body">
        <form class="form" action='{{url("form_processing")}}' method="post">
            <input type="hidden" value="{{$formD->id}}"  name="formId">
            <?php $m=0;?>
            <?php $f=1;?>
            @foreach($formData as $formDetails)
                <input type="hidden" value="{{$formDetails->id}}"  name="{{$f++}}_formData">

                <br>
                <fieldset><legend>{{ Data::find($formDetails->dataId)->name }}</legend>
                    <?php $p=1; ?>
                    @foreach(DataOptions::where("dataId",$formDetails->dataId)->get() as $option)
                        <input type="hidden" value="{{$option->id}}"  name="{{$p++}}_dataOption">
                    <?php $optionDetails= Options::find($option->optionsId);
                         $op=1; ?>

                        @if($optionDetails->hasCategories =="false")
                        <?php $m=$m+1; ?>
                        <br>
                        <div class="form-group">
                            {{ $optionDetails->name }}
                            <input type="text" required="required" class="form-control col-sm-4" placeholder="Enter {{$optionDetails->name}}" name="{{$m}}_value">
                            <input type="hidden" value="0"  name="{{$op++}}_CategoryOption">
                        </div>
                        @endif
                        @if($optionDetails->hasCategories =="true")
                          <?php
                          $categories=CategoryOptions::where("optionsId",$optionDetails->id)->get();
                          $category=CategoryOptions::where("optionsId",$optionDetails->id)->first();
                          $opt=Options::find($category->optionsId);
                          $m=$m+1;
                          ?>
                          <br>
                        {{ $opt->name }}:
                            @foreach($categories as $cat)
                            <input type="radio" required="required" class="form-control col-sm-4" value="{{$cat->categoryId}}" name="{{$m}}_value">{{$cat->category->name}}
                            @endforeach
                        @endif
                    @endforeach
                </fieldset>
            @endforeach
            <input type="hidden" value="{{$m}}"  name="count">
            <input type="hidden" value="{{--$p}}"  name="CategoryCount">
            <input type="hidden" value="{{$f}}"  name="formCount">
        {{ Form::submit('Submit', array('class' => 'btn pull-right btn-info')) }}
        </form>
    </div>
</section>
</div>
</section>


@stop