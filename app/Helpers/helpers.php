<?php
if (!function_exists('number2word')) {
    /**
     * @param $num
     * @return string
     * @internal param array $set_response
     * @internal param string $middleware
     */
    function number2word($num)
    {
        $word = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        if ($num < 12) return " " . $word[$num]; else
            if ($num < 20) return number2word($num - 10) . " Belas"; else
                if ($num < 100) return number2word($num / 10) . " Puluh" . number2word($num % 10); else
                    if ($num < 200) return " Seratus" . number2word($num - 100); else
                        if ($num < 1000) return number2word($num / 100) . " Ratus" . number2word($num % 100); else
                            if ($num < 2000) return " Seribu" . number2word($num - 1000); else
                                if ($num < 1000000) return number2word($num / 1000) . " Ribu" . number2word($num % 1000); else
                                    if ($num < 1000000000) return number2word($num / 1000000) . " Juta" . number2word($num % 1000000);
    }
}