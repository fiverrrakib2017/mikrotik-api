<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7deaff3b29ca535986c33b5418ce4c64
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'APP\\Rakib\\MikroTik\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'APP\\Rakib\\MikroTik\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit7deaff3b29ca535986c33b5418ce4c64::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7deaff3b29ca535986c33b5418ce4c64::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7deaff3b29ca535986c33b5418ce4c64::$classMap;

        }, null, ClassLoader::class);
    }
}
