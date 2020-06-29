
@extends('layouts.app')


@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
      <li class="breadcrumb-item"><a href="{{route('producto.index')}}">Datos del Producto</a></li>
      <li class="breadcrumb-item active " >Crear</li>
    </ol>
  </nav>
  

@if (Session::has('message'))
<div class="alert alert-info">{{Session::get('message')}}</div>
@endif

<div class="card">
  <div class="card-header">
    <h2>Datos del Producto</h2>
  </div>
  <div class="card-body">
      <form class="producto" method="POST" action="{{route('producto.update',$producto->id)}}">
     @method('PUT')
      @csrf
 {{$errors}}
              
                      <div class="form-group col-md-12">
                     <h3>Datos del producto</h3>
                          <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="txtCompania">Compañia del auto</label>
                        <input type="text" id="txtCompania" class="form-control" value="{{old('Compania',$producto->Compania)}}" name="Compania" placeholder="Ingresa la Compañia"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('Compania') }}</p>
                    </div>  

                      <div class="form-group col-md-4">
                        <label for="txtModelo">Modelo</label>
                        <input type="text" id="txtModelo" class="form-control" value="{{old('Modelo',$producto->Modelo)}}" name="Modelo" placeholder="Ingresa el modelo"  required   onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
                        <p class="inputError">{{ $errors->first('Modelo') }}</p>
                    </div>       

                    <div class="form-group col-md-4">
                        <label for="txtAnio">Año del auto</label>
                        <input type="text" id="txtAnio" class="form-control" value="{{old('Anio',$producto->Anio)}}" name="Anio" placeholder="Ingresa el año del auto"  required   onKeyPress="return soloNumeros(event)" onkeyup="soloNumeros(this);">
                        <p class="inputError">{{ $errors->first('Anio') }}</p>
                    </div>

                    <div class="form-group col-md-4">
                            <label for="txtVersion">Version del auto</label>
                            <select class="form-control form-control-chosen-required {{$errors->first('Version') ? 'has-error' : ''}}" id="txtVersion" placeholder="Ingrese la version del auto" name="Version" required >
                             @if(!old('Version') || old('Version') == 'Elige...')  <option selected>Elige...</option> @endif

                              <option value="0" {{old('Version',$producto->Version) == '0' ? 'selected' : ''}}>Sedan</option>
                              <option value="1" {{old('Version',$producto->Version) == '1' ? 'selected' : ''}}>Comfortline</option>
                              <option value="2" {{old('Version',$producto->Version) == '2' ? 'selected' : ''}}>Live</option>
                              <option value="3" {{old('Version',$producto->Version) == '3' ? 'selected' : ''}}>Highline</option>
                            </select>
                            <p class="inputError">{{ $errors->first('Version') }}</p>
                        </div>

                         <div class="form-group col-md-4">
                            <label for="txtColor">Color del auto</label>
                            <select class="form-control form-control-chosen-required {{$errors->first('Color') ? 'has-error' : ''}}" id="txtColor" placeholder="Ingrese el color del auto" name="Color" required >
                             @if(!old('Color') || old('Color') == 'Elige...')  <option selected>Elige...</option> @endif

                              <option value="0" {{old('Color',$producto->Color) == '0' ? 'selected' : ''}}>Azul</option>
                              <option value="1" {{old('Color',$producto->Color) == '1' ? 'selected' : ''}}>Rojo</option>
                              <option value="2" {{old('Color',$producto->Color) == '2' ? 'selected' : ''}}>Negro</option>
                              <option value="3" {{old('Color',$producto->Color) == '3' ? 'selected' : ''}}>Gris plata</option>
                              <option value="4" {{old('Color',$producto->Color) == '4' ? 'selected' : ''}}>Blanco</option>
                            </select>
                            <p class="inputError">{{ $errors->first('Version') }}</p>
                        </div>
               
</div>
    </div>
          
</div>

                <div class="d-flex justify-content-between mb-8"><label>
                    <a class="btn btn-primary" role="button" href="{{route('producto.index')}}"><i class="fas fa-arrow-left"></i> Regresar</a></label>
                   </div>
                   <div> <label><button type="submit" class="btn btn-primary"><i class="fas fa-save" id="btnComprobar" href="{{route('producto.index')}}"></i> Guardar y continuar</button></label>
                </div>
          </div>
      </form>


@endsection
