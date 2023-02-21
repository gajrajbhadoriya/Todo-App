<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit810ea22a0077ac5ee35b2e7aea53165a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit810ea22a0077ac5ee35b2e7aea53165a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit810ea22a0077ac5ee35b2e7aea53165a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit810ea22a0077ac5ee35b2e7aea53165a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
