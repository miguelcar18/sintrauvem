<h4 class="header-title m-t-0 text-center">Carga Familiar</h4>
<table class="table table-striped table-hover table-full-width table-condensed" id="tablaCargaFamiliar">
    <thead>
        <tr>
            <th class="col-sm-*" style="width:40%">Nombre</th>
            <th class="col-sm-*" style="width:20%">Cédula</th>
            <th class="col-sm-*" style="width:10%">Edad</th>
            <th class="col-sm-*" style="width:30%">Relación</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($carga))
        @foreach($carga as $data)
        <tr>
            <td>
                <input type="hidden" name="nombreA[]" id="nombreA[]" value="{{ $data->nombre }}" /> {{ $data->nombre }}
            </td>
            <td>
                <input type="hidden" name="cedulaA[]" id="cedulaA[]" value="{{ $data->cedula }}" /> {{ $data->cedula }}
            </td>
            <td>
                <input type="hidden" name="edadA[]" id="edadA[]" value="{{ $data->edad }}" /> {{ $data->edad }}
            </td>
            <td>
                <input type="hidden" name="relacionA[]" id="relacionA[]" value="{{ $data->relacion }}" />{{ ucfirst($data->relacion) }}
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<br>