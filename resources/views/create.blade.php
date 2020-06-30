@extends('templates.template')

@section('content')
<h1 class="text-center">@if(isset($book))Editar @else Cadastrar @endif</h1><hr>
<a href="{{url('books')}}">
    <button class="btn btn-primary">Voltar</button>
</a>
<div class="col-8 m-auto">

        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach ($errors->all() as $erro)
                   {{$erro}}<br>
                @endforeach
            </div>
        @endif
        @if (isset($book))
        <form action="{{url("books/$book->id")}}" name="formEdit" id="formEdit" method="POST">
            @method('PUT')
        @else
        <form action="{{url('books')}}" name="formCad" id="formCad" method="POST">

        @endif
        @csrf
        <input class="form-control" type="text" name="title" id="title" placeholder="informe o título" value="{{$book->title ?? ''}}" require>

        <select class="form-control" name="id_user" id="id_user">
        <option value="{{$book->relUsers->id ?? ''}}">{{$book->relUsers->name ?? ''}}</option>
            @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        <input class="form-control" type="text" name="pages" id="pages" placeholder="informe a quantidade de páginas" value="{{$book->pages ?? ''}}" require>
        <input class="form-control" type="text" name="price" id="price" placeholder="Valor" value="{{$book->price ?? ''}}" require>
        <input class="btn btn-primary" type="submit" value="@if(isset($book))Editar @else Cadastrar @endif">

    </form>
</div>
@endsection
