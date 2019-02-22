<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\Map;


use Mare06xa\Geckoboard\src\Abstracts\Widget;
use Mare06xa\Geckoboard\src\Classes\Validations\WidgetValidator;

class Map extends Widget
{
    protected $items;
    protected $rules = [
        'points'                           => 'required|array',
        'points.point'                     => 'required|array',
        'points.point.*.city'              => 'array',
        'points.point.*.city.city_name'    => 'sometimes|required|string',
        'points.point.*.city.country_code' => 'sometimes|required|string|size:2',
        'points.point.*.city.region_code'  => 'string|size:2',
        'points.point.*.latitude'          => 'numeric',
        'points.point.*.longitude'         => 'numeric',
        'points.point.*.ip'                => 'ip',
        'points.point.*.host'              => 'url',
        'points.point.*.size'              => 'numeric|between:1,10',
        'points.point.*.color'             => 'string',
    ];

    public function __construct()
    {
        $this->items = new Points();
    }

    /**
     * @return array
     * @throws \Exception
     */
    protected function prepareData(): array
    {
        $widgetData = [
            "points" => [
                "point" => $this->points()->get()
            ]
        ];

        $this->validateData(new WidgetValidator($widgetData, $this->rules));

        return $widgetData;
    }

    public function points()
    {
        return $this->items;
    }
}