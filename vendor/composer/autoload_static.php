<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit98521d725cda1ff93233be2b41b76c6c
{
    public static $files = array (
        '9b38cf48e83f5d8f60375221cd213eee' => __DIR__ . '/..' . '/phpstan/phpstan/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Grifart\\NotSerializable\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Grifart\\NotSerializable\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Tester\\Assert' => __DIR__ . '/..' . '/nette/tester/src/Framework/Assert.php',
        'Tester\\AssertException' => __DIR__ . '/..' . '/nette/tester/src/Framework/AssertException.php',
        'Tester\\CodeCoverage\\Collector' => __DIR__ . '/..' . '/nette/tester/src/CodeCoverage/Collector.php',
        'Tester\\CodeCoverage\\Generators\\AbstractGenerator' => __DIR__ . '/..' . '/nette/tester/src/CodeCoverage/Generators/AbstractGenerator.php',
        'Tester\\CodeCoverage\\Generators\\CloverXMLGenerator' => __DIR__ . '/..' . '/nette/tester/src/CodeCoverage/Generators/CloverXMLGenerator.php',
        'Tester\\CodeCoverage\\Generators\\HtmlGenerator' => __DIR__ . '/..' . '/nette/tester/src/CodeCoverage/Generators/HtmlGenerator.php',
        'Tester\\CodeCoverage\\PhpParser' => __DIR__ . '/..' . '/nette/tester/src/CodeCoverage/PhpParser.php',
        'Tester\\DataProvider' => __DIR__ . '/..' . '/nette/tester/src/Framework/DataProvider.php',
        'Tester\\DomQuery' => __DIR__ . '/..' . '/nette/tester/src/Framework/DomQuery.php',
        'Tester\\Dumper' => __DIR__ . '/..' . '/nette/tester/src/Framework/Dumper.php',
        'Tester\\Environment' => __DIR__ . '/..' . '/nette/tester/src/Framework/Environment.php',
        'Tester\\Expect' => __DIR__ . '/..' . '/nette/tester/src/Framework/Expect.php',
        'Tester\\FileMock' => __DIR__ . '/..' . '/nette/tester/src/Framework/FileMock.php',
        'Tester\\FileMutator' => __DIR__ . '/..' . '/nette/tester/src/Framework/FileMutator.php',
        'Tester\\Helpers' => __DIR__ . '/..' . '/nette/tester/src/Framework/Helpers.php',
        'Tester\\Runner\\CliTester' => __DIR__ . '/..' . '/nette/tester/src/Runner/CliTester.php',
        'Tester\\Runner\\CommandLine' => __DIR__ . '/..' . '/nette/tester/src/Runner/CommandLine.php',
        'Tester\\Runner\\Job' => __DIR__ . '/..' . '/nette/tester/src/Runner/Job.php',
        'Tester\\Runner\\OutputHandler' => __DIR__ . '/..' . '/nette/tester/src/Runner/OutputHandler.php',
        'Tester\\Runner\\Output\\ConsolePrinter' => __DIR__ . '/..' . '/nette/tester/src/Runner/Output/ConsolePrinter.php',
        'Tester\\Runner\\Output\\JUnitPrinter' => __DIR__ . '/..' . '/nette/tester/src/Runner/Output/JUnitPrinter.php',
        'Tester\\Runner\\Output\\Logger' => __DIR__ . '/..' . '/nette/tester/src/Runner/Output/Logger.php',
        'Tester\\Runner\\Output\\TapPrinter' => __DIR__ . '/..' . '/nette/tester/src/Runner/Output/TapPrinter.php',
        'Tester\\Runner\\PhpInterpreter' => __DIR__ . '/..' . '/nette/tester/src/Runner/PhpInterpreter.php',
        'Tester\\Runner\\Runner' => __DIR__ . '/..' . '/nette/tester/src/Runner/Runner.php',
        'Tester\\Runner\\Test' => __DIR__ . '/..' . '/nette/tester/src/Runner/Test.php',
        'Tester\\Runner\\TestHandler' => __DIR__ . '/..' . '/nette/tester/src/Runner/TestHandler.php',
        'Tester\\TestCase' => __DIR__ . '/..' . '/nette/tester/src/Framework/TestCase.php',
        'Tester\\TestCaseException' => __DIR__ . '/..' . '/nette/tester/src/Framework/TestCase.php',
        'Tester\\TestCaseSkippedException' => __DIR__ . '/..' . '/nette/tester/src/Framework/TestCase.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit98521d725cda1ff93233be2b41b76c6c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit98521d725cda1ff93233be2b41b76c6c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit98521d725cda1ff93233be2b41b76c6c::$classMap;

        }, null, ClassLoader::class);
    }
}
