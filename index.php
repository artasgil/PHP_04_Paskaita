<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php ketvirta paskaita</title>
</head>

<body>
    <?php


    //Atvaizduoti skaicius nuo 1 iki 201
    // for($i = 1; $i <=201; $i++) {
    //     echo $i;
    //     echo "<br>";
    // }


    //N-zenkli skaiciu isskaidyti skaitmenimis
    $skaicius = "12345689";
    while ($skaicius != 0) {

        $skaitmuo = $skaicius % 10;
        $skaicius = intval($skaicius / 10);
        echo $skaitmuo;
        echo "<br>";
    }



    //Masyvas
    $masyvas = array("elementas1", "elementas2", "elementas3");
    // echo $masyvas; // Echo $masyvas, masyvui netinkamas.

    var_dump($masyvas);  //Jeigu norime isvesti visa masyva

    //Masyvo elementu isvedimas;
    //Kaip isvesti norima elementa?
    //Kaip isvesti visus masyvo elementus atskirai?

    echo "<br>";
    echo $masyvas[0]; //Jeigu norime isvesti viena elementa


    $masyvoElementas = $masyvas[0];
    echo $masyvoElementas;

    $masyvas[1] = "labas";
    var_dump($masyvas);

    //Kaip isvesti visus masyvo elementus atskirai?
    //Php: masyvas.lenght yra count($masyvas) - grazina skaiciu, kiek elementu yra masyve


    echo "<br>";
    echo "<br>";


    for ($i = 0; $i < count($masyvas); $i++) {

        echo $masyvas[$i];
        echo "<br>";
    }

    echo "<br>";
    echo "<br>";

    // foreach - nebutina count($masyvas) komanda
    foreach ($masyvas as $elementas) {
        echo $elementas;
        echo "<br>";
    }
    //-------------------------------------------------------------------------------------------------
    //Kaippildyti masyva?
    //Javascript - push funkcija galejome panaudoti;
    //PHP sprendimo budas kitoks

    $pildomasMasyvas = array();
    var_dump($pildomasMasyvas);

    //Papildyti 1000 atsitiktiniu skaiciu
    // array_push() komanda

    array_push($pildomasMasyvas, "pirmasSkaicius");   //Prides 1 reiksme i masyva
    array_push($pildomasMasyvas, "pirmasSkaicius", "antrasSkaicius");
    var_dump($pildomasMasyvas);
    echo "<br>";
    echo "<br>";



    $aSkaicius = rand(1, 1000000) * (-1);   // Jei su minusio zenklu padauginam, gaunam neigiama skaiciu random.
    echo $aSkaicius;

    echo "<br>";
    echo "<br>";
    for ($i = 0; $i < 1000; $i++) {
        $aSkaicius = rand(1, 1000000) * (-1);
        array_push($pildomasMasyvas, $aSkaicius);
    }

    var_dump($pildomasMasyvas);


    //Galim isvesti daugiau masyvu su var_dump, pvz var_dump($masyvas1, $masyvas2) ir pan.

    //--------------------------------------------------------------------------------------------------------

    //Masyvu tipai

    //Suskaiciuojamas masyvas:
    $mas1 = array("elementas", "elementas1", "elementas2");

    //Asociatyvus masyvas:
    $asocMasyvas = array(
        "pirmas" => "verte1",
        "antras" => "verte2",
        "trecias" => "verte3"
    );

    //Kaip isvesti norima elementa?
    //Kaip isvesti visus masyvo elementus atskirai?
    echo "<br>";
    echo "<br>";
    var_dump($asocMasyvas);
    echo "<br>";
    echo "<br>";
    echo $asocMasyvas["antras"];

    echo "<br>";
    echo "<br>";
    //Gali pakeisti reiksme
    $asocMasyvas["antras"] = "pakeista reiksme";

    $kintamajam = $asocMasyvas["antras"];


    //Kaip isvesti visus masyvo elementus atskirai?
    foreach ($asocMasyvas as $elementas) {
        echo $elementas;
        echo "<br>";
    }

    echo "<br>";
    array_push($asocMasyvas, "papildytaReiksme");

    echo var_dump($asocMasyvas);
    $asocMasyvas[0];

    //Masyvas pildomas taip, kad elementaas turetu ne eiles numeri, o kazkoki pavadinima?
    $asocMasyvas["ketvirtas"] = "Nauja reiksme, kuri turi pavadinimaa";


    echo "<br>";
    //-------------------------------------------------------------------------------------------------------
    //Sukurti asociatyvu masyva, kuriame kiekvienas elementas turi varda ir reiksme
    //Pvz.: array(
    //     "vardas1" => "reiksme1"
    //     "vardas2" => "reiksme2"
    //      )

    $pradinisMasyvas = array();
    //Reikia ciklo, kuris suktusi 100 kartu

    for ($i = 0; $i < 100; $i++) {
        $pradinisMasyvas["vardas" . ($i + 1)] = "reiksme" . ($i + 1);
        // echo "vardas".($i + 1);
    }

    var_dump($pradinisMasyvas);
    echo "<br>";
    echo "<br>";

    //-------------------------------------------------------------------------------------------------------------

    //Dvimatis masyvas (matrica) arba masyvas masyve

    $dvimatisMasyvas = array(

        array("knyga1", "knyga2", "knyga3"), // 0 lentyna
        array("zaidimas1", "zaidimas2", "ziadimas3"), //1 lentyna
        array("tuscia"), //2 lentyna
        array("rubai1", "rubai2", "rubai3"), //3 lentyna
    );

    //Isvesk viska kas yra 4 lentynoje?
    //Kaip papildyti tuscia lentyna?
    //Kaip isvesti viska, ka turim?
    //Kaip pakeisti lentynoje esanti turini?

    var_dump($dvimatisMasyvas);
    echo "<br>";
    var_dump($dvimatisMasyvas[3]);

    echo "<br>";
    echo "<br>";

    //Kaip isvesti "rubai3"?
    echo $dvimatisMasyvas[3][2];

    //Isvesk viska kas yra 4 lentynoje?

    foreach ($dvimatisMasyvas[3] as $elementas) {
        echo $elementas . "<br>";
    }

    //Isvesk viska kas yra 4 lentynoje? (for ciklas)
    for ($i = 0; $i < count($dvimatisMasyvas[3]); $i++) {
        echo $dvimatisMasyvas[3][$i];
    }


    //Kaip papildyti tuscia lentyna?
    // array_push($dvimatisMasyvas[2], "batai");

    // array_push($dvimatisMasyvas, "batai"); // Susikurs nauja lentyna


    // var_dump($dvimatisMasyvas);



    //Kaip isvesti viska, ka turim?

    echo "<table>";
    for($j = 0; $j< count($dvimatisMasyvas); $j++) {
        echo "<tr>";
        for ($i = 0; $i < count($dvimatisMasyvas[$j]); $i++) {
            echo "<td>";
            echo $dvimatisMasyvas[$j][$i];
            echo "</td>";
        }
    }

    //Rubai3 ideti zaislas1
    $dvimatisMasyvas[3][2] = "zaislas1";
    
    //---------------------------------------------------------------------------------------------------
    ?>
</body>

</html>