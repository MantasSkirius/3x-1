<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["pradinisSkaicius"]) && isset($_GET["galinisSkaicius"])) {
    //skaičiu pasirinkimas:
    require "trysXvienasHistograma.php";
    $pradinisSkaicius = $galinisSkaicius = "";
    function testuotiGautusDuomenis($duomuo){
        $duomuo = trim($duomuo);
        $duomuo = stripslashes($duomuo);
        $duomuo = htmlspecialchars($duomuo);
        return $duomuo;
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // echo "GET siuntimas pavyko<br> su GET atsiusta: ";
        $pradinisSkaicius = testuotiGautusDuomenis($_GET["pradinisSkaicius"]);//nuo kokio skaičiaus testuoti
        $galinisSkaicius = testuotiGautusDuomenis($_GET["galinisSkaicius"]);//iki kurio skaičiaus testuoti
        echo "skaiciuoti vertes nuo: ".$pradinisSkaicius." iki: ".$galinisSkaicius."<br>";
    }
    $pirmasSprendimas = new trysXvienasHistograma($pradinisSkaicius, $galinisSkaicius);
    //iš klasės gaunamos vertės: 
    echo "mažiausią iteracijų skaičių pasiekė: ".$pirmasSprendimas->gautiMaziausiaIteracijuSkaiciu()."<br>";
    echo "didžiausią iteracijų skaičių pasiekė: ".$pirmasSprendimas->gautiDidziausiaIteracijuSkaiciu()."<br>";
    echo "didžiausią skaičių pasiekė: ".$pirmasSprendimas->gautiDidziausiaSkaiciu()."<br>";
    $pirmasSprendimas->gautiHistograma();
    $pirmasSprendimas->spausdintiHistograma();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
  </head>
  <body>
	<p>3x + 1 skaičiuotuvas ribose</p>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      Pradinis skaičius: <input type="number" name="pradinisSkaicius" /><br />
      Galutinis skaičius: <input type="number" name="galinisSkaicius" /><br />
      <input type="submit" />
    </form>
  </body>
</html>

 