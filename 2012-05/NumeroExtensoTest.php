<?php
include('NumeroExtenso.php');

class NumeroExtensoTest extends PHPUnit_Framework_TestCase
{
	protected function setUp() {
    }

    public function test1Real() {
    	$resultado = NumeroExtenso::literal('1');

    	$this->assertEquals('um real', $resultado);
    }

    public function test2Reais() {
    	$resultado = NumeroExtenso::literal('2');

    	$this->assertEquals('dois reais', $resultado);
    }
	public function test7Reais() {
    	$resultado = NumeroExtenso::literal('7');

    	$this->assertEquals('sete reais', $resultado);
    }
	public function testInvalido() {
    	$resultado = NumeroExtenso::literal('-7');
    	$this->assertEquals('valor inválido', $resultado);

		$resultado = NumeroExtenso::literal('0');
    	$this->assertEquals('valor inválido', $resultado);

    	$resultado = NumeroExtenso::literal('abc');
    	$this->assertEquals('valor inválido', $resultado);

    }

	public function test19Reais() {
    	$resultado = NumeroExtenso::literal('19');

    	$this->assertEquals('dezenove reais', $resultado);
    }

	public function test21Reais() {
    	$resultado = NumeroExtenso::literal('21');

    	$this->assertEquals('vinte e um reais', $resultado);
    }

    public function test99Reais() {
    	$resultado = NumeroExtenso::literal('99');

    	$this->assertEquals('noventa e nove reais', $resultado);
    }

    public function test123Reais() {
    	$resultado = NumeroExtenso::literal('123');

    	$this->assertEquals('cento e vinte e três reais', $resultado);
    }
    public function test1000Reais() {
        $resultado = NumeroExtenso::literal('1000');

    	$this->assertEquals('mil reais', $resultado);
    }

    public function test1001Reais() {
        $resultado = NumeroExtenso::literal('1001');

    	$this->assertEquals('um mil e um reais', $resultado);
    }

    public function testCentavos() {
        $resultado = NumeroExtenso::literal('10,30');
        $this->assertEquals('dez reais e trinta centavos', $resultado);

        $resultado = NumeroExtenso::literal('25,43');
        $this->assertEquals('vinte e cinco reais e quarenta e três centavos', $resultado);
    }

    public function testJuncao() {
        $resultado = NumeroExtenso::juncao('');
        $this->assertEquals('', $resultado);

        $resultado = NumeroExtenso::juncao(' ');
        $this->assertEquals(' e  ', $resultado);

        $resultado = NumeroExtenso::juncao('dois');
        $this->assertEquals(' e dois', $resultado);
    }

    public function testExtenso() {
        $resultado = NumeroExtenso::extenso('50');
        $this->assertEquals('cinquenta', $resultado);

        $resultado = NumeroExtenso::extenso('53');
        $this->assertEquals('cinquenta e três', $resultado);

        $resultado = NumeroExtenso::extenso('148');
        $this->assertEquals('cento e quarenta e oito', $resultado);

        $resultado = NumeroExtenso::extenso('1234');
        $this->assertEquals('um mil duzentos e trinta e quatro', $resultado);
    }
}