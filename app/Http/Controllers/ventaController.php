<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use  App\vendedor;
use  App\cliente;
use  App\producto;

use App\venta;

use DB;

use Session;


class ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $venta = venta::with(['vendedor'],['cliente'],['producto'])->paginate(5);
//$venta = venta::first()->vendedor->NombreV;
         //dd($venta);

        return view('venta.index',compact('venta','variable2'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $venta = new venta;

        $vendedor = vendedor::all();

        $cliente = cliente::all();
        
        $producto = producto::all();
        
        return view('venta.create',compact('venta','vendedor','cliente','producto'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//dd($request);
         $request->validate([

        'NombreV' => 'required',
        'NombreC' => 'required',
        'Compania' => 'required'
         
         ]);

  //      dd("hola");
         DB::table('venta')->updateOrInsert(
                [
                'NombreV'=>request()->input('NombreV'),
                'NombreC'=>request()->input('NombreC'),
                'Compania'=>request()->input('Compania')
            ]);
         

            Session::flash('message','venta guardada con exito.');
            return redirect()->route('venta.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $venta = venta::find($id);

        $vendedor = vendedor::find($id);

        $cliente = cliente::find($id);
        
        $producto = producto::find($id);
        
        return view('venta.edit',compact('venta','vendedor','cliente','producto'));



        //return view('venta.edit', compact('venta'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


 $request->validate([

        'NombreV' => 'required',
        'NombreC' => 'required',
        'Compania' => 'required'
         ]);
         $venta = venta::find($id);
        $venta->NombreV = $request->get('NombreV');
        $venta->NombreC = $request->get('NombreC');
        $venta->Compania = $request->get('Compania');

         $venta->save();
           
            Session::flash('message','venta guardada con exito.');
            return redirect()->route('venta.index');
        
         //dd("hola");

       

      //  return redirect()->route('venta.index')->with('venta guardada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = venta::find($id);
        $venta->delete();
        return redirect()->route('venta.index');

    }
}
