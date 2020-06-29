
@extends('layouts.app')


@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Productos</li>
    </ol>
  </nav>
  



	<h1 class="text-Left">Datos del auto</h1>

<a class="btn btn-secondary mb-5" href="{{ route('producto.create') }}">Agregar auto</a>

		@if (Session::has('message'))
			<div class="alert alert-info">{{Session::get('message')}}</div>
		@endif


		<br>
		@if(isset($producto))


<div class="table-responsive">
<table class="table table-striped" style="text-align:center">


    <thead class="thead-dark">
        <tr>
            <th scope="col">Compania</th>
            <th scope="col">Modelo</th>
            <th scope="col">Anio</th>
            <th scope="col">Opciones</th>
        </tr>

    </thead>

    <tbody>

        @foreach($producto as $u)
        <tr>

            <td>{{ $u->Compania }}</td>
            <td>{{ $u->Modelo }}</td>
            <td>{{ $u->Anio }}</td>


                
             <td>
                <form action="{{ route('producto.destroy',$u->id)}}" method="post" id="destroy{{$u->id}}">
                    @csrf
                    @method('DELETE')

                 
                    <a class="btn-sm btn-info botonInput" href="{{ route('producto.edit',$u->id) }}"><i class="far fa-edit"></i>Editar</a>
            

                  <button type="submit" class="btn-sm btn-danger " onclick="return confirmSweetAlertDestroy('Desactivar','Realmente quieres desactivar','warning','desactivado','Se desactivo.','destroy{{$u->id}}')"><i class="fas fa-user-slash"></i>Eliminar</button>

                    
                      <!--<button type="button" class="btn-sm btn-success " onclick="return confirmSweetAlertDestroy('Activa','Realmente quieres activar?','warning','activado','Se activo.','destroy{{$u->id}}')"><i class="fas fa-user-check"></i>Activar</button>-->

                 </td>  

                </form>


            </td>
        </tr>

        @endforeach

    </tbody>

</table>

		{{ $producto->links() }}
</div>

@endif

@endsection
