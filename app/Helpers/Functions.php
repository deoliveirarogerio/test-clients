<?php

/**
 * ###################
 * ###   LARAVEL   ###
 * ###################
 */
if (!function_exists('user')) {
    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function user()
    {
        return \Illuminate\Support\Facades\Auth::user();
    }
}

function under_maintenance()
{

    return redirect()->route('web.maintenance');
}

if (!function_exists('nav_active')) {
    /**
     * @param string $href
     * @param string|null $class
     * @return string|null
     */
    function nav_active(string $href, ?string $class = 'active'): ?string
    {
        return $class = (strpos(\Illuminate\Support\Facades\Route::currentRouteName(), $href) === 0 ? $class : '');
    }
}

/**
 * ################
 * ###   DATE   ###
 * ################
 */
if (!function_exists('date_fmt')) {
    /**
     * @param string|null $date
     * @param string $format
     * @return string
     * @throws Exception
     */
    function date_fmt(?string $date, string $format = 'd/m/Y H\hi'): string
    {
        $date = (empty($date) ? 'now' : $date);
        return (new \DateTime($date))->format($format);
    }
}

/**
 * #################
 * ###   IMAGE   ###
 * #################
 */
if (!function_exists('image')) {
    /**
     * @param string|null $image
     * @param int $width
     * @param int|null $height
     * @return string|null
     * @throws Exception
     */
    function image(?string $image, int $width, ?int $height = null): ?string
    {
        if ($image) {
            return \Illuminate\Support\Facades\Storage::url((new \App\Support\Thumb())->make($image, $width, $height));
        }

        return null;
    }
}

/**
 * ##################
 * ###   STRING   ###
 * ##################
 */
if (!function_exists('ucwords'))
{
    /**
     * @param string $string
     * @return string
     */
    function getNameAttribute(string $string): string
    {
        return ucwords($string);
    }
}

if (!function_exists('mb_convert_case')) {
    /**
     * @param string $string
     * @return string
     */
    function str_title(string $string): string
    {
        return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);
    }
}

if (!function_exists('str_limit_words')) {
    /**
     * @param string|null $string
     * @param int $limit
     * @param string $pointer
     * @return string|null
     */
    function str_limit_words(?string $string, int $limit, string $pointer = '...'): ?string
    {
        $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
        $arrWords = explode(' ', $string);
        $numWords = count($arrWords);

        if ($numWords < $limit) {
            return $string;
        }

        $words = implode(' ', array_slice($arrWords, 0, $limit));
        return "{$words}{$pointer}";
    }
}

if (!function_exists('str_limit_chars')) {
    /**
     * @param string|null $string
     * @param int $limit
     * @param string $pointer
     * @return string
     */
    function str_limit_chars(?string $string, int $limit, string $pointer = '...'): string
    {
        $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
        if (mb_strlen($string) <= $limit) {
            return $string;
        }

        $chars = mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), ' '));
        return "{$chars}{$pointer}";
    }
}

if (!function_exists('str_price')) {
    /**
     * @param string|null $price
     * @return string
     */
    function str_price(?string $price): string
    {
        return number_format((!empty($price) ? $price : 0), 2, ',', '.');
    }
}

if (!function_exists('str_convert_to_double')) {
    /**
     * @param string|null $param
     * @return float|null
     */
    function str_convert_to_double(?string $param): ?float
    {
        if (empty($param)) {
            return null;
        }

        return (float)str_replace(',', '.', str_replace('.', null, $param));
    }
}

if (!function_exists('str_convert_to_phone')) {
    /**
     * Convert 1212345678 to (12) 1234-5678 or 12912345678 to (12) 91234-5678
     *
     * @param string|null $param
     * @return string|null
     */
    function str_convert_to_phone(?string $param): ?string
    {
        if (empty($param)) {
            return null;
        }

        if (strlen($param) == 10) {
            return
                '(' . substr($param, 0, 2) . ') ' .
                substr($param, 2, 4) . '-' .
                substr($param, 6, 4);
        }

        if (strlen($param) == 11) {
            return
                '(' . substr($param, 0, 2) . ') ' .
                substr($param, 2, 5) . '-' .
                substr($param, 7, 4);
        }

        return $param;
    }
}

if (!function_exists('str_convert_to_document')) {
    /**
     * CPF
     * Convert 66200328005 to 662.003.280-05
     *
     * CNPJ
     * Convert 77978407000112 to 77.978.407/0001-12
     *
     * @param string|null $param
     * @return string|null
     */
    function str_convert_to_document(?string $param): ?string
    {
        if (empty($param)) {
            return null;
        }

        if (strlen($param) == 11) {
            return
                substr($param, 0, 3) . '.' .
                substr($param, 3, 3) . '.' .
                substr($param, 6, 3) . '-' .
                substr($param, 9, 2);
        }

        if (strlen($param) == 14) {
            return
                substr($param, 0, 2) . '.' .
                substr($param, 2, 3) . '.' .
                substr($param, 5, 3) . '/' .
                substr($param, 8, 4) . '-' .
                substr($param, 12, 2);
        }

        return $param;
    }
}

if (!function_exists('str_convert_to_zip_code')) {
    /**
     * Convert 12345678 to 12345-678
     *
     * @param string|null $param
     * @return string|null
     */
    function str_convert_to_zip_code(?string $param): ?string
    {
        if (empty($param)) {
            return null;
        }

        return substr($param, 0, 5) . '-' . substr($param, 5, 3);
    }
}

if (!function_exists('str_search')) {
    /**
     * @param string|null $search
     * @return string
     */
    function str_search(?string $search): string
    {
        if (!$search) {
            return 'all';
        }

        $search = preg_replace('/[^a-z0-9A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\@\ ]/', null, $search);
        return (!empty($search) ? urlencode(mb_strtolower($search)) : 'all');
    }
}

if (!function_exists('clear_number')) {
    /**
     * @param string|null $number
     * @return string|null
     */
    function clear_number(?string $number): ?string
    {
        if (!$number) {
            return null;
        }
        return preg_replace('/[^0-9]/', null, $number);
    }
}

if (!function_exists('reading_time')) {
    /**
     * Slow Reading: 100 words per minute
     * Average Reading: 130 words per minute
     * Quick Reading: 160 words per minute
     *
     * @param string|null $text
     * @param int $wordsPerMinute
     * @param string $minute
     * @param string $second
     * @return string
     */
    function reading_time(
        ?string $text,
        int $wordsPerMinute = 130,
        string $minute = 'min',
        string $second = 's'
    ): string {
        $countWords = str_word_count(strip_tags($text));

        $wordsPerSecond = $wordsPerMinute / 60;
        $totalSeconds = floor($countWords / $wordsPerSecond);

        return ($totalSeconds >= 60 ? floor($totalSeconds / 60) . $minute : $totalSeconds . $second);
    }
}

if (!function_exists('highlight_keywords')) {
    /**
     * @param string $text
     * @param string $keyword
     * @param string $delimiter
     * @return string
     */
    function highlight_keywords(string $text, string $keyword, string $delimiter = '+'): string
    {
        $words = explode($delimiter, $keyword);

        for ($i = 0; $i < count($words); $i++) {

            if (strlen($words[$i]) > 4) {
                $highlighted = "<mark>$words[$i]</mark>";
                $text = str_ireplace($words[$i], $highlighted, $text);
            }
        }

        return $text;
    }
}

/**
 * ##################
 * ###   SOCIAL   ###
 * ##################
 */
if (!function_exists('whatsapp_message')) {
    /**
     * @param string $phone
     * @param string|null $text
     * @param int $countryCode
     * @return string
     */
    function whatsapp_message(string $phone, ?string $text = null, int $countryCode = 55): string
    {
        $phone = clear_number($phone);
        $text = ($text ? '&text=' . urlencode($text) : null);
        return "https://api.whatsapp.com/send?phone={$countryCode}{$phone}{$text}";
    }
}

if (!function_exists('share_url_whatsapp')) {
    /**
     * @param string $title
     * @param string $url
     * @return string
     */
    function share_url_whatsapp(string $title, string $url): string
    {
        $text = urlencode($title . ' - ' . url($url));
        return "https://api.whatsapp.com/send?text={$text}";
    }
}

/**
 * #################
 * ###   SHARE   ###
 * #################
 */
if (!function_exists('share_url_facebook')) {
    /**
     * @param string $url
     * @return string
     */
    function share_url_facebook(string $url): string
    {
        return 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode(url($url));
    }
}

if (!function_exists('share_url_twitter')) {
    /**
     * @param string $text
     * @param string $url
     * @return string
     */
    function share_url_twitter(string $text, string $url): string
    {
        $text = urlencode($text);
        $url = urlencode(url($url));
        $via = str_replace('@', null, env('WEBSITE_SOCIAL_TWITTER_CREATOR'));
        return "http://twitter.com/share?text={$text}&url={$url}&via={$via}";
    }
}

if (!function_exists('share_url_linkedin')) {
    /**
     * @param string $title
     * @param string $summary
     * @param string $url
     * @return string
     */
    function share_url_linkedin(string $title, string $summary, string $url): string
    {
        $title = urlencode($title);
        $summary = urlencode($summary);
        $url = urlencode(url($url));
        $source = urlencode(env('APP_NAME') . ' - ') . env('WEBSITE_DOMAIN');
        return "https://www.linkedin.com/shareArticle?mini=true&title={$title}&summary={$summary}&url={$url}&source={$source}";
    }
}

if (!function_exists('share_url_pinterest')) {
    /**
     * @param string $image
     * @param string $url
     * @param string|null $description
     * @return string
     */
    function share_url_pinterest(string $image, string $url, string $description = null): string
    {
        $url = urlencode(url($url));
        $description = ($description ? '&description=' . urlencode($description) : null);
        return "https://pinterest.com/pin/create/button/?url={$url}&media=" . $image . $description;
    }
}

if (!function_exists('share_url_email')) {
    /**
     * @param string $subject
     * @param string $url
     * @param string|null $recipientEmail
     * @return string
     */
    function share_url_email(string $subject, string $url, string $recipientEmail = null): string
    {
        $body = urlencode(url($url));
        return "mailto:{$recipientEmail}?subject={$subject}&body={$body}";
    }
}

/**
 * #######################
 * ###   FORMAT DATE   ###
 * #######################
 */

if(!function_exists('date_day_count')) {
    /**
     * @param string $date
     * @return false|int
     * @throws Exception
     */
    function date_day_count(string $date)
    {
        $now = new DateTime();
        $day = new DateTime($date);
        $diff = $now->diff($day);

        if ($diff->days < 1) {
            return "Hoje";
        } elseif ($diff->days == 1) {
            return "Ontem";
        } elseif ($diff->days == 2) {
            return "Anteontem";
        }

        return "há {$diff->days} dias";
    }
}

//if (!function_exists('countDays')) {
//    function countDays()
//    {
//        $date1 = \Carbon\Carbon::createFromFormat('Y-m-d', '2020-01-01');
//        $date2 = \Carbon\Carbon::createFromFormat('Y-m-d', '2020-04-01');
//
//       return $value = $date2->diffInDays($date1); // saída: 365 dias
//    }
//}
