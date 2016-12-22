<?php

namespace Bolt\Extension\Zomars\BoltStoreHours;

use StoreHours\StoreHours;
use Bolt\Extension\SimpleExtension;
use Bolt\Asset\File\JavaScript;
use Bolt\Controller\Zone;

/**
 * BoltStoreHours extension class.
 *
 * @author zomars <zomars@me.com>
 */
class BoltStoreHoursExtension extends SimpleExtension
{
    /**
     * {@inheritdoc}
     */
    protected function registerFields()
    {
        return [
            new Field\HoursPicker(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigPaths()
    {
        return [
            'templates',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerAssets()
    {
        $serializeObjectJs = new JavaScript();
        $serializeObjectJs->setFileName('jquery-serialize-object.js')
            ->setZone(Zone::BACKEND)
        ;
        $storehoursJs = new JavaScript();
        $storehoursJs->setFileName('storehours.js')
            ->setZone(Zone::BACKEND)
            ->setLate(true)
        ;
        return [
            $serializeObjectJs,
            $storehoursJs
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigFunctions()
    {
        return [
            'store_hours_is_open'    => 'storeHoursIsOpenFunction',
            'store_hours_hours_today'    => 'storeHoursHoursTodayFunction'
        ];
    }

    /**
     * Return true is store is in open hours.
     *
     * @return bool
     */
    public function storeHoursIsOpenFunction($hours = array(), $exceptions = array(), $templates = array())
    {
        if (empty($hours)) {
          $formatted_array = array();
        } else {
          $formatted_hours = json_decode($hours, true);

          $formatted_array = array();

          foreach ($formatted_hours as $clave => $valor) {
            $new_array = array($clave => explode(',', $valor));
            $formatted_array = $formatted_array + $new_array;
          }
        }

        $store_hours = new StoreHours($formatted_array, $exceptions, $template);
        return $store_hours->is_open();
    }

    /**
     * Render and return the Twig file templates/special/skippy.twig
     *
     * @return string
     */
    public function storeHoursHoursTodayFunction($hours = array(), $exceptions = array(), $templates = array())
    {
        if (empty($hours)) {
          $formatted_array = array();
        } else {
          $formatted_hours = json_decode($hours, true);

          $formatted_array = array();

          foreach ($formatted_hours as $clave => $valor) {
            $new_array = array($clave => explode(',', $valor));
            $formatted_array = $formatted_array + $new_array;
          }
        }

        $store_hours = new StoreHours($formatted_array, $exceptions, $template);
        return $store_hours->hours_today();
    }
}

namespace Bolt\Extensions\Bolt\StoreHours;
