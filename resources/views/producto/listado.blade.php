Listado de productos (Vista nueva)

@extends('layouts.app')

@section('content')


<div class="container">

<a href="{{url('/producto/create')}}" class="btn btn-success">Nuevo</a>
<hr>
  
   
<productos-component></productos-component>


</div>


@endsection