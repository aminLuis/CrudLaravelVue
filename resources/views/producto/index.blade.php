Listado de productos
@extends('layouts.app')

@section('content')


<div class="container">

   <table class="table table-hover">

     <thead class="thead-light">
         <tr>
             <th>Descripción</th>
             <th>Stock</th>
             <th>Costo unidad</th>
             <th>Acción</th>
         </tr>
     </thead>

     <tbody>
         <tr>
             <td></td>
             <td></td>
             <td></td>
             <td>
                <a href="#" class="btn btn-primary">Editar</a>
                <a href="#" class="btn btn-danger">Eliminar</a>
             </td>
         </tr>
     </tbody>

   </table>

</div>


@endsection