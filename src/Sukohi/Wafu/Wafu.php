<?php namespace Sukohi\Wafu;

use Carbon\Carbon;

class Wafu {

    // Week Name

    private $_week_name = [
        '0' => '日',
        '1' => '月',
        '2' => '火',
        '3' => '水',
        '4' => '木',
        '5' => '金',
        '6' => '土'
    ];

    public function weekNames() {

        return $this->_week_name;

    }

    public function weekName($week_no) {

        if(is_object($week_no) && get_class($week_no) == 'Carbon\Carbon') {

            $week_no = $week_no->dayOfWeek;

        }

        if($this->_week_name[$week_no]) {

            return $this->_week_name[$week_no];

        }

        return '';

    }

    public function hasWeekName($week_no) {

        $week_name = $this->weekName($week_no);
        return !empty($week_name);

    }

    // Gender

    private $_genders = [
        '1' => '男性',
        '2' => '女性',
        '0' => 'その他',
    ];

    public function genders($other_flag = false) {

        $genders = $this->_genders;

        if($other_flag) {

            unserialize($genders[0]);

        }

        return $genders;

    }

    public function gender($gender_id) {

        if($this->hasGender($gender_id)) {

            return $this->_genders[$gender_id];

        }

        return '';

    }

    public function hasGender($gender_id) {

        return isset($this->_genders[$gender_id]);

    }

    // Prefectures

    private $_prefectures = [
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

    public function prefectures() {

        return $this->_prefectures;

    }

    public function prefecture($prefecture_id) {

        if($this->hasPrefecture($prefecture_id)) {

            return $this->_prefectures[$prefecture_id];

        }

        return '';

    }

    public function hasPrefecture($prefecture_id) {

        return (isset($this->_prefectures[$prefecture_id]));

    }

    public function prefectureId($prefecture_name) {

        $id = array_search($prefecture_name, $this->_prefectures);

        if($id === false) {

            return -1;

        }

        return $id;

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

}