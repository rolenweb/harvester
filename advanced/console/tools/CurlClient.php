<?php
namespace console\tools;

use yii;
use console\tools\ClientInterface;
use yii\base\InvalidConfigException;

class CurlClient implements ClientInterface
{
	private $curl;
	private $url;
	private $result;
	private $request_info;
	protected $max_redirects = 5;
	protected $timeout = 10;

	public function __construct()
	{
		$this->curl = curl_init();
	}

	/**
	 * @inheritdoc
	 */
	public function setUrl($url)
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @inheritdoc
	 */
	public function getContent()
	{
		$this->applySettings();
		$this->result = curl_exec($this->curl);
		$this->request_info = curl_getinfo($this->curl);

		return $this->result;
	}

	/**
	 * @inheritdoc
	 */
	public function getContentWithInfo($type = null,$ip = null, $port = null)
	{
		$this->applySettings($type,$ip,$port);
		$this->result = curl_exec($this->curl);
		$this->request_info = curl_getinfo($this->curl);

		return [
			'result' => $this->result,
			'info' => $this->request_info,
			];
	}



	/**
	 * @inheritdoc
	 */
	public function getResponse()
	{
		// @todo implement
	}

	public function getContentType()
	{
		if (isset($this->request_info['content_type'])) {
			return $this->request_info['content_type'];
		}
	}

	protected function applySettings($type = null,$ip = null, $port = null)
	{
		if (empty($this->url)) {
			throw new InvalidConfigException('URL should be specified');
		}

		array_map('unlink', glob(Yii::getAlias('@app')."/cookiefile/*"));
		$ckfile = tempnam(Yii::getAlias('@app')."/cookiefile", "CURLCOOKIE");
        $useragent = 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.2 (KHTML, like Gecko) Chrome/5.0.342.3 Safari/533.2';
        $f = fopen(Yii::getAlias('@app').'/cookiefile/log.txt', 'w'); // file to write request 

		curl_setopt($this->curl, CURLOPT_URL, $this->url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_MAXREDIRS, $this->max_redirects);
		curl_setopt($this->curl, CURLOPT_HTTPHEADER, ['Expect:']);
		curl_setopt($this->curl, CURLOPT_TIMEOUT, $this->timeout);
		curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
		curl_setopt($this->curl, CURLOPT_COOKIEJAR, $ckfile);
		curl_setopt($this->curl, CURLOPT_USERAGENT, $useragent);
		if ($type === 'socks5') {

			curl_setopt ($this->curl, CURLOPT_PROXY, $ip.':'.$port); 
         	curl_setopt ($this->curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5); 
		}
		if ($type === 'socks4') {
			curl_setopt ($this->curl, CURLOPT_PROXY, $ip.':'.$port); 
         	curl_setopt ($this->curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4); 
		}
	}

	public function __destruct()
	{
		curl_close($this->curl);
	}
}