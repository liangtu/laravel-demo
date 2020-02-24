<?php

namespace App\Services\SignVerify;

use Request;

use App\Services\SignVerify\Constant\Constants;
use App\Services\SignVerify\Constant\HttpHeader;
use App\Services\SignVerify\Constant\SystemHeader;

class Verify
{
    public static function verify()
    {
        $sign = self::generateSign();

        if ($sign !== Request::header(SystemHeader::X_CA_SIGNATURE)) {
            return false;
        }
        return true;
    }

    private static function generateSign()
    {
        $signStr = self::buildStringToSign();

        return base64_encode(hash_hmac('sha256', $signStr, 'i8yl28ptmrgnbvdfm8hack33r0de6ux4', true));
    }

    private static function buildStringToSign()
    {
        $sb = Request::method() . Constants::LF;

        if (Request::header(HttpHeader::HTTP_HEADER_ACCEPT) != NULL) {
            $sb.= Request::header(HttpHeader::HTTP_HEADER_ACCEPT);
        }
        $sb .= Constants::LF;

        if (Request::header(HttpHeader::HTTP_HEADER_CONTENT_MD5) != NULL) {
            $sb.= Request::header(HttpHeader::HTTP_HEADER_CONTENT_MD5);
        }
        $sb .= Constants::LF;

        if (Request::header(HttpHeader::HTTP_HEADER_CONTENT_TYPE) != NULL) {
            $sb.= Request::header(HttpHeader::HTTP_HEADER_CONTENT_TYPE);
        }
        $sb .= Constants::LF;
        
        if (Request::header(HttpHeader::HTTP_HEADER_DATE) != NULL) {
            $sb.= Request::header(HttpHeader::HTTP_HEADER_DATE);
        }
        $sb .= Constants::LF;

        $sb .= self::buildHeaders();
        $sb .= self::buildResource();

        return $sb;
    }

    private static function buildHeaders()
    {
        $signHeaderPrefixList = self::getSignHeaderPrefixList();
        
        $sb = "";

        foreach ($signHeaderPrefixList as $headerKey) {

            $headerValue = Request::header($headerKey);

            if ($headerValue != NUll) {
                $sb .= $headerKey;
                $sb .= Constants::SPE2;

                if (0 < strlen($headerValue)) {
                    $sb .= $headerValue;
                }
                $sb .= Constants::LF;
            }
        }
        return $sb;
    }

    private static function buildResource()
    {
        $path   = Request::path();

        //包含body
        $querys = Request::input();

        $sb     = "";

		if (0 < strlen($path))
        {
			$sb .= '/' . $path;
        }
        
        $sbParam    = "";
		$sortParams = [];

        if (is_array($querys)) {
            foreach ($querys as $itemKey => $itemValue) {
				if (0 < strlen($itemKey)) {
					$sortParams[$itemKey] = $itemValue;
				}
			}
        }

        ksort($sortParams);

        //参数Key 
		foreach ($sortParams as $itemKey => $itemValue) {
			if (0 < strlen($itemKey)) {
				if (0 < strlen($sbParam)) {
					$sbParam.="&";
				}
				$sbParam .= $itemKey;
                if (NULL != $itemValue) {
					if (0 < strlen($itemValue)) {
						$sbParam .= "=" . $itemValue;
					}
                 }
			}
		}
		if (0 < strlen($sbParam)) {
			$sb .= "?" . $sbParam;
        }
        
		return $sb;
    }

    private static function getSignHeaderPrefixList()
    {
        $signHeaderPrefixList = explode(',', Request::header(SystemHeader::X_CA_SIGNATURE_HEADERS));

        unset($signHeaderPrefixList[SystemHeader::X_CA_SIGNATURE]);
        unset($signHeaderPrefixList[HttpHeader::HTTP_HEADER_ACCEPT]);
        unset($signHeaderPrefixList[HttpHeader::HTTP_HEADER_CONTENT_MD5]);
        unset($signHeaderPrefixList[HttpHeader::HTTP_HEADER_CONTENT_TYPE]);
        unset($signHeaderPrefixList[HttpHeader::HTTP_HEADER_DATE]);

        ksort($signHeaderPrefixList);

        return $signHeaderPrefixList;
    }

}