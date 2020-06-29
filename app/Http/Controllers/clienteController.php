<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\cliente;

use Session;

use DB;


class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $cliente = cliente::paginate(10);

        return view('cliente.index',compact('cliente','variable2'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $cliente = new cliente;

        $cliente = $cliente->all();
  
        return view('cliente.create',compact('cliente','cliente'));

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

            'NombreC'=> 'required',
            'ApellidoP'=> 'required',
            'ApellidoM'=> 'required',
            'Domi'=> 'required',
            'Estado'=> 'required',
            'Municipio'=> 'required',
            'Telefono'=> 'required',
           

          ]);

           DB::table('cliente')->updateOrInsert(
            [
            'NombreC'=>request()->input('NombreC'),
            'ApellidoP'=>request()->input('ApellidoP'),
            'ApellidoM'=>request()->input('ApellidoM'),
            'Domi'=>request()->input('Domi'),
            'Estado'=>request()->input('Estado'),
            'Municipio'=>request()->input('Municipio'),
            'Telefono'=>request()->input('Telefono')


                
]);
          
            Session::flash('message','guardada con exito.');
            return redirect()->route('cliente.index');
    
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
          $cliente = new cliente;
          $cliente = $cliente::find($id);

          
          //$cliente = $cliente->all();
          
        return view('cliente.edit', compact('cliente','cliente'));

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

            'NombreC'=> 'required',
            'ApellidoP'=> 'required',
            'ApellidoM'=> 'required',
            'Domi'=> 'required',
            'Estado'=> 'required',
            'Municipio'=> 'required',
            'Telefono'=> 'required'
           
          ]);

        $cliente = cliente::find($id);
        $cliente->NombreC = $request->get('NombreC');
        $cliente->ApellidoP = $request->get('ApellidoP');
        $cliente->ApellidoM = $request->get('ApellidoM');
        $cliente->Domi = $request->get('Domi');
        $cliente->Estado = $request->get('Estado');
        $cliente->Municipio = $request->get('Municipio');
        $cliente->Telefono = $request->get('Telefono');
        
         $cliente->save();

          
         return redirect()->route('cliente.index')->with('success', 'guardado con exito!');
            
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
          $cliente = cliente::find($id);
        $cliente->delete(); 
        return redirect()->route('cliente.index');

    }
}
