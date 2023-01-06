<?php

namespace App\Http\Controllers;

use App\Models\MpSiNo;
use Illuminate\Http\Request;

class MpSiNoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request){
      // 
      $idSiNo = $request->query('idResp');
      $siNo = MpSiNo::find($idSiNo);
      return view('si_no.index')->with('sino', $siNo);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $sino = new MpSiNo();
      $sino->afinidad = $request->get('afinidad') == '1' ? 1 : 0;
      $sino->consaguinidad = $request->get('consaguinidad') == '1' ? 1 : 0;
      $sino->id_funcionario = $request->get('id_funcionario');
      $sino->save();
      return redirect('/funcionario/'.$request->get('id_funcionario'));
    }

    /**
     * Display the spesinofied resource.
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
        $si_no = MpSiNo::findOrFail($id);
        return view('si_no.edit', ['t_mp_si_no' => $si_no]); 
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
      $sino = MpSiNo::find($id);
      $sino->afinidad = $request->get('afinidad') == '1' ? 1 : 0;
      $sino->consaguinidad = $request->get('consaguinidad') == '1' ? 1 : 0;
      $sino->update();
      return redirect('/funcionario/'.$request->get('id_funcionario'));
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
    }
}
