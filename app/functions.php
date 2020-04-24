<?

function dz($var, $die = false)
{

	if($_SERVER['REMOTE_ADDR'] == "109.238.80.86")
	{
		$trace = debug_backtrace();
		echo '<div style="display: block; position: relative; background-color: #ffffff; border: 1px solid #000000; padding: 5px; margin: 0;">';
		echo '<div style="display: block; position: relative; color: #808080; font-size: 12px; margin: 0; padding: 0;">from (<b>'.$trace[0]['file'].'</b>) on line <b>'.$trace[0]['line'].'</b></div><pre>';
		if(is_array($var)) print_r($var); else var_dump($var);
		echo '</pre></div>';

		if($die)
		{
			die();
		}
	}
}