<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExelExport implements FromView, WithHeadings
{
    protected $datos;

    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    public function view(): View
    {
        return view('generar_ordenes.exel', [
            'datos' => $this->datos
        ]);
    }

    public function headings(): array
    {
        return [
            'CO',
            'Cedula',
            'USD',
            'Valor',
            'Codigo',
            'REC',
            '',
            '',
            'N',
        ];
    }


    
}
