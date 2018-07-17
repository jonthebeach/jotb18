<?php

if (! function_exists('prep_url')) {
    /**
     * Prep URL
     *
     * Simply adds the http:// part if no scheme is included
     *
     * @param   string  the URL
     * @return  string
     */
    function prep_url($str = '')
    {
        if ($str === 'http://' or $str === '') {
            return '';
        }
        $url = parse_url($str);
        if (! $url or ! isset($url['scheme'])) {
            return 'http://'.$str;
        }
        return $str;
    }

    /**
     * Return a pretty output
     */
    function _d($str = '')
    {
        echo '<pre>';
        print_r($str);
        echo '</pre>';
    }
}
