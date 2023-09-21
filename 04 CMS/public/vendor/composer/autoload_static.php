<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite644976c0c86110d36f96d4551e35922
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite644976c0c86110d36f96d4551e35922::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite644976c0c86110d36f96d4551e35922::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite644976c0c86110d36f96d4551e35922::$classMap;

        }, null, ClassLoader::class);
    }
}