
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Roboto", sans-serif, Helvetica, sans-serif;
            font-size: 13px;
            padding: 25px;
        }

        .center {
            text-align: center;
        }

        p {
            letter-spacing: 0.1px;
        }

        img {
            vertical-align: middle;
            border: 0;
        }

        section:first-child {
            padding-top: 0;
        }

        section {
            position: relative;
            padding: 24px;
        }

        input[type="radio"], input[type="checkbox"] {
            margin: 4px 0 0;
            line-height: normal;
        }

        input[type="radio"], input[type="checkbox"] {
            box-sizing: border-box;
            padding: 0;
        }

        .row {
            margin-left: -12px;
            margin-right: -12px;
        }

        .row:before, .row:after {
            content: " ";
            display: table;
        }

        .card-body {
            position: relative;
        }

        .card-body:last-child {
            border-radius: 0 0 2px 2px;
        }

        .card-body:before, .card-body:after {
            content: " ";
            display: table;
        }

        .row section {
            margin-bottom: 0;
        }

        .section-body:first-child {
            margin-top: 24px;
        }

        .encabezadoPlanInspeccion {
            height: 100px;
        }

        .encabezadoPlanInspeccion > div {
            padding: 0;
        }

        .letraGris {
            color: #808080;
        }

        .titulo, .datosFormulario {
            height: 100%;
            text-align: center;
        }

        .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
            position: relative;
            min-height: 1px;
            padding-left: 12px;
            padding-right: 12px;
        }

        .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
            float: left;
        }

        .col-xs-1 {
            width: 8.333333333333332%;
        }

        .col-xs-2 {
            width: 16.666666666666664%;
        }

        .col-xs-3 {
            width: 25%;
        }

        .col-xs-4 {
            width: 33.33333333333333%;
        }

        .col-xs-6 {
            width: 50%;
        }

        .col-xs-7 {
            width: 58.333333333333336%;
        }

        .col-xs-8 {
            width: 66.66666666666666%;
        }

        .col-xs-9 {
            width: 75%;
        }

        .col-xs-10 {
            width: 83.33333333333334%;
        }

        .col-xs-11 {
            width: 91.66666666666666%;
        }

        .col-xs-12 {
            width: 100%;
        }

        .col-xs-offset-8 {
            margin-left: 66.66666666666666%;
        }

        .logoFac img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .none-space {
            margin: 0;
            padding: 0;
        }

        h3, h4 {
            font-weight: 500;
        }

        h3, h4 {
            margin-top: 12px;
            margin-bottom: 12px;
        }

        h5 {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        h3 {
            font-size: 20px;
        }

        h4 {
            font-size: 15px;
        }

        .encabezadoPlanInspeccion li {
            list-style: none;
        }

        .caracteristicasFormulario {
            display: flex;
            width: 100%;
        }

        .caracteristicasFormulario li {
            width: 50%;
            border: 1px solid;
            height: 25px;
            font-size: 90%;
        }

        .fecha {
            margin-top: 5px;
            margin-bottom: 15px;
        }

        .gris {
            color: #000;
            font-weight: 900;
        }

        .gris, .blanco {
            background: #DBDBDB;
            font-size: 90%;
        }

        .negro {
            color: #000;
            font-weight: 400 !important;
        }

        .filaFormulario {
            font-weight: 100%;
            padding: 0;
            border: 1px solid #000;
        }

        .firstColDivider {
            border-right: 1px solid #000;
        }

        table {
            width: 100%;
        }

        td {
            padding: 5px 10px;
        }

        table tr td {
            page-break-inside: avoid !important;
        }

        table {
            border-collapse: collapse;
        }

        .table td, .table th {
            border: 1px solid black;
        }

        .table1 td {
            border: inherit;
        }

        table p {
            margin-bottom: 5px;
        }

        .td-1 {
            width: 30%;
        }

        .td-2 {
            width: 70%;
        }

        .td-full {
            width: 100%;
        }

        table li {
            list-style: inherit;
        }

        table h4 {
            font-weight: 900;
        }

        table ul {
            padding-left: 20px;
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .table-small td {
            font-size: 10px;
        }

        .menuTipoInspeccion {
            height: 100%;
            font-size: 100%;
        }

        .menuTipoInspeccion li {
            list-style: none;
            height: 100%;
            font-size: 85%;
        }

        .inputInforme {
            width: 100%;
            font-size: 85%;
            height: 150px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="card-body">
        <!-- <div class="card-body floating-label"> -->
            <div>
                <div id="contentReport">
                    <section>
                        <div class="section-body">
                            <div class="row encabezadoPlanInspeccion">
                                <table class="table">
                                    <tr>
                                        <td style="width: 150px; text-align: center;">
                                            <div class="logoFac">
                                                <img src="img/logo_fac.png">
                                            </div>
                                        </td>
                                        <td style="width: auto;text-align: center;">
                                            <h4>FUERZA AÉREA COLOMBIANA</h4>
                                            <h3>FORMATO PLAN DE INSPECCIÓN</h3>
                                        </td>
                                        <td style="width: 200px;padding: 0;">
                                            <table>
                                                <tr>
                                                    <td>Código:</td>
                                                    <td>IS-DIINS-FR-002</td>
                                                </tr>
                                                <tr>
                                                    <td>Versión</td>
                                                    <td>05</td>
                                                </tr>
                                                <tr>
                                                    <td>Vigencia</td>
                                                    <td>22-04-2022</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-offset-8 fecha">
                                    <div class="col-xs-6 gris" style="padding: 5px;"> FECHA</div>
                                    <div class="col-xs-6 negro" style="padding: 5px;"> {{ $fecha_inicio_inspec }}</div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <table class="table">
                                    <tr>
                                        <td class="gris td-1">UMA / PROCESO / DEPENDENCIA / ASPECTO A INSPECCIONAR</td>
                                        <td class="negro td-2">
                                            <p>{{ $nombre_inspeccion }}</p>
                                            <p>{{ $dependencia }}</p>
                                            <p>{{ $aspecto }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="gris td-1">RESPONSABLE UMA / PROCESO / DEPENDENCIA / ASPECTO A INSPECCIONAR</td>
                                        <td class="negro td-2">
                                            <table class="table1">
                                                <tr>
                                                    <td style="padding-left: 0">{{ $responsable }}</td>
                                                    <td><div class="gris" style="padding: 5px;">CARGO:</div></td>
                                                    <td><div style="padding: 5px;">{{ $cargo_resp }}</div></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="gris td-1">INSPECTOR GENERAL / JEFE OFICINA / REGIONAL INSPECCIÓN Y CONTROL</td>
                                        <td class="negro td-2">{{ $inspector_general }}</td>
                                    </tr>
                                    <tr>
                                        <td class="gris td-1">OBJETIVO DE LA INSPECCIÓN</td>
                                        <td class="negro td-2">{{ $objetivo }}</td>
                                    </tr>
                                    <tr>
                                        <td class="gris td-1">ALCANCE DE LA INSPECCIÓN</td>
                                        <td class="negro td-2">{{ $alcance }}</td>
                                    </tr>
                                    <tr>
                                        <td class="gris td-1">CRITERIO DE LA INSPECCIÓN</td>
                                        <td class="negro td-2">
                                            <h4>EN FORMA GENERAL:</h4>
                                            @foreach ($criterios_general as $item)
                                            <ul>
                                                <li>{{ $item->criterio }}</li>
                                            </ul>
                                            @endforeach
                                            <h4>EN FORMA PARTICULAR:</h4>
                                            @foreach ($criterios_particular as $item)
                                            <?php $c_proceso = explode(' - ', $item->procesos); ?>
                                            <h5><?php echo $c_proceso[0]; ?></h5>
                                            <h5><?php echo $c_proceso[1]; ?></h5>
                                            <ul>
                                                <li>{{ $item->criterio }}</li>
                                            </ul>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="gris td-1">TIPO DE INSPECCIÓN: (Señale con una X el tipo de inspección)</td>
                                        <td class="negro td-2">
                                            <table class="table1">
                                                <tr>
                                                    <td>
                                                        @if ($tipo_inspeccion_id == 17)
                                                        <input type="radio" name="opciones" value="alta" id="arDer" checked> Por Entrega UMA
                                                        @else
                                                        <input type="radio" name="opciones" value="alta" id="arDer"> Por Entrega UMA
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($tipo_inspeccion_id == 19)
                                                        <input type="radio" name="opciones" value="consulta" id="arDer" checked> Por Aspectos Críticos
                                                        @else
                                                        <input type="radio" name="opciones" value="consulta" id="arDer"> Por Aspectos Críticos
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if ($tipo_inspeccion_id == 18)
                                                        <input type="radio" name="opciones" value="baja" id="arIzq" checked> Por Control UMA
                                                        @else
                                                        <input type="radio" name="opciones" value="baja" id="arIzq"> Por Control UMA
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($tipo_inspeccion_id == 20)
                                                        <input type="radio" name="opciones" value="alta" id="arIzq" checked> Por Cumplimiento Normativo
                                                        @else
                                                        <input type="radio" name="opciones" value="alta" id="arIzq"> Por Cumplimiento Normativo
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="gris td-1">INSPECTOR LÍDER / RESPONSABLE DE INSPECCIÓN</td>
                                        <td class="negro td-2">{{ $inspector_lider }}</td>
                                    </tr>
                                    <tr>
                                        <td class="gris td-1">EQUIPO INSPECTOR: (Se debe escribir la totalidad del equipo inspector y la dependencia o aspecto que verificara)</td>
                                        <td class="negro td-2">
                                            @foreach ($equipo_inspector as $item)
                                            <?php $i_proceso = explode(' - ', $item->procesos); ?>
                                            <h5><?php echo $i_proceso[0]; ?></h5>
                                            <h5><?php echo $i_proceso[1]; ?></h5>
                                            <ul>
                                                <li>{{ $item->grado }}</li>
                                            </ul>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="gris td-1">EXPERTOS TÉCNICOS / PROCESO: (Se debe escribir la totalidad de los expertos técnicos y la dependencia o aspecto que verificara)</td>
                                        <td class="negro td-2">
                                            @foreach ($experto_tecnico as $item)
                                            <?php $t_proceso = explode(' - ', $item->procesos); ?>
                                            <h5><?php echo $t_proceso[0]; ?></h5>
                                            <h5><?php echo $t_proceso[1]; ?></h5>
                                            <ul>
                                                <li>{{ $item->grado }}</li>
                                            </ul>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="gris td-1">OBSERVADOR: (Se debe escribir la totalidad de los observadores que practicaran en la inspección)</td>
                                        <td class="negro td-2">
                                            <ul>
                                                @foreach ($observadores as $item)
                                                <li>{{ $item->observador }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="gris td-full" style="text-align: center;">
                                            ACTIVIDADES DE LA INSPECCIÓN
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="td-full" style="padding: 0;">
                                            <table>
                                                <tr>
                                                    <td class="gris center" rowspan="2">REUNIÓN APERTURA</td>
                                                    <td class="gris center">FECHA</td>
                                                    <td class="gris center">HORA</td>
                                                    <td class="gris center" rowspan="2">REUNIÓN DE CIERRE</td>
                                                    <td class="gris center">FECHA</td>
                                                    <td class="gris center">HORA</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">{{ $fecha_inicio }}</td>
                                                    <td class="center">{{ $hora_inicio }}</td>
                                                    <td class="center">{{ $fecha_termino }}</td>
                                                    <td class="center">{{ $hora_inicio }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="td-full" style="padding: 0;">
                                            <table class="table-small">
                                                <tr>
                                                    <td class="gris center">DEPENDENCIA / ASPECTO A INSPECCIONAR</td>
                                                    <td class="gris center">INSPECCIONADO (Responsable de la Dependencia / Aspecto a Inspeccionar)</td>
                                                    <td class="gris center">INSPECTOR / EXPERTO TÉCNICO</td>
                                                    <td class="gris center">FECHA INICIO</td>
                                                    <td class="gris center">HORA INICIO</td>
                                                    <td class="gris center">FECHA DE CIERRE</td>
                                                    <td class="gris center">HORA DE CIERRE</td>
                                                </tr>
                                                @foreach ($actividades as $item)
                                                <tr>
                                                    
                                                    <td>{{ $item->actividades }}</td>
                                                    <td class="center">{{ $item->inspeccionado }}</td>
                                                    <td class="center">{{ $item->inspector }}</td>
                                                    <td class="center">{{ $item->fecha_inicio }}</td>
                                                    <td class="center">{{ $item->hora_inicio }}</td>
                                                    <td class="center">{{ $item->fecha_cierre }}</td>
                                                    <td class="center">{{ $item->hora_final }}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="gris td-full" style="height: 25px;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="gris td-full">OBSERVACIONES</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="td-full">{{ $observaciones }}</td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                            <div class="row">
                                <table class="table">
                                    <tr>
                                        <td style="width: 33.33333333333333%;">
                                            Firma
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="center" style="font-weight: 900;">{{ $inspector_lider }}</div>
                                            <br>
                                            <div class="center" style="font-weight: 900;">INSPECTOR LÍDER</div>
                                            <br>
                                            <br>
                                        </td>
                                        <td style="width: 33.33333333333333%;">
                                            Firma
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="center" style="font-weight: 900;">{{ $inspector_general }}</div>
                                            <br>
                                            <div class="center" style="font-weight: 900;">INSPECTOR GENERAL / JEFE OFICINA REGINAL INSPECCIÓN Y CONTROL</div>
                                            <br>
                                        </td>
                                        <td style="width: 33.33333333333333%;">
                                            Firma
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="center" style="font-weight: 900;">{{ $responsable }}</div>
                                            <br>
                                            <div class="center" style="font-weight: 900;">RESPONSABLE</div>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- </div> -->
    </div>
</body>
</html>