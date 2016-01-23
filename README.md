Wafu
===================
PHP class that mainly developed for Laravel to provide Japanese data like week name, gender and so on.  
(This is for Laravel 4.2. [For Laravel 5+](https://github.com/SUKOHI/Wafu))

Installation
====

Add this package name in composer.json

    "require": {
      "sukohi/wafu": "1.*"
    }

Execute composer command.

    composer update

Register the service provider in app.php

    'providers' => [
        ...Others...,  
        'Sukohi\Wafu\WafuServiceProvider',
    ]

Also alias

    'aliases' => [
        ...Others...,  
        'Wafu' => 'Sukohi\Wafu\Facades\Wafu',
    ]

Usage
====

**Gender**

    if(Wafu::hasGender(1)) {

        echo Wafu::gender(1);   // Between 0 and 2
        var_dump(Wafu::genders());

    }


**Week Name**

    if(Wafu::hasWeekName(2)) {

        echo Wafu::weekName(2);                 // Between 0 and 6
        echo Wafu::weekName(Carbon::now());     // or using Carbon
        var_dump(Wafu::weekNames($key_flag = true));   // $key_flag means whether you need array keys or not

    }

**Week Name(Long)**

    echo Wafu::longWeekName(2);                 // Between 0 and 6
    echo Wafu::longWeekName(Carbon::now());     // or using Carbon
    var_dump(Wafu::longWeekNames($key_flag = true));   // $key_flag means whether you need array keys or not


**Month Name**

    if(Wafu::hasMonthName(2)) {

        echo Wafu::monthName(2);                // Between 1 and 12
        echo Wafu::monthName(Carbon::now());    // Using Carbon
        var_dump(Wafu::monthNames($key_flag = true));   // $key_flag means whether you need array keys or not

    }


**Date**

    echo Wafu::date($format, $time);
    
    // $format: See the below.
    // $time: (Skippable) Timestamp, date format or Carbon instance

    echo Wafu::date('{Y}');    // 2015年
    echo Wafu::date('{y}');    // 15年
    echo Wafu::date('{E}');    // 平成27年
    echo Wafu::date('{m}');    // 01月
    echo Wafu::date('{n}');    // 1月
    echo Wafu::date('{d}');    // 01日
    echo Wafu::date('{j}');    // 1日
    echo Wafu::date('{G}');    // 19時
    echo Wafu::date('{g}');    // 7時
    echo Wafu::date('{H}');    // 07時, 19時
    echo Wafu::date('{h}');    // 07時
    echo Wafu::date('{i}');    // 01分
    echo Wafu::date('{s}');    // 01秒
    echo Wafu::date('{w}');    // 日〜土
    echo Wafu::date('{a}');    // 午前, 午後
    echo Wafu::date('{Y}{m}{d}（{w}） {H}{i}');    // 2015年05月23日（土） 20時11分
    echo Wafu::date('{F}');    // 2015年05月23日（土） 20時11分
    echo Wafu::date('{f}');    // 2015年05月23日（土） 20:11

    * You can also use normal date formats like the below.
    
    echo Wafu::date('{Y}{m}{d} H:i');    // 2015年05月23日（土） 20:11

**Prefecture**

    if(Wafu::hasPrefecture(28)) {

        echo Wafu::prefecture(28);
        echo Wafu::prefectureId('兵庫県');
        var_dump(Wafu::prefectures());

    }


**Region**

    if(Wafu::hasRegion(3)) {

        echo Wafu::region(5);
        echo Wafu::regionId('関西');
        var_dump(Wafu::regions());
        var_dump(Wafu::regionPrefectureIds());  // Prefecture IDs by regions

    }

**Japanese Era**

    var_dump(Wafu::japaneseEra(1977));

    /*  Output

        array(3) {
          ["era_name"]=>
          string(6) "昭和"
          ["era_year"]=>
          int(52)
          ["era_full_year"]=>
          string(11) "昭和52年"
        }

     */

    echo Wafu::japaneseEraYear(1989);   // 平成元年

    // Get Common Era from Japanese Era

    echo Wafu::commonEraYear('昭和52年');  // 1977
    echo Wafu::commonEraYear('明治元年');   // 1868
    echo Wafu::commonEraYear('S52年');  // 1977
    echo Wafu::commonEraYear('M元年');   // 1868
    echo Wafu::commonEraYear('S52');    // 1977
    echo Wafu::commonEraYear('M1');   // 1868
        

**Convert Japanese Date to Datetime (Carbon)**
        
    $dt = Wafu::convertJapaneseDate('平成２７年05月23日（土） 20時11分29秒');
    $dt = Wafu::convertJapaneseDate('平成２７年05月23日（土） 20時11分');
    $dt = Wafu::convertJapaneseDate('平成２７年05月23日（土） 20時');
    $dt = Wafu::convertJapaneseDate('平成２７年05月23日（土） 20:11:29');
    $dt = Wafu::convertJapaneseDate('平成２７年05月23日（土） 20:11');
    $dt = Wafu::convertJapaneseDate('平成２７年05月23日（土）');
    $dt = Wafu::convertJapaneseDate('平成２７年05月');
    $dt = Wafu::convertJapaneseDate('平成２７年');
    $dt = Wafu::convertJapaneseDate('H27.5.23（土） 20時11分29秒');
    $dt = Wafu::convertJapaneseDate('H27.5.23（土） 20時11分');
    $dt = Wafu::convertJapaneseDate('H27.5.23（土） 20:11:29');
    $dt = Wafu::convertJapaneseDate('H27.5.23（土） 20:11');
    $dt = Wafu::convertJapaneseDate('H27.5.23（土）');
    $dt = Wafu::convertJapaneseDate('H27.5');
    $dt = Wafu::convertJapaneseDate('H27');
    
    
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

    echo Wafu::yenFormat(1500);                               // 1,500円
    echo Wafu::yenFormat(1500, YEN_NO_COMMA);                 // 1500円
    echo Wafu::yenFormat(1500, YEN_SYMBOL);                   // ￥1,500
    echo Wafu::yenFormat(1500, YEN_SYMBOL_NO_COMMA);          // ￥1500
    echo Wafu::yenFormat(1500, YEN_SYMBOL_COMMA_HYPHEN);      // ￥1,500-
    echo Wafu::yenFormat(1500, YEN_SYMBOL_NO_COMMA_HYPHEN);   // ￥1500-


License
====

This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh