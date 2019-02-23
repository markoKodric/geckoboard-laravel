**Currently only supports widgets PUSH API**

# Installation
Require this package with [composer](http://getcomposer.org).

```
composer require mare06xa/geckoboard
```

In Laravel 5.5 and above the package will autoregister the service provider. In Laravel 5.4 you must install this service provider.

```php
// config/app.php
'providers' => [
    ...
    Mare06xa\Geckoboard\GeckoboardServiceProvider::class,
    ...
];
```

In Laravel 5.5 and above the package will autoregister the facade. In Laravel 5.4 you must install the facade manually.

```php
// config/app.php
'aliases' => [
    ...
    'Geckoboard' => Mare06xa\Geckoboard\GeckoboardFacade::class,
    ...
];
```

# Configuration
You will need API token from Geckoboard.
- Go to **https://www.geckoboard.com/**, sign up and confirm your account
- Go to your profile settings and copy your API token

Add this lines to your `.env` configuration file

```
GECKO_TOKEN={Insert your token here}
GECKO_DOMAIN=https://push.geckoboard.com/v1/send/
```

---

# Widgets

## Basic usage
```php
use Mare06xa\Geckoboard\Geckoboard;

class SomeClass
{
    public function foo()
    {
        // Widget ID is obtained on Geckoboard by clicking "Edit" in the widget options...
        $widget = Geckoboard::widgetClass($widgetID);
        
        // Optionally you can set different API Token if you are working with multiple accounts...
        $widget->setApiToken($apiToken);
        
        $widget->firstMethod()
               ->secondMethod();
        
        // Returns GuzzleHttp\Psr7\Response object or throws ClientException...
        $apiResponse = $widget->push();
    }
}
```

---

## Bar Chart
```php
$barChart = Geckoboard::barChart($widgetID);

// ... set data

$apiResponse = $barChart->push();
```

**X axis**
```php
// Standard format
$barChart->xAxis()
         ->setLabels("January", "February", "March");

// Datetime format
$barChart->xAxis()
         ->setFormat(Format::DATETIME_ISO_8601)
         ->setLabels("2019-01-01", "2019-01-02"); // Also accepts date in format "Y-m" => "2019-12"
         ->addLabel("2019-01-03")
```

**Y axis**
```php
// Decimal format
$barChart->yAxis()
         ->addData($numberArray, "Data Label 1");

// Currency format
$barChart->yAxis()
         ->addData($numberArray,  "Data Label 1")
         ->addData($numberArray2, "Data Label 2")
         ->setFormat(Format::CURRENCY)
         ->setCurrency("USD");
    
// Percentage format
$barChart->yAxis()
         ->addData($numberArray, "Data Label 1")
         ->setFormat(Format::PERCENT);
```

---

## Bullet Graph
```php
$bulletGraph = Geckoboard::bulletGraph($widgetID);

$bulletGraph->setOrientation(Orientation::HORIZONTAL);

$itemNo1 = new BulletGraphItem();

$itemNo1->setLabel("Revenue 2014 YTD")
        ->setAxisData([0, 200, 400, 600, 800, 1000]);
    
$itemNo1->range()
        ->red(0, 400)
        ->amber(401, 700)
        ->green(701, 1000);
    
$itemNo1->measure()
        ->current(0, 400)
        ->projected(100, 900);
    
$itemNo1->setComparative(600);
    
$bulletGraph->items()
            ->add($itemNo1);

$apiResponse = $bulletGraph->push();
```

---

## Funnel
```php
$funnel = Geckoboard::funnel($widgetID);

$funnel->items()
       ->add(87809, "Step 1")
       ->add(70022, "Step 2")
       ->add(63232, "Step 3")
       ->add(53232, "Step 4")
       ->add(32123, "Step 5")
       ->add(23232, "Step 6")
       ->add(12232, "Step 7")
       ->add(10001, "Step 8");

$apiResponse = $funnel->push();
```

---

## Geck-o-Meter
```php
$geckoMeter = Geckoboard::geckoMeter($widgetID);

$geckoMeter->value(23)
           ->min(0)
           ->max(100);

$apiResponse = $geckoMeter->push();
```
---

## Leaderboard
```php
$leaderBoard = Geckoboard::leaderBoard($widgetID);
$leaderBoard->items()
            ->setFormat(Format::PERCENT);

for($i = 0; $i < 25; $i++) {
    $value    = $faker->randomFloat(4, 0.01, 0.09);
    $label    = ucfirst($faker->word);
    $prevRank = $faker->numberBetween(0, 25);

    if ($faker->boolean(50)) {
        $leaderBoard->items()
                    ->add($value, $label);
    } else {
        $leaderBoard->items()
                    ->add($value, $label, $prevRank);
    }
}

$leaderBoard->items()  // Sort by value in descending order...
            ->sort();  // To sort in ascending order, pass argument SORT_ASC... 

$apiResponse = $leaderBoard->push();
```
---

## Line Chart
```php
$lineChart = Geckoboard::lineChart($widgetID);

$lineChart->xAxis()
          ->setFormat(Format::DATETIME_ISO_8601);
          
$lineChart->yAxis()
          ->setFormat(Format::CURRENCY)
          ->setCurrency("EUR")
          ->addLine([1, 2, 3, 4, 5], 'Profit [€]',   Carbon::now()->addDay()->format('Y-m-d'))
          ->addLine([2, 3, 4, 5, 6], 'Expenses [€]', Carbon::now()->addDay()->format('Y-m-d'));

$apiResponse = $lineChart->push();
```
---

## List
```php
$list = Geckoboard::list($widgetID);

$list->items()
     ->add("Chrome",  "40327 visits", "New!")
     ->add("Safari",  "11577 visits", "New!", "#00FF00")
     ->add("Firefox", "10295 visits")
     ->add("MS Edge", "3578 visits")
     ->add("Opera",   "499 visits");

$apiResponse = $list->push();
```

---

## Map
```php
$map = Geckoboard::map($widgetID);

$map->points()
    ->prepareCity("London", "GB")
    ->setSize(10)
    ->add();

$map->points()
    ->prepareCity("San Francisco", "US")
    ->add();

$map->points()
    ->prepareLatitudeLongitude("22.2670", "114.1880")
    ->setColor("#D8F709")
    ->add();

$map->points()
    ->prepareLatitudeLongitude("-33.94336", "18.896484")
    ->setSize(5)
    ->add();

$map->points()
    ->prepareHost("geckoboard.com")
    ->setColor("#77DD77")
    ->setSize(6)
    ->add();

$map->points()
    ->prepareIP("178.125.193.227")
    ->add();

$apiResponse = $map->push();
```
---

## Monitoring
```php
$monitoring = Geckoboard::monitoring($widgetID);

$monitoring->status(MonitoringStatus::UP)
           ->downTime("9 days ago")
           ->msResponseTime(593);

$apiResponse = $monitoring->push();
```
---

## Number and Secondary Stat
```php
$numberStat = Geckoboard::numberSecondaryStat($widgetID);

$numberStat->items()
           ->add(700000, "", "€");

$apiResponse = $numberStat->push();
```
---

## Pie Chart
```php
$pieChart = Geckoboard::pieChart($widgetID);

$pieChart->items()
         ->add(100, "May", "#13699C")
         ->add(160, "June", "#198ACD")
         ->add(300, "July", "#60B8EC")
         ->add(140, "August", "#A4D7F4");

$apiResponse = $pieChart->push();
```
---

## RAG
```php
$RAG = Geckoboard::RAG($widgetID);

$RAG->items()
    ->first(16,  "Long past due")
    ->second(64, "Overdue")
    ->third(32,  "Due")
    ->reverse()
    ->setPrefix("€");

$apiResponse = $RAG->push();
```
---

## Text
```php
$text = Geckoboard::text($widgetID);

$text->items()
     ->add("Unfortunately, as you probably already know, people")
     ->add("As you might know, I am a full time Internet", TextType::ALERT);

$apiResponse = $text->push();
```
---
