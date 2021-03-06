@extends('layout.master')

@section('contents')

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
<!--main content start-->


        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-success">
                    <header class="panel-heading">
                        Form to complete registration of a table
                    </header>
                    <div class="panel-body">
                        <div class="stepy-tab ">
                            <ul id="default-titles" class="stepy-titles clearfix btn-xs">
                                <li id="default-title-0" class="current-step">
                                    <div>table</div>
                                </li>
                                <li id="default-title-1" class="">
                                    <div>column</div>
                                </li>

                                <li id="default-title-2" class="">
                                    <div>summary</div>
                                </li>
                            </ul>
                        </div>
                        <form class="form-horizontal" id="default" method="post" action="{{ url('table_name/add')}}">
                            <fieldset title="table" class="step" id="default-step-0">
                                <legend> </legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Table Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="enter a Name" name="tableName">
                                    </div>
                                </div>

                            </fieldset>
                            <fieldset title="column" class="step" id="default-step-1" >
                                <legend> </legend>

                                <div>
                                        <div class="row">
                                        <h5>Enter the column(s) of <span id="tbName"></span></h5>
                                        <button class="btn-success btn btn-xs pull-right" id="addColumn">add column</button>
                                        </div>

                                    <span class="text-danger" id="errorlebal"></span>
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control input-sm columns" placeholder="column name" name="column1">
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="data1" class="form-control input-sm">
                                                @foreach(DataTypeDetails::all() as $data)
                                                <option value="{{$data->id}}" id="option">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">

                                            <select name="name1" class="form-control">
                                                <option value="0" id="option"><-select a reference if it has one-></option>
                                                @foreach(Reference::all() as $ref)
                                                <option value="{{$ref->id}}" id="option">{{$ref->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                </div>



                            </fieldset>


                            <fieldset title="summary" class="step" id="default-step-2" >
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
                            <input type="submit" class="finish btn btn-danger" value="Finish"/>
                        </form>
                    </div>
                </section>
            </div>
        </div>


<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/respond.min.js') }}"></script>
<script src="{{ asset('js/jquery.stepy.js') }}"></script>


<script src="{{ asset('css/style.css') }}"></script>
<script src="{{ asset('css/style-responsive.css') }}"></script>
<script src="{{ asset('css/styles/colors.css') }}"></script>






<!--script for this page-->



<script>


    $(function() {
        var ids = 1;
        $('#addColumn').click(function(){
            ids++;
            var column ='<div class="form-group">';
            column+='<div class="col-sm-5">';
            column+='<input type="text" class="form-control input-sm columns" placeholder="column name" name="column'+ids+'">';
            column+="</div>";
            column+='<div class="col-sm-3">';
            column+='<select name="data'+ids+'" class="form-control input-sm">';
            column+="@foreach(DataTypeDetails::all() as $data)";
            column+='<option value="{{$data->id}}" >{{$data->name}}</option>';
            column+="@endforeach";
            column+="</select>";
            column+="</div>";
            column+='<div class="col-sm-4">';
            column+='<select name="name'+ids+'" class="form-control">';
            column+='<option value="0" ><-select a reference if it has one-></option>';
            column+="@foreach(Reference::all() as $ref)";
            column+='<option value="{{$ref->id}}" >{{$ref->name}}</option>';
            column+="@endforeach";
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
                alert('This will create the described table')
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

                        var col ="";
                        var counter = 0;
                        var col_count =0;
                        var inc =0;
                        $(".columns").each(function(){
                            col_count++;

                            if($(this).val() != ''){
                                col +='<div class="form-group">';
                                col +='<label class="col-md-2 control-label">column'+ ++counter +'</label>';
                                col +='<div class="col-sm-2">';
                                col +='<p class="form-control-static">'+ $(this).val() +'</p>';
                                col +='</div>';
                                col +='<div class="col-md-3 pull-left">';
                                col +='<p class="form-control-static">{'+ $("select[name=data"+ ++inc+"]").find(":selected").text() +'}</p>';
                                col +='</div></div>'
                            }
                        });
                        var columnName =  $('input[name=tableName]').val();
                        if(col == ""){
                            $('form').stepy('step', 2);
                            $('#errorlebal').fadeIn().html('Fill At least One Column').delay(3000).fadeOut();
                            $('input[name=column1]').focus()
                        }else{
                            $("input[name=col_count]").remove();
                            $('#default').append('<input type="hidden"  name="col_count" value="'+col_count+'">')
                            $("#checkings").html('').append(col);
                            $(".tbName1").html(columnName);

                        }

                    }
                }




            }
        });
    });

</script>


@stop