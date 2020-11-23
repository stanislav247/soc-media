@extends('layout.default')
@section('title' , 'Регистрация')


@section('content')
    



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<form method="post" action="/register">
	{{csrf_field()}}
<br>
Име:<input type="text" name="username" value="{{old('username')}}"><br>
Поща:<input type="text" name="email" value="{{old('email')}}"><br>
Парола:<input type="password" name="pass"><br>
Повтори Парола:<input type="password" name="pass2"><br>
<input type="submit" value="Регистрация"><br>

</form>


@endsection

