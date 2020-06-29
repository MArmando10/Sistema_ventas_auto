<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\producto;

use Session;

use DB;

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $producto = producto::paginate(5);

        return view('producto.index',compact('producto','variable2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $producto = new producto;

        $producto = $producto->all();
  
        return view('producto.create',compact('producto','producto'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'Compania'=> 'required',
            'Modelo'=> 'required',
            'Anio'=> 'required',
            'Version'=> 'required',
            'Color'=> 'required'

          ]);

           DB::table('producto')->updateOrInsert(
            [
            'Compania'=>request()->input('Compania'),
            'Modelo'=>request()->input('Modelo'),
            'Anio'=>request()->input('Anio'),
            'Version'=>request()->input('Version'),
            'Color'=>request()->input('Color')
                
]);
          
            Session::flash('message','guardada con exito.');
            return redirect()->route('producto.index');
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
         //dd("hola");
          $producto = new producto;
          $producto = $producto::find($id);
          
        return view('producto.edit', compact('producto','producto'));
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

            'Compania'=> 'required',
            'Modelo'=> 'required',
            'Anio'=> 'required',
            'Version'=> 'required',
            'Color'=> 'required'
          ]);

        $producto = producto::find($id);
        $producto->Compania = $request->get('Compania');
        $producto->Modelo = $request->get('Modelo');
        $producto->Anio = $request->get('Anio');
        $producto->Version = $request->get('Version');
        $producto->Color = $request->get('Color');

         $producto->save();

          
         return redirect()->route('producto.index')->with('success', 'guardado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $producto = producto::find($id);
        $producto->delete(); 
        return redirect()->route('producto.index');
    }
}
