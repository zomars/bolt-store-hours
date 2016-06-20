<?php

namespace Bolt\Extensions\Bolt\StoreHours;

use Bolt\Asset\File\JavaScript;
use Bolt\Asset\File\Stylesheet;
use Bolt\Controller\Zone;
use Bolt\Extension\SimpleExtension;
use Bolt\Extensions\Bolt\StoreHours\Field\StoreHoursField;
use StoreHours\StoreHours;

/**
 * An extension to add business hours as a field type within Bolt
 *
 * @author zomars <zomars@me.com>
 */
class StoreHoursExtension extends SimpleExtension
{
    /**
     * {@inheritdoc}
     */
    protected function registerFields()
    {
        return [
            new StoreHoursField(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigPaths()
    {
        return [
            'templates' => ['position' => 'prepend', 'namespace' => 'bolt'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerAssets()
    {
        return [
            // Web assets that will be loaded in the backend
            (new JavaScript('storehours.js'))->setZone(Zone::BACKEND),
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
