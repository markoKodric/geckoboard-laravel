<?php

namespace Mare06xa\Geckoboard\src\Classes\Widgets\Leaderboard;


use Mare06xa\Geckoboard\src\Enums\Format;
use Mare06xa\Geckoboard\src\Enums\SortOrder;

class Items
{
    protected $items;
    protected $unit;
    protected $format = Format::DECIMAL;


    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Variable $unit must be an ISO 4217 currency code.
     * Examples: "GBP", "USD", "EUR",...
     *
     * @param string $unit
     * @return Items
     */
    public function setCurrency($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    public function setItems($items = [])
    {
        $this->items = $items;

        return $this;
    }

    public function add($value, $label, $previousRank = "")
    {
        $this->items[] = [
            'label'  => $label,
            'value'  => $value,
            'previous_rank' => $previousRank
        ];

        return $this;
    }

    public function getCurrency()
    {
        return $this->unit;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function isCurrency()
    {
        return $this->format == Format::CURRENCY;
    }

    public function sort($order = SORT_DESC)
    {
        usort($this->items, function($item1, $item2) use ($order) {
            return $order === SORT_ASC ?
                $item1['value'] >= $item2['value']:
                $item1['value'] <= $item2['value'];

        });
    }
}