<?php

namespace Kodify\DownloaderBundle\Tests\DependencyInjection;

use Kodify\DownloaderBundle\DependencyInjection\KodifyDownloaderExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class KodifyDownloaderExtensionTest extends \PHPUnit_Framework_TestCase
{

    protected $object;

    public function setUp()
    {
        parent::setUp();
        $this->object = new KodifyDownloaderExtension();
    }

    /**
     * @dataProvider getNonValidConfigValues
     */
    public function testNonValidConfigValues($config)
    {
        try{
            $res = $this->object->load(array($config), $container = new ContainerBuilder());
        } catch(Exception $e){
            $this->fail('no exception should be thrown');
        }
        $this->assertTrue(true);
    }

    public function getNonValidConfigValues()
    {
        return array(
            array('arrayWithoutContent' => array()),
            array('completelyNull' => null),
        );
    }
}
