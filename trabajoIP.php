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
    echo "4. Mostrar temperatura por año y mes\n";
    echo "5. Mostrar temperaturas por año\n";
    echo "6. Mostrar temperaturas por mes\n";
    echo "7. Hallar máximas y mínimas\n";
    echo "8. Mostrar temperaturas de primavera\n";
    echo "9. Mostrar temperaturas de invierno\n";
    echo "10. Mostrar arreglo asociativo\n";
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
 * @param array $meses
 * @param string $mesUsuario
 * @return int
*/

function validarMes($mesUsuario){
    //int $posicion, $col, $cantidadMeses

    $posicion = -1; // Mes no encontrado
    //$cantidadMeses = count($meses);

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


MODULO retornaTemperaturaPorFecha(ARREGLO matrizTemp, ENTERO fila, ENTERO columna ) RETORNO REAL 

RETORNO matrizTemp[fila][columna]

FIN MODULO


E) Mostrar para un determinado año, las temperaturas de todos los meses

(**Devuelve un arreglo con las temperaturas de un año dado*)

MODULO obtenerTemperaturasPorAnio(ARREGLO matrizTemp, ENTERO filaAnio) RETORNO ARREGLO 

ENTERO col
temperaturasPorAnio <- []

PARA col <- 0 HASTA 11 HACER
	temperaturasPorAnio[col] <- matrizTemp[filaAnio][col]
FIN PARA

RETORNO temperaturasPorAnio

FIN MODULO

(**Devuelve un arreglo con las temperaturas de un año*)

MODULO mostrarTemperaturasPorAnio(ARREGLO matrizTemp, ARREGLO anio) RETORNO ∅



FIN MODULO


F) Mostrar para un mes determinado, las temperaturas de todos los años y el promedio.

(**Devuelve un arreglo con las temperaturas de todos los años de un mes dado*)

MODULO obtenerTemperaturasPorMes(ARREGLO matrizTemp, ENTERO columnaMes) RETORNO ARREGLO 

ENTERO fila
temperaturasPorMes <- []

PARA fila <- 0 HASTA 9 HACER
	temperaturasPorMes[fila] <- matrizTemp[fila][columnaMes]
FIN PARA

RETORNO temperaturasPorMes
FIN MODULO

(**Devuelve el promedio de la temperatura de todos los años de un mes dado*)
MODULO promedioDelMes(ARREGLO meses) RETORNO REAL
ENTERO fila, sumatoria, promedio

PARA fila <- 0 HASTA 9 HACER
	sumatoria <- sumatoria +  meses[fila]
FIN PARA

promedio <- sumatoria / 10;

RETORNO promedio

FIN MODULO


G) Hallar las temperaturas máximas y mínimas, indicando año y mes a los que corresponden. Si el máximo o mínimo se repite, mostrar el primero encontrado.

(**Devuelve un arreglo donde en la 1º posición almacena la temperatura máxima, en la 2º y en la 3º posición almacena la fila y columna de la temperatura máxima, respectivamente*)

MODULO hallarTemperaturaMax(ARREGLO matrizTemp, ARREGLO meses, ARREGLO anios) RETORNO ARREGLO??

ENTERO fila, col
ARREGLO maxima[]
maxima[0]  <-  matrizTemp[0][0]
maxima[1] <- 0
maxima[2] <- 0

cantidadAnios <- CANT(anios)
cantidadMeses <- CANT(meses)

PARA fila  <-  0 HASTA (cantidadAnios -1) PASO 1 HACER //Iterar años
	PARA col DESDE 0 HASTA 1(cantidadMeses -1) PASO 1 HACER // Iterar meses
		SI (matrizTemp[fila][col] > tempMaxima ) ENTONCES
maxima[0]  <- matrizTemp[fila][col]		
	maxima[1] <- fila
maxima[2] <- col
FIN SI
	FIN PARA
FIN PARA

RETORNO maxima

FIN MODULO

MODULO hallarTemperaturaMin(ARREGLO matrizTemp, ARREGLO meses, ARREGLO anios) RETORNO ARREGLO??

ENTERO fila, col
ARREGLO minima[]
minima[0]  <-  matrizTemp[0][0]
minima[1] <- 0
minima[2] <- 0

cantidadAnios <- CANT(anios)
cantidadMeses <- CANT(meses)

PARA fila  <-  0 HASTA (cantidadAnios -1) PASO 1 HACER //Iterar años
	PARA col DESDE 0 HASTA 1(cantidadMeses -1) PASO 1 HACER // Iterar meses
		SI (matrizTemp[fila][col] < tempMaxima ) ENTONCES
maxima[0]  <- matrizTemp[fila][col]		
	maxima[1] <- fila
maxima[2] <- col
FIN SI
	FIN PARA
FIN PARA

RETORNO minima

FIN MODULO



H) Crear y mostrar un arreglo bidimensional con los datos de primavera (oct-nov-dic) de todos los años.

(**Devuelve un arreglo con las temperaturas de primavera de todos los años*)

MODULO obtenerTemperaturasDePrimavera(ARREGLO matrizTemp) RETORNO ARREGLO 
meses = ["octubre", "noviembre", "diciembre"]; 
ENTERO fila, col, columna
columna <- 0

temperaturasPrimavera <- []

PARA fila <- 0 HASTA 9 HACER
PARA col <- 9 HASTA 11 HACER
	temperaturasPrimavera[fila][columna] <- matrizTemp[fila][columnaMes]
		columna  <- columna + 1
	FIN PARA
	columna  <- 0
FIN PARA

RETORNO temperaturasPrimavera
FIN MODULO


I) Crear y mostrar un arreglo bidimensional con los datos de los últimos 5 años de invierno (jul-ago-sep).

(**Devuelve un arreglo con las temperaturas de los últimos 5 años de invierno*)

MODULO obtenerTemperaturasInvierno(ARREGLO matrizTemp) RETORNO ARREGLO 

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

FIN MODULO


J) Crear No se muestra? un arreglo asociativo que contenga en la primera posición con clave “completa” la matriz completa de temperaturas, en la segunda posición con clave “primavera” la matriz creada en el inciso h., y en la tercera posición con clave “invierno” la matriz creada en el inciso i.

MODULO arregloAsociativo(ARREGLO matrizTemp, ARREGLO arregloPrimavera, ARREGLO arregloInvierno) RETORNO ARREGLO ) RETORNO ARREGLO

temperaturasPorPeriodo <- [“completo” => matrizTemp[][] , “primavera” => arregloPrimavera[] , “invierno” => arregloInvierno[] ]

RETORNO temperaturasPorPeriodo
FIN MODULO

*/


    

