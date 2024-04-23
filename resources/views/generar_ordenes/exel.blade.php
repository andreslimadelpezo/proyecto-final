

<table class="table">

    @foreach ($datos as $d)   
        <tr>
            <td>CO</td>
            <td>{{ $d->est_cedula}}</td>
            <td>USD</td>
            <td>{{ $d->valor}}</td>
            <td>REC</td>
            <td></td>
            <td></td>
            <td>{{ $d->codigo}}</td>
            <td>N</td>
        </tr>
    @endforeach
</table>