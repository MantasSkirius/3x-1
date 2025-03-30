<?php
class trysXvienas
{
  protected $pradinisSkaicius = 0;
  protected $galinisSkaicius = 0;
  protected $iteracijuKiekiai = [];

  public function __construct($nuo, $iki)
  {
    if($nuo < $iki and $nuo > 0)
    {
    $this->pradinisSkaicius = $nuo;
    $this->galinisSkaicius = $iki;
    $this->suskaiciuotiVertes($nuo, $iki);
    }else
    {
        throw new InvalidArgumentException("ivestos neleidžiamos reikšmės");
    }
  }
  
  protected function skaiciuotiSeka($testuojamasSkaicius){
        /*
        Ši funkcija atlieka 3x+1 seka vienam skaičiui. Gražina didžiausią pasiektą vertę ir kiek iteracijų užtruko pasiekti vienetą.
        */
        $iteracija = 0;
        $didziausiaVerte = $testuojamasSkaicius;
        while($testuojamasSkaicius != 1){
            if(($testuojamasSkaicius % 2) == 0){
                $testuojamasSkaicius/=2;
            }else{
                $testuojamasSkaicius=$testuojamasSkaicius * 3 + 1;
            }
            if($testuojamasSkaicius>$didziausiaVerte){
                $didziausiaVerte = $testuojamasSkaicius;
            }
            $iteracija++;
        }
        $iteracija;
        return [$didziausiaVerte, $iteracija];
  }


 protected function suskaiciuotiVertes($pradinisSkaicius, $galinisSkaicius){
    for($i = $pradinisSkaicius; $i <= $galinisSkaicius; $i++){
        $this->iteracijuKiekiai[$i]=$this->skaiciuotiSeka($i);
    }
  }

  
  public function gautiDidziausiaIteracijuSkaiciu(){
      $laikinasKintamasis = true;
        foreach($this->iteracijuKiekiai as $key => $value)
        {//naudoju foreach, nes naudoju asociatyvų masyvą(hashmap)
            if($laikinasKintamasis)
            {
                $daugiausiaIteraciju = $key;
                $laikinasKintamasis = false;
            }
            //value[1] yra iteraciju skaicius
           
            if($value[1] > $this->iteracijuKiekiai[$daugiausiaIteraciju][1])
            {
    
                $daugiausiaIteraciju = $key ;
            }
        }
        return $daugiausiaIteraciju;
  }
  
  public function gautiMaziausiaIteracijuSkaiciu()
  {
      $laikinasKintamasis = true;
        foreach($this->iteracijuKiekiai as $key => $value)
        {
            if($laikinasKintamasis)
            {
                $maziausiaIteraciju = $key;
                $laikinasKintamasis = false;
            }
        
        if($value[1] < $this->iteracijuKiekiai[$maziausiaIteraciju][1])
        {
       

            $maziausiaIteraciju = $key;
        }
        }
        return $maziausiaIteraciju;
  }
  public function gautiDidziausiaSkaiciu()
  {
      $laikinasKintamasis = true;
        foreach($this->iteracijuKiekiai as $key => $value)
        {
            if($laikinasKintamasis)
            {
                $didziausiasSkaicius = $key;
                $laikinasKintamasis = false;
            }
           
            if($value[0] > $this->iteracijuKiekiai[$didziausiasSkaicius][0])
            {
                $didziausiasSkaicius = $key;
            }
        }
    return $didziausiasSkaicius;
  }
}
?>