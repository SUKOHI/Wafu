<?php

namespace Sukohi\Wafu;

use Carbon\Carbon;
use Illuminate\Support\Arr;

class Wafu {

    public function __construct() {

        define('YEN_COMMA', 0);
        define('YEN_NO_COMMA', 1);
        define('YEN_SYMBOL', 2);
        define('YEN_SYMBOL_NO_COMMA', 3);
        define('YEN_SYMBOL_COMMA_HYPHEN', 4);
        define('YEN_SYMBOL_NO_COMMA_HYPHEN', 5);

    }

    // Week name

    const WEEK_NAMES = [
        '0' => '日',
        '1' => '月',
        '2' => '火',
        '3' => '水',
        '4' => '木',
        '5' => '金',
        '6' => '土'
    ];

    public function weekNames($key_flag = true) {

        return ($key_flag) ? self::WEEK_NAMES : array_values(self::WEEK_NAMES);

    }

    public function weekName($week_no) {

        if(is_object($week_no) && get_class($week_no) == 'Carbon\Carbon') {

            $week_no = $week_no->dayOfWeek;

        }

        return Arr::get(self::WEEK_NAMES, $week_no, '');

    }

    public function hasWeekName($week_no) {

        $week_name = $this->weekName($week_no);
        return !empty($week_name);

    }

    public function longWeekNames($key_flag = true) {

        $week_names = $this->weekNames();

        foreach ($week_names as $index => $week_name) {

            $week_names[$index] = $week_name .'曜日';

        }

        return ($key_flag) ? $week_names : array_values($week_names);

    }

    public function longWeekName($week_no) {

        if(is_object($week_no) && get_class($week_no) == 'Carbon\Carbon') {

            $week_no = $week_no->dayOfWeek;

        }

        return Arr::get($this->longWeekNames(), $week_no, '');

    }


    // Month

    const MONTHS = [
        '1' => '1月',
        '2' => '2月',
        '3' => '3月',
        '4' => '4月',
        '5' => '5月',
        '6' => '6月',
        '7' => '7月',
        '8' => '8月',
        '9' => '9月',
        '10' => '10月',
        '11' => '11月',
        '12' => '12月'
    ];

    public function months($key_flag = true) {

        return ($key_flag) ? self::MONTHS : array_values(self::MONTHS);

    }

    public function month($month_no) {

        if(is_object($month_no) && get_class($month_no) == 'Carbon\Carbon') {

            $month_no = $month_no->month;

        }

        return Arr::get(self::MONTHS, $month_no, '');

    }

    public function hasMonth($month_no) {

        $month = $this->monthName($month_no);
        return !empty($month);

    }


    // Old month

    const OLD_MONTHS = [
        '1' => '睦月',
        '2' => '如月',
        '3' => '弥生',
        '4' => '卯月',
        '5' => '皐月',
        '6' => '水無月',
        '7' => '文月',
        '8' => '葉月',
        '9' => '長月',
        '10' => '神無月',
        '11' => '霜月',
        '12' => '師走'
    ];

    public function oldMonths($key_flag = true) {

        return ($key_flag) ? self::OLD_MONTHS : array_values(self::OLD_MONTHS);

    }

    public function oldMonth($month_no) {

        if(is_object($month_no) && get_class($month_no) == 'Carbon\Carbon') {

            $month_no = $month_no->month;

        }

        return Arr::get(self::OLD_MONTHS, $month_no, '');

    }

    public function hasOldMonth($month_no) {

        $month_name = $this->oldMonthName($month_no);
        return !empty($month_name);

    }


    // Gender

    const GENDERS = [
        '1' => '男性',
        '2' => '女性',
        '0' => 'その他',
    ];

    public function genders($other_flag = false) {

        $genders = self::GENDERS;

        if(!$other_flag) {

            unset($genders[0]);

        }

        return $genders;

    }

    public function gender($gender_id) {

        if($this->hasGender($gender_id)) {

            return self::GENDERS[$gender_id];

        }

        return '';

    }

    public function hasGender($gender_id) {

        return isset(self::GENDERS[$gender_id]);

    }

    // Prefectures

    const PREFECTURES = [
        '1' => '北海道',
        '2' => '青森県',
        '3' => '岩手県',
        '4' => '宮城県',
        '5' => '秋田県',
        '6' => '山形県',
        '7' => '福島県',
        '8' => '茨城県',
        '9' => '栃木県',
        '10' => '群馬県',
        '11' => '埼玉県',
        '12' => '千葉県',
        '13' => '東京都',
        '14' => '神奈川県',
        '15' => '新潟県',
        '16' => '富山県',
        '17' => '石川県',
        '18' => '福井県',
        '19' => '山梨県',
        '20' => '長野県',
        '21' => '岐阜県',
        '22' => '静岡県',
        '23' => '愛知県',
        '24' => '三重県',
        '25' => '滋賀県',
        '26' => '京都府',
        '27' => '大阪府',
        '28' => '兵庫県',
        '29' => '奈良県',
        '30' => '和歌山県',
        '31' => '鳥取県',
        '32' => '島根県',
        '33' => '岡山県',
        '34' => '広島県',
        '35' => '山口県',
        '36' => '徳島県',
        '37' => '香川県',
        '38' => '愛媛県',
        '39' => '高知県',
        '40' => '福岡県',
        '41' => '佐賀県',
        '42' => '長崎県',
        '43' => '熊本県',
        '44' => '大分県',
        '45' => '宮崎県',
        '46' => '鹿児島県',
        '47' => '沖縄県'
    ];

    public function prefectures($short_flag = false) {

        $prefectures = self::PREFECTURES;

        if($short_flag) {

            array_walk($prefectures, function(&$name){

                $name = $this->getShortPrefecture($name);

            });

        }

        return $prefectures;

    }

    public function prefecture($prefecture_id, $short_flag = false) {

        if($this->hasPrefecture($prefecture_id)) {

            $prefecture = self::PREFECTURES[$prefecture_id];

            if($short_flag) {

                return $this->getShortPrefecture($prefecture);

            }

            return $prefecture;

        }

        return '';

    }

    public function hasPrefecture($prefecture_id) {

        return (isset(self::PREFECTURES[$prefecture_id]));

    }

    public function prefectureId($prefecture_name) {

        $prefecture_id = -1;

        foreach (self::PREFECTURES as $id => $name) {

            if($prefecture_name == $name ||
                $this->getShortPrefecture($name) == $prefecture_name) {

                $prefecture_id = $id;
                break;

            }

        }

        return $prefecture_id;

    }

    private function getShortPrefecture($name) {

        return preg_replace('!(県|府|都)$!', '', $name);

    }

    // Regions

    private $_regions = [
        '1' => '北海道',
        '2' => '東北',
        '3' => '関東',
        '4' => '中部',
        '5' => '関西',
        '6' => '中国',
        '7' => '四国',
        '8' => '九州'
    ];

    private $_region_prefecture_ids = [
        '1' => [1],
        '2' => [2, 3, 4, 5, 6, 7],
        '3' => [8, 9, 10, 11, 12, 13, 14],
        '4' => [15, 16, 17, 18, 19, 20, 21, 22, 23],
        '5' => [24, 25, 26, 27, 28, 29, 30],
        '6' => [31, 32, 33, 34, 35],
        '7' => [36, 37, 38, 39],
        '8' => [40, 41, 42, 43, 44, 45, 46, 47]
    ];

    public function regions() {

        return $this->_regions;

    }

    public function region($region_id) {

        if($this->hasRegion($region_id)) {

            return $this->_regions[$region_id];

        }

        return '';

    }

    public function hasRegion($region_id) {

        return (isset($this->_regions[$region_id]));

    }

    public function regionId($name) {

        $id = array_search($name, $this->_regions);

        if($id === false) {

            return -1;

        }

        return $id;

    }

    public function regionPrefectureIds() {

        return $this->_region_prefecture_ids;

    }


    // Date

    public function date($format, $time = '') {

        if(!is_object($time) || get_class($time) != 'Carbon\Carbon') {

            $time = new Carbon($time);

        }

        $format = preg_replace_callback('|\{([YymndjGgHhiswaEeFf])\}|', function($matches) use($time) {

            $text = '';
            $symbol = $matches[1];

            switch($symbol) {

                case 'Y':
                    $text = 'Y年';
                    break;
                case 'y':
                    $text = 'y年';
                    break;
                case 'm':
                    $text = 'm月';
                    break;
                case 'n':
                    $text = 'n月';
                    break;
                case 'd':
                    $text = 'd日';
                    break;
                case 'j':
                    $text = 'j日';
                    break;
                case 'G':
                    $text = 'G時';
                    break;
                case 'g':
                    $text = 'g時';
                    break;
                case 'H':
                    $text = 'H時';
                    break;
                case 'h':
                    $text = 'h時';
                    break;
                case 'i':
                    $text = 'i分';
                    break;
                case 's':
                    $text = 's秒';
                    break;
                case 'w':
                    $text = $this->weekName($time->dayOfWeek);
                    break;
                case 'a':
                    $text = ($time->format('a') == 'am') ? '午前' : '午後';
                    break;
                case 'E':
                    $text = $this->japaneseEraYear($time->year);
                    break;
                case 'e':
                    $japanese_era = $this->era($time->year);
                    $text = '\\'. $japanese_era['initial'] . $japanese_era['year'];
                    break;
                case 'F':
                    $text = 'Y年m月d日（'. $this->weekName($time->dayOfWeek) .'） H時i分';
                    break;
                case 'f':
                    $text = 'Y年m月d日（'. $this->weekName($time->dayOfWeek) .'） H:i';
                    break;

            }

            return $text;

        }, $format);

        return $time->format($format);

    }

    public function parseDate($date) {

        $date = trim(mb_convert_kana($date, 'ns'));
        $week_name_pattern = implode('|', self::WEEK_NAMES);
        $replacements = [
            '!（('. $week_name_pattern .')）!',
            '!\(('. $week_name_pattern .'\))!'
        ];
        $date = preg_replace($replacements, '', $date);
        $era_name_pattern = implode('|', $this->eraNames());
        $era_initial_pattern = implode('|', $this->eraInitials());
        $patterns = [
            '!(('. $era_name_pattern .')[\d]+年)([\d]+)月([\d]+)日 ([\d]+)時([\d]+)分([\d]+)秒!',
            '!(('. $era_name_pattern .')[\d]+年)([\d]+)月([\d]+)日 ([\d]+)時([\d]+)分!',
            '!(('. $era_name_pattern .')[\d]+年)([\d]+)月([\d]+)日 ([\d]+)時!',
            '!(('. $era_name_pattern .')[\d]+年)([\d]+)月([\d]+)日 ([\d]+):([\d]+):([\d]+)!',
            '!(('. $era_name_pattern .')[\d]+年)([\d]+)月([\d]+)日 ([\d]+):([\d]+)!',
            '!(('. $era_name_pattern .')[\d]+年)([\d]+)月([\d]+)日!',
            '!(('. $era_name_pattern .')[\d]+年)([\d]+)月!',
            '!(('. $era_name_pattern .')[\d]+)年!',
            '!(('. $era_initial_pattern .')[\d]+).([\d]+).([\d]+) ([\d]+)時([\d]+)分([\d]+)!',
            '!(('. $era_initial_pattern .')[\d]+).([\d]+).([\d]+) ([\d]+)時([\d]+)分!',
            '!(('. $era_initial_pattern .')[\d]+).([\d]+).([\d]+) ([\d]+)時!',
            '!(('. $era_initial_pattern .')[\d]+).([\d]+).([\d]+) ([\d]+):([\d]+):([\d]+)!',
            '!(('. $era_initial_pattern .')[\d]+).([\d]+).([\d]+) ([\d]+):([\d]+)!',
            '!(('. $era_initial_pattern .')[\d]+).([\d]+).([\d]+)!',
            '!(('. $era_initial_pattern .')[\d]+).([\d]+)!',
            '!(('. $era_initial_pattern .')[\d]+)!',
        ];

        foreach ($patterns as $index => $pattern) {

            if(preg_match($pattern, $date, $matches)) {

                $year = $this->commonYear($matches[1]);
                $matches_count = count($matches);

                if($matches_count == 8) {

                    return Carbon::create($year, $matches[3], $matches[4], $matches[5], $matches[6], $matches[7]);

                } else if($matches_count == 7) {

                    return Carbon::create($year, $matches[3], $matches[4], $matches[5], $matches[6], 0);

                } else if($matches_count == 6) {

                    return Carbon::create($year, $matches[3], $matches[4], $matches[5], 0, 0);

                } else if($matches_count == 5) {

                    return Carbon::create($year, $matches[3], $matches[4], 0, 0, 0);

                } else if($matches_count == 4) {

                    return Carbon::create($year, $matches[3], 1, 0, 0, 0);

                } else if($matches_count == 3 || $matches_count == 2) {

                    return Carbon::create($year, 1, 1, 0, 0, 0);

                }

            }

        }

        return null;

    }


    // Era

    const ERAS = [
        ['year' => 2018, 'name' => '令和', 'initial' => 'R', 'symbol' => 'reiwa'],
        ['year' => 1988, 'name' => '平成', 'initial' => 'H', 'symbol' => 'heisei'],
        ['year' => 1925, 'name' => '昭和', 'initial' => 'S', 'symbol' => 'showa'],
        ['year' => 1911, 'name' => '大正', 'initial' => 'T', 'symbol' => 'taisho'],
        ['year' => 1867, 'name' => '明治', 'initial' => 'M', 'symbol' => 'meiji']
    ];

    public function era($year) {

        foreach(self::ERAS as $era) {

            $base_year = $era['year'];
            $era_name = $era['name'];

            if($year > $base_year) {

                $era_year = $year - $base_year;
                $era_year_corrected = ($era_year == 1) ? '元' : $era_year;

                return [
                    'name' => $era_name,
                    'year' => $era_year,
                    'initial' => $era['initial'],
                    'symbol' => $era['symbol'],
                    'full' => $era_name . $era_year_corrected .'年'
                ];

            }

        }

        return null;
		
    }

    public function eraYear($year) {

        $era_values = $this->era($year);
        return $era_values['full'];

    }

    public function eraYears() {

        return Arr::pluck(self::ERAS, 'name', 'symbol');

    }

    public function eraNames() {

        return Arr::pluck(self::ERAS, 'name');

    }

    public function eraInitials() {

        return Arr::pluck(self::ERAS, 'initial');

    }

    public function eraSymbols() {

        return Arr::pluck(self::ERAS, 'symbol');

    }

    public function commonYear($era_year) {

        $era_year = str_replace('元年', '1年', mb_convert_kana($era_year, 'n'));
        $era_name_pattern = implode('|', $this->japaneseEraNames());
        $era_initial_pattern = implode('|', $this->japaneseEraInitials());

        if(preg_match('!('. $era_name_pattern .'|'. $era_initial_pattern .')([0-9]+)[年]?!', $era_year, $matches)) {

            $era_name = $matches[1];
            $year = intval($matches[2]);

            if($era_name === '明治' || $era_name === 'M') {

                $year += 1867;

            } else if($era_name === '大正' || $era_name === 'T') {

                $year += 1911;

            } else if($era_name === '昭和' || $era_name === 'S') {

                $year += 1925;

            } else if($era_name === '平成' || $era_name === 'H') {

                $year += 1988;

            } else if($era_name === '令和' || $era_name === 'R') {

                $year += 2018;

            }

            return $year;

        }

        return -1;

    }

    public function nationalDays($cache_flag = true) {

        if(func_num_args() == 3) {

            $cache_flag = func_get_arg(2);

        }

        $cache_key = 'japanese_national_days_'. date('Y');

        if(!$cache_flag && \Cache::has($cache_key)) {

            \Cache::forget($cache_key);

        }

        return \Cache::rememberForever($cache_key, function() {

            $html = file_get_contents('https://calendar.google.com/calendar/ical/'. urlencode('japanese__ja@holiday.calendar.google.com') .'/public/full.ics');
            $lines = explode("\n", $html);
            $national_days = [];
            $date = $day_name = '';

            foreach ($lines as $index => $line) {

                if(preg_match('#^([\w-]+);?(.*?):(.*)$#i', $line, $matches)) {

                    $key = trim($matches[1]);
                    $value = trim($matches[3]);

                    if($key == 'DTSTART') {

                        $date = $value;

                    } else if($key == 'SUMMARY') {

                        $day_name = $value;

                    } else if($key == 'END' && $value == 'VEVENT') {

                        if(!empty($date) && !empty($day_name)) {

                            $dt = Carbon::parse($date);
                            $national_days[$dt->format('Y-m-d')] = $day_name;

                        }

                        $date = $day_name = '';

                    }

                }

            }

            ksort($national_days);
            return $national_days;

        });

    }

    // Yen

    public function yen($price, $mode_id = 0) {

        $yen = '';

        switch($mode_id) {

            case 0:
                $yen = number_format($price) .'円';
                break;
            case 1:
                $yen = $price .'円';
                break;
            case 2:
                $yen = '￥'. number_format($price);
                break;
            case 3:
                $yen = '￥'. $price;
                break;
            case 4:
                $yen = '￥'. number_format($price) .'-';
                break;
            case 5:
                $yen = '￥'. $price .'-';
                break;

        }

        return $yen;

    }

    public function consumptionTax($dt, $amount, $total_flag = false) {

        if($dt < Carbon::create(1989, 4, 1, 0, 0, 0)) {

            $percentage = 0;

        } else if($dt < Carbon::create(1997, 4, 1, 0, 0, 0)) {

            $percentage = 0.03;

        } else if($dt < Carbon::create(2014, 4, 1, 0, 0, 0)) {

            $percentage = 0.05;

        } else {

            $percentage = 0.08;

        }

        $tax = floor($amount * $percentage);

        if($total_flag) {

            return $amount + $tax;

        }

        return $tax;

    }


    // Zip

    public function zip($zip, $separator = '-') {

        $zip = mb_convert_kana($zip, 'n');
        $length = strlen($zip);

        if($length === 7) {

            return substr($zip, 0, 3) . $separator . substr($zip, 3, 4);

        }

        return '';

    }

    public function checkZip($zip, $separator = '-') {

        return preg_match('|^[0-9]{3}'. $separator .'[0-9]{4}$|', $zip);

    }

    // Deprecated

    public function monthNames($key_flag = true) {

        return $this->months($key_flag);

    }

    public function monthName($month_no) {

        return $this->month($month_no);

    }

    public function hasMonthName($month_no) {

        return $this->hasMonth($month_no);

    }

    public function oldMonthNames($key_flag = true) {

        return $this->oldMonths($key_flag);

    }

    public function oldMonthName($month_no) {

        return $this->oldMonth($month_no);

    }

    public function hasOldMonthName($month_no) {

        return $this->hasOldMonth($month_no);

    }

    public function japaneseEra($year) {

        return $this->era($year);

    }

    public function japaneseEraYear($year) {

        return $this->eraYear($year);

    }

    public function japaneseEraYears() {

        return $this->eraYears();

    }

    public function japaneseEraNames() {

        return $this->eraNames();

    }

    public function japaneseEraInitials() {

        return $this->eraInitials();

    }

    public function japaneseEraSymbols() {

        return $this->eraSymbols();

    }

    public function commonEraYear($era_year) {

        $this->commonYear($era_year);

    }

    public function convertJapaneseDate($date) {

        return $this->parseDate($date);

    }

    public function yenFormat($number, $mode_id = 0) {

        return $this->yen($number, $mode_id);

    }

}