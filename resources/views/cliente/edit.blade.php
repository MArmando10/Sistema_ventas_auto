
@extends('layouts.app')


@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
      <li class="breadcrumb-item"><a href="{{route('cliente.index')}}">Datos del cliente</a></li>
      <li class="breadcrumb-item active ">Editar</li>
    </ol>
  </nav>
  

@if (Session::has('message'))
<div class="alert alert-info">{{Session::get('message')}}</div>
@endif

<div class="card">
  <div class="card-header">
    <h2>Datos del cliente</h2>
  </div>
  <div class="card-body">
      <form class="CLIENTE" method="POST" action="{{route('cliente.update')}}">
        @method('PUT')
  
      @csrf
 {{$errors}}

                    <div class="form-group col-md-12">
                          <h3>Datos del comprador</h3>
                      <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="txtNombreC">Nombre</label>
                        <input type="text" id="txtNombreC" class="form-control" value="{{old('NombreC',$cliente->NombreC)}}" name="NombreC" placeholder="Ingresa Nombre"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('NombreC') }}</p>
                    </div>
                   
                      <div class="form-group col-md-3">
                        <label for="txtApellidoP">Primer Apellido</label>
                        <input type="text" id="txtApellidoP" class="form-control" value="{{old('ApellidoP',$cliente->ApellidoP)}}" name="ApellidoP" placeholder="Ingresa el primer apellido"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('ApellidoP') }}</p>
                    </div>
                  
                      <div class="form-group col-md-3">
                        <label for="txtApellidoM">Segundo Apellido</label>
                        <input type="text" id="txtApellidoM" class="form-control" value="{{old('ApellidoM',$cliente->ApellidoM)}}" name="ApellidoM" placeholder="Ingresa el segundo apellido"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('ApellidoM') }}</p>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="txtDomi">Domicilio</label>
                        <input type="text" id="txtDomi" class="form-control" value="{{old('Domi',$cliente->Domi)}}" name="Domi" placeholder="Ingresa el Domicilio"  required  onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('Domi') }}</p>
                    </div>

                     <div class="form-group col-md-3">
                        <label for="txtMunicipio">Municipio</label>
                        <input type="text" id="txtMunicipio" class="form-control" value="{{old('Municipio',$cliente->Municipio)}}" name="Municipio" placeholder="Ingresa el Municipio"  required  onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('Municipio') }}</p>
                    </div>

                     <div class="form-group col-md-3">
                        <label for="txtEsttado">Estado</label>
                        <input type="text" id="txtEsttado" class="form-control" value="{{old('Estado',$cliente->Estado)}}" name="Estado" placeholder="Ingresa el Estado"  required  onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('Estado') }}</p>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="txtTelefono">Telefono</label>
                        <input type="text" id="txtTelefono" class="form-control" value="{{old('Telefono',$cliente->Telefono)}}" name="Telefono" placeholder="Ingresa el Telefono" required onKeyPress="return soloNumeros(event)" onkeyup="soloNumeros(this);">
                        <p class="inputError">{{ $errors->first('Telefono') }}</p>
                    </div>

</div>
    </div>
          
</div>

                <div class="d-flex justify-content-between mb-8"><label>
                    <a class="btn btn-primary" role="button" href="{{route('cliente.index')}}"><i class="fas fa-arrow-left"></i> Regresar</a></label>
                   </div>
                   <div> <label><button type="submit" class="btn btn-primary"><i class="fas fa-save" id="btnComprobar" href="{{route('cliente.index')}}"></i> Guardar y continuar</button></label>
                </div>
          </div>
      </form>


@endsection
