@extends('layout.master')

@section('contents')
<section class="panel panel-success">
    <header class="panel-heading">
     Enter Details for the Form <b>{{$formD->name}}</b>
    </header>
@foreach($formData as $formDetails)
    <?php $dataOption=DataOptions::where("dataId",$formDetails->dataId)->get();
         $table=Data::find($formDetails->dataId);
    ?>
    <br>
    <fieldset><legend>{{ $table->name }}</legend>
    @foreach($dataOption as $option)

    <?php
     $optionDetails=Options::find($option->optionsId);

    $i=0;
    ?>

    @if($optionDetails->hasCategories =="false")
    <div class="form-group">
        <label class="col-sm-2 control-label" id="DataCat">{{ $optionDetails->name }}</label>
        <input type="text" class="form-control col-sm-4" placeholder="Enter {{$optionDetails->name}}" name="option_name{{$i++}}">
    </div>
    @endif
    @if($optionDetails->hasCategories =="true")
        <?php
        $categories=CategoryOptions::where("optionsId",$optionDetails->id)->get();
        $category=CategoryOptions::where("optionsId",$optionDetails->id)->first();
        $opt=Options::find($category->optionsId);
        $i=0;
        ?>
        <label>{{ $opt->name }}:</label>
        @foreach($categories as $cat)
        <?php
        $category=Categories::find($cat->categoryId);

        $i=0;
        ?>
        <input type="radio"  value="{{$cat->name}}" name="category_name{{$i++}}">{{$category->name}}
        @endforeach
    @endif
    @endforeach

    </fieldset>
@endforeach

</section>
@stop