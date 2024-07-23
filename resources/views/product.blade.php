<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>
</head>
<body>

<form action="{{ url('uploadproduct') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="product name">

    <input type="text" name="description" placeholder="product description">

    <input type="file" name="file">

    <input type="submit">
</form>


</body>
</html>
