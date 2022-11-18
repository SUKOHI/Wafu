# Wafu
A Laravel class that mainly developed for Laravel to provide Japan-Related data like week name, gender and so on.  
(This is for Laravel 5+. [For Laravel 4.2](https://github.com/SUKOHI/Wafu/tree/1.0))

[Demo](http://demo-laravel52.capilano-fw.com/wafu)

# Installation

Execute composer command.

    composer require sukohi/wafu:4.*

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

# Usage

**Gender（性別）**

    if(\Wafu::hasGender(1)) {

        echo \Wafu::gender(1);   // Between 0 and 2
        var_dump(\Wafu::genders());

    }

1: 男性, 2: 女性, 0: その他

**Week Name（曜日）**

    if(\Wafu::hasWeekName(2)) {

        echo \Wafu::weekName(2);                 // Between 0 and 6
        echo \Wafu::weekName(Carbon::now());     // or using Carbon
        var_dump(\Wafu::weekNames($key_flag = true));   // $key_flag means whether you need array keys or not

    }
    
0: 日, 1: 月, 2: 火, 3: 水, 4: 木, 5: 金, 6: 土

**Week Name(Long)（長い曜日）**

    echo \Wafu::longWeekName(2);                 // Between 0 and 6
    echo \Wafu::longWeekName(Carbon::now());     // or using Carbon
    var_dump(\Wafu::longWeekNames($key_flag = true));   // $key_flag means whether you need array keys or not

0: 日曜日, 1: 月曜日, 2: 火曜日, 3: 水曜日, 4: 木曜日, 5: 金曜日, 6: 土曜日

**Month Name（月名）**

    if(\Wafu::hasMonth(2)) {

        echo \Wafu::month(2);                // Between 1 and 12
        echo \Wafu::month(Carbon::now());    // Using Carbon
        var_dump(\Wafu::months($key_flag = true));   // $key_flag means whether you need array keys or not

    }
    
1月 〜 12月
    
**Old Month Name（旧暦月名）**

    if(\Wafu::hasOldMonth(2)) {

        echo \Wafu::oldMonth(2);                // Between 1 and 12
        echo \Wafu::oldMonth(Carbon::now());    // Using Carbon
        var_dump(\Wafu::oldMonths($key_flag = true));   // $key_flag means whether you need array keys or not

    }
    
1: 睦月,
2: 如月,
3: 弥生,
4: 卯月,
5: 皐月,
6: 水無月,
7: 文月,
8: 葉月,
9: 長月,
10: 神無月,
11: 霜月,
12: 師走


**Date（日付）**

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

**Prefecture（都道府県）**

    if(\Wafu::hasPrefecture(28)) {

        echo \Wafu::prefecture(28); // 兵庫県
        echo \Wafu::prefecture(28, true); // 兵庫
        echo \Wafu::prefectureId('兵庫県'); // 28
        echo \Wafu::prefectureId('東京'); // 13
        var_dump(\Wafu::prefectures());
        var_dump(\Wafu::prefectures(true)); // for Short Names

    }
    
(Full)

1: 北海道,
2: 青森県,
3: 岩手県,
4: 宮城県,
5: 秋田県,
6: 山形県,
7: 福島県,
8: 茨城県,
9: 栃木県,
10: 群馬県,
11: 埼玉県,
12: 千葉県,
13: 東京都,
14: 神奈川県,
15: 新潟県,
16: 富山県,
17: 石川県,
18: 福井県,
19: 山梨県,
20: 長野県,
21: 岐阜県,
22: 静岡県,
23: 愛知県,
24: 三重県,
25: 滋賀県,
26: 京都府,
27: 大阪府,
28: 兵庫県,
29: 奈良県,
30: 和歌山県,
31: 鳥取県,
32: 島根県,
33: 岡山県,
34: 広島県,
35: 山口県,
36: 徳島県,
37: 香川県,
38: 愛媛県,
39: 高知県,
40: 福岡県,
41: 佐賀県,
42: 長崎県,
43: 熊本県,
44: 大分県,
45: 宮崎県,
46: 鹿児島県,
47: 沖縄県

(Short)

1: 北海道,
2: 青森,
3: 岩手,
4: 宮城,
5: 秋田,
6: 山形,
7: 福島,
8: 茨城,
9: 栃木,
10: 群馬,
11: 埼玉,
12: 千葉,
13: 東京,
14: 神奈川,
15: 新潟,
16: 富山,
17: 石川,
18: 福井,
19: 山梨,
20: 長野,
21: 岐阜,
22: 静岡,
23: 愛知,
24: 三重,
25: 滋賀,
26: 京都,
27: 大阪,
28: 兵庫,
29: 奈良,
30: 和歌山,
31: 鳥取,
32: 島根,
33: 岡山,
34: 広島,
35: 山口,
36: 徳島,
37: 香川,
38: 愛媛,
39: 高知,
40: 福岡,
41: 佐賀,
42: 長崎,
43: 熊本,
44: 大分,
45: 宮崎,
46: 鹿児島,
47: 沖縄

**Region（地方）**

    if(\Wafu::hasRegion(3)) {

        echo \Wafu::region(5);
        echo \Wafu::regionId('関西');
        var_dump(\Wafu::regions());
        var_dump(\Wafu::regionPrefectureIds());  // Prefecture IDs by regions

    }
    
1: 北海道,
2: 東北,
3: 関東,
4: 中部,
5: 関西,
6: 中国,
7: 四国,
8: 九州

**Japanese Era（和暦）**

    print_r(\Wafu::era(1977));

    /*  Output

        Array
        (
            [name] => 昭和
            [initial] => S
            [symbol] => showa
            [year] => 52
            [full] => 昭和52年
        )

    */
    
    [Note]: The keys changed from ver 4.0.1

    // Strict mode： You will get "平成31年" by setting Carbon instance that is on 2019-04-30 as the argument.

    $heiseiEndDt = new Carbon('2019-04-30');
    $heiseiEndEra = \Wafu::era($heiseiEndDt);
    print_r($heiseiEndEra);

    /* Output

        Array
        (
            [name] => 平成
            [year] => 31
            [initial] => H
            [symbol] => heisei
            [full] => 平成31年
        )

    */

    $reiwaStartDt = new Carbon('2019-05-01');
    $reiwaStartEra = \Wafu::era($reiwaStartDt);
    print_r($reiwaStartEra);

    /* Output

        Array
        (
            [name] => 令和
            [year] => 1
            [initial] => R
            [symbol] => reiwa
            [full] => 令和元年
        )

    */

    echo \Wafu::eraYear(1989);   // 平成元年

    // also in "Strict mode"

    \Wafu::eraYear(new Carbon('2019-04-30'));
    // 平成31年


    // Get Common Era from Japanese Era

    echo \Wafu::commonYear('昭和52年');  // 1977
    echo \Wafu::commonYear('明治元年');   // 1868
    echo \Wafu::commonYear('S52年');  // 1977
    echo \Wafu::commonYear('M元年');   // 1868
    echo \Wafu::commonYear('S52');    // 1977
    echo \Wafu::commonYear('M1');   // 1868
    
    $era_years = \Wafu::eraYears();
    
    /*  Output
    
        array:4 [▼
          "meiji" => "明治"
          "taisho" => "大正"
          "showa" => "昭和"
          "heisei" => "平成"
        ]
        
    */
    
    $era_names = \Wafu::eraNames();

    /*  Output

        array:5 [▼
          0 => "令和"
          1 => "平成"
          2 => "昭和"
          3 => "大正"
          4 => "明治"
        ]
    
    */
    
    $era_initials = \Wafu:eraInitials();

    /*  Output

        array:5 [▼
          0 => "R"
          1 => "H"
          2 => "S"
          3 => "T"
          4 => "M"
        ]
    
    */
    
    $era_initials = \Wafu:eraSymbols();

    /*  Output

        array:5 [▼
          0 => "reiwa"
          1 => "heisei"
          2 => "showa"
          3 => "taisho"
          4 => "meiji"
        ]
    
    */
    
This package already supported new era name, `令和`.


**Convert Japanese Date to Datetime（和暦から西暦へ変換）**
        
    $dt = \Wafu::parseDate('平成２７年05月23日（土） 20時11分29秒');
    $dt = \Wafu::parseDate('平成２７年05月23日（土） 20時11分');
    $dt = \Wafu::parseDate('平成２７年05月23日（土） 20時');
    $dt = \Wafu::parseDate('平成２７年05月23日（土） 20:11:29');
    $dt = \Wafu::parseDate('平成２７年05月23日（土） 20:11');
    $dt = \Wafu::parseDate('平成２７年05月23日（土）');
    $dt = \Wafu::parseDate('平成２７年05月');
    $dt = \Wafu::parseDate('平成２７年');
    $dt = \Wafu::parseDate('H27.5.23（土） 20時11分29秒');
    $dt = \Wafu::parseDate('H27.5.23（土） 20時11分');
    $dt = \Wafu::parseDate('H27.5.23（土） 20:11:29');
    $dt = \Wafu::parseDate('H27.5.23（土） 20:11');
    $dt = \Wafu::parseDate('H27.5.23（土）');
    $dt = \Wafu::parseDate('H27.5');
    $dt = \Wafu::parseDate('H27');
    
    
**National Days（祝日・休日）**

    // Simple Way

    $national_days = Wafu::nationalDays();
    var_dump($national_days);   // National days
    
    
    // with Cache
    
    $national_days = Wafu::nationalDays($cache_flag = true));
    
* Note:  
    You can no longer use `$start_date` and `$end_date` parameters like the below because Google finished to provide holidays data through a feed.  
    But you DO NOT need to change your code that you've already written because nationalDays() method can detect whether your code is old version or not.

    Wafu::nationalDays($start_date, $end_date, $cache_flag = true);


**Yen Format（円表記）**

    echo \Wafu::yen(1500);                               // 1,500円
    echo \Wafu::yen(1500, YEN_NO_COMMA);                 // 1500円
    echo \Wafu::yen(1500, YEN_SYMBOL);                   // ￥1,500
    echo \Wafu::yen(1500, YEN_SYMBOL_NO_COMMA);          // ￥1500
    echo \Wafu::yen(1500, YEN_SYMBOL_COMMA_HYPHEN);      // ￥1,500-
    echo \Wafu::yen(1500, YEN_SYMBOL_NO_COMMA_HYPHEN);   // ￥1500-


**Consumption Tax（消費税）**

    $dt = new Carbon('2000-01-01');
    $amount = 1000;
    echo \Wafu::consumptionTax($dt, $amount);   // 50
    echo \Wafu::consumptionTax($dt, $amount, $total_flag = true);   // 1050

You can change tax rate by using `$reduced_tax_rate` parameter.

ex)

    echo \Wafu::consumptionTax($dt, $amount, $total_flag, $reduced_tax_rate = true); // in 8% tax rate
    echo \Wafu::consumptionTax($dt, $amount, $total_flag, $reduced_tax_rate = false); // in 10% tax rate

**Zip code（郵便番号）**

    echo \Wafu::zip('1234567'); // 123-4567
    echo \Wafu::zip('1234567', '_'); // 123_4567
    echo \Wafu::zip('１２３４５６７'); // 123-4567
    
    if(\Wafu::checkZip('123-4567')) {

        echo 'OK';

    }

# License

This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh