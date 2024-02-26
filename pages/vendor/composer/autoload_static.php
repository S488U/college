<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2a79f701a0c407dd07c74310c9c3c815
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tecnickcom\\Tcpdf\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tecnickcom\\Tcpdf\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2a79f701a0c407dd07c74310c9c3c815::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2a79f701a0c407dd07c74310c9c3c815::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2a79f701a0c407dd07c74310c9c3c815::$classMap;

        }, null, ClassLoader::class);
    }
}