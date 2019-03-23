<?php

namespace Ogilo\Branches;

use Illuminate\Support\ServiceProvider;
use Ogilo\Branches\Console\InstallCommand;
use Ogilo\Branches\Console\UpdateCommand;
/**
* 
*/
class BranchesServiceProvider extends ServiceProvider
{

	protected $commands = [
		// 'Ogilo\Branches\Console\InstallCommand',
		// 'Ogilo\Branches\Console\UpdateCommand',
	];

	function register()
	{
		// print(config('app.name').' in register()');
		$this->app->bind('branches',function($app){
			return new Branch;
		});
	}

	public function boot()
	{
		
		config(['admin.menu.admin-branches'=>'Branches']);

		if ($this->app->runningInConsole()) {
			$this->commands([
					// InstallCommand::class,
					// UpdateCommand::class
				]);
		}
		
		require_once(__DIR__.'/Support/helpers.php');

		$this->loadRoutesFrom(__DIR__.'/../routes/web.php');
		$this->loadRoutesFrom(__DIR__.'/../routes/api.php');
		$this->loadViewsFrom(__DIR__.'/../resources/views','branches');
		$this->loadMigrationsFrom(__DIR__.'/../database/migrations');
		// $this->loadSeedsFrom(__DIR__.'/../database/seeds');

		$this->publishes([
			__DIR__.'/../database/seeds' => database_path('seeds/vendor/admin'),
		], 'branches-database');

		$this->publishes([
			__DIR__.'/../public/css' => public_path('vendor/admin/css'),
			__DIR__.'/../public/js' => public_path('vendor/admin/js'),
			__DIR__.'/../config/branches.php' => config_path(''),
		], 'branches-public');

	}
}