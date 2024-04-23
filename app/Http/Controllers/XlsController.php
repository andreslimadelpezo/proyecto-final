<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneraOrdenes; // Importa el modelo OrdenGenerada
use App\Exports\ExelExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

class XlsController extends Controller
{
    /**
     * Genera un archivo Excel utilizando la vista generar_ordenes.exel.
     */
    public function generarExcel(Request $request)
    {
        // Realiza la consulta a la base de datos para obtener los datos necesarios
        $datos = DB::table('ordenes_generadas as og')
            ->select('es.est_cedula', 'og.valor', 'og.codigo')
            ->join('matriculas as m', 'og.mat_id', '=', 'm.id')
            ->join('estudiantes as es', 'm.est_id', '=', 'es.id')
            ->where('og.especial', $request->sec)
            ->orderBy('es.est_apellidos')
            ->get();

        // Retorna la descarga del archivo Excel utilizando la clase exportadora ExelExport
        return Excel::download(new ExelExport($datos), 'orden_generada.xlsx');
    }
}

