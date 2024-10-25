<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita4ecb4030feefd9ca6f76a193bb22879
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'sistema\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'sistema\\' => 
        array (
            0 => __DIR__ . '/../..' . '/sistema',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita4ecb4030feefd9ca6f76a193bb22879::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita4ecb4030feefd9ca6f76a193bb22879::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita4ecb4030feefd9ca6f76a193bb22879::$classMap;

        }, null, ClassLoader::class);
    }
}
