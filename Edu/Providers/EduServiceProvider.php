<?php

namespace Modules\Edu\Providers;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Entities\EduSign;
use Modules\Edu\Entities\EduTopic;
use Modules\Edu\Policies\EduTopicPolicy;
use Modules\Edu\Policies\LessonPolicy;
use Modules\Edu\Policies\SignPolicy;

class EduServiceProvider extends AuthServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    protected $policies = [
        //注册 ShopModule 模型的服务提供者为 ShopModulePolicy
        EduTopic::class => EduTopicPolicy::class,
        EduSign::class => SignPolicy::class,
        EduLesson::class => LessonPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('edu.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'edu'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/edu');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath,
        ], 'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/edu';
        }, \Config::get('view.paths')), [$sourcePath]), 'edu');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/edu');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'edu');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'edu');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
