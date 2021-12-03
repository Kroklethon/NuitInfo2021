<?php
    include "dico.php";
    include "queryCrafter.php";
?>

<div>
    Request = 
    <?php echo $_POST["input"]; ?>
</div>
<div>
    Result filtered : <br>
    <?php
        $structuredRequest = getStructRequest($_POST["input"]);
        $mainTheme = getMainTheme($structuredRequest);
        $query = getQuery($mainTheme,$structuredRequest);
    ?>
</div>


<?php



    function getQuery($mainTheme,$structuredRequest)
    {
        $query;
        switch($mainTheme)
        {
            case "sauveteur":
                $query = craftQuerySauveteur($structuredRequest);
                break;
            case "naufrage":
                $query = craftQueryNaufrage($structuredRequest);
                break;
            case "date":
                $query = craftQueryDate($structuredRequest);
                break;                
        }
    }


    function getMainTheme($themeCost){

        $lev = 20;        
        $theme = "intervation";

        foreach ($themeCost as $key => $value) {
            $levRatio =  $value["cost"] / strlen($value["theme"]);
            
            if($levRatio <= 0.25)
            {
                $theme = $value["theme"];
                echo "<br><br>MAIN THEME : $theme   VALUE : ".$key;
                goto finish;
            }
        }
        finish:
        return $theme;
    }


    function getStructRequest($input){
    
        global $dico;
        $input = strtolower($input);

        $listWord = explode(' ',$input);
        $listWord = rejectBanWord($listWord);
        $theme = findThemes($listWord);


        return $theme;
    }


    function findThemes($listWord)
    {

        global $dicoTheme;


        //Contient pour chaque mot le theme associé
        $wordTheme = array();

        for ($i=0; $i < count($listWord); $i++) { 
            //Chaque mot

            //Le cout le plus bas est par défaut le 1ER element du dico
            $lowestCost = levenshtein(array_keys($dicoTheme)[0],$listWord[$i]) ; 
            $wordTheme[$listWord[$i]] = ["theme"=>$dicoTheme["naufrage"],"cost"=>$lowestCost];

            foreach($dicoTheme as $key => $val)
            {
                //Chaque theme
                //Si le cout est plus bas alors on garde ce thème
                $cost = levenshtein($listWord[$i],$key);
                if($cost < $lowestCost)
                {
                    $lowestCost = $cost;
                    $wordTheme[$listWord[$i]] = ["theme"=>$val,"cost"=>$lowestCost];
                }
            }
        }
    return $wordTheme;
    }


    function rejectBanWord($structuredRequest){
        global $banWords;

        $newTab = array_diff($structuredRequest,$banWords);
        $newTab = array_values($newTab);

        return $newTab;
    }
?>