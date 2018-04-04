<?php

function autoload($class)
{
	if (file_exists($file = 'Models'. '/' . strtolower($class) . '.php') OR file_exists($file = 'Controllers'. '/' . strtolower($class) . '.php') OR file_exists($file = 'Views'. '/' . strtolower($class) . '.php') OR file_exists($file = 'Views/Frontend'. '/' . strtolower($class) . '.php') OR file_exists($file = 'Views/Backend'. '/' . strtolower($class) . '.php'))
	{
		require $file;
	}
}

spl_autoload_register('autoload');