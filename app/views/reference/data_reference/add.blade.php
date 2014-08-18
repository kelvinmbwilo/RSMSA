@extends('layout.master')

@section('contents')

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Fill this form to complete registration of a Reference
                    </header>
                    <div class="panel-body">
                        <div class="stepy-tab">
                            <ul id="default-titles" class="stepy-titles clearfix">
                                <li id="default-title-0" class="current-step">
                                    <div>Step 1</div>
                                </li>
                                <li id="default-title-1" class="">
                                    <div>Step 2</div>
                                </li>
                                <li id="default-title-2" class="">
                                    <div>Step 3</div>
                                </li>
                            </ul>
                        </div>
                        <form class="form-horizontal" id="default" method="post" action="{{ url('reference/add')}}">
                            <fieldset title="Step1" class="step" id="default-step-0">
                                <legend> </legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Reference Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="enter a Name" name="referenceName">
                                    </div>
                                </div>

                            </fieldset>
                            <fieldset title="Step 2" class="step" id="default-step-1" >
                                <legend> </legend>
                                <div>
                                <h4>Enter the characteristics of <span id="refName"></span> <button class="btn-success btn btn-xs pull-right" id="addColumn">add column</button></h4>
                                   <span class="text-danger" id="errorlebal"></span>
                                    <div class="form-group">
                                    <div class="col-md-8 col-md-offset-1">
                                        <input type="text" class="form-control input-sm columns" placeholder="category name" name="column1">
                                    </div>
                                </div>


                                </div>



                            </fieldset
                                >

                            <fieldset title="Step 3" class="step" id="default-step-2" >
                                <legend> </legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Reference Name</label>
                                    <div class="col-lg-10">
                                        <p class="form-control-static refName1">value of reference name</p>
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
        <!-- page end-->
    </section>
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
        var ids = 1;
       $('#addColumn').click(function(){
           ids++;
           var column = '<div class="form-group">';
               column+='<div class="col-md-8 col-md-offset-1">';
               column+=' <input type="text" class="form-control input-sm columns" placeholder="category name" name="column'+ids+'">';
               column+="</div></div>";

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
                    if($('input[name=referenceName]').val() == ""){
                        $('form').stepy('step', 1);
                        $('input[name=referenceName]').attr('placeholder','Please Fill This Area First').focus()
                    }else{
                        $("#refName").html($('input[name=referenceName]').val());
                    }
                }

                if(index == 3){
                    if($('input[name=referenceName]').val() == ""){
                        $('form').stepy('step', 1);
                        $('input[name=referenceName]').attr('placeholder','Please Fill This Area First').focus()

                    }else{
                        var reference =  $('input[name=referenceName]').val();
                        var colums = new Array();
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
                            $(".refName1").html(reference);
                        }

                    }
                }


            }
        });
    });

</script>


@stop