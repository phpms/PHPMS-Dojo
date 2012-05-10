<?php
class NumeroExtenso
{
	public static function literal($n, $escreveReais = true)
	{
		$valor = array(
			0 => '',
			1 => 'um',
			2 => 'dois',
			3 => 'tres',
			'quatro',
			'cinco',
			'seis',
			'sete', 'oito', 'nove', 'dez',
			'onze', 'doze', 'treze', 'quatorze',
			'quinze', 'dezesseis', 'dezessete',
			'dezoito', 'dezenove', 'vinte'
		);

		$dezena = array(
			0 => '',
			1 => '',2=>'vinte','trinta','quarenta','cinquenta',
			'sessenta', 'setenta', 'oitenta', 'noventa'
			);
		$cem = '100';
		$centena = array(
			0 => '',
			1 => 'cento','duzentos','trezentos',
			'quatrocentos','quinhentos','seiscentos',
			'setecentos', 'oitocentos', 'novecentos'
			);
		$mil= 'mil';

		$moeda = ' real';

		if ($n <= 0) {
			return 'valor inválido';
		}

		if($n > 1)
			$moeda = ' reais';

		if($n == 100){
			if($escreveReais)
				return 'cem'.$moeda;
			else
				return 'cem';
		}

		if($n == 1000)
			return 'mil reais';

		if($n <= 20){
			if($escreveReais)
				return $valor[$n] . $moeda ;
			else
				return $valor[$n];
		}

		$d = substr($n,-2,1);
		$u = substr($n,-1,1);
		$literal = '';

		if(!empty($d))
			$literal .= $dezena[$d];

		if(!empty($literal) && !empty($u))
			$literal .= ' e ';

		if(!empty($u))
			$literal .= $valor[$u];

		if ($n > 100) {
			$c = substr($n,-3,1);
			$literal = $centena[$c] . ' e ' . $literal;
		}

		if($n>1000){
				$m = substr($n,-4,1);
				$m = intval($n / 1000);
				$literal= self::literal($m, false)." mil" . $literal;
		}

		return $literal . ($escreveReais ? $moeda : '');
	}
}