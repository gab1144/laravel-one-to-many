@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-12 d-flex">
            <h1>Tipi</h1>
        </div>

        @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
        @endif

        <div class="w-50"">
            <form  action="{{route('admin.types.store')}}" method="POST">
                @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Nuovo tipo">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                <i class="fa-solid fa-circle-plus"></i>
                                Aggiungi</button>
                        </div>
            </form>
        </div>

        @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{session('deleted')}}
        </div>
        @endif

        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th>{{$type->id}}</th>
                        <td>
                        <form action="{{route('admin.types.update', $type)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input class="border-0" type="text" name="name" value="{{$type->name}}">
                            <button type="submit" class="btn btn-warning me-3">Aggiorna</button>
                        </form>
                        </td>
                        <td>
                            @include('admin.partials.form-delete',[
                                'route' => 'types',
                                'message' => "Confermi l'eliminazione del tipo: $type->name ?",
                                'entity' => $type
                            ])
                        </td>
                    <tr>
                @endforeach
            </tbody>
          </table>


        {{$types->links()}}
    </div>
</div>
@endsection
