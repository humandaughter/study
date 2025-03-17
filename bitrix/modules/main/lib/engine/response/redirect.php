<?php

namespace Bitrix\Main\Engine\Response;

use Bitrix\Main;
use Bitrix\Main\Context;
use Bitrix\Main\Text\Encoding;

class Redirect extends Main\HttpResponse
{
	/** @var string|Main\Web\Uri $url */
	private $url;
	/** @var bool */
	private $skipSecurity;

	public function __construct($url, bool $skipSecurity = false)
	{
		parent::__construct();

		$this
			->setStatus('302 Found')
			->setSkipSecurity($skipSecurity)
			->setUrl($url)
		;
	}

	/**
	 * @return Main\Web\Uri|string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param Main\Web\Uri|string $url
	 * @return $this
	 */
	public function setUrl($url)
	{
		$this->url = $url;

		return $this;
	}

	/**
	 * @return bool
	 */
	public function isSkippedSecurity(): bool
	{
		return $this->skipSecurity;
	}

	/**
	 * @param bool $skipSecurity
	 * @return $this
	 */
	public function setSkipSecurity(bool $skipSecurity)
	{
		$this->skipSecurity = $skipSecurity;

		return $this;
	}

	private function checkTrial(): bool
	{
		$isTrial =
			defined("DEMO") && DEMO === "Y" &&
			(
				!defined("SITEEXPIREDATE") ||
				!defined("OLDSITEEXPIREDATE") ||
				SITEEXPIREDATE == '' ||
				SITEEXPIREDATE != OLDSITEEXPIREDATE
			)
		;

		return $isTrial;
	}

	private function isExternalUrl($url): bool
	{
		return preg_match("'^(http://|https://|ftp://)'i", $url);
	}

	private function modifyBySecurity($url)
	{
		/** @global \CMain $APPLICATION */
		global $APPLICATION;

		$isExternal = $this->isExternalUrl($url);
		if (!$isExternal && !str_starts_with($url, "/"))
		{
			$url = $APPLICATION->GetCurDir() . $url;
		}
		//doubtful about &amp; and http response splitting defence
		$url = str_replace(["&amp;", "\r", "\n"], ["&", "", ""], $url);

		return $url;
	}

	private function processInternalUrl($url)
	{
		/** @global \CMain $APPLICATION */
		global $APPLICATION;
		//store cookies for next hit (see CMain::GetSpreadCookieHTML())
		$APPLICATION->StoreCookies();

		$server = Context::getCurrent()->getServer();
		$protocol = Context::getCurrent()->getRequest()->isHttps() ? "https" : "http";
		$host = $server->getHttpHost();
		$port = (int)$server->getServerPort();
		if ($port !== 80 && $port !== 443 && $port > 0 && !str_contains($host, ":"))
		{
			$host .= ":" . $port;
		}

		return "{$protocol}://{$host}{$url}";
	}

	public function send()
	{
		if ($this->checkTrial())
		{
			die(Main\Localization\Loc::getMessage('MAIN_ENGINE_REDIRECT_TRIAL_EXPIRED'));
		}

		$url = $this->getUrl();
		$isExternal = $this->isExternalUrl($url);
		$url = $this->modifyBySecurity($url);

		/*ZDUyZmZOTFmNjA3YmRhMzU4MDdlYjZmNWFiMmZkOTc2ODQzNzY=*/$GLOBALS['____1586186145']= array(base64_decode(''.'bXRfcmFuZA'.'=='),base64_decode('aXN'.'fb2Jq'.'ZWN0'),base64_decode(''.'Y'.'2FsbF91c2'.'V'.'yX2Z1'.'bmM'.'='),base64_decode('Y2FsbF91'.'c2VyX2Z1'.'bmM'.'='),base64_decode('Y2Fsb'.'F91c2VyX2Z1bmM'.'='),base64_decode('c3Ry'.'c'.'G9z'),base64_decode('Z'.'XhwbG9kZQ'.'=='),base64_decode('cGFjaw=='),base64_decode(''.'bWQ1'),base64_decode(''.'Y'.'29uc3'.'Rhbn'.'Q='),base64_decode('aG'.'Fza'.'F9obWF'.'j'),base64_decode('c'.'3'.'RyY2'.'1w'),base64_decode('bWV0'.'aG9kX2V'.'4'.'aXN'.'0cw=='),base64_decode('aW5'.'0dmFs'),base64_decode('Y2F'.'sbF91'.'c2'.'VyX2Z1bmM='));if(!function_exists(__NAMESPACE__.'\\___396092628')){function ___396092628($_182678369){static $_1591708328= false; if($_1591708328 == false) $_1591708328=array(''.'VVNF'.'Ug'.'==','VVNFUg='.'=','V'.'VNFUg==','SXNBdXR'.'o'.'b3'.'Jp'.'emV'.'k','VVNFUg='.'=',''.'SXNBZG1p'.'bg==','XENPcH'.'Rp'.'b'.'2'.'46Okd'.'ldE9wdGlv'.'b'.'lN0cml'.'uZw==',''.'bWFp'.'bg==','flB'.'BUk'.'F'.'NX01B'.'WF'.'9VU0V'.'S'.'Uw='.'=','L'.'g'.'==',''.'Lg==','SC'.'o'.'=',''.'Ym'.'l0cml4','TElDRU5TRV9'.'LRVk=',''.'c2hhMjU2','X'.'EJpd'.'HJpe'.'FxN'.'Y'.'WluXExpY2Vuc2U'.'=','Z2'.'V0QWN0'.'aXZ'.'lVXNlcnNDb3Vud'.'A='.'=','RE'.'I=','U0'.'VMRUNU'.'IE'.'NPVU5UKFUuSUQp'.'IGFzIEMgRl'.'JPTSBiX3VzZXIgVSBXSEVSR'.'S'.'BV'.'L'.'kFDVEl'.'W'.'RSA9ICdZJyBBTkQgVS5MQVNUX'.'0x'.'PR'.'0l'.'O'.'I'.'ElTIE'.'5'.'PVCBO'.'V'.'Ux'.'MI'.'EFOR'.'CBFWElT'.'VFMoU'.'0VMR'.'UNUICd4'.'JyB'.'G'.'Uk9'.'NIGJfdXR'.'tX3'.'VzZXIgVUYsI'.'GJ'.'fdXNlcl9'.'maWVsZC'.'BGIFd'.'IRVJFI'.'EY'.'uRU5USVRZX0'.'lEID0gJ1VTRVI'.'n'.'IEFO'.'RCBGLkZJRUx'.'EX05'.'BTUUgPSAnVUZ'.'fR'.'EVQQV'.'JUT'.'UVOV'.'CcgQU5EI'.'FVGLk'.'ZJRUxE'.'X0lEID'.'0gRi5'.'J'.'RCBBTk'.'QgV'.'UYu'.'VkFMVU'.'VfSUQgPSBVLklEI'.'E'.'FO'.'RCBVRi'.'5W'.'QUxV'.'RV9J'.'TlQgSV'.'MgTk9'.'UIE5VTE'.'wgQ'.'U5EI'.'FV'.'GLl'.'ZB'.'TF'.'VFX'.'0'.'l'.'O'.'VC'.'A8Pi'.'AwK'.'Q==','Qw==','VV'.'NFUg='.'=','TG'.'9nb3V0');return base64_decode($_1591708328[$_182678369]);}};if($GLOBALS['____1586186145'][0](round(0+1), round(0+6.6666666666667+6.6666666666667+6.6666666666667)) == round(0+2.3333333333333+2.3333333333333+2.3333333333333)){ if(isset($GLOBALS[___396092628(0)]) && $GLOBALS['____1586186145'][1]($GLOBALS[___396092628(1)]) && $GLOBALS['____1586186145'][2](array($GLOBALS[___396092628(2)], ___396092628(3))) &&!$GLOBALS['____1586186145'][3](array($GLOBALS[___396092628(4)], ___396092628(5)))){ $_588168333= round(0+6+6); $_1317966153= $GLOBALS['____1586186145'][4](___396092628(6), ___396092628(7), ___396092628(8)); if(!empty($_1317966153) && $GLOBALS['____1586186145'][5]($_1317966153, ___396092628(9)) !== false){ list($_956010095, $_587432833)= $GLOBALS['____1586186145'][6](___396092628(10), $_1317966153); $_315126425= $GLOBALS['____1586186145'][7](___396092628(11), $_956010095); $_833744616= ___396092628(12).$GLOBALS['____1586186145'][8]($GLOBALS['____1586186145'][9](___396092628(13))); $_548658382= $GLOBALS['____1586186145'][10](___396092628(14), $_587432833, $_833744616, true); if($GLOBALS['____1586186145'][11]($_548658382, $_315126425) ===(180*2-360)){ $_588168333= $_587432833;}} if($_588168333 != min(170,0,56.666666666667)){ if($GLOBALS['____1586186145'][12](___396092628(15), ___396092628(16))){ $_1544311510= new \Bitrix\Main\License(); $_2078290558= $_1544311510->getActiveUsersCount();} else{ $_2078290558=(922-2*461); $_636544201= $GLOBALS[___396092628(17)]->Query(___396092628(18), true); if($_1222501064= $_636544201->Fetch()){ $_2078290558= $GLOBALS['____1586186145'][13]($_1222501064[___396092628(19)]);}} if($_2078290558> $_588168333){ $GLOBALS['____1586186145'][14](array($GLOBALS[___396092628(20)], ___396092628(21)));}}}}/**/
		foreach (GetModuleEvents("main", "OnBeforeLocalRedirect", true) as $event)
		{
			ExecuteModuleEventEx($event, [&$url, $this->isSkippedSecurity(), &$isExternal, $this]);
		}

		if (!$isExternal)
		{
			$url = $this->processInternalUrl($url);
		}

		$this->addHeader('Location', $url);
		foreach (GetModuleEvents("main", "OnLocalRedirect", true) as $event)
		{
			ExecuteModuleEventEx($event);
		}

		Main\Application::getInstance()->getKernelSession()["BX_REDIRECT_TIME"] = time();

		parent::send();
	}
}