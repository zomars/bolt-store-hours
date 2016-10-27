<?php

namespace Bolt\Extension\Zomars\BoltStoreHours\Field;

use Bolt\Field\FieldInterface;

class HoursPicker implements FieldInterface
{

    public function getName()
    {
        return 'storehours';
    }

    public function getTemplate()
    {
        return 'fields/_hourspicker.twig';
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
