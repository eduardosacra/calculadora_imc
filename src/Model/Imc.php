<?php

namespace Model;

class Imc {


    /**
     * @param float $altura 1.71 m unidade Metros
     * @param float $peso 64 Kg unidade Kilograma
     * @return float 21.9
     */
    public function calculaImc(float $altura, float $peso)
    {
        if($altura == 0){
            return 0;
        }

        $imc = ($peso / ($altura * $altura));

        $result = round($imc, 2);

        return  $result;
    }

    public function calculaImcText(float $altura, float $peso)
    {
        $imc = $this->calculaImc($altura, $peso);

        $result = $this->avaliaImc($imc);
        
        return $result;
    }

    private function avaliaImc($imc)
    {
        $mensagem = "";
        if ($imc< 17){

            $mensagem = "Muito abaixo do peso";

        }elseif ($imc >= 17 && $imc <= 18.49){

            $mensagem = "Abaixo do peso";

        }elseif ($imc >= 18.5 && $imc <= 24.99){

            $mensagem = "Peso normal";

        }elseif ($imc >= 25 && $imc <= 29.99){

            $mensagem = "Acima do peso";

        }elseif ($imc >= 30 && $imc <= 34.99){

            $mensagem = "Obesidade I";

        }elseif ($imc >= 35 && $imc <= 39.99){

            $mensagem = "Obesidade II (severa)";

        }elseif ($imc >= 40 ){

            $mensagem = "Obesidade III (mórbida)";

        }
        
        return $mensagem;
    }
}