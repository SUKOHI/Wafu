Wafu
===================
PHP class that mainly developed for Laravel to provide Japanese data like week name, gender and so on.

Installation&setting for Laravel
====

After installation using composer, add the followings to the array in  app/config/app.php

    'providers' => array(  
        ...Others...,  
        'Sukohi\Wafu\WafuServiceProvider',
    )

Also

    'aliases' => array(  
        ...Others...,  
        'Wafu' => 'Sukohi\Wafu\Facades\Wafu',
    )

Usage
====

**Gender**

    if(Wafu::hasGender(1)) {

        echo Wafu::gender(1);   // Between 0 and 2
        var_dump(Wafu::genders());

    }


**Week Name**

    if(Wafu::hasWeekName(2)) {

        echo Wafu::weekName(2);    // Between 0 and 6
        echo Wafu::weekName(Carbon::now());    // or using Carbon
        var_dump(Wafu::weekNames());

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
    echo Wafu::date('{Y}{m}{d} {H}{i}（{w}）');    // 2015年05月23日 20時11分（土）


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

    echo Wafu::CommonEraYear('昭和52年');  // 1977
    echo Wafu::CommonEraYear('明治元年');   // 1868
        
        
**National Days**

    // Simple Way

    $start_date = '2015-01-01';
    $end_date = '2015-12-31';
    $national_days = Wafu::nationalDays($start_date, $end_date);
    var_dump($national_days);


    // Using Carbon

    $start_date = Carbon::today();
    $end_date = $start_date->copy()->addYear();
    $national_days = Wafu::nationalDays($start_date, $end_date, $cache_flag = true);
    var_dump($national_days);
    
    *Note: $cache_flag means that you'd like to use cache or not. And the default value is true;

        
License
====

This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh