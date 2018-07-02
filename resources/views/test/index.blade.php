<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
@if(count($errors)>0)
    @if(is_object($errors))
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @else
        <p>{{$errors}}</p>
    @endif
@endif
<form action="{{url('/index')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    文件名：<input type="file" name="upFile" value="{{old('upFile')}}" /><br />
    <input type="submit" value="上传" />
</form>
</body>
</html>