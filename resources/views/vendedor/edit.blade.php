
@extends('layouts.app')


@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
      <li class="breadcrumb-item"><a href="{{route('vendedor.index')}}">Datos del vendedor</a></li>
      <li class="breadcrumb-item active " >Crear</li>
    </ol>
  </nav>
  

@if (Session::has('message'))
<div class="alert alert-info">{{Session::get('message')}}</div>
@endif

<div class="card">
  <div class="card-header">
    <h2>Datos del vendedor</h2>
  </div>
  <div class="card-body">
      <form class="Vendedor" method="POST" action="{{route('vendedor.update',$vendedor->id)}}">
      @method('PUT')
      @csrf
 {{$errors}}
                      <div class="form-group col-md-12">

                          <h3>Datos del Vendedor</h3>
                          <div class="form-row">
                          <div class="form-group col-md-4">
                        <label for="txtCodigo">Codigo de empleado</label>
                        <input type="text" id="txtCodigo" class="form-control" value="{{old('Codigo',$vendedor->Codigo)}}" name="Codigo" placeholder="Ingresa la Matricula"  required   onKeyPress="return soloNumeros(event)" onkeyup="soloNumeros(this);">
                        <p class="inputError">{{ $errors->first('Codigo') }}</p>
                    </div>  

                    <div class="form-group col-md-4">
                            <label for="txtPuesto">Puesto</label>
                            <select class="form-control form-control-chosen-required {{$errors->first('Puesto') ? 'has-error' : ''}}" id="txtPuesto" placeholder="Ingrese el puesto" name="Puesto" required >
                             @if(!old('Puesto') || old('Puesto') == 'Elige...')  <option selected>Elige...</option> @endif

                              <option value="0" {{old('Puesto',$vendedor->Puesto) == '0' ? 'selected' : ''}}>Jefe</option>
                                <option value="1" {{old('Puesto',$vendedor->Puesto) == '1' ? 'selected' : ''}}>Promotor</option>
                            </select>
                            <p class="inputError">{{ $errors->first('Puesto') }}</p>
                        </div>

                      <div class="form-group col-md-4">
                        <label for="txtNombreV">Nombre</label>
                        <input type="text" id="txtNombreV" class="form-control" value="{{old('NombreV',$vendedor->NombreV)}}" name="NombreV" placeholder="Ingresa Nombre"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('NombreV') }}</p>
                    </div>       

                    <div class="form-group col-md-4">
                        <label for="txtApellidoPV">Primer Apellido</label>
                        <input type="text" id="txtApellidoPV" class="form-control" value="{{old('ApellidoPV',$vendedor->ApellidoPV)}}" name="ApellidoPV" placeholder="Ingresa el primer apellido"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('ApellidoPV') }}</p>
                    </div>
                  
                      <div class="form-group col-md-4">
                        <label for="txtApellidoMV">Segundo Apellido</label>
                        <input type="text" id="txtApellidoMV" class="form-control" value="{{old('ApellidoMV',$vendedor->ApellidoMV)}}" name="ApellidoMV" placeholder="Ingresa el segundo apellido"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('ApellidoMV') }}</p>
                    </div>                
</div>
    </div>
          
</div>

                <div class="d-flex justify-content-between mb-8"><label>
                    <a class="btn btn-primary" role="button" href="{{route('vendedor.index')}}"><i class="fas fa-arrow-left"></i> Regresar</a></label>
                   </div>
                   <div> <label><button type="submit" class="btn btn-primary"><i class="fas fa-save" id="btnComprobar" href="{{route('vendedor.index')}}"></i> Guardar y continuar</button></label>
                </div>
          </div>
      </form>


@endsection
