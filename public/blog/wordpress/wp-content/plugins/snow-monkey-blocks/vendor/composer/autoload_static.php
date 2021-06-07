<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6fe8e1eb5e93d5fe9aa0912a59b5e43a
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Snow_Monkey\\Plugin\\Blocks\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Snow_Monkey\\Plugin\\Blocks\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6fe8e1eb5e93d5fe9aa0912a59b5e43a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6fe8e1eb5e93d5fe9aa0912a59b5e43a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6fe8e1eb5e93d5fe9aa0912a59b5e43a::$classMap;

        }, null, ClassLoader::class);
    }
}
