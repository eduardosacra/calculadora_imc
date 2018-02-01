<?php
/**
 * Created by PhpStorm.
 * User: edusacra
 * Date: 01/02/18
 * Time: 00:03
 */

namespace Tests;


use Model\Imc;

class ImcTest extends \PHPUnit_Framework_TestCase
{

    public function testCalculaImc()
    {
        /**
         * @var Imc
         */
        $imc = new Imc();
        $result = $imc->calculaImc(1.71, 64);

        $this->assertNotEmpty($result);
    }

    public function testCalculaImcAltura0()
    {
        /**
         * @var Imc
         */
        $imc = new Imc();
        $result = $imc->calculaImc(0, 64);

        $this->assertEquals(0, $result);
    }

    public function testCalculaImcRetornoMensagem()
    {
        /**
         * @var Imc
         */
        $imc = new Imc();
        $this->assertEquals('Muito abaixo do peso', $imc->calculaImcText(1.72, 40));
        $this->assertEquals('Abaixo do peso', $imc->calculaImcText(1.72, 53));
        $this->assertEquals('Peso normal', $imc->calculaImcText(1.72, 64));
        $this->assertEquals('Acima do peso', $imc->calculaImcText(1.72, 77));
        $this->assertEquals('Obesidade I', $imc->calculaImcText(1.60, 85));
        $this->assertEquals('Obesidade II (severa)', $imc->calculaImcText(1.85, 129));
        $this->assertEquals('Obesidade III (mórbida)', $imc->calculaImcText(1.40, 85));
        $this->assertEquals('Informe sua Altura e Peso', $imc->calculaImcText(1.40, 0));
        $this->assertEquals('Informe sua Altura e Peso', $imc->calculaImcText(0, 10));
        $this->assertEquals('Informe sua Altura e Peso', $imc->calculaImcText(0, 0));
    }
}
