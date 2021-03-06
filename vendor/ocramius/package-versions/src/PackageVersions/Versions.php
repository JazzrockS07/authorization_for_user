<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = 'schoolphp/framework';
    public const VERSIONS          = array (
  'doctrine/annotations' => 'dev-master@d415728ac32e509d61cb873581e13b1fbba778be',
  'doctrine/cache' => '1.10.x-dev@766a5a5c8694166f522c534a6663786b847378e7',
  'doctrine/collections' => '1.7.x-dev@613162ea0b39fb581d4740039353358e275962fe',
  'doctrine/common' => '2.12.x-dev@2053eafdf60c2172ee1373d1b9289ba1db7f1fc6',
  'doctrine/dbal' => '2.11.x-dev@0bb2e66de53a5f0c7e19d789d7de60d07114f36c',
  'doctrine/event-manager' => '1.1.x-dev@c0d087c34cd5c2f86e7b840de9cecfb1e048dd52',
  'doctrine/inflector' => '1.3.x-dev@ec3a55242203ffa6a4b27c58176da97ff0a7aec1',
  'doctrine/instantiator' => 'dev-master@6a1471ddbf2f448b35f3a8e390c903435e6dd5de',
  'doctrine/lexer' => 'dev-master@ec953a1b157db060fc9576a6f6b6b1865a09aac9',
  'doctrine/orm' => '2.7.x-dev@8d67eec812b70b57aeeb135252d723c1dbc7ebec',
  'doctrine/persistence' => '1.4.x-dev@f5cf0d59f5c8e451186f70145da224c269be20c8',
  'doctrine/reflection' => 'dev-master@b699ecc7f2784d1e49924fd9858cf1078db6b0e2',
  'ocramius/package-versions' => '1.4.2@44af6f3a2e2e04f2af46bcb302ad9600cba41c7d',
  'phpmailer/phpmailer' => 'v6.1.5@a8bf068f64a580302026e484ee29511f661b2ad3',
  'psr/container' => 'dev-master@fc1bc363ecf887921e3897c7b1dad3587ae154eb',
  'psr/log' => 'dev-master@0f73288fd15629204f9d42b7055f72dacbe811fc',
  'schoolphp/library' => 'dev-master@3470d2147c2f51226be76406baec5afddbc4efcd',
  'symfony/console' => '4.4.x-dev@10bb3ee3c97308869d53b3e3d03f6ac23ff985f7',
  'symfony/polyfill-mbstring' => 'dev-master@81ffd3a9c6d707be22e3012b827de1c9775fc5ac',
  'symfony/polyfill-php73' => 'dev-master@0f27e9f464ea3da33cbe7ca3bdf4eb66def9d0f7',
  'symfony/service-contracts' => 'v1.1.8@ffc7f5692092df31515df2a5ecf3b7302b3ddacf',
  'schoolphp/framework' => 'dev-master@650428483b8c251a414003f73cd10c4d56eba654',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}
