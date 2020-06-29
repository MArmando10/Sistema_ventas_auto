<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\vendedor;

use Session;

use DB;

class vendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $vendedor = vendedor::paginate(5);

        return view('vendedor.index',compact('vendedor','variable2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $vendedor = new vendedor;

        $vendedor = $vendedor->all();
  
        return view('vendedor.create',compact('vendedor','vendedor'));
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

            'Codigo'=> 'required',
            'Puesto'=> 'required',
            'NombreV'=> 'required',
            'ApellidoPV'=> 'required',
            'ApellidoMV'=> 'required'

          ]);

           DB::table('vendedor')->updateOrInsert(
            [
            'Codigo'=>request()->input('Codigo'),
            'Puesto'=>request()->input('Puesto'),
            'NombreV'=>request()->input('NombreV'),
            'ApellidoPV'=>request()->input('ApellidoPV'),
            'ApellidoMV'=>request()->input('ApellidoMV')
                
]);
          
            Session::flash('message','guardada con exito.');
            return redirect()->route('vendedor.index');
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
         $vendedor = new vendedor;
          $vendedor = $vendedor::find($id);
          
        return view('vendedor.edit', compact('vendedor','vendedor'));
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

            'Codigo'=> 'required',
            'Puesto'=> 'required',
            'NombreV'=> 'required',
            'ApellidoPV'=> 'required',
            'ApellidoMV'=> 'required'
          ]);

        $vendedor = vendedor::find($id);
        $vendedor->Codigo = $request->get('Codigo');
        $vendedor->Puesto = $request->get('Puesto');
        $vendedor->NombreV = $request->get('NombreV');
        $vendedor->ApellidoPV = $request->get('ApellidoPV');
        $vendedor->ApellidoMV = $request->get('ApellidoMV');

         $vendedor->save();

          
         return redirect()->route('vendedor.index')->with('success', 'guardado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendedor = vendedor::find($id);
        $vendedor->delete(); 
        return redirect()->route('vendedor.index');
    }
}
