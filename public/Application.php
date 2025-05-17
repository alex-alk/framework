<?php

use Closure;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\Foundation\CachesConfiguration;
use Illuminate\Contracts\Foundation\CachesRoutes;
use Illuminate\Contracts\Foundation\MaintenanceMode as MaintenanceModeContract;
use Illuminate\Contracts\Http\Kernel as HttpKernelContract;
use Illuminate\Events\EventServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Illuminate\Foundation\Events\LocaleUpdated;
use Illuminate\Http\Request;
use Illuminate\Log\LogServiceProvider;
use Illuminate\Routing\RoutingServiceProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Env;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Macroable;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\HttpKernelInterface;

use function Illuminate\Filesystem\join_paths;

class Application extends Container
{

    /**
     * The Laravel framework version.
     *
     * @var string
     */
    const VERSION = '10.48.27';

    /**
     * The base path for the Laravel installation.
     *
     * @var string
     */
    protected $basePath;

    /**
     * Indicates if the application has been bootstrapped before.
     *
     * @var bool
     */
    protected $hasBeenBootstrapped = false;

    /**
     * Indicates if the application has "booted".
     *
     * @var bool
     */
    protected $booted = false;

    /**
     * The array of booting callbacks.
     *
     * @var callable[]
     */
    protected $bootingCallbacks = [];

    /**
     * The array of booted callbacks.
     *
     * @var callable[]
     */
    protected $bootedCallbacks = [];

    /**
     * The array of terminating callbacks.
     *
     * @var callable[]
     */
    protected $terminatingCallbacks = [];

    /**
     * All of the registered service providers.
     *
     * @var \Illuminate\Support\ServiceProvider[]
     */
    protected $serviceProviders = [];

    /**
     * The names of the loaded service providers.
     *
     * @var array
     */
    protected $loadedProviders = [];

    /**
     * The deferred services and their providers.
     *
     * @var array
     */
    protected $deferredServices = [];

    /**
     * The custom bootstrap path defined by the developer.
     *
     * @var string
     */
    protected $bootstrapPath;

    /**
     * The custom application path defined by the developer.
     *
     * @var string
     */
    protected $appPath;

    /**
     * The custom configuration path defined by the developer.
     *
     * @var string
     */
    protected $configPath;

    /**
     * The custom database path defined by the developer.
     *
     * @var string
     */
    protected $databasePath;

    /**
     * The custom language file path defined by the developer.
     *
     * @var string
     */
    protected $langPath;

    /**
     * The custom public / web path defined by the developer.
     *
     * @var string
     */
    protected $publicPath;

    /**
     * The custom storage path defined by the developer.
     *
     * @var string
     */
    protected $storagePath;

    /**
     * The custom environment path defined by the developer.
     *
     * @var string
     */
    protected $environmentPath;

    /**
     * The environment file to load during bootstrapping.
     *
     * @var string
     */
    protected $environmentFile = '.env';

    /**
     * Indicates if the application is running in the console.
     *
     * @var bool|null
     */
    protected $isRunningInConsole;

    /**
     * The application namespace.
     *
     * @var string
     */
    protected $namespace;

    /**
     * The prefixes of absolute cache paths for use during normalization.
     *
     * @var string[]
     */
    protected $absoluteCachePathPrefixes = ['/', '\\'];

    /**
     * Create a new Illuminate application instance.
     *
     * @param  string|null  $basePath
     * @return void
     */
    public function __construct($basePath = null) {}
}
