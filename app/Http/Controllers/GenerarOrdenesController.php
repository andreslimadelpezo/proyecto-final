<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneraOrdenes;
use DB;
use Auth;


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
        $ordenes=DB::select("SELECT especial,fecha FROM ordenes_generadas GROUP BY especial,fecha");
        $meses=$this->meses();
        return view('generar_ordenes.index')
        ->with('periodos',$periodos)
        ->with('jornadas',$jornadas)
        ->with('meses',$meses)
        ->with('ordenes',$ordenes);

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

    public function mesesLetras($nmes){
     $result=" ";
     $nmes==1?$result="E":"";
     $nmes==2?$result="F":"";
     $nmes==3?$result="M":"";
     $nmes==4?$result="A":"";
     $nmes==5?$result="MY":"";
     $nmes==6?$result="J":"";
     $nmes==7?$result="JL":"";
     $nmes==8?$result="AG":"";
     $nmes==9?$result="S":"";
     $nmes==10?$result="O":"";
     $nmes==11?$result="N":"";
     $nmes==12?$result="D":"";
     return $result;
    }

    public function generarOrdenes(Request $rq){
        $datos=$rq->all();
        $anl_id=$datos['anl_id'];
        $jor_id=$datos['jor_id'];
        $mes=$datos['mes'];
        $nmes=$this->mesesLetras($mes);
        $campus="G";

        $estudiantes=DB::select("SELECT *, m.id AS mat_id FROM matriculas m 
        JOIN estudiantes e ON m.est_id=e.id
        JOIN jornadas j ON m.jor_id=j.id
        JOIN cursos c ON m.cur_id=c.id
        JOIN especialidades es ON m.esp_id=es.id
        WHERE m.anl_id=$anl_id
        AND m.jor_id=$jor_id
        AND m.mat_estado=1 
");
        $valor_pagar=75;
        
        
            foreach($estudiantes as $e)
            {
               

                $input['mat_id']=$e->mat_id; //id de la matricula
                $input['fecha']=date('y-m-d');
                $input['mes']=$mes;
                $input['codigo']=$nmes.$campus.$e->jor_obs.$e->cur_obs.$e->esp_obs." - ".$e->mat_id;   //MGM3IF-MAT_ID
                $input['valor']=$valor_pagar;//
                $input['fecha_pago']=NULL;//da el banco
                $input['tipo']=NULL;
                $input['estado']=0;//0=pendiente;pagado=1
                $input['responsable']=Auth::user()->usu_nombres;//nomrbe del responsable
                $input['obs']=NULL;
                $input['identificador']=NULL;
                $input['motivo']=NULL;
                $input['vpagado']=0;//da el banco
                $input['f_acuerdo']=NULL;
                $input['ac_no']=NULL;
                $input['especial_code']=NULL;
                $input['especial']=1;//
                $input['numero_documento']=NULL;//numero de edocumento que pago el usuario
                GeneraOrdenes::create($input);
                

            }


    }

    public function matricula()
    {
        return $this->belongsTo(Matricula::class,'mat_id','id');
    }
    

}