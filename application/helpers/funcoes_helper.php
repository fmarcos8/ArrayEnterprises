<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function limpar($string){
    $table = array(
        '/'=>'', '('=>'', ')'=>'',
    );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
    $string = preg_replace('/[,.;:`´^~\'"]/', null, iconv('UTF-8','ASCII//TRANSLIT',$string));
    $string = strtolower($string);
    $string = str_replace(" ", "-", $string);
    $string = str_replace("---", "-", $string);
    return $string;
}

date_default_timezone_set("America/Sao_Paulo");

function postadoem($string){
    
    $dia_sem= date('w', strtotime($string));

    if($dia_sem == 0){
    $semana = "Domingo";
    }elseif($dia_sem == 1){
    $semana = "Segunda-feira";
    }elseif($dia_sem == 2){
    $semana = "Terça-feira";
    }elseif($dia_sem == 3){
    $semana = "Quarta-feira";
    }elseif($dia_sem == 4){
    $semana = "Quinta-feira";
    }elseif($dia_sem == 5){
    $semana = "Sexta-feira";
    }else{
    $semana = "Sábado";
    }

    $dia= date('d', strtotime($string));

    $mes_num = date('m', strtotime($string));
    switch($mes_num){
        case 01:
            $mes= "Janeiro";
            break;
        case 02:
            $mes= "Fevereiro";
            break;
        case 03:
            $mes= "Março";
            break;
        case 04:
            $mes= "Abril";
            break;
        case 05:
            $mes= "Maio";
            break;
        case 06:
            $mes= "Junho";
            break;
        case 07:
            $mes= "Julho";
            break;
        case '0'+8:
            $mes= "Agosto";
            break;
        case '0'+9:
            $mes= "Setembro";
            break;
        case 10:
            $mes= "Outubro";
            break;
        case 11:
            $mes= "Novembro";
            break;
        case 12:
            $mes= "Dezembro";
            break;
    }

    $ano = date('Y', strtotime($string));
    $hora = date('H:i', strtotime($string));
 
    return $semana.' '.$dia.' de '.$mes.' de '.$ano.'  às '.$hora;
}


