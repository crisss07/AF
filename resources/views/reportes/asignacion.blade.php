<!doctype html>
<html>

<head>
    <meta charset="iso-8559-1">
    <title>Documento sin título</title>
</head>

<style>
    .cabfoot {
        text-align: center;
        color: rgb(8, 8, 8);
        margin-top: 0;
        margin-bottom: 0;
    }
    
    .titulo {
        text-align: center;
        color: black;
        text-transform: uppercase
    }
    
    table {
        width: 100%;
    }
</style>

<body>
    <header class="cabfoot">
        <img style="align-content: center" src="../public/apps/img/ESCUDO2.jpg" alt="Escudo Nacional de Bolivia" width="100" height="100">
        <p style="margin-top:0; margin-bottom:0;"><em><b>Estado Plurinacional de Bolivia</b></em></p>
        <p style="margin-top:0; margin-bottom:0;"><em><b>Ministerio de Planificacion del Desarrollo</b></em></p>
        <h3>ASIGNACION DE ACTIVOS FIJOS</h3>
    </header>

    
    <section>
        <table style="border: 1">
            <tr>
                <td style="width: 15%">Nombre y Apellido:</td>
                <td style="text-transform: uppercase"><b>{{ $persona[0]->nombre }} {{ $persona[0]->ap_pat }} {{ $persona[0]->ap_mat }}</b></td>
                <td style="width: 15%">Cedula de Identidad:</td>
                <td style="text-transform: uppercase"><b>{{ $persona[0]->ci }}</b></td>
            </tr>
            <tr>
                <td style="width: 15%">Cargo Actual:</td>
                <td style="text-transform: uppercase"><b>{{ $persona[0]->cargo }}</b></td>
                <td style="width: 15%">Piso:</td>
                <td style="text-transform: uppercase"><b>{{ $persona[0]->piso }}</b></td>
            </tr>
            <tr>
                <td style="width: 15%">Observaciones:</td>
                <td style="text-transform: uppercase"><b>Silla</b></td>
                <td style="width: 15%">Fecha:</td>
                <td style="text-transform: uppercase"><b>{{ $persona[0]->fecha }}</b></td>
            </tr>
        </table>
        <br>
        <div>
            <table style="border: 1; background-color: rgb(179, 195, 231)">
                <tr>
                    <td style="width: 15%">Grupo Contable:</td>
                    <td style="text-transform: uppercase"><b>1 -EDIFICACIONES</b></td>
                </tr>
                <tr>
                    <td style="width: 15%">Auxiliar Contable:</td>
                    <td style="text-transform: uppercase"><b>1.1 -EDIFICIO</b></td>
                </tr>
            </table>
        </div>
        <br>

        <div>
            {{ $c = 0 }}
            @foreach($activos as $act)
            <table style="border: 1; background-color: rgb(179, 195, 231); font-size: 12px;">
                <tr>
                    <th>Nro.</th>
                    <th>Descripcion y Caracteristicas</th>
                    <th>Codigo</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
                <tr style="text-align:center; font-size: 10px;">
                    <td>{{ $c = $c+1 }}</td>
                    <td>{{ $act->descripcion }}</td>
                    <td>{{ $act->codigo_actual }}</td>
                    <td>{{ $act->estado }}</td>
                    <td>{{ $act->fecha_compra }}</td>
                </tr>
            </table>
            @endforeach
        </div>
        <hr>
        <h5 style="text-align:right">Total Activos Fijos Asignados: {{ $c }} </h5>
        <div style="background-color: rgb(179, 195, 231); font-size: 15px;">
            <h4>RECOMENDACIONES</h4>
        </div>
        <div>
            <p style="text-align: justify; font-size: 10px;">
                A la firma del Acta, el Servidor Público es responsable de sus Activos Fijos asignados por la unidad, establecidas en D.S. 181/09 (NB-SABS) Art. 116, 146, 147, 148 y 157 y la Ley 1178 y sus Reglamentos. El Servidor Público NO podrá: prestar o transferir
                el bien a otro(s) Servidor(es) Público(s) ni a terceros, dañar o alterar las caracteristicas. En los casos que corresponda, solicitará su mantenimiento (vehículos, equipos especializados, equipos de computación y otros). Cuando sea necesario
                trasladar algunos de estos bienes dentro o fuera de las dependencias de la Institución, previamente, solicitará autorización a la Unidad de Activos Fijos, mediante los formularios respectivos. No podrá ingresar bienes particulares sin
                previa autorización de la D.G.A.A. Adoptará todas las medidas para que estos bienes no están expuestos a situaciones de riesgo como: deterioro, robo, o hurto. Toda vez que el uso inadecuado o negligente de los bienes produzca su pérdida
                o destrucción, inmediatamente, tendrá que restituir a la Institución el valor total de los bienes afectados. Para ser liberado de la responsabilidad, el Servidor Público deberá devolver a la Unidad de Activos Fijos los bienes a su cargo,
                debiendorecabar la conformidad escrita de la Unidad. SANCIÓN: De constatar la transgresión a esta determinación, se aplicarán las medidas que el Reglamento Interno de Personal (R.I.P.) determine, que generarán Responsabilidades establecidas
                en la Ley N° 1178 y sus reglamentos.
            </p>
        </div>
        <div style="display: flex; justify-content: space-between; margin-top:500px:">
            <div style="float: left; text-align: center; width: 300px;">
                <p>RECIBI CONFORME</p>
            </div>
            <div style="float: left; text-align: center; width: 300px;">
                <p>ENTREGUE CONFORME</p>
            </div>
            <div style="float: left; text-align: center; width: 300px;">
                <p>RESPONSABLE DE ACTIVOS FIJOS</p>
            </div>
        </div>
    </section>


    <footer>
        <!-- <hr size="2px" color="gray" />
        <hr size="0.5px" color="gray" /> -->
        <p class="cabfoot" style="font-size: 10px; text-align: center;"><small>www.planificacion.gob.bo<br>Av. Mariscal Santa Cruz Esq. Calle Oruro Edif. #1092, Ex Edificio Comibol, Teléfono Fax: (591-2) 2189000</small></p>

    </footer>
    
    
</body>

</html>