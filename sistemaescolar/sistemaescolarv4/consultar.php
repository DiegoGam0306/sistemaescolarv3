<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

$users = DB::table('calificaciones')->get();
echo <<<_TABLE
<table class="table>
<thead>
    <tr>
      <th> #ID </th>
      <th> Calificación </th>
      <th colspan='2'> Operaciones </th>
    </tr>
</thead>
<tbody>
_TABLE;
foreach($users as $fila){
    echo <<<_ROW
    <tr>
        <th>$fila->idcalificacion </th>
        <td>$fila->calificacion </td>
        <td><a class='button' href='delete.php?id={$fila->idcalificacion}'>ELIMINAR </a> </td>
        <td>
            <form action="update.php" method="post">
                <input id="idcalificacion" type="text" name="idcalificacion" value="{$fila->idcalificacion}" hidden>
                <input id="calificacion" type="text" name="calificacion" size="3">
                <input class="button" type="submit" value="ACTUALIZAR">
            </form>
        </td>
    </tr>
    _ROW;
}
echo "<a class='button' href='inicio.html'>REGRESAR</a>";
