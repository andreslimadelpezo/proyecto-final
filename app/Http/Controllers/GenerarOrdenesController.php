<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneraOrdenes;
use DB;


class GenerarOrdenesController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $rq) 
    {
        //

        $periodos=DB::select("SELECT * FROM aniolectivo");
        $jornadas=DB::select("SELECT * FROM jornadas");
        $meses=$this->meses();
        return view('generar_ordenes.index')
        ->with('periodos',$periodos)
        ->with('jornadas',$jornadas)
        ->with('meses',$meses);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function meses(){
        return[

            '1'=>'Enero',
            '2'=>'Febrero',
            '3'=>'Marzo',
            '4'=>'Abril',
            '5'=>'Mayo',
            '6'=>'Junio',
            '7'=>'Julio',
            '8'=>'Agosto',
            '9'=>'Septiembre',
            '10'=>'Octubre',
            '11'=>'Noviembre',
            '12'=>'Diciembre',
        ];
    }

    public function generarOrdenes(Request $rq){
        $datos=$rq->all();
        $anl_id=$datos['anl_id'];
        $jor_id=$datos['jor_id'];
        $mes=$datos['mes'];

        $estudiantes=DB::select("select * from matriculas m 
        join estudiantes e on m.est_id=e.id
        where m.anl_id=$anl_id and m.mat_estado=1 and m.jor_id=$jor_id");
        
        foreach($estudiantes as $e)
        {
            $input['mat_id'];
            $input['fecha'];
            $input['mes'];
            $input['codigo'];
            $input['valor'];
            $input['fecha_pago'];
            $input['tipo'];
            $input['estado'];
            $input['responsable'];
            $input['obs'];
            $input['identificador'];
            $input['motivo'];
            $input['vpagado'];
            $input['f_acuerdo'];
            $input['ac_no'];
            $input['especial_code'];
            $input['especial'];
            $input['numero_documento'];

        }


    }

    public function matricula()
    {
        return $this->belongsTo(Matricula::class,'mat_id','id');
    }
    

}