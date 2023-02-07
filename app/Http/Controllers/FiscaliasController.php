<?php

namespace App\Http\Controllers;

use App\Models\Fiscalias;
use Illuminate\Http\Request;

class FiscaliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['t_fiscalias']=Fiscalias::paginate(20);

        return view('fiscalias.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fiscalias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosFiscalias = request()->except('_token');
        Fiscalias::insert($datosFiscalias);
        return redirect()->action([FiscaliasController::class, 'index']);



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
        //
        $fiscalias = Fiscalias::findOrFail($id);
        return view('fiscalias.edit', ['t_fiscalias' => $fiscalias]); 

        //$profesor = Profesor::findOrFail($id);
        //return view('profesores.editar', ['profesor' => $profesor]);
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
        //
        $fiscalias = Fiscalias::findOrFail($id);
        $fiscalias->departamento = $request->departamento;
        $fiscalias->denominacion = $request->denominacion;
        $fiscalias->save();
        return redirect()->action([FiscaliasController::class, 'index']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
            $fiscalias = Fiscalias::findOrFail($id);
            $fiscalias->delete();
            
            return redirect()->action([FiscaliasController::class, 'index']);
            
        }
        
    
}
