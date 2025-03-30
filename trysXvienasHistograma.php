<?php
define('AUTORIUS', 'Mantas Skirius');
define('KURIMO DATA', '27/3/2025');

require "trysXvienas.php";
class trysXvienasHistograma extends trysXvienas
{
  protected $HistogramosMasyvas = [];
  protected function sudarytiHistograma()
  {
    foreach($this->iteracijuKiekiai as $key => $value)
    {
      if(isset($this->HistogramosMasyvas[$value[1]])){
      $this->HistogramosMasyvas[$value[1]]= $this->HistogramosMasyvas[$value[1]] + 1;
      }else{
      $this->HistogramosMasyvas[$value[1]]=1; 
      }
    }
  }

  public function spausdintiHistograma(){
    if(empty($this->HistogramosMasyvas)){//tikrinama, ar histogramos masyvas nėra tusčias
      $this->sudarytiHistograma();
    }
    echo "<br>dažnis : skačius <br>";
    foreach($this->HistogramosMasyvas as $key => $value)
    {
      echo $value." : ".$key."<br>";
    }
  }

  public function gautiHistograma(){
    if(empty($this->HistogramosMasyvas)){//tikrinama, ar histogramos masyvas nėra tusčias
      $this->sudarytiHistograma();
      return $this->HistogramosMasyvas;
    } else{
      return $this->HistogramosMasyvas;
    }
  }
}

?>