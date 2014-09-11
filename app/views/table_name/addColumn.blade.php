@extends('layout.master')

@section('contents')



<section class="panel panel-success">
    <header class="panel-heading">
        Add New column to table {{$table->categoryName}}

    </header>
    <div class="panel-body">
        <form  name="form" class="form_default" method="post"  action="{{ url("table_name/add_column/{$table->id}")}}">
        <div>

            <label for="exampleInputEmail1">Column Name </label>
        </div>

        <div class="form-group">

            <div class="col-md-4">
            <input type="text" class="form-control" id="Sumatra" placeholder="Enter name" name="column1">
            </div>
            <div class="col-sm-3">
                <select name="data" class="form-control input-sm">

                    @foreach(DataTypeDetails::all() as $data)
                    <option value="{{$data->id}}" id="option">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">

                <select name="reference" class="form-control">
                    <option value="0" id="option"><-select a reference if it has one-></option>
                    @foreach(Reference::all() as $ref)
                    <option value="{{$ref->id}}" id="option">{{$ref->name}}</option>
                    @endforeach
                </select>

            </div>


        <button type="submit" class="btn btn-primary btn-sm" onclick="required()" >submit</button>
        </div>
        </form>

    </div>
</section>
<script>
    function required()
    {
        var empty = document.forms["form"]["column1"].value;

        if (empty == "")
        {
            $('input[name=column1]').attr('placeholder','Please fill this field first').focus()
            document.forms["form"]["column1"].style.background ='Yellow';
            return false;

        }
        else
        {
            return true;
        }
    }
</script>
<script>

<!---->
<!---->
//    $(function() {
//        var ids = 1;
//        var  col_count=1;
//        $('.form_default').append('<input type="hidden"  name="col_count" value="'+col_count+'">')
//        $('#addColumn').click(function(){
//            ids++;
//            col_count++;
//            var column = '<div class="form-group">';
//            column+='<label>Option Name </label>';
//            column+=' <input type="text" class="form-control" id="Sumatra" placeholder="Enter name" name="option'+ids+'">';
//            column+="</div>";
//
//            $(this).append(column);
//            $('input[name=option'+ids+']').focus();
//
//
//        })
//        $('SubmitColumn').click(function(){
//        if($('input[name=column1]').val() == ""){
//
//            $('input[name=column1]').attr('placeholder','The field is empty').focus()
//        }
//        }
//
//    }
</script>

@stop