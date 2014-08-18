@extends('layout.master')

@section('contents')



<section class="panel">
    <header class="panel-heading">
        Add New column to table name {{$table->categoryName}}
    </header>
    <div class="panel-body">
        <form class="form_default" method="post" action="{{ url("table_name/add_column/{$table->id}")}}" >
        <div>
            <button class="btn-success btn btn-xs pull-right" id="addColumn">add column</button>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Column Name </label>
            <input type="text" class="form-control" id="Sumatra" placeholder="Enter name" name="column1">
        </div>

        <button type="submit" class="btn btn-danger">submit</button>
        </form>

    </div>
</section>
<script>

    $(function() {
        var ids = 1;
        var  col_count=1;
        $('.form_default').append('<input type="hidden"  name="col_count" value="'+col_count+'">')
        $('#addColumn').click(function(){
            ids++;
            col_count++;
            var column = '<div class="form-group">';
            column+='<label for="exampleInputEmail1">Option Name </label>';
            column+=' <input type="text" class="form-control" id="Sumatra" placeholder="Enter name" name="option'+ids+'">';
            column+="</div>";

            $(this).append(column);
            $('input[name=option'+ids+']').focus();


        })

    }
</script>

@stop