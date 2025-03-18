<?php
class Monedero{
    private float $dinero;
    public static int $numero_monederos = 0;

    public function __construct(float $dinero){
        $this->dinero = $dinero;
        self::$numero_monederos++;
    }

    public function __destruct(){
        self::$numero_monederos--;
    }

    public function meterDinero($dinero){
        $this->dinero += $dinero;
    }

    public function sacarDinero($dinero){
        if($this->dinero - $dinero < 0){
            $this->dinero = 0;
        }else{
            $this->dinero -= $dinero;
        }
    }

    public function __toString(){
        return "Dinero del mondero ".$this->dinero."$<br>";
    }
}