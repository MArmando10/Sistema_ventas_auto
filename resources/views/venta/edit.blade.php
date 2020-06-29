
@extends('layouts.app')


@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
      <li class="breadcrumb-item"><a href="{{route('venta.index')}}">Venta de autos</a></li>
      <li class="breadcrumb-item active " >Crear</li>
    </ol>
  </nav>
  

@if (Session::has('message'))
<div class="alert alert-info">{{Session::get('message')}}</div>
@endif

<div class="card">
  <div class="card-header">
    <h2>Datos de la venta</h2>
  </div>
  <div class="card-body">
      <form class="VENTA" method="POST" action="{{route('venta.update',$venta->id)}}">
       @method('PUT')
      @csrf
 {{$errors}}
                     

                      <div class="form-group col-md-12">
                     <h3>Datos de la venta</h3>

                          <div class="form-row">
                        <div class="form-group col-md-4">

                        <label class="Nombres">Nombre del vendedor</label>
                    
                        <select class="vendedor" id="NombreV" name="NombreV">
                          
                          @foreach($vendedor as $u)d

                          <option value="{{$u->id}}">{{$u->NombreV}}</option>
                          
                          @endforeach
                          
                        </select>
                        
                        <p class="inputError">{{ $errors->first('vendedor')}}</p>
                    
                    </div>  


                          <div class="form-row">
                        <div class="form-group col-md-12">

                        <label class="Nombre">Nombre del cliente</label>
                    
                        <select class="cliente" id="vendedores" name="NombreC">
                          
                          @foreach($cliente as $u)

                          <option value="{{$u->id}}">{{$u->NombreC  }}</option>
                          
                          @endforeach
                          
                        </select>
                        
                        <p class="inputError">{{ $errors->first('cliente')}}</p>
                    
                    </div>  </div>

                      <div class="form-group col-md-10">
                      <div class="form-row">
                        <div class="form-group col-md-4">

                        <label class="Compania">Nombre de la compañia</label>
                    
                        <select class="producto" id="Compania" name="Compania">
                          
                          @foreach($producto as $u)

                          <option value="{{$u->id}}">{{$u->Compania}}</option>
                          
                          @endforeach
                          
                        </select>
                        
                        <p class="inputError">{{ $errors->first('producto')}}</p>
                    
                    </div>  
                    
                                        
                            
</div>
    </div>
          
</div>

                <div class="d-flex justify-content-between mb-8"><label>
                    <a class="btn btn-primary" role="button" href="{{route('venta.index')}}"><i class="fas fa-arrow-left"></i> Cancelar </a></label>
                   </div>
                   <div> <label><button type="submit" class="btn btn-primary"><i class="fas fa-save" id="btnComprobar" href="{{route('venta.index')}}"></i> Guardar y continuar</button></label>
                </div>
          </div>
      </form>


@endsection
