<?php


class KudiServiceProvider extends ServiceProvider{


	public function boot(){


		// loading views
		$this->loadViewsFrom(__DIR__.'/../resources/views','package-namespace');


		// publish blade views
		$this->publishes([__DIR__.'/../resources/views'=> resource_path('views/'),],'views');

		// publish javascript files
		$this->publishes([
            __DIR__ . '/../resources/js' => resource_path('/js/'),
        ], 'js');


        // loading routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
	}


	public function register(){
		$this->mergeConfigFrom(__DIR__.'../config/kudi.php','kudi');
	}
}