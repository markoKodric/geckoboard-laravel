<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\Leaderboard;


use Mare06xa\Geckoboard\src\Abstracts\Widget;
use Mare06xa\Geckoboard\src\Classes\Validations\LeaderboardValidator;
use Mare06xa\Geckoboard\src\Classes\Validations\WidgetValidator;

class Leaderboard extends Widget
{
    protected $items;
    protected $rules = [
        'format'                => 'required|string|in:decimal,percent,currency',
        'unit'                  => 'string|size:3',
        'items'                 => 'required|array',
        'items.*.label'         => 'required|string',
        'items.*.previous_rank' => 'numeric',

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
        $this->items->setItems($this->cleanPreviousRanks());

        $widgetData = [
            'format' => $this->items->getFormat(),
            'items'  => $this->items->getItems()
        ];

        if ($this->items->isCurrency()) {
            $widgetData['unit'] = $this->items->getCurrency();
        }

        $this->validateData(new WidgetValidator($widgetData, $this->rules));

        return $widgetData;
    }

    protected function cleanPreviousRanks()
    {
        $items = $this->items->getItems();


        for ($i = 0; $i < count($items); $i++) {
            if($items[$i]['previous_rank'] == "") {
                array_forget($items[$i], 'previous_rank');
            } else {
                $items[$i]['previous_rank'] = intval($items[$i]['previous_rank']);
            }
        }

        return $items;
    }

    public function items()
    {
        return $this->items;
    }
}