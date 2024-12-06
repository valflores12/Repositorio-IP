<?php
/* PROGRAMA PRINCIPAL*/
/* Int $num*/

/*$num = 12;

echo "El valor es ". $num ;

echo "Ingrese un nuevo valor"; 
$num = trim(fgets(STDIN));

echo "El valor es ". $num ;*/

//mostrarMenu();
$meses = ["ene", "feb", "mar", "abr", "may", "jun", "jul", "ago", "sep", "oct", "nov", "dic"]; 

$anios = [2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023];

$matrizTemperatura = cargaManual($meses, $anios);

mostrarTemperaturas($matrizTemperatura, $meses, $anios);

//$pos = validarAnio($anios, 2018);
//echo $pos;

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/


/**
 * Muestra el menú de opciones 
 *
 */
function mostrarMenu(){
    echo "1. Carga automática de temperaturas\n";
    echo "2. Carga manual de temperaturas\n";
    echo "3. Mostrar todas las temperaturas\n";
    echo "4. Mostrar temperatura dado un año y un mes\n";
    echo "5. Mostrar las temperaturas dado un año\n";
    echo "6. Mostrar las temperaturas de todos los años, dado un mes y mostrar el promedio\n";
    echo "7. Hallar temperaturas máxima y mínima, mostrando el año y el mes\n";
    echo "8. Mostrar las temperaturas de primavera (oct-nov-dic) de todos los años\n";
    echo "9. Mostrar las temperaturas de invierno (jul-ago-sep) de los últimos 5 años\n";
    echo "10. Mostrar arreglo asociativo (completa - primavera - invierno)\n";
    echo "0. Salir.\n";
} 

/**
 * carga automática de la matriz de temperaturas
 * 
 * @return array
 */
function cargaAutomatica(){
    //$matrizTemperatura = [];    // Se dejan así con comentarios??????

    $matrizTemperatura[0] = [30, 28, 26, 22, 18, 12, 10, 14, 17, 20, 25, 29];
    $matrizTemperatura[1] = [33, 30, 27, 22, 19, 13, 11, 15, 18, 21, 26, 31];
    $matrizTemperatura[2] = [34, 32, 29, 21, 18, 14, 12, 16, 18, 21, 27, 32];
    $matrizTemperatura[3] = [33, 31, 28, 22, 18, 13, 11, 14, 17, 22, 26, 31];
    $matrizTemperatura[4] = [32, 30, 28, 22, 17, 12, 9, 13, 16, 20, 24, 30];
    $matrizTemperatura[5] = [32, 30, 27, 23, 19, 14, 12, 11, 17, 23, 25, 29];
    $matrizTemperatura[6] = [31, 29, 28, 21, 19, 13, 10, 12, 16, 22, 27, 29];
    $matrizTemperatura[7] = [30, 28, 26, 20, 16, 12, 11, 13, 17, 21, 28, 30];
    $matrizTemperatura[8] = [31, 29, 27, 21, 17, 12, 11, 15, 18, 22, 26, 30];
    $matrizTemperatura[9] = [32, 30, 27, 20, 16, 13, 13, 15, 19, 23, 28, 31];

    return $matrizTemperatura;
}


/**
 * carga manual de la matriz de temperaturas
 * @param array $meses
 * @param array $anios 
 * @return array
 **/
function cargaManual($meses, $anios ) {
    //int $fila, $col, $cantidadAnios;
    //array $matrizTemperatura;

    $matrizTemperatura = []; //verrrr
    $cantidadAnios = count($anios);
    $cantidadMeses = count($meses);

    for ($fila = 0; $fila < ($cantidadAnios); $fila++ ){
        for ($col = 0; $col  < $cantidadMeses; $col++ ) {
            echo "Ingrese el valor de la temperatura del año ". $anios[$fila] . " y mes ". $meses[$col].  " :";
		    $matrizTemperatura[$fila][$col] = trim(fgets(STDIN));
              //debo controlar que sea un ingreso valido? is_float()
        }
    }
         
    return $matrizTemperatura;
}


/**
 * Mostrar la matriz de temperaturas por filas y columnas
 * @param array $matrizTemp
 * @param array $meses
 * @param array $anios 
*/

/*function mostrarTemperaturas($matrizTemp, $meses, $anios){
    //int $fila, $col, $cantidadAnios, $cantidadMeses;

    $cantidadAnios = count($anios);
    $cantidadMeses = count($meses);

    for ($fila = 0; $fila < ($cantidadAnios -1); $fila++){
        for ($col = 0; $col < ($cantidadMeses -1); $col++) {
		    echo "El valor de la temperatura del año:  ". $anios[$fila] . " y mes: ". $meses[$col]. " es: ". $matrizTemp[$fila][$col]. "\n";
        }    
    }
	    
}*/
function mostrarTemperaturas($matrizTemp, $meses, $anios){
    //int $fila, $col, $cantidadAnios, $cantidadMeses, $i;

    $cantidadAnios = count($anios);
    $cantidadMeses = count($meses);

    echo "Año ";
    for ($i = 0; $i < ($cantidadMeses); $i++) {
        echo "  ". $meses[$i]." ";
    }
    echo "\n";
    for ($fila = 0; $fila < ($cantidadAnios); $fila++){
        echo $anios[$fila]."|";    
        //echo "\n";
        for ($col = 0; $col < ($cantidadMeses); $col++) {
            
		    echo "  ".$matrizTemp[$fila][$col]. " |";
        }    
        
    echo "\n";
    }
	    
}

/**
 * Valida un año ingresado por el usuario retornando su posición, en caso que no sea válido retorna -1
 * @param array $anios
 * @param int $anioUsuario 
 * @return int
*/

function validarAnio($anios, $anioUsuario) {
    //int $fila, $posicion, $cantidadAnios 

    $posicion = -1; // Año no encontrado
    $cantidadAnios = count($anios);

    for($fila = 0; $fila < ($cantidadAnios - 1); $fila++){
        if ($anios[$fila] == $anioUsuario){
            $posicion  = $fila;  // Retorna el índice del año
        } 
    }

 return $posicion;
}

/**
 * Valida un mes ingresado por el usuario retornando su posición, en caso que no sea válido retorna -1
 * @param int $mesUsuario
 * @return int
*/

function validarMes($mesUsuario){
    //int $posicion

    $posicion = -1; // Mes no encontrado

    if($mesUsuario >= 1 && $mesUsuario <= 12){
        $posicion = $mesUsuario - 1;
    }
    return $posicion;
}


/*
 * Valida un mes ingresado por el usuario retornando su posición, en caso que no sea válido retorna -1
 * @param array $meses
 * @param string $mesUsuario
 * @return int


function validarMes($meses, $mesUsuario){
    //int $posicion, $col, $cantidadMeses

    $posicion = -1; // Mes no encontrado
    $cantidadMeses = count($meses);

    for ($col = 0; $col < $cantidadMeses; $col++){
        if ($meses[$col] == $mesUsuario){
            $posicion  = $col;  // Retorna el índice del mes
        }
    }
    return $posicion;
}*/


/**
 * Valida un año ingresado por el usuario retornando su posición, en caso que no sea válido retorna -1
 * @param array $anios
 * @return int
*/

function solicitarAnioValido($anios){
    //int $anioIngresado, $indice

    do{
        echo "Ingrese un año válido\n"; //Debería decir el rango?
        $anioIngresado = trim(fgets(STDIN)); // VER SOLICITAR
        $indice = validarAnio($anios, $anioIngresado);
	    if ($indice = -1){
            echo "El  año ingresado no es  válido. Intente de nuevo" ;
        } 
    }while($indice >= 0);

return $indice;
}

/*

(**Solicita un mes válido al usuario y devuelve su posición*)
MODULO solicitarMesValido(ARREGLO meses) RETORNO ENTERO
ENTERO indice
STRING mesUsuario

REPETIR
	ESCRIBIR (“Ingrese un mes”) //
LEER mesUsuario
indice <- validarMes(anios, mesUsuario)
	SI (indice = -1) ENTONCES
		ESCRIBIR (“El mes ingresado no es válido. Intente de nuevo”) 
	FIN SI
HASTA QUE indice >= 0

RETORNO indice

FIN MODULO

(**Devuelve la temperatura dado un año y un mes*)


/**
 * Retorna la temperatura del mes y año ingresado por el usuario
 * @param array $matrizTemp
 * @param int $fila, $col
 * @return float
*/
function retornaTemperaturaPorFecha($matrizTemp, $fila, $columna ){
    return $matrizTemp[$fila][$columna];
} 

/**
 * Devuelve un arreglo con las temperaturas de un año dado
 * @param array $matrizTemp
 * @param int $filaAnio
 * @return array
*/

function obtenerTemperaturasPorAnio($matrizTemp, $filaAnio){
    //int $col
    //array temperaturasPorAnio;
    $temperaturasPorAnio <- [];

    for ($col = 0; $col < 12; $col++){
        $temperaturasPorAnio[$col] <- $matrizTemp[$filaAnio][$col];
    }
    return $temperaturasPorAnio;
}


// (**Devuelve un arreglo con las temperaturas de un año*)

/**
 * Devuelve un arreglo con las temperaturas de todos los años de un mes dado
 * @param array $matrizTemp
 * @param int $columnaMes
 * @return array
*/

function obtenerTemperaturasPorMes($matrizTemp, int $columnaMes){
    //int $fila
    //array temperaturasPorMes
    $temperaturasPorMes = [];

    for ($fila = 0; $fila < 10; $fila++){
        $temperaturasPorMes[$fila] = $matrizTemp[$fila][$columnaMes];
    };

    return $temperaturasPorMes;
}

/**
 * Devuelve el promedio de la temperatura de todos los años de un mes dado
 * @param array $tempMes
 * @return float
*/

function promedioDelMes($tempMes){
    //int $fila, $sumatoria, $promedio
    $sumatoria = 0;
    $promedio = 0;

    for ($fila = 0; $fila < 10; $fila++){
        $sumatoria = $sumatoria + $tempMes[$fila];
    }
	$promedio = $sumatoria / 10;

    return $promedio;
}

/**
 * Devuelve un arreglo donde en la 1º posición almacena la temperatura máxima, en la 2º y en la 3º posición almacena la fila y columna de la temperatura máxima, respectivamente
 * @param array matrizTemp
 * @param array $meses
 * @param array $anios
 * @return array
*/

function hallarTemperaturaMax($matrizTemp, $meses, $anios){
    //int $fila, $col
    //array maxima
    $maxima = [];
    $maxima[0] = $matrizTemp[0][0];
    $maxima[1] = 0;
    $maxima[2] = 0;

    $cantidadAnios = count($anios);
    $cantidadMeses = count($meses);

    for ($fila = 0; $fila <$cantidadAnios; $fila++){
        for($col = 0; $col < $cantidadMeses; $col++){
            if ($matrizTemp[$fila][$col] > $maxima[0] ){
                $maxima[0] = $matrizTemp[$fila][$col];
	            $maxima[1] = $fila;
                $maxima[2] = $col;
            } 

        } // Iterar meses
    } //Iterar años
	return $maxima;
}

/**
 * Devuelve un arreglo donde en la 1º posición almacena la temperatura mínima, en la 2º y en la 3º posición almacena la fila y columna de la temperatura máxima, respectivamente
 * @param array matrizTemp
 * @param array $meses
 * @param array $anios
 * @return array
*/

function hallarTemperaturaMin($matrizTemp, $meses, $anios){
    //int $fila, $col
    //array minima

    $minima = [];
    $minima[0] = $matrizTemp[0][0];
    $minima[1] = 0;
    $minima[2] = 0;

    $cantidadAnios = count($anios);
    $cantidadMeses = count($meses);

    for ($fila = 0; $fila <$cantidadAnios; $fila){
        for($col = 0; $col < $cantidadMeses; $col){
            if ($matrizTemp[$fila][$col] < $maxima[0] ){
                $maxima[0] = $matrizTemp[$fila][$col];
	            $maxima[1] = $fila;
                $maxima[2] = $col;
            } 

        } // Iterar meses
    } //Iterar años
	return $minima;
} 

/**
 * Devuelve un arreglo con las temperaturas de primavera  (oct-nov-dic) de todos los años
 * @param array matrizTemp
 * @return array
*/


function obtenerTemperaturasDePrimavera($matrizTemp){
    //int $fila, $col, $columna
    //array $temperaturasPrimavera
   // $meses = ["octubre", "noviembre", "diciembre"]; Este aca no lo uso

    $columna = 0;

    $temperaturasPrimavera <- [];

    for ($fila = 0; $fila < 10; $fila++){
        for ($col = 9; $col < 12; $col++){
            $temperaturasPrimavera[$fila][$columna] = $matrizTemp[$fila][$col];
		    $columna = $columna + 1;
        } 
	    $columna  <- 0;
    }
    return $temperaturasPrimavera;
}

/**
 * Devuelve un arreglo con las temperaturas de los últimos 5 años de invierno (jul-ago-sep).
 * @param array matrizTemp
 * @return array
*/

function obtenerTemperaturasInvierno($matrizTemp){
    ENTERO fila, col, filaIndice, columnaIndice
filaIndice <- 0
columnaIndice <- 0 

temperaturasInvierno <- []

PARA fila <- 5 HASTA 9 HACER
PARA col <- 6 HASTA 8 HACER
		temperaturasInvierno[filaIndice][columnaIndice] <- matrizTemp[fila][col]
columnaIndice <- columnaIndice + 1
	FIN PARA
	columnaIndice <- 0
	filaIndice <- filaIndice + 1
FIN PARA

PARA col <- 0 HASTA 11 HACER
	temperaturasPorAnio[col] <- matrizTemp[filaAnio][col]
FIN PARA

RETORNO temperaturasPorAnio
} 


J) Crear No se muestra? un arreglo asociativo que contenga en la primera posición con clave “completa” la matriz completa de temperaturas, en la segunda posición con clave “primavera” la matriz creada en el inciso h., y en la tercera posición con clave “invierno” la matriz creada en el inciso i.

MODULO arregloAsociativo(ARREGLO matrizTemp, ARREGLO arregloPrimavera, ARREGLO arregloInvierno) RETORNO ARREGLO ) RETORNO ARREGLO

temperaturasPorPeriodo <- [“completo” => matrizTemp[][] , “primavera” => arregloPrimavera[] , “invierno” => arregloInvierno[] ]

RETORNO temperaturasPorPeriodo
FIN MODULO

*/


    

