
<table>
    <tbody>
        @foreach($soluciones as $sol)
        <tr>
            <td style="width: 70px; font-size: 8px">Ciclo/Ex.:</td><td style="font-size: 8px; font-weight: bold;">{{ $sol->ciclo }} / {{ $sol->examen }}</td>

            
        @foreach($conf_examen as $conf_exa)
            <td> </td>
            <td> </td>
            <td> </td>
            <td style="width: 70px; font-size: 8px"> Nro </td>
            <?php
            $i = 1;
            while ($i <= $conf_exa->NroPreguntas):
                echo "<td width='3'>". $i."</td>";
                $i++;
            endwhile;
            ?>
        @endforeach


        </tr>
        <tr>
            <td style="width: 70px; font-size: 8px">Mod.:</td><td style="font-size: 8px; font-weight: bold;">{{ $sol->modalidad }}</td>

            
            <td> </td>
            <td> </td>
            <td> </td>
            <td style="width: 70px; font-size: 8px"> Ponderacion </td>
            @foreach($conf_examen_asig as $conf_asig)  
            <?php 
            for ($i = $conf_asig->inicio; $i <= $conf_asig->fin; $i++) {
                echo "<td>". $conf_asig->factor."</td>"; 
            }
            ?>
            @endforeach   

        </tr>
        <tr>
             <td style="width: 70px; font-size: 8px">Grupo:</td><td style="font-size: 8px; font-weight: bold;">{{ $sol->grupo }}</td>

             
            <td> </td>
            <td> </td>
            <td> </td>
            <td style="width: 70px; font-size: 8px"> Rrpta </td>
            @foreach($soluciones as $sol) 
            <?php
             $n = (int)$nro_preguntas->longitudRespuesta;
             $rpta = $sol->solucion;
            for ($i = 0; $i < $n; $i += 1) {                
                $letra = $rpta[$i];
                echo "<td>". $letra."</td>"; 
            }

            ?>
            @endforeach  
        </tr>
        <tr>
             <td style="width: 70px; font-size: 8px">Tema:</td><td style="font-size: 8px; font-weight: bold;">{{ $sol->tema }}</td>
        </tr>
        <tr>
            <td style="width: 70px; font-size: 8px">SOLUCION</td>
        </tr>
        @endforeach
    </tbody>
</table>

<table>

    <tbody>
        @foreach($datos as $dato)
        <tr>
            <td style="width: 70px; font-size: 8px">Ciclo/Ex.:</td><td style="font-size: 8px; font-weight: bold;"> {{ $dato->ciclo }} / {{ $dato->examen }}</td>

            
            <td style="width: 70px; font-size: 8px">Tema:</td><td style="font-size: 8px; font-weight: bold;"> {{ $dato->tema }}</td>
                <?php
                $n = (int)$nro_preguntas->longitudRespuesta;
                $rpta = $dato->respuestas;
                for ($i = 0; $i < $n; $i += 1) {                
                    $letra = $rpta[$i];
                    echo "<td>". $letra."</td>"; 
                }
                ?>

        </tr>
        <tr>
            <td style="width: 70px; font-size: 8px">Mod.:</td><td style="font-size: 8px; font-weight: bold;"> {{ $dato->modalidad }}</td>
            <td style="width: 70px; font-size: 8px">PuntajeObtenido</td>
            <td></td>
            <td>'SI(H8=H5;(1*10)*H4;SI(H8="";(1*2)*H4;0))</td>
        </tr>
        <tr>
             <td style="width: 70px; font-size: 8px">DNI/Nombre:</td><td style="font-size: 8px; font-weight: bold;"> {{ $dato->alumno }} - {{ $dato->nombre }}</td>
        </tr>
        <tr>
             <td style="width: 70px; font-size: 8px">Carr./Grupo:</td><td style="font-size: 8px; font-weight: bold;"> {{ $dato->carrera }} - {{ $dato->grupo }}</td>
        </tr>
        <tr>
             <td style="width: 70px; font-size: 8px">Pos./Ident.:</td><td style="font-size: 8px; font-weight: bold;"> {{ $dato->orden }}-{{ $dato->identificacion }}</td>
        </tr>
        <tr>
             <td style="width: 70px; font-size: 8px">Pos/Resp.:</td><td style="font-size: 8px; font-weight: bold;"> {{ $dato->orden_respuestas }}-{{ $dato->identificacion_respuestas }}</td>
        </tr>
        <tr>
         
        </tr>
        @endforeach

    </tbody>
</table>
