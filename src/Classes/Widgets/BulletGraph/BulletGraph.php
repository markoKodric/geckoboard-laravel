<?php

namespace Mare06xa\Geckoboard\Classes\Widgets\BulletGraph;


use Mare06xa\Geckoboard\Abstracts\Widget;
use Mare06xa\Geckoboard\Classes\Validations\BulletGraphValidator;
use Mare06xa\Geckoboard\Classes\Validations\WidgetValidator;
use Mare06xa\Geckoboard\Enums\Orientation;

class BulletGraph extends Widget
{
    protected $items;
    protected $orientation = Orientation::HORIZONTAL;
    protected $rules = [
        'orientation'                => 'required|string|in:horizontal,vertical',
        'item'                       => 'required|array',
        'item.*.label'               => 'required|string',
        'item.*.sublabel'            => 'string',
        'item.*.axis'                => 'required|array',
        'item.*.axis.point'          => 'required|array|min:1',
        'item.*.axis.point.*'        => 'numeric',
        'item.*.range'               => 'required|array|size:3',
        'item.*.range.*.start'       => 'numeric',
        'item.*.range.*.end'         => 'numeric',
        'item.*.measure'             => 'required|array|size:2',
        'item.*.measure.current'     => 'required|array',
        'item.*.measure.current.*'   => 'numeric',
        'item.*.measure.projected'   => 'required|array',
        'item.*.measure.projected.*' => 'numeric',
        'item.*.comparative'         => 'required|array',
        'item.*.comparative.point'   => 'numeric',
    ];

    public function __construct()
    {
        $this->items = new Items();
    }

    /**
     * @return array
     * @throws \Exception
     */
    protected function prepareData(): array
    {
        $widgetData = [
            'orientation' => $this->orientation,
            'item' => []
        ];

        foreach ($this->items->getItems() as $item) {
            $itemData = [];

            $itemData['label'] = $item->getLabel();

            if ($item->getSublabel() !== null)
                $itemData['sublabel'] = $item->getSublabel();

            $itemData['axis']['point'] = $item->getAxisData();
            $itemData['range']   = $item->range()->toArray();
            $itemData['measure'] = $item->measure()->toArray();

            if ($item->getComparative() !== null)
                $itemData['comparative']['point'] = $item->getComparative();

            $widgetData['item'][] = $itemData;
        }

        $this->validateData(new WidgetValidator($widgetData, $this->rules));

        return $widgetData;
    }

    public function items()
    {
        return $this->items;
    }

    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    }

    public function getOrientation()
    {
        return $this->orientation;
    }
}