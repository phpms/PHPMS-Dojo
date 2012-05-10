<?php
class NumeroExtenso
{
	public static $irregulares = array(
		1 => 'um', 'dois', 'três', 'quatro',
		'cinco', 'seis', 'sete', 'oito',
		'nove', 'dez', 'onze', 'doze',
		'treze', 'quatorze', 'quinze', 'dezesseis',
		'dezessete', 'dezoito', 'dezenove',
		100 => 'cem',
		1000 => 'mil'
	);

	public static $dezenas = array(
		2 => 'vinte','trinta','quarenta','cinquenta',
		'sessenta', 'setenta', 'oitenta', 'noventa'
	);

	public static $centenas = array(
		1 => 'cento','duzentos','trezentos',
		'quatrocentos','quinhentos','seiscentos',
		'setecentos', 'oitocentos', 'novecentos'
	);

	public static function literal($n)
	{
		if($n <= 0)
			return 'valor inválido';

		$moeda = ' real';

		if($n > 1)
			$moeda = ' reais';

		$int = $n;
		if(strpos($n, ',') !== false)
			list($int, $dec) = explode(',', $n);

		$literal = self::extenso($int) . $moeda;

		if(isset($dec))
			$literal .= ' e ' . self::extenso($dec) . ' centavos';

		return $literal;
	}

	public static function extenso($int)
	{
		$literal = '';

		if(array_key_exists($int, self::$irregulares))
		{
			return self::$irregulares[$int];
		}

		$u = substr($int, -1, 1);
		if($u > 0) {
			$literal = self::$irregulares[$u];
		}

		$d = substr($int, -2, 1);
		if($int > 19 && isset(self::$dezenas[$d])) {
			$literal = self::$dezenas[$d] . self::juncao($literal);
		}

		$c = substr($int, -3, 1);
		if($int > 100 && isset(self::$centenas[$c])) {
			$literal = self::$centenas[$c] . self::juncao($literal);
		}

		if($int > 1000) {
			$m = substr($int, -4, 1);
			$m = intval($int / 1000);

			$juncao = ' ';
			if(empty($c))
				$juncao = ' e ';

			$literal = self::extenso($m) . ' mil' . (empty($literal) ? '' : $juncao . $literal);
		}

		return $literal;
	}

	public static function juncao($corrente)
	{
		return (empty($corrente) ? '' : ' e ' . $corrente);
	}
}