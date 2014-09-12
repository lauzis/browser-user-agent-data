<?Php


class Browser_Agent_Data
{
   private $get_location_by_ip=0;
   private $ip_addr="0.0.0.0";
   private $dev_ips = array('127.0.0.1');
   private $cache_dir;
   private $cache=1;
   private $user_agent ="";
   
   private $known_visitors = array(
				   array('name'=>'NetcraftSurveyAgent/1.0',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'NetcraftSurveyAgent\/1.0',
					 'info_link'=>''),
				   
				    array('name'=>'Xenu Link Sleuth/',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'Xenu Link Sleuth/',
					 'info_link'=>''),
				    
				    array('name'=>'Who.is Bot/',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'Who.is Bot/',
					 'info_link'=>''),
				    
				    array('name'=>'HubSpot',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'HubSpot',
					 'info_link'=>''),
				    
				    array('name'=>'Go 1.1',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'Go 1.1',
					 'info_link'=>''),
				    
				    array('name'=>'Facebot\/1.0',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'Facebot 1.0',
					 'info_link'=>''),
				    
				    array('name'=>'msnbot\/2.0b',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'msnbot 2.0b',
					 'info_link'=>''),
				    
				    array('name'=>'Niki-Bot',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'Niki-Bot',
					 'info_link'=>''),
				    
				    array('name'=>'Pinterest',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'Pinterest',
					 'info_link'=>''),
				    
				    
				    array('name'=>'msnbot-media',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'msnbot-media',
					 'info_link'=>''),
				    
				    array('name'=>'AppEngine-Google',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'AppEngine-Google',
					 'info_link'=>''),
				    
				    array('name'=>'wsr-agent',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'wsr-agent\/1.0',
					 'info_link'=>''),
				    
				    array('name'=>'GroupHigh\/1.0',
				         'type'=>'Bot',
					 'platform'=>'None',
					 'valid_ips'=>array(),
					 'search_string'=>'GroupHigh/1.0',
					 'info_link'=>''),
				    
				  
				   
				   );
   
   
   
    
   private $browser_name = 'Unknown';
   private $platform_name = 'Unknown';
   private $browser_version= "";
   private $platform_version= "";
   private $type="Unknow";
   private $info_link="Unknow";
   
   
   private function __contruct()
   {
      $this->ip_addr =$_SERVER['REMOTE_ADDR'];
      $this->cache_dir =getcwd();
      $this->user_agent = $_SERVER['HTTP_USER_AGENT'];
   }
   
   static function is_developer()
   {
      return in_array($this->ip_addr,$this->dev_ips);
   }
   
   function get_cache($name)
   {
      $file_path = getcwd().'/cache/'.$name.".cache";
      if (file_exists($file_path))
      {
	 $data_from_file = file_get_contents($file_path);
	 return unserialize($data_from_file);
      }
      else
      {
         return false;
      }
   }
   
   function set_cache($name,$data)
   {
      $file_path = getcwd().'/cache/'.$name.".cache";
      $data = serialize($data);
      file_put_contents($file_path,$data);    
   }
   function detect_after_ip()
{
    // function for detecting lcoation via ip adress
    //
            
    $ip = $_SERVER['REMOTE_ADDR'];
    $ip_ = str_replace(".","-",$ip);
    
    $data_from_cache=get_cache('ip_cache_'.$ip_);
    
    // we cache location by ip, if there is cache taking from cache the location
    if ($data_from_cache)
    {
        return $data_from_cache;
    }
    else
    {

        //there is no location cache so we have to get from outer services
        $opts = array('http' => array('timeout' => 3));
	$context  = stream_context_create($opts);
	$json = file_get_contents(
	    'http://api.ipinfodb.com/v3/ip-city/?format=json&ip='.$ip.'&key=d409d3f5fd3dc292f19b6e03f1afef7b818d99ee5da46fdcd9a10e2a7f3fd280'
	);
        $results = json_decode($json);
        if($results->statusCode=='OK')
	{
            //we got some results
	    // save results in session for later use
				
	    //getting city params
            
            set_cache('ip_cache_'.$ip_,$results);
            return $results;

	}
        else
        {
           return "unknow"; 
        }
    }
    
   function checkBrowserData()
   {
    
    

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
   
}



 






}
