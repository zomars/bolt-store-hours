<?php
namespace Bolt\Extensions\Bolt\StoreHours\Tests;

use Bolt\Tests\BoltUnitTest;
use Bolt\Extensions\Bolt\StoreHours\Extension;

/**
 * This test ensures the StoreHours Loads correctly.
 *
 * @author zomars <zomars@me.com>
 **/

class StoreHoursTest extends BoltUnitTest
{
    public function testExtensionLoads()
    {
        $app = $this->getApp();
        $extension = new Extension($app);
        $app['extensions']->register( $extension );
        $this->assertSame($extension, $app['extensions.storehours']);
    }
}
