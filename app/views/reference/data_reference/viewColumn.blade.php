

<table>
      @foreach($reference->referenceDetails as $column)

       <tr>
           <td>{{$column->name}}</td>
       </tr>

    @endforeach
</table>
