<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>

@foreach ($data as $data)


<table border="1px">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>View</th>
        <th>Download</th>
    </tr>
    <tr>
        <td>{{ $data->name }}</td>
        <td>{{ $data->description }}</td>
        <td><a href="{{url('/view')}}">View</a></td>
        <td><a href="{{ url('/download',$data->file) }}">Download</a></td>
    </tr>
</table>

@endforeach



</body>
</html>
