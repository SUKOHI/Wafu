Wafu
===================
PHP class that mainly developed for Laravel to provide Japanese data like week name, gender and prefecture name.

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

        // Gender

        if(Wafu::hasGender(1)) {

            echo Wafu::gender(1);   // Between 0 and 2
            var_dump(Wafu::genders());

        }

        // Week Name

        if(Wafu::hasWeekName(2)) {

            echo Wafu::weekName(2);    // Between 0 and 6
            echo Wafu::weekName(Carbon::now());    // or using Carbon
            var_dump(Wafu::weekNames());

        }

        // Prefecture

        if(Wafu::hasPrefecture(28)) {

            echo Wafu::prefecture(28);
            echo Wafu::prefectureId('兵庫県');
            var_dump(Wafu::prefectures());

        }

        // Region

        if(Wafu::hasRegion(3)) {

            echo Wafu::region(5);
            echo Wafu::regionId('関西');
            var_dump(Wafu::regions());
            var_dump(Wafu::regionPrefectureIds());  // Prefecture IDs by regions

        }

        // Get Japanese Era from Common Era

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
        
License
====

This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh