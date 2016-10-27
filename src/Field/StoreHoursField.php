<?php

namespace Bolt\Extension\Zomars\BoltStoreHours\Field;

use Bolt\Storage\Field\FieldInterface;

class StoreHoursField implements FieldInterface
{
    public function getName()
    {
        return 'storehours';
    }

    public function getTemplate()
    {
        return '_storehours.twig';
    }

    public function getStorageType()
    {
        return 'text';
    }

    public function getStorageOptions()
    {
        return ['default' => ''];
    }
}
