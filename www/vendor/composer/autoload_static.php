<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite416fc6bcc20e961e9b5a5ccbb9ce43d
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

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static $classMap = array (
        'PHP_Timer' => __DIR__ . '/..' . '/phpunit/php-timer/src/Timer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite416fc6bcc20e961e9b5a5ccbb9ce43d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite416fc6bcc20e961e9b5a5ccbb9ce43d::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite416fc6bcc20e961e9b5a5ccbb9ce43d::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite416fc6bcc20e961e9b5a5ccbb9ce43d::$classMap;

        }, null, ClassLoader::class);
    }
}