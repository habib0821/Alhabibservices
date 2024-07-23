<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View File</title>
</head>
<body>


    {{$data->name}}
	{{$data->description}}

	<iframe height="400"  width="400" src="/assets/{{$data->file}}"></iframe>


</body>
</html>
