<?php
use Browser\Casper;

class FengTest extends PHPUnit_Framework_TestCase
{
    private static $casperBinPath = '/casperjs/bin/';

    public static function setUpBeforeClass()
    {
        if (!file_exists(self::$casperBinPath . 'casperjs')) {
            echo "Hello world!";
            self::$casperBinPath = 'node_modules/casperjs/bin/';
        }
    }

    public function testCreateInstance()
    {
        $casper = new Casper(self::$casperBinPath);

        $this->assertInstanceOf('Browser\Casper', $casper);
    }

    public function testFetchText()
    {
        $casper = new Casper(self::$casperBinPath);
        $casper->setDebug(false);

        $url = 'http://www.tuotuoniu.com';
        $casper->start($url);
        // brand
        $casper->waitForSelector('a.navbar-brand');
        $casper->fetchText('a.navbar-brand');
        
        // h1
        $casper->waitForSelector('h1.display-4');
        $casper->fetchText('h1.display-4');

        $casper->run();
        $output = $casper->getOutput();      

        var_dump($casper);

        var_dump($output);
    }
}
