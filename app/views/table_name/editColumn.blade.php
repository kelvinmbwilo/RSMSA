@extends('layout.master')

@section('contents')

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
<!--main content start-->

    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Editing form for a column
                    </header>
                    <div class="panel-body">
                        <div class="stepy-tab">
                            <ul id="default-titles" class="stepy-titles clearfix">
                                <li id="default-title-0" class="current-step">
                                    <div>columnName</div>
                                </li>
                                <li id="default-title-1" class="">
                                    <div>summary</div>
                                </li>

                            </ul>
                        </div>
                        <form class="form-horizontal" id="default" method="post" action="{{ url("table_name/editColumn/{$coll->id}")}}">
                        <fieldset title=column class="step" id="default-step-0">
                            <legend> </legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Column Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="columnName" value="{{$coll->columnName}}">
                                </div>
                            </div>

                        </fieldset>
                        <fieldset title="options" class="step" id="default-step-1" >
                            <legend> </legend>
                            <div>
                                <h4>Edit the options of column <span class="colName1"></span> <button class="btn-success btn btn-xs pull-right" id="addColumn">add option</button></h4>
                                <span class="text-danger" id="errorlebal"></span>
                                <?php $i=1; $k=1; ?>
                                @foreach($coll->options as $option)
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-1">
                                        <input type="text" class="form-control input-sm columns"  name="option{{$i++}}" value="{{$option->optionName}}">
                                        <input type="hidden"  name="optionid{{$k++}}" value="{{$option->id}}">
                                    </div>
                                </div>
                                @endforeach


                            </div>



                        </fieldset
                            >

                        <fieldset title="Summary" class="step" id="default-step-2" >
                            <legend> </legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Column Name</label>
                                <div class="col-lg-10">
                                    <p class="form-control-static colName1"></p>
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



//step wizard


<!--script for this page-->



<script>


    $(function() {
        var ids = {{count($coll->options)}};
       $('#addColumn').click(function(){
        ids++;
        var column = '<div class="form-group">';
        column+='<div class="col-md-8 col-md-offset-1">';
        column+=' <input type="text" class="form-control input-sm columns" placeholder="option name" name="option'+ids+'">';
        column+="</div></div>";

        $(this).parent().parent().append(column);
        $('input[name=option'+ids+']').focus();


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
                if($('input[name=columnName]').val() == ""){
                    $('form').stepy('step', 1);
                    $('input[name=columnName]').attr('placeholder','Please Fill This Area First').focus()
                }else{
                    $("#tbName").html($('input[name=columnName]').val());
                }
            }

            if(index == 3){
                if($('input[name=columnName]').val() == ""){
                    $('form').stepy('step', 1);
                    $('input[name=columnName]').attr('placeholder','Please Fill This Area First').focus()

                }else{
                    var table =$('input[name=columnName]').val();
                    var col ="";
                    var counter = 0;
                    var col_count =0;
                    $(".columns").each(function(){
                        col_count++;
                        if($(this).val() != ''){
                            col +='<div class="form-group">';
                            col +='<label class="col-lg-2 control-label">option '+ ++counter +'</label>';
                            col +='<div class="col-lg-10">';
                            col +='<p class="form-control-static">'+ $(this).val() +'</p>';
                            col +='</div></div>'
                        }
                    });
                    if(col == ""){
                        $('form').stepy('step', 2);
                        $('#errorlebal').fadeIn().html('Fill At least One Characteristic').delay(3000).fadeOut();
                        $('input[name=option1]').focus()
                    }else{
                        $("input[name=col_count]").remove();
                        $('#default').append('<input type="hidden"  name="col_count" value="'+col_count+'">')
                        $("#checkings").html('').append(col);
                        $(".colName1").html(table);
                    }

                }
            }


        }
    });
    });

</script>


@stop