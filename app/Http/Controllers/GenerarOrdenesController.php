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
        $periodos = DB::select("SELECT * FROM aniolectivo");
        $jornadas = DB::select("SELECT * FROM jornadas");
        
        $ordenes = DB::select("SELECT o.especial,fecha,j.jor_descripcion,o.mes,a.anl_descripcion
            FROM ordenes_generadas o
            JOIN matriculas m ON m.id=o.mat_id
            JOIN jornadas j ON j.id=m.jor_id
            JOIN aniolectivo a ON a.id=m.anl_id
            GROUP BY o.especial,o.fecha,j.jor_descripcion,o.mes,a.anl_descripcion
            ORDER BY o.especial DESC");

        $meses = $this->meses();
        
        return view('generar_ordenes.index')
            ->with('periodos', $periodos)
            ->with('jornadas', $jornadas)
            ->with('meses', $meses)
            ->with('ordenes', $ordenes);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $orden = GeneraOrdenes::where('especial', $id)->firstOrFail();
        return view('botonVer', compact('orden'));
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

    public function meses()
    {
        return [
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

    public function mesesLetras($nmes)
    {
        $result = "";
        switch($nmes) {
            case 1:
                $result = "E";
                break;
            case 2:
                $result = "F";
                break;
            case 3:
                $result = "M";
                break;
            case 4:
                $result = "A";
                break;
            case 5:
                $result = "MY";
                break;
            case 6:
                $result = "J";
                break;
            case 7:
                $result = "JL";
                break;
            case 8:
                $result = "AG";
                break;
            case 9:
                $result = "S";
                break;
            case 10:
                $result = "O";
                break;
            case 11:
                $result = "N";
                break;
            case 12:
                $result = "D";
                break;
        }
        return $result;
    }

    public function generarOrdenes(Request $rq)
    {
        $datos = $rq->all();
        $anl_id = $datos['anl_id'];
        $jor_id = $datos['jor_id'];
        $mes = $datos['mes'];
        $nmes = $this->mesesLetras($mes);
        $campus = "G";
        $validar = DB::select("SELECT * FROM ordenes_generadas o 
            JOIN matriculas m ON m.id=o.mat_id
            WHERE m.anl_id=$anl_id
            AND m.jor_id=$jor_id
            AND o.mes=$mes");

        if(empty($validar)){
            $secuenciales = DB::selectone("SELECT max(especial) as secuencial FROM ordenes_generadas");
            $sec = $secuenciales->secuencial + 1;
            $estudiantes = DB::select("SELECT *, m.id AS mat_id FROM matriculas m 
                JOIN estudiantes e ON m.est_id=e.id
                JOIN jornadas j ON m.jor_id=j.id
                JOIN cursos c ON m.cur_id=c.id
                JOIN especialidades es ON m.esp_id=es.id
                WHERE m.anl_id=$anl_id
                AND m.jor_id=$jor_id
                AND m.mat_estado=1");
            $valor_pagar = 75;
            foreach($estudiantes as $e)
            {
                $input['mat_id'] = $e->mat_id;
                $input['fecha'] = date('Y-m-d'); // Se corrigió el formato de la fecha
                $input['mes'] = $mes;
                $input['codigo'] = $nmes.$campus.$e->jor_obs.$e->cur_obs.$e->esp_obs."-".$e->mat_id;
                $input['valor'] = $valor_pagar;
                $input['fecha_pago'] = NULL;
                $input['tipo'] = NULL;
                $input['estado'] = 0;
                $input['responsable'] = Auth::user()->usu_nombres;
                $input['obs'] = NULL;
                $input['identificador'] = NULL;
                $input['motivo'] = NULL;
                $input['vpagado'] = 0;
                $input['f_acuerdo'] = NULL;
                $input['ac_no'] = NULL;
                $input['especial_code'] = NULL;
                $input['especial'] = $sec;
                $input['numero_documento'] = NULL;
                GeneraOrdenes::create($input);
            }
            return redirect(route('generar_ordenes.index'));
        } else {
            echo "<script>alert('No se puede generar la orden porque ya existe');</script>";
        return redirect(route('generar_ordenes.index'));
        }
    }

    public function eliminaOrden(Request $rq)
    {
        $dt = $rq->all();
        $secuencial = $dt['secuencial']; // Se corrigió el punto y coma faltante al final de la línea
        $ordenes = GeneraOrdenes::where('especial', $secuencial)->delete();
        return redirect(route('generar_ordenes.index'));
    }
}
