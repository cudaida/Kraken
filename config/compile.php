<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Additional Compiled Classes
	|--------------------------------------------------------------------------
	|
	| Here you may specify additional classes to include in the compiled file
	| generated by the `artisan optimize` command. These should be classes
	| that are included on basically every request into the application.
	|
	*/

	'files' => [

		__DIR__.'/../src/Providers/AppServiceProvider.php',
		__DIR__.'/../src/Providers/ArtisanServiceProvider.php',
		__DIR__.'/../src/Providers/ErrorServiceProvider.php',
		__DIR__.'/../src/Providers/FilterServiceProvider.php',
		__DIR__.'/../src/Providers/LogServiceProvider.php',
		__DIR__.'/../src/Providers/RouteServiceProvider.php',

	],

	/*
	|--------------------------------------------------------------------------
	| Compiled File Providers
	|--------------------------------------------------------------------------
	|
	| Here you may list service providers which define a "compiles" function
	| that returns additional files that should be compiled, providing an
	| easy way to get common files from any packages you are utilizing.
	|
	*/

	'providers' => [
		//
	],

];
