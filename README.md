Wafu
===================
PHP class that mainly developed for Laravel to provide Japan-Related data like week name, gender and so on.  
(This is for Laravel 5+. [For Laravel 4.2](https://github.com/SUKOHI/Wafu/tree/1.0))

[Demo](http://demo-laravel52.capilano-fw.com/wafu)

Installation
====

Execute composer command.

    composer require sukohi/wafu:2.*

Register the service provider in app.php

    'providers' => [
        ...Others...,  
        Sukohi\Wafu\WafuServiceProvider::class,
    ]

Also alias

    'aliases' => [
        ...Others...,  
        'Wafu'   => Sukohi\Wafu\Facades\Wafu::class
    ]

Note: If you are in L55+, you do NOT need the above because of auto-discovery.

Usage
====

**Gender**

    if(\Wafu::hasGender(1)) {

        echo \Wafu::gender(1);   // Between 0 and 2
        var_dump(\Wafu::genders());

    }


**Week Name**

    if(\Wafu::hasWeekName(2)) {

        echo \Wafu::weekName(2);                 // Between 0 and 6
        echo \Wafu::weekName(Carbon::now());     // or using Carbon
        var_dump(\Wafu::weekNames($key_flag = true));   // $key_flag means whether you need array keys or not

    }

**Week Name(Long)**

    echo \Wafu::longWeekName(2);                 // Between 0 and 6
    echo \Wafu::longWeekName(Carbon::now());     // or using Carbon
    var_dump(\Wafu::longWeekNames($key_flag = true));   // $key_flag means whether you need array keys or not


**Month Name**

    if(\Wafu::hasMonthName(2)) {

        echo \Wafu::monthName(2);                // Between 1 and 12
        echo \Wafu::monthName(Carbon::now());    // Using Carbon
        var_dump(\Wafu::monthNames($key_flag = true));   // $key_flag means whether you need array keys or not

    }


**Date**

    echo \Wafu::date($format, $time);
    
    // $format: See the below.
    // $time: (Skippable) Timestamp, date format or Carbon instance

    echo \Wafu::date('{Y}');    // 2015年
    echo \Wafu::date('{y}');    // 15年
    echo \Wafu::date('{E}');    // 平成27年
    echo \Wafu::date('{e}');    // H27
    echo \Wafu::date('{m}');    // 01月
    echo \Wafu::date('{n}');    // 1月
    echo \Wafu::date('{d}');    // 01日
    echo \Wafu::date('{j}');    // 1日
    echo \Wafu::date('{G}');    // 19時
    echo \Wafu::date('{g}');    // 7時
    echo \Wafu::date('{H}');    // 07時, 19時
    echo \Wafu::date('{h}');    // 07時
    echo \Wafu::date('{i}');    // 01分
    echo \Wafu::date('{s}');    // 01秒
    echo \Wafu::date('{w}');    // 日〜土
    echo \Wafu::date('{a}');    // 午前, 午後
    echo \Wafu::date('{Y}{m}{d}（{w}） {H}{i}');    // 2015年05月23日（土） 20時11分
    echo \Wafu::date('{F}');    // 2015年05月23日（土） 20時11分
    echo \Wafu::date('{f}');    // 2015年05月23日（土） 20:11

    // You can also use normal date formats like the below.
    
    echo \Wafu::date('{Y}{m}{d} H:i');    // 2015年05月23日（土） 20:11

**Prefecture**

    if(\Wafu::hasPrefecture(28)) {

        echo \Wafu::prefecture(28);
        echo \Wafu::prefectureId('兵庫県');
        var_dump(\Wafu::prefectures());

    }


**Region**

    if(\Wafu::hasRegion(3)) {

        echo \Wafu::region(5);
        echo \Wafu::regionId('関西');
        var_dump(\Wafu::regions());
        var_dump(\Wafu::regionPrefectureIds());  // Prefecture IDs by regions

    }

**Japanese Era**

    print_r(\Wafu::japaneseEra(1977));

    /*  Output

    Array
    (
        [era_name] => 昭和
        [era_initial] => S
        [era_symbol] => showa
        [era_year] => 52
        [era_full] => 昭和52年
    )

     */

    echo \Wafu::japaneseEraYear(1989);   // 平成元年

    // Get Common Era from Japanese Era

    echo \Wafu::commonEraYear('昭和52年');  // 1977
    echo \Wafu::commonEraYear('明治元年');   // 1868
    echo \Wafu::commonEraYear('S52年');  // 1977
    echo \Wafu::commonEraYear('M元年');   // 1868
    echo \Wafu::commonEraYear('S52');    // 1977
    echo \Wafu::commonEraYear('M1');   // 1868
    
    $era_years = \Wafu::japaneseEraYears();
    
    /*  Output
    
        array:4 [▼
          "meiji" => "明治"
          "taisho" => "大正"
          "showa" => "昭和"
          "heisei" => "平成"
        ]
        
    */

**Convert Japanese Date to Datetime (Carbon)**
        
    $dt = \Wafu::convertJapaneseDate('平成２７年05月23日（土） 20時11分29秒');
    $dt = \Wafu::convertJapaneseDate('平成２７年05月23日（土） 20時11分');
    $dt = \Wafu::convertJapaneseDate('平成２７年05月23日（土） 20時');
    $dt = \Wafu::convertJapaneseDate('平成２７年05月23日（土） 20:11:29');
    $dt = \Wafu::convertJapaneseDate('平成２７年05月23日（土） 20:11');
    $dt = \Wafu::convertJapaneseDate('平成２７年05月23日（土）');
    $dt = \Wafu::convertJapaneseDate('平成２７年05月');
    $dt = \Wafu::convertJapaneseDate('平成２７年');
    $dt = \Wafu::convertJapaneseDate('H27.5.23（土） 20時11分29秒');
    $dt = \Wafu::convertJapaneseDate('H27.5.23（土） 20時11分');
    $dt = \Wafu::convertJapaneseDate('H27.5.23（土） 20:11:29');
    $dt = \Wafu::convertJapaneseDate('H27.5.23（土） 20:11');
    $dt = \Wafu::convertJapaneseDate('H27.5.23（土）');
    $dt = \Wafu::convertJapaneseDate('H27.5');
    $dt = \Wafu::convertJapaneseDate('H27');
    
    
**National Days**

    // Simple Way

    $national_days = Wafu::nationalDays();
    var_dump($national_days);   // National days
    
    
    // with Cache
    
    $national_days = Wafu::nationalDays($cache_flag = true));
    
* Note:  
    You can no longer use `$start_date` and `$end_date` parameters like the below because Google finished to provide holidays data through a feed.  
    But you DO NOT need to change your code that you've already written because nationalDays() method can detect whether your code is old version or not.

    Wafu::nationalDays($start_date, $end_date, $cache_flag = true);


**Yen Format**

    echo \Wafu::yenFormat(1500);                               // 1,500円
    echo \Wafu::yenFormat(1500, YEN_NO_COMMA);                 // 1500円
    echo \Wafu::yenFormat(1500, YEN_SYMBOL);                   // ￥1,500
    echo \Wafu::yenFormat(1500, YEN_SYMBOL_NO_COMMA);          // ￥1500
    echo \Wafu::yenFormat(1500, YEN_SYMBOL_COMMA_HYPHEN);      // ￥1,500-
    echo \Wafu::yenFormat(1500, YEN_SYMBOL_NO_COMMA_HYPHEN);   // ￥1500-


**Consumption Tax**

    $dt = new Carbon('2000-01-01');
    $amount = 1000;
    echo \Wafu::consumptionTax($dt, $amount);   // 50
    echo \Wafu::consumptionTax($dt, $amount, $total_flag = true);   // 1050

License
====

This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh