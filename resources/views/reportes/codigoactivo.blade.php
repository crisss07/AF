<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <style>
      .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } 
      .datagrid {font: normal 12px/150% Times New Roman, Times, serif; background: #fff; overflow: hidden; border: 0px solid #8C8C8C; }
      .datagrid table td, 
      .datagrid table th { padding: 3px 3px; }
      .datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #B7B7B7), color-stop(1, #B7B7B7) );background:-moz-linear-gradient( center top, #B7B7B7 5%, #B7B7B7 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#B7B7B7', endColorstr='#B7B7B7');background-color:#B7B7B7; color:#000000; font-size: 10px; font-weight: none; border-left: 1px solid #A3A3A3; text-align: center;} 
      .datagrid table thead th:first-child { border: none; }
      .datagrid table tbody td { color: #000000; border-left: 1px solid #DBDBDB;font-size: 9px;font-weight: normal; text-align: left;}
      .datagrid table tbody td:first-child { border-left: none; }
      .datagrid table tbody tr:last-child td { border-bottom: none; }
      .datagrid table tfoot td div { border-top: 1px solid #8C8C8C;background: #EBEBEB;} 
      .datagrid table tfoot td { padding: 0; font-size: 10px } 
      .datagrid table tfoot td div{ padding: 2px; }

      /** 
          Set the margins of the page to 0, so the footer and the header
          can be of the full height and width !
          **/
      @page {
        margin: 0cm 0cm;
      }

      /** Define now the real margins of every page in the PDF **/
      body {
        margin-top: 5cm;
        margin-left: 0.5cm;
        margin-right: 0.5cm;
        margin-bottom: 2cm;
      }

      /** Define the header rules **/
      header {
        position: fixed;
        top: 1cm;
        left: 0.5cm;
        right: 0.5cm;
        height: 3cm;

        /** Extra personal styles **/
        
        color: black;
        text-align: center;
        line-height: 1.5cm;
      }

      /** Define the footer rules **/
      footer {
        position: fixed; 
        bottom: 0cm; 
        left: 0.5cm; 
        right: 0.5cm;
        height: 2cm;

        /** Extra personal styles **/
        background-color: #FFFFFF;
        color: black;
        text-align: left;
        line-height: 1cm;
      }

      .borderDemo {          
        font: normal 12px/150% Times New Roman, Times, serif;
        text-align: center;
      }
      .borderDemo1 {          
        font: normal 10px/100% Times New Roman, Times, serif;
        text-align: center;
      }
      .borderDemo2 {
        font: normal 12px/100% Times New Roman, Times, serif;
        text-align: right;
      }
      .borderDemo3 {
        font: normal 12px/100% Times New Roman, Times, serif;
        text-align: left;
      }
      .borderDemo4 {          
        font: normal 10px/100% Times New Roman, Times, serif;
        text-align: left;
      }
      .escritura1 {
        font: normal 12px/150% Times New Roman, Times, serif;
        text-align: center;
      }
      .escritura2 {
        font: normal 12px/150% Times New Roman, Times, serif;
        text-align: left;
      }
      .escrituraPie {
        font: normal 12px/150% Times New Roman, Times, serif;
        text-align: center;
      }

      .demoFont {
        font-family: "Times New Roman", Times, serif;
        font-size: 17px;
        letter-spacing: 0px;
        word-spacing: 0px;
        color: #004C72;
        font-weight: 700;
        text-decoration: none;
        font-style: normal;
        font-variant: small-caps;
        text-transform: none;
      }
      .casillaIzquierda1 {
        float: left;
        height: 120px;
        width: 140px;
      }
      .casillaIzquierda2 {
        float: left;
        height: 120px;
        width: 100px;
      }

      .casillaDerecha1 {
        float: right;
        height: 80px;
        width: 100px;
      }
      .casillaDerecha2 {
        float: right;
        height: 80px;
        width: 140px;
      }
      .imgpie {
        display:block;
        margin:auto;
      }

      #footer { position: fixed; left: -38px; bottom: -120px; right: -37px; height: 150px;  }
    </style>
  </head>

  <body>
    <header>
        <div>
            <img class="casillaIzquierda1" src="../public/apps/img/escudo.jpg" alt="">
        </div>
        <div class="casillaIzquierda2">
            <p></p>
        </div>
        
        <div class="casillaDerecha1">
            <div class="borderDemo3"> 
                <p>
                &nbsp;&nbsp;#<br>
                &nbsp;&nbsp;{{ $fecha }} <br>
                &nbsp;&nbsp;Role 
                </p>
            </div>
        </div>
        <div class="casillaDerecha2">
            <div class="borderDemo2">
                <p>
                  Pagina: <br>
                  Fecha de impresion: <br>
                  Responsable de Impresion: 
                </p>
            </div>
        </div>
        
        <div class="borderDemo">
            <h2>
            INVENTARIO ORDENADO POR CODIGO DE ACTIVO <br>
        </div>
        <div class="borderDemo1">
            AL 31 DE DICIEMBRE DEL 2018 <br>
            (Gestión Cerrada)
            </h2>
        </div>
        
        <div>
          <div class="borderDemo4">
          <br><br><br><br>
          <table>
          <tr>
          <td>ENTIDAD :</td>
          <td>0066</td>
          <td width="50px">&nbsp;</td>
          <td>Ministerio de Planificación del Desarrollo</td>
          <td width="50px">&nbsp;</td>
          <td>UNIDAD :</td>
          <td>01</td>
          <td width="50px">&nbsp;</td>
          <td>ADMINISTRACION GENERAL (MPD)</td>
          <td width="200px">&nbsp;</td>
          <td>INDICE UFV :</td>
          <td>&nbsp;</td>
          <td>2.29076</td>
          <td width="30px">&nbsp;</td>
          <td>Bs.</td>
          </tr>
          </table>
          </div>
        </div>
        
    </header>

    <main>
      <div class="datagrid">
        <table>
          <thead>
            <tr>
              <th>CODIGO</th>
              <th>DESCRIPCION</th>
              <th>COSTO HISTORICO</th>
              <th>COSTO MIGRADO</th>
              <th>FECHA MIG- HIST</th>
              <th>COSTO FINAL ACTUALIZADO</th>
              <th>DEPRECIACION GESTION</th>
              <th>DEPRECIACION ACUMULADA TOTAL</th>
              <th>VALOR NETO</th>
              <th>GRUPO CONTABLE</th>
              <th>AUX. DE GRUPO</th>
              <th>OFICINA</th>
              <th>RESPONSABLE</th>
              <th>ID BIEN</th>
            </tr>
          </thead>
          <tbody>
            @foreach($activos as $activo)
            <tr>
              <td>{{ $activo->codigo_actual }}</td>
              <td>{{ $activo->descripcion }}</td>
              <td>data</td>
              <td>data</td>
              <td>data</td>
              <td>data</td>
              <td>data</td>
              <td>data</td>
              <td>data</td>
              <td>data</td>
              <td>data</td>
              <td>data</td>
              <td>data</td>
              <td>data</td>              
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </main>

    <footer>
        <div class="datagrid">
        <table>
          <thead>
            <tr>
              <th>CODIGO</th>
              <th>DESCRIPCION</th>
              <th>COSTO HISTORICO</th>
              <th>COSTO MIGRADO</th>
              <th>FECHA MIG- HIST</th>
              <th>COSTO FINAL ACTUALIZADO</th>
              <th>DEPRECIACION GESTION</th>
              <th>DEPRECIACION ACUMULADA TOTAL</th>
              <th>VALOR NETO</th>
              <th>GRUPO CONTABLE</th>
              <th>AUX. DE GRUPO</th>
              <th>OFICINA</th>
              <th>RESPONSABLE</th>
              <th>ID BIEN</th>
            </tr>
          </thead>          
        </table>
        </div>
      
    </footer>
 
  </body>
</html>