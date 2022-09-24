<?php 
namespace App\Traits;

use Illuminate\Support\Facades\File;
use Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\SerializesModels;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

trait Service{
    public static function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
    public static function timeLeft($passTime){
        //echo $time;
        $time = time()-$passTime;
        $year = floor($time / (365*24*60*60));
        $month = floor($time / (30*24*60*60));
        $week = floor($time / (7*24*60*60));
        $day = floor($time /(24*60*60));
        $hour = floor($time /(60 * 60));
        $minute = floor(($time/60)%60);
        $seconds = $time%60;
        if($year != 0){
            return $year.' year ago';
        }
        elseif($month != 0){
            return $month.' month ago';
        }
        elseif($week != 0){
            return $week.' week ago';
        }
        elseif($day != 0){
            return $day.' day ago';
        }
        elseif($hour != 0){
            return $hour.' hour ago';
        }
        elseif($minute != 0){
            return $minute.' minutes ago';
        }
        else{
            return $seconds.' seconds ago';
        }
        //return $hour.' hour '.$minute.' minutes '.$seconds.' seconds ago';
    }
    public static function stringSubstr($string){
        if(!empty($string)){
            if(strlen($string)>41){
                $string=substr($string, 0, 41)."...";
                return $string;
            }
            else{
                return $string;
            }
        }
        else{
            return NULL;
        }
    }
    public static function stringSubstrLimit($string=NULL,$limit=NULL){
        if(!empty($string) && !empty($limit)){
            if(strlen($string)>$limit){
                $string=substr($string, 0, $limit)."...";
                return $string;
            }
            else{
                return $string;
            }
        }
        else{
            return NULL;
        }
    }
    public static function randomString($length = 50) {
        $str = "";
        $characters = array_merge(range('A','Z'),range('a','z'), range('0','10000'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
    public function secretString($length = 15){
        $str = "";
        $characters = array_merge(range('A','Z'),range('a','z'), range('0','1000'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
    public static function randomRemebberToken($length = 36) {
        $str = "";
        $characters = array_merge(range('A','Z'),range('a','z'), range('0','100000'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
    
    public static function checkInToday($time){
        if(!$time) return false;
        $date = date('Y-m-d', $time);
        $now = date('Y-m-d');
        $tomorrow = date('Y-m-d', time() + strtotime('tomorrow'));
        $day_after_tomorrow = date('Y-m-d', time() + strtotime('tomorrow + 1 day'));
        if ($date == $now){
            return 1;
        }
        elseif($date == $tomorrow){
            return 2;
        }
        elseif($date == $day_after_tomorrow){
            return 3;
        }
        else{
            return 4;
        }
    }
    public function getUniqueSlug(\Illuminate\Database\Eloquent\Model $model, $value){
        $slug = \Illuminate\Support\Str::slug($value);
        $slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
    public static function slug_create($value = NULL){
        if(empty($value)){
            return;
        }
        $str = strtolower(trim($value));
        $str1 = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str2 = preg_replace('/-+/', "-", $str1);
        return rtrim($str2, '-');
    }
    function get_extension($file) {
        $extension = end(explode(".", $file));
        return $extension ? $extension : false;
    }
    public function getDiscount($rate=NULL,$amount=NULL){
        $discount = 0;
        if(empty($amount)){
            return $discount;
        }
        $discount = ($rate * $amount)/100;
        return $discount;
    }
    //random image get
    public static function randomProfileImage(){
        $images = array(
            "public/front/img/people/1.png",
            "public/front/img/people/2.png",
            "public/front/img/people/3.png",
            "public/front/img/people/4.png",
            "public/front/img/people/5.png",
            "public/front/img/people/6.png",
            "public/front/img/people/7.png",
            "public/front/img/people/8.png",
            "public/front/img/people/9.png",
            "public/front/img/people/10.png",
            "public/front/img/people/11.png",
            "public/front/img/people/12.png",
            "public/front/img/people/13.png",
            "public/front/img/people/14.png",
            "public/front/img/people/15.png",
            "public/front/img/people/16.png",
            "public/front/img/people/17.png",
            "public/front/img/people/18.png",
            "public/front/img/people/19.png",
            "public/front/img/people/20.png"
        );
        $random = mt_rand(0, count($images) - 1);
        return $images[$random];
    }
    
    //get tag for profile
    public static function getTagsProfile($str=NULL){
        if(empty($str)){
            return false;
        }
        $strArray = explode(",",$str);
        return $strArray;
    }
    

    public static function getCountries(){
        $arr = array(
            'BD' => 'Bangladesh',
            'CN' => 'China',
            'EE' => 'Estonia',
            'FI' => 'Finland',
            'FR' => 'France',
            'DE' => 'Germany',
            'IN' => 'India',
            'IE' => 'Ireland',
            'JP' => 'Japan',
            'KR' => 'Korea',
            'KW' => 'Kuwait',
            'MY' => 'Malaysia',
            'NL' => 'Netherlands',
            'NZ' => 'New Zealand',
            'NO' => 'Norway',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'QA' => 'Qatar',
            'SA' => 'Saudi Arabia',
            'RS' => 'Serbia',
            'SG' => 'Singapore',
            'ES' => 'Spain',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'TW' => 'Taiwan',
            'TH' => 'Thailand',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States'
        );
        return $arr;
    }
    public static function industryType(){
        $arr = array(
            'Basic' => 'Basic Industries',
            'Finance' => 'Finance',
            'Capital' => 'Capital Goods',
            'Healthcare' => 'Healthcare',
            'Consumer' => 'Consumer Durables',
            'Miscellaneous' => 'Miscellaneous',
            'Food' => 'Food',
            'Farm' => 'Farm',
            'Hotel' => 'Hotel',
            'Shop' => 'Shop',
            'IT' => 'IT',
            'Freelance' => 'Freelance'
        );
        return $arr;
    }
    public static function job_status(){
        $arr = array(
            'Full' => 'Full Time',
            'Part' => 'Part Time',
            'Contract' => 'Contract Job',
            'Freelance' => 'Freelance'
        );
        return $arr;
    }
    public static function getTotalApplicants($str=NULL){
        if(empty($str)){
            return 0;
        }
        $strArray = explode(",",$str);
        return count($strArray);
    }
    public static function is_job_apply($str=NULL,$user_id=NULL){
        if(empty($str) && empty($user_id)){
            return false;
        }
        $strArray = explode(",",$str);
        foreach($strArray as $row){
            if($user_id == $row){
                return true;
            }
        }
        return false;
    }
    public static function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
        'path' => Paginator::resolveCurrentPath()
     ]);
    }
    public static function getAllCountries(){
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
        return $countries;
    }
}



?>