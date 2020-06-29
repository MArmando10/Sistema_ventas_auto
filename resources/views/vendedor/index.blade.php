
@extends('layouts.app')


@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Vendedores</li>
    </ol>
  </nav>
  



	<h1 class="text-Left">Datos de los vendedores</h1>

<a class="btn btn-secondary mb-5" href="{{ route('vendedor.create') }}">Agregar Vendedor</a>

		@if (Session::has('message'))
			<div class="alert alert-info">{{Session::get('message')}}</div>
		@endif


		<br>
		@if(isset($vendedor))


<div class="table-responsive">
<table class="table table-striped" style="text-align:center">


    <thead class="thead-dark">
        <tr>
            <th scope="col">Codigo empleado</th>
            <th scope="col">Nombre</th>
            <th scope="col">Opciones</th>
        </tr>

    </thead>

    <tbody>

        @foreach($vendedor as $u)
        <tr>

            <td>{{ $u->Codigo }}</td>
            <td>{{ $u->NombreV }}</td>


                <td>
                <form action="{{ route('vendedor.destroy',$u->id)}}" method="post" id="destroy{{$u->id}}">
                    @csrf
                    @method('DELETE')

                 
                    <a class="btn-sm btn-info botonInput" href="{{ route('vendedor.edit',$u->id) }}"><i class="far fa-edit"></i>Editar</a>
            

                  <button type="submit" class="btn-sm btn-danger " onclick="return confirmSweetAlertDestroy('Desactivar','Realmente quieres desactivar','warning','desactivado','Se desactivo.','destroy{{$u->id}}')"><i class="fas fa-user-slash"></i>Eliminar</button>

                    
                      <!--<button type="button" class="btn-sm btn-success " onclick="return confirmSweetAlertDestroy('Activa','Realmente quieres activar?','warning','activado','Se activo.','destroy{{$u->id}}')"><i class="fas fa-user-check"></i>Activar</button>-->

                 </td>  

                </form>


            </td>
        </tr>

        @endforeach

    </tbody>

</table>

		{{ $vendedor->links() }}
</div>

@endif

@endsection
