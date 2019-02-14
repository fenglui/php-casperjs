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

    // public function testCreateInstance()
    // {
    //     $casper = new Casper(self::$casperBinPath);

    //     $this->assertInstanceOf('Browser\Casper', $casper);
    // }

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

    public function testJdGetDesc() {
        $casper = new Casper(self::$casperBinPath);
        $casper->setDebug(true);
        $casper->setUserAgent('Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.96 Safari/537.36');
        $casper->setAccept('application/x-javascript');
        $skuId = '3547445';
        $url = 'http://cd.jd.com/description/channel?skuId='.$skuId.'&mainSkuId='.$skuId.'&cdn=2';
        $casper->debugPage($url);
        $casper->run();
        $output = $casper->getOutput(); 
        var_dump($output);

        $obj = json_decode($output[0]);

        var_dump($obj);

        print($obj->content);
    }

    // 视频地址 https://c.3.cn/tencent/video_v3?callback=jQuery3160969&vid=1338327&type=1&from=1&appid=24&_=1550123103913
}
