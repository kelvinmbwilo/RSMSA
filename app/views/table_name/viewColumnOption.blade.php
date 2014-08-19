<table>
    @foreach($column->options as $column)

    <tr>
        <td>{{$column->optionName}}</td>
    </tr>

    @endforeach
</table>
