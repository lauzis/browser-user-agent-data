<?Php


function getBrowserData()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    $type="Unknow";
    $info_link="Unknow";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
   
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
        $type="Browser";
        
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
        $type="Browser";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
        $type="Browser";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
        $type="Browser";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
        $type="Browser";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
        $type="Browser";
    }elseif(preg_match('/rogerbot/i',$u_agent))
    {
        $bname = 'Rogerbot';
        $ub = "Rogerbot";
        $type="Bot";
    }
    elseif(preg_match('/Yahoo! Slurp/i',$u_agent))
    {
        $bname = 'Yahoo Slurp';
        $ub = "Yahoo Slurp";
        $type="Bot";
    }elseif(preg_match('/bingbot/i',$u_agent))
    {
        $bname = 'Bing';
        $ub = "Bing";
        $type="Bot";
    }elseif(preg_match('/dotbot/i',$u_agent))
    {
        $bname = 'Dotbot';
        $ub = "Dotbot";
        $type="Bot";
    }
    elseif(preg_match('/MSIE 7.0; Windows NT 6.1;/i',$u_agent))
    {
        $bname = 'MSIE 7.0';
        $ub = "MSIE 7.0";
        $platform="windows";
    }
    elseif(preg_match('/AdsBot-Google/i',$u_agent))
    {
        $bname = 'AdsBot-Google';
        $ub = "AdsBot-Google";
        $type="Bot";
    }
    elseif(preg_match('/LinkedInBot/i',$u_agent))
    {
        $bname = 'LinkedInBot';
        $ub = "LinkedInBot";
        $type="Bot";
    }
    elseif(preg_match('/MJ12bot/i',$u_agent))
    {
        $bname = 'MJ12bot';
        $ub = "MJ12bot";
        $type="Bot";
    }
    elseif(preg_match('/Googlebot/i',$u_agent))
    {
        //
        $bname = 'Googlebot';
        $ub = "Googlebot";
        $type="Bot";
    }
    elseif(preg_match('/NerdyBot/i',$u_agent))
    {
        //
        $bname = 'NerdyBot';
        $ub = "NerdyBot";
        $type="Bot";
    }
    elseif(preg_match('/Twitterbot/i',$u_agent))
    {
        //
        $bname = 'Twitterbot';
        $ub = "Twitterbot";
        $type="Bot";
    }
    elseif(preg_match('/WebTarantula.com Crawler/i',$u_agent))
    {
        $bname = 'WebTarantula.com Crawler';
        $ub = "WebTarantula.com Crawler";
        $type="Bot";
    }
    elseif(preg_match('/Feedly/i',$u_agent))
    {
        $bname = 'Feedly';
        $ub = "Feedly";
        $type="Bot";
    }
    elseif(preg_match('/Mediapartners-Google/i',$u_agent))
    {
        $bname = 'Mediapartners-Google';
        $ub = "Mediapartners-Google";
        $type="Bot";
    }
    elseif(preg_match('/ia_archiver/i',$u_agent))
    {
        $bname = 'ia_archiver';
        $ub = "ia_archiver";
        $type="Bot";
    }
    elseif(preg_match('/Amazon CloudFront/i',$u_agent))
    {
        $bname = 'Amazon CloudFront';
        $ub = "Amazon CloudFront";
        $type="Bot";
    }
    elseif(preg_match('/BlogSearch/i',$u_agent))
    {
        $bname = 'BlogSearch';
        $ub = "BlogSearch";
        $type="Bot";
    }
    elseif(preg_match('/NetSeer crawler/i',$u_agent))
    {
        $bname = 'NetSeer crawler';
        $ub = "NetSeer crawler";
        $type="Bot";
    }
    elseif(preg_match('/SiteExplorer/i',$u_agent))
    {
        $bname = 'SiteExplorer';
        $ub = "SiteExplorer";
        $type="Bot";
    }
    elseif(preg_match('/meanpathbot/i',$u_agent))
    {
        $bname = 'meanpathbot';
        $ub = "meanpathbot";
        $type="Bot";
    }
    
    elseif(preg_match('/Google-Site-Verification/i',$u_agent))
    {
        $bname = 'Google-Site-Verification';
        $ub = "Google-Site-Verification";
        $type="Bot";
    }
    elseif(preg_match('/sparklemotion/i',$u_agent))
    {
        $bname = 'sparklemotion';
        $ub = "sparklemotion";
        $type="Bot";
    }
    elseif(preg_match('/Genieo/i',$u_agent))
    {
        $bname = 'Genieo';
        $ub = "Genieo";
        $type="Bot";
    }
    elseif(preg_match('/YandexBot/i',$u_agent))
    {
        $bname = 'YandexBot';
        $ub = "YandexBot";
        $type="Bot";
    }
    elseif(preg_match('/200PleaseBot/i',$u_agent))
    {
        $bname = '200PleaseBot';
        $ub = "200PleaseBot";
        $type="Bot";
    }
    elseif(preg_match('/KomodiaBot/i',$u_agent))
    {
        $bname = 'KomodiaBot';
        $ub = "KomodiaBot";
        $type="Bot";
    }
    elseif(preg_match('/URLChecker/i',$u_agent))
    {
        $bname = 'URLChecker';
        $ub = "URLChecker";
        $type="Bot";
    }
    elseif(preg_match('/FreeWebMonitoring/i',$u_agent))
    {
        $bname = 'FreeWebMonitoring';
        $ub = "FreeWebMonitoring";
        $type="Bot";
    }
    elseif(preg_match('/Gigabot/i',$u_agent))
    {
        $bname = 'Gigabot';
        $ub = "Gigabot";
        $type="Bot";
    }
    elseif(preg_match('/Exabot/i',$u_agent))
    {
        $bname = 'Exabot';
        $ub = "Exabot";
        $type="Bot";
    }
    elseif(preg_match('/SimplePie/i',$u_agent))
    {
        $bname = 'SimplePie';
        $ub = "SimplePie";
        $type="Bot";
    }
    elseif(preg_match('/facebookexternalhit/i',$u_agent))
    {
        $bname = 'facebookexternalhit';
        $ub = "facebookexternalhit";
        $type="Bot";
    }
    elseif(preg_match('/YahooCacheSystem/i',$u_agent))
    {
        $bname = 'YahooCacheSystem';
        $ub = "YahooCacheSystem";
        $type="Bot";
    }
    elseif(preg_match('/ruby/i',$u_agent))
    {
        $bname = 'ruby';
        $ub = "ruby";
        $type="Bot";
    }elseif(preg_match('/ruby/i',$u_agent))
    {
        $bname = 'W3C_Validator';
        $ub = "W3C_Validator";
        $type="Bot";
    }
    elseif(preg_match('/special_archiver/i',$u_agent))
    {
        $bname = 'special_archiver';
        $ub = "special_archiver";
        $type="Bot";
    }
    elseif(preg_match('/archive.org_bot/i',$u_agent))
    {
        $bname = 'archive.org_bot';
        $ub = "archive.org_bot";
        $type="Bot";
    }
    elseif(preg_match('/archive.org_bot/i',$u_agent))
    {
        $bname = 'oBot';
        $ub = "oBot";
        $type="Bot";
    }
    elseif(preg_match('/Xenu Link Sleuth/i',$u_agent))
    {
        $bname = 'Xenu Link Sleuth';
        $ub = "Xenu Link Sleuth";
        $type="Bot";
    }
    elseif(preg_match('/Who.is Bot/i',$u_agent))
    {
        $bname = 'Who.is Bot';
        $ub = "Who.is Bot";
        $type="Bot";
    }elseif(preg_match('/HubSpot/i',$u_agent))
    {
        $bname = 'HubSpot';
        $ub = "HubSpot";
        $type="Bot";
    }elseif(preg_match('/Go 1.1/i',$u_agent))
    {
        $bname = 'Go 1.1';
        $ub = "Go 1.1";
        $type="Bot";
    }
    elseif(preg_match('/Facebot\/1.0/i',$u_agent))
    {
        $bname = 'Facebot/1.0';
        $ub = "Facebot/1.0";
        $type="Bot";
    }elseif(preg_match('/msnbot\/2.0b/i',$u_agent))
    {
        $bname = 'msnbot/2.0b';
        $ub = "msnbot/2.0b";
        $type="Bot";
    }
    elseif(preg_match('/Niki-Bot/i',$u_agent))
    {
        $bname = 'Niki-Bot';
        $ub = "Niki-Bot";
        $type="Bot";
    }elseif(preg_match('/Pinterest/i',$u_agent))
    {
        $bname = 'Pinterest';
        $ub = "Pinterest";
        $type="Bot";
    }
    elseif(preg_match('/msnbot-media/i',$u_agent))
    {
        $bname = 'msnbot-media';
        $ub = "msnbot-media";
        $type="Bot";
    }
    elseif(preg_match('/AppEngine-Google/i',$u_agent))
    {
        $bname = 'AppEngine-Google';
        $ub = "AppEngine-Google";
        $type="Bot";
    }
    elseif(preg_match('/wsr-agent\/1.0/i',$u_agent))
    {
        $bname = 'wsr-agent/1.0';
        $ub = "wsr-agent/1.0";
        $type="Bot";
    }
    elseif(preg_match('/GroupHigh\/1.0/i',$u_agent))
    {
        $bname = 'GroupHigh/1.0';
        $ub = "GroupHigh/1.0";
        $type="Bot";
    }
    elseif(preg_match('/NetcraftSurveyAgent/1.0/i',$u_agent))
    {
        $bname = 'NetcraftSurveyAgent/1.0';
        $ub = "NetcraftSurveyAgent/1.0";
        $type="Bot";
    }
    

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
   
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
   
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
   
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern,
        'type'=> $type,
        'info_link'=>$info_link
        
    );
}