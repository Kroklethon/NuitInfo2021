<?php
include "dico.php";

function craftQuerySauveteur($structuredRequest){
    $mois = null;
    $jour = null;
    $annee = null;

    $listSimpleWord;

    foreach ($structuredRequest as $key => $value) {
        $listSimpleWord[] = $key;
    }

    $i = 0;

    for ($i=0; $i < count($listSimpleWord); $i++) { 

        if(is_numeric($listSimpleWord[$i]))
        {
            $num=$listSimpleWord[$i];
            //potentiellement un jour
            if($num <= 31 && $num >0)
            {
                $date = false;
                
                if($i > 0 && isMonth($listSimpleWord[$i-1]))
                {
                    $date = true;
                    $mois = $listSimpleWord[$i-1];
                }
                if($i < count($listSimpleWord)-1 && isMonth($listSimpleWord[$i+1]))
                {   
                    $date = true;
                    $mois = $listSimpleWord[$i+1];
                }
                if($date)
                {
                    $jour = intval($listSimpleWord[$i]);
                }
            }else if($num > 1500 && $num < 2050)
            {
                $annee = $num;
            }else
            {
                $nb = $num;
            }
             
        }
    }
    $query = "select * from sauveteur s";

    if(isset($jour) || isset($mois) || isset($annee))
    {
        $query .= " where ";
    }
    $haveMoreParam = false;
    if(isset($jour)){
        $query .= "s.jour = $jour";
        $haveMoreParam = true;

    }
    if(isset($mois)){
        if($haveMoreParam) $query .= " and ";
        $query .= "s.mois = $mois";
        $haveMoreParam = true;
    }
    if(isset($annee)){
        if($haveMoreParam) $query .= " and ";
        $query .= "s.annee = $annee";
    }   

    echo "$query";
    return $query;
}

function craftQueryNaufrage($structuredRequest){
    $mois = null;
    $jour = null;
    $annee = null;

    $i=0;
    $listSimpleWord;

    foreach ($structuredRequest as $key => $value) {
        $listSimpleWord[] = $key;
    }

    for ($i=0; $i < count($listSimpleWord); $i++) { 

        if(is_numeric($listSimpleWord[$i]))
        {
            $num=$listSimpleWord[$i];
            //potentiellement un jour
            if($num <= 31 && $num >0)
            {
                $date = false;
                
                if($i > 0 && isMonth($listSimpleWord[$i-1]))
                {
                    $date = true;
                    $mois = $listSimpleWord[$i-1];
                }
                if($i < count($listSimpleWord)-1 && isMonth($listSimpleWord[$i+1]))
                {   
                    $date = true;
                    $mois = $listSimpleWord[$i+1];
                }
                if($date)
                {
                    $jour = intval($listSimpleWord[$i]);
                }
            }else if($num > 1500 && $num < 2050)
            {
                $annee = $num;
            }
        }
    }

    $query = "select * from naufrage n";

    if(isset($jour) || isset($mois) || isset($annee))
    {
        $query .= " where ";
    }
    $haveMoreParam = false;
    if(isset($jour)){
        $query .= "n.jour = $jour";
        $haveMoreParam = true;

    }
    if(isset($mois)){
        if($haveMoreParam) $query .= " and ";
        $query .= "n.mois = $mois";
        $haveMoreParam = true;
    }
    if(isset($annee)){
        if($haveMoreParam) $query .= " and ";
        $query .= "n.annee = $annee";
    }   

    echo "$query";
    return $query;
}


function isMonth($word){

    global $dicoMois;
    if(!strlen($word))
    {
        return false;
    }
    foreach($dicoMois as $val)
    {
        $cost = levenshtein($word,$val);

        $levRatio =  $cost / strlen($word);
        if($levRatio < 0.3){
            return true;
        }
    }
    return false;
}


function getMonth($word){
    global $dicoMois;
    if(!strlen($word))
    {
        return false;
    }
    foreach($dicoMois as $val)
    {
        $cost = levenshtein($word,$val);

        $levRatio =  $cost / strlen($word);
        if($levRatio < 0.3){
            return $val;
        }
    }
    return $dicoMois[0];

}

?>