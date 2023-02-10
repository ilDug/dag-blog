<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfb50f731367b8fe4a8fe4e3944039e0d
{
    public static $files = array (
        'e39a8b23c42d4e1452234d762b03835a' => __DIR__ . '/..' . '/ramsey/uuid/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'i' => 
        array (
            'ilDug\\' => 6,
        ),
        'S' => 
        array (
            'StellaMaris\\Clock\\' => 18,
            'Simo\\Web\\' => 9,
        ),
        'R' => 
        array (
            'Ramsey\\Uuid\\' => 12,
            'Ramsey\\Collection\\' => 18,
        ),
        'P' => 
        array (
            'Psr\\Clock\\' => 10,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'L' => 
        array (
            'Lcobucci\\JWT\\' => 13,
            'Lcobucci\\Clock\\' => 15,
        ),
        'B' => 
        array (
            'Brick\\Math\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ilDug\\' => 
        array (
            0 => __DIR__ . '/..' . '/ildug/php-utils/src',
        ),
        'StellaMaris\\Clock\\' => 
        array (
            0 => __DIR__ . '/..' . '/stella-maris/clock/src',
        ),
        'Simo\\Web\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib/php',
        ),
        'Ramsey\\Uuid\\' => 
        array (
            0 => __DIR__ . '/..' . '/ramsey/uuid/src',
        ),
        'Ramsey\\Collection\\' => 
        array (
            0 => __DIR__ . '/..' . '/ramsey/collection/src',
        ),
        'Psr\\Clock\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/clock/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Lcobucci\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/lcobucci/jwt/src',
        ),
        'Lcobucci\\Clock\\' => 
        array (
            0 => __DIR__ . '/..' . '/lcobucci/clock/src',
        ),
        'Brick\\Math\\' => 
        array (
            0 => __DIR__ . '/..' . '/brick/math/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfb50f731367b8fe4a8fe4e3944039e0d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfb50f731367b8fe4a8fe4e3944039e0d::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitfb50f731367b8fe4a8fe4e3944039e0d::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitfb50f731367b8fe4a8fe4e3944039e0d::$classMap;

        }, null, ClassLoader::class);
    }
}
