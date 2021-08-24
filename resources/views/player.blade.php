@extends("Base.base")
@section("contenido")
    <app-component 
        username={{Auth::user()? Auth::user()->name : 'GUEST'}}
    ></app-component>
@endsection