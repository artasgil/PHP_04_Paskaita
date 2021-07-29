<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skaičiuotuvas su masyvu</title>
</head>

<body>
    <form action="skaiciuotuvas.php" method="get">
        <input type="text" name="aritmetika" />
        <button type="submit" name="patvirtinti">Skaiciuoti</button>
    </form>



    <?php


    //setcookie;

    //musu 
    //masyvas, skaicius, tekstas, objektas, kitas cookie - galim saugoti bet ka

    //Funkcijos

    function skiaciavimoFunkcija($simbolis, $aritmetika)
    {

        $duomenuMasyvas = explode($simbolis, $aritmetika);
        $duomenuMasyvas[2] = $simbolis;
        $pagalbinis = $duomenuMasyvas[2];
        $duomenuMasyvas[2] = $duomenuMasyvas[1];
        $duomenuMasyvas[1] = $pagalbinis;

        if ($simbolis == "+") {
            return $duomenuMasyvas[0] + $duomenuMasyvas[2];
        } else if ($simbolis == "-") {
            return $duomenuMasyvas[0] - $duomenuMasyvas[2];
        } else if ($simbolis == "/") {
            return $duomenuMasyvas[0] / $duomenuMasyvas[2];
        } else if ($simbolis == "*") {
            return $duomenuMasyvas[0] * $duomenuMasyvas[2];
        } else if ($simbolis == "%") {
            return $duomenuMasyvas[0] % $duomenuMasyvas[2];
        }
        return "Veiksmo neimanoma atlikti";
    }


    //1. Užduotis "Skaičiuotuvas"

    // Sukurti skaičiuotuvą. 
    //Skaičiuotuve įvedami du skaičiai ir veiksmas ivedmas i ta pati laukeli
    // Rezultatas išvedamas į div.
    //Papildyti Uzduotis "Skaiciuotuvas" taip, kad rezultatas butu atvaizduojamas tam paciame lange
    //3. Turi buti matoma skaiciavimo istorija. Turime tureti vieta, kur saugom informacija:
        //Duomenu baze;
        //Faile;
        //Cookies - sausainiukai
        //Cookies - tai laikinasis duomenu failas, kuris yra saugomas narsykles aplanke, jis saugo informacija tam tikra laiko tarpa


    if (isset($_GET["patvirtinti"])) {
        // echo "Mygtukas papsaustas";

        if (isset($_GET["aritmetika"]) && !empty($_GET["aritmetika"])) {
            $aritmetika = $_GET["aritmetika"];

            //" " - tarpas yra simbolis
            //Yra funkcija, kuri leistu ieskoti tam tikru simboliu ir juos panaikinti.
            //str_replace - ji randa mums norima simboli, ir ta surasta simboli pakeisti

            $aritmetika = str_replace(" ", "", $aritmetika);
            $rezultatas = 0;
            $duomenuMasyvas = 0;
            //Reikia teksta paversti i masyva 4+5
            // 4+5 => [4, '+', 5]
            // 4-5 => [4, '-', 5]
            // 4*5 => [4, '*', 5]
            // 4/5 => [4, '/', 5]
            // 4%5 => [4, '%', 5]


            //Si komanda suskaido teksta i masyva i vienodas dalis
            // str_split()

            // explode - teksta pavercia i masyva, bet neskaido i lygias dalis
            // o suskaido i masyva pagal delimiter(simboli)


            //Paieska tekstineje eiluteje: ar simblos +, -, /, *
            //strpos - string position - iesko, ar tekstineje eiluteje yra nurodytas kazkoks musu simbolis

            $simbolioPozicija = strpos($aritmetika, "+");
            //jeigu neranda - grazina false;
            //jeigu surastas - grazina simbolio pozicija
            //reikia tikrinti, ne kurioje pozicijoje yra simbolis, o tiesiog ar musu kintamasis nera false



            //Reikia papildomai tikrinti, ar simbolis ir kad simbolis butu viena karta
            //Tokia funkcija yra - substr_count 
            //Skaiciuoja kiek pasikartoja tektsas/simbolis tekstineje eiluteje

        
            if (strpos($aritmetika, "+") != false && substr_count($aritmetika, "+") == 1) {
                // // Kaip pritaikyti skirtingam simboliui
                // // Skaiciai gaunasi su 
                // $duomenuMasyvas = explode("+", $aritmetika);
                // $duomenuMasyvas[2] = "+";

                // //Kintamuju sukeitimas pasitelkiant pagalbini kintamaji
                // $pagalbinis = $duomenuMasyvas[2];
                // $duomenuMasyvas[2] = $duomenuMasyvas[1];
                // $duomenuMasyvas[1] = $pagalbinis;

                // $rezultatas = $duomenuMasyvas[0] + $duomenuMasyvas[2];

                $rezultatas = skiaciavimoFunkcija("+", $aritmetika);
            } else if (strpos($aritmetika, "-") != false && substr_count($aritmetika, "-") == 1) {
                $rezultatas = skiaciavimoFunkcija("-", $aritmetika);
            } else if (strpos($aritmetika, "/") != false && substr_count($aritmetika, "/") == 1) {
                $rezultatas = skiaciavimoFunkcija("/", $aritmetika);
            } else if (strpos($aritmetika, "*") != false && substr_count($aritmetika, "*") == 1) {
                $rezultatas = skiaciavimoFunkcija("*", $aritmetika);
            } else if (strpos($aritmetika, "%") != false && substr_count($aritmetika, "%") == 1) {
                $rezultatas = skiaciavimoFunkcija("%", $aritmetika);
            } else {
                echo $rezultatas = "Veiksmo zenklas neteisingas";
            }
            // echo $rezultatas;


            //Issaugodami informacija i cookie, mes dar turime atsiminti ir jo paties reiksme


            // $cookiesMasyvasAritmetika = array($_COOKIE["aritmetika"]);
            // $cookiesMasyvasRezultatas = array($_COOKIE["rezultatas"]);

//Pirmo skaiciavimo metu jokio sausainiuko issaugoto nera
//2 aritmetika ir rezultatas. Pasiima sena reiksme

            //Veda i klaida
            if(isset($_COOKIE["aritmetika"]) && isset($_COOKIE["rezultatas"])) {
            setcookie("aritmetika",  $_COOKIE["aritmetika"]. " | ".$aritmetika, time() + 3600, "/");
            setcookie("rezultatas",  $_COOKIE["rezultatas"]. " | ".$rezultatas, time() + 3600, "/");
            } else {
                setcookie("aritmetika", $aritmetika, time() + 3600, "/");
                setcookie("rezultatas", $rezultatas, time() + 3600, "/");
            }
            //cookies isvedimas
            // $_COOKIE["aritmetika"];
            // $_COOKIE["rezultatas"];

            if(isset($_COOKIE["aritmetika"]) && isset($_COOKIE["rezultatas"])) {
            // echo "<div>";
            // echo  "Skaiciai is laikinosios atminties: <br>"; 
            // echo $_COOKIE["aritmetika"];
            // echo  $_COOKIE["rezultatas"];

            $aritmetikaMasyvas = explode("|", $_COOKIE["aritmetika"]);
            $rezultatasMasyvas = explode("|", $_COOKIE["rezultatas"]);

            // var_dump($aritmetikaMasyvas);
            // var_dump($rezultatasMasyvas);

            echo "<table>";
            //Ciklo pritaikymas. Mums reikia dirbti is karto su dviem masyvais, taciau jie yra visa laika vienodo ilgio
            for($i = 0; $i <count($aritmetikaMasyvas ); $i++) {
                echo "<tr>";
                    echo "<td>";
                    echo "Veiksmas: " .$aritmetikaMasyvas[$i];
                    echo "</td>";

                    echo "<td>";
                    echo "Rezultatas: " .$rezultatasMasyvas[$i];
                    echo "</td>";
            };
            echo "</table>";




            echo "</div>";
            }
            echo "<div>";
            echo "<h1>Dabartinio skaiciavimo rezultatas:</h1>";
            echo  $aritmetika;
            echo "=";
            echo  $rezultatas;
            echo "</div>";


            //PHP echo komanda jeigu true/false kantamaji - gausime 1 arba tuscia eilute
            //su var_dump - is esmes galime isvedineti bet koki kintamaji, kad patikrintume kokio jisai tipo









            // var_dump($duomenuMasyvas);
        }
    } else {
        echo "Laukelis tuscias";
    }



    // $_GET["patvirtinti"] =    //Gali grazinti true arba false reksmes. jei mygtukas buvo papsaustas - true, jei ne - false.



    ?>
</body>

</html>