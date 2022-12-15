<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6fdb64784359828e2772393b898d0ce0
{
    public static $files = array (
        'e5ca1ea0e46316eb41945a540a9bbdb5' => __DIR__ . '/../..' . '/source/Config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
        'C' => 
        array (
            'CoffeeCode\\DataLayer\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'CoffeeCode\\DataLayer\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/datalayer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6fdb64784359828e2772393b898d0ce0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6fdb64784359828e2772393b898d0ce0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6fdb64784359828e2772393b898d0ce0::$classMap;

        }, null, ClassLoader::class);
    }
}
