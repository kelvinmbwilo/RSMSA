<html>
<head>
    <title>master</title>
</head>
<body>

<h1>heeey there
    </h1>
<table>
    <tr>
        <th>Name</th>
        <th>Stakeholder</th>
        <th>Stakeholder Phone</th>
    </tr>
    @foreach(StakeHolderBranch::all() as $branch)
    <tr>
        <td>{{ $branch->name }}</td>
        <td>{{ $branch->stakeholder->name }}</td>
        <td>{{ $branch->stakeholder->location->name }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>