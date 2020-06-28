<?php 


$carrera = [1=>'Seleccione una carrera', 2=>'Software', 3=>'Redes', 4=>'Mecatronica', 
5=>'Seguridad informatica', 6=>'Multimedia'];

function GetLastElement($list){
    $countList = count($list);
    $lastElement = $list[$countList - 1];

    return $lastElement;
}

function getCarrera($carreraId){

    return $GLOBALS['carrera'] [$carreraId];

}

function buscarProperty($list, $property, $value){

$filter = [];

foreach($list as $item){

    if($item[$property] == $value){
        array_push($filter, $item);
    }
}

return $filter;

}


function getIndexElement($list, $property, $value){

    $index = 0;
    
    foreach($list as $key => $item){
    
        if($item[$property] == $value){
            $index = $key;
        }
    }
    
    return $index;
    
    }

?>