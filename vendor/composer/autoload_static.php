<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d9a4299e00958a80595f4c9c6227ebc
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DiDom\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DiDom\\' => 
        array (
            0 => __DIR__ . '/..' . '/imangazaliev/didom/src/DiDom',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d9a4299e00958a80595f4c9c6227ebc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d9a4299e00958a80595f4c9c6227ebc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d9a4299e00958a80595f4c9c6227ebc::$classMap;

        }, null, ClassLoader::class);
    }
}
