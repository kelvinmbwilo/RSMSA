@extends('layout.master')

@section('contents')

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
<!--main content start-->

        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-success">
                    <header class="panel-heading">
                        Editing form for a table {{$table->categoryName}}
                    </header>
                    <div class="panel-body">
                        <div class="stepy-tab">
                            <ul id="default-titles" class="stepy-titles clearfix">
                                <li id="default-title-0" class="current-step">
                                    <div>table</div>
                                </li>
                                <li id="default-title-1" class="">
                                    <div>column name</div>
                                </li>
                                <li id="default-title-2" class="">
                                    <div>summary</div>
                                </li>
                            </ul>
                        </div>
                        <form class="form-horizontal" id="default" method="post" action="{{ url("table_name/edit/{$table->id}")}}">
                        <fieldset title="Table" class="step" id="default-step-0">
                            <legend> </legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Table Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="tableName" value="{{$table->categoryName}}">
                                </div>
                            </div>

                        </fieldset>
                        <fieldset title="Column" class="step" id="default-step-1" >
                            <legend> </legend>
                            <div>
                                <h4>Edit the columns of <span id="tbName1"></span> <button class="btn-success btn btn-xs pull-right" id="addColumn">add column</button></h4>
                                <span class="text-danger" id="errorlebal"></span>
                                <?php $i=1; $k=1; $x=1; $r=1; ?>
                                @foreach($table->column as $column)
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control input-sm columns"  name="column{{$i++}}" value="{{$column->columnName}}">
                                        <input type="hidden"  name="columnid{{$k++}}" value="{{$column->id}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="data{{$x++}}" class="form-control input-sm">
                                            <option value="{{$column->typeId}}" id="option">@if($column->datatype){{$column->datatype->name}}@endif</option>
                                            @foreach(DataTypeDetails::all() as $data)
                                            <option value="{{$data->id}}" id="option">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="reference{{$r++}}" class="form-control input-sm">
                                            <option value="{{$column->referenceId}}" id="option">@if(!$column->referenced)<-- select a reference if it has one--> @endif
                                                                                                 @if($column->referenced){{$column->referenced->name}}@endif
                                                                                         </option>
                                            @foreach(Reference::all() as $ref)
                                            <option value="{{$ref->id}}" id="option">{{$ref->name}}</option>
                                            @endforeach
                                            <option value="0" id="option"><-- has no reference--></option>
                                        </select>
                                    </div>
                                </div>
                                @endforeach


                            </div>



                        </fieldset>

                        <fieldset title="Summary" class="step" id="default-step-2" >
                            <legend> </legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Table Name</label>
                                <div class="col-lg-10">
                                    <p class="form-control-static tbName1"></p>
                                </div>
                            </div>
                            <div id="checkings">

                            </div>


                        </fieldset>
                        <input type="submit" class="finish btn btn-danger" value="save"/>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->

</section>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/respond.min.js') }}"></script>
<script src="{{ asset('js/jquery.stepy.js') }}"></script>


<script src="{{ asset('css/style.css') }}"></script>
<script src="{{ asset('css/style-responsive.css') }}"></script>
<script src="{{ asset('css/styles/colors.css') }}"></script>



<script>


    $(function() {
        var ids = {{count($table->column)}};
    $('#addColumn').click(function(){
        ids++;
        var column ='<div class="form-group">';
        column+='<div class="col-sm-4">';
        column+='<input type="text" class="form-control input-sm columns" placeholder="column name" name="column'+ids+'">';
        column+="</div>";
        column+='<div class="col-sm-3">';
        column+='<select name="data'+ids+'" class="form-control input-sm">';
        column+="@foreach(DataTypeDetails::all() as $data)";
        column+='<option value="{{$data->id}}" >{{$data->name}}</option>';
        column+="@endforeach";
        column+="</select>";
        column+="</div>";
        column+='<div class="col-sm-3">';
         column+='<select name="reference'+$ids+'" class="form-control input-sm">';
         column+='<option value="{{$column->referenceId}}" id="option">@if(!$column->referenced)<-- select a reference if it has one--> @endif';
         column+="@if($column->referenced){{$column->referenced->name}}@endif";
         column+="</option>";
         column+="@foreach(Reference::all() as $ref)";
         column+='<option value="{{$ref->id}}" id="option">{{$ref->name}}</option>';
         column+="@endforeach";
         column+='<option value="0" id="option"><-- has no reference--></option>';
         column+="</select>";
        column+="</div>";
        column+="</div>";

        $(this).parent().parent().append(column);
        $('input[name=column'+ids+']').focus();


    })

    $('#default').stepy({
        backLabel: 'Previous',
        block: true,
        nextLabel: 'Next',
        titleClick: true,
        validate     : false,
        titleTarget: '.stepy-tab',
        duration  : 600,
        transition: 'fade',
        finish:function(){
            alert('am done')
        },
        select: function(index) {
            if(index == 2){
                if($('input[name=tableName]').val() == ""){
                    $('form').stepy('step', 1);
                    $('input[name=tableName]').attr('placeholder','Please Fill This Area First').focus()
                }else{
                    $("#tbName").html($('input[name=tableName]').val());
                }
            }

            if(index == 3){
                if($('input[name=tableName]').val() == ""){
                    $('form').stepy('step', 1);
                    $('input[name=tableName]').attr('placeholder','Please Fill This Area First').focus()

                }else{
                    var table =  $('input[name=tableName]').val();
                    var col ="";
                    var counter = 0;
                    var col_count =0;
                    $(".columns").each(function(){
                        col_count++;
                        if($(this).val() != ''){
                            col +='<div class="form-group">';
                            col +='<label class="col-lg-2 control-label">category '+ ++counter +'</label>';
                            col +='<div class="col-lg-10">';
                            col +='<p class="form-control-static">'+ $(this).val() +'</p>';
                            col +='</div></div>'
                        }
                    });
                    if(col == ""){
                        $('form').stepy('step', 2);
                        $('#errorlebal').fadeIn().html('Fill At least One Characteristic').delay(3000).fadeOut();
                        $('input[name=column1]').focus()
                    }else{
                        $("input[name=col_count]").remove();
                        $('#default').append('<input type="hidden"  name="col_count" value="'+col_count+'">')
                        $("#checkings").html('').append(col);
                        $(".tbName1").html(table);
                    }

                }
            }


        }
    });
    });

</script>


@stop