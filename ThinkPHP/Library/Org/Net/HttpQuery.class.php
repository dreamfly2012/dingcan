<?php
/**
 * HTTP请求类
 *
 */
namespace Org\Net;

class HttpQuery {
    /**
     * 是否Debug
     *
     * @access public
     * @var boolean
     */
    public $debug = false;

    /**
     * 请求模式，socket或curl
     *
     * @access public
     * @var string
     */
    public $mode = 'curl';

    /**
     * 是否返回请求结果, false代表发送异步请求
     *
     * @access public
     * @var boolean
     */
    public $return = true;

    /**
     * 是否获取应答头
     *
     * @access public
     * @var boolean
     */
    public $reheader = false;

    /**
     * 超时时间
     *
     * @access public
     * @var integer
     */
    public $timeout = 30;

    /**
     * 是否追踪跳转
     *
     * @access public
     * @var boolean
     */
    public $follow_location = false;

    /**
     * 应答头信息数据池
     *
     * @access public
     */
    private $_header_pool = array();

    /**
     * 构造函数
     *
     * @access public
     * @param string $mode 请求模式, 值只能是socket或curl其中一个
     * @param boolean $return 是否返回请求结果, false代表发送异步请求
     * @param integer $timeout 请求超时时间
     * @param boolean $reheader 是否返回响应头信息
     * @param boolean $follow_location 是否追踪跳转
     * @throws CException
     */
    public function __construct($mode = null, $return = true, $timeout = 30, $reheader = false, $follow_location = false) {
        if (null === $mode) {
            if (function_exists('curl_init'))
                $this->mode = 'curl';
            elseif (function_exists('fsockopen'))
                $this->mode = 'socket';
            else
                throw new CException(Dh::t('dh', 'The class CHttpQuery need to "curl" or "socket" support.'));
        } else {
            $this->mode = $mode;
        }
        $this->return = $return;
        $this->timeout = $timeout;
        $this->reheader = $reheader;
        $this->follow_location = $follow_location;
    }

    /**
     * 析构函数
     *
     * @access public
     */
    public function __destruct() {

    }

    /**
     * 通过socket发送单条请求
     *
     * @access public
     * @version 0.10
     * @param string $url 请求网址
     * @param string $method 请求方式, 值只能是get或post的其中一个
     * @param string|array $data 请求参数
     * @param boolean $return 是否返回页面结果
     * @param integer $timeout 请求超时时间, 如果$return为真时, 这个数值将自动设置为1
     * @param boolean $reheader 是否返回响应头信息
     * @param array $header 附加请求头, 必须为数组
     * @return mixed
     * 		当$reheader为真时, 返回数组		array('header' => 头信息, 'content' => 页面内容)
     * 		当$reheader为假时, 返回字符串		页面内容
     */
    public function socketQuerySingle($url, $method = 'get', $data = null, $return = null, $timeout = 30, $reheader = null, $header = array()) {
        if (empty($url))
            return false;

        $method = strtoupper($method);
        $query_data = $this->parseData($data);

        if (null === $return)
            $return = $this->return;
        if (null === $reheader)
            $reheader = $this->reheader;

        $url = $this->parseUrl($url);
        $fp = @fsockopen($url['host'], 80, $errno, $errstr, $timeout);
        $this->trace("Query by socket [ {$method} ] => {$url['host']}");
        if (!$fp) {
            $this->trace("Query by socket [ {$method} ] => <span style=\"color:red\">Failed</span>");
            return false;
        } else {
            $result = array('header' => '', 'content' => '');
            if ('GET' == $method && '' != $query_data)
                $url['uri'] .= '?' . $query_data;

            $out = $method . " {$url['uri']} HTTP/1.0\r\n";
            $out .= "Accept: */*\r\n";
            $out .= "Accept-Language: zh-cn\r\n";
            $out .= "User-Agent: {$_SERVER['HTTP_USER_AGENT']}\r\n";
            $out .= "Host: {$url['host']}\r\n";
            $out .= "Content-type: application/x-www-form-urlencoded\r\n";
            if (!empty($header) && is_array($header))
                $out .= implode("\r\n", $header);
            if ('POST' == $method && '' != $query_data) {
                $out .= 'Content-length: ' . strlen($query_data) . "\r\n";
                $out .= "Connection: Close\r\n\r\n";
                $out .= "{$query_data}\r\n";
            } else {
                $out .= "Connection: Close\r\n\r\n";
            }

            $this->trace("Set params [ {$method} ] => " . nl2br($out));
            fputs($fp, $out);
            stream_set_timeout($fp, $timeout);

            $s = '';
            if ($return) {
                while (!feof($fp))
                    $s .= fgets($fp, 1024);
                fclose($fp);
                $s = $this->splitHeader($s);
                if ($this->follow_location && preg_match('/HTTP\/1.[\d] 3[\d]+/', $s['header'])) {
                    if (preg_match('/Location:\s*(.*)[^ ]/', $s['header'], $arr))
                        return $this->socketQuerySingle($arr[1], $method, $data, $return, $timeout, $reheader, $header);
                }
                if ($reheader) {
                    $result['header'] = $s['header'];
                    $result['content'] = $s['content'];
                    $this->_header_pool[] = $result['header'];
                } else {
                    $result = $s['content'];
                }
            } else {
                fclose($fp);
            }
            return $result;
        }
    }

    /**
     * 通过socket发送请求
     *
     * @access public
     * @version 0.10
     * @uses socketQuerySingle()
     * @param string|array $url 请求网址, 可以是字符串形式的单个网址, 也可以是数组形式的多个网址
     * @param string $method 请求方式, 值只能是get或post的其中一个
     * @param string|array $data 请求参数
     * @param boolean $return 是否返回页面结果
     * @param integer $timeout 请求超时时间, 如果$return为真时, 这个数值将自动设置为1
     * @param boolean $reheader 是否返回响应头信息
     * @param array $header 附加请求头, 必须为数组
     * @return mixed
     * 		单条请求:
     * 			当$reheader为真时, 返回数组		array('header' => 头信息, 'content' => 页面内容)
     * 			当$reheader为假时, 返回字符串		页面内容
     * 		多条请求:
     * 			返回数组
     * 				array (
     * 					array('url' => URL, 'header' => ($reheader ? 头信息 : ''), 'content' => 页面内容),
     * 					array('url' => URL, 'header' => ($reheader ? 头信息 : ''), 'content' => 页面内容),
     * 					……
     * 				)
     */
    public function socketQuery($url, $method = 'get', $data = null, $return = null, $timeout = 30, $reheader = null, $header = array()) {
        if (empty($url))
            return false;
        if (is_array($url)) {
            $result = array();
            foreach ($url as $k => $v) {
                $data = $this->socketQuerySingle($v, $method, $data, $return, $timeout, $reheader, $header);
                $result[$k] = array('url' => $v, 'header' => ($reheader ? $data['header'] : ''), 'content' => $data['content']);
            }
            return $result;
        } else {
            return $this->socketQuerySingle($url, $method, $data, $return, $timeout, $reheader, $header);
        }
    }

    /**
     * 通过curl发送请求
     *
     * @access public
     * @version 0.10
     * @param string|array $url 请求网址, 可以是字符串形式的单个网址, 也可以是数组形式的多个网址
     * @param string $method 请求方式, 值只能是get或post的其中一个
     * @param string|array $data 请求参数
     * @param boolean $return 是否返回页面结果
     * @param integer $timeout 请求超时时间, 如果$return为真时, 这个数值将自动设置为1
     * @param boolean $reheader 是否返回响应头信息
     * @param array $header 附加请求头, 必须为数组
     * @return mixed
     * 		单条请求:
     * 			当$reheader为真时, 返回数组		array('header' => 头信息, 'content' => 页面内容)
     * 			当$reheader为假时, 返回字符串		页面内容
     * 		多条请求:
     * 			返回数组
     * 				array (
     * 					array('url' => URL, 'header' => ($reheader ? 头信息 : ''), 'content' => 页面内容),
     * 					array('url' => URL, 'header' => ($reheader ? 头信息 : ''), 'content' => 页面内容),
     * 					……
     * 				)
     */
    public function curlQuery($url, $method = 'get', $data = null, $return = null, $timeout = 30, $reheader = null, $header = array()) {
        if (empty($url))
            return false;

        $query_data = $this->parseData($data);
        $method = strtoupper($method);
        if (null === $return)
            $return = $this->return;
        if (null === $reheader)
            $reheader = $this->reheader;

        if (is_array($url)) {
            $result = array();

            $mh = curl_multi_init();
            $ch = array();

            foreach ($url as $k => $v) {
                $result[$k] = array('url' => $v, 'header' => '', 'content' => '');
                $ch[$k] = curl_init();
                curl_setopt($ch[$k], CURLOPT_URL, $v);
                $this->trace("Query by curl [ {$method} ] => {$v}");
                if (!empty($header) && is_array($header))
                    curl_setopt($ch[$k], CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch[$k], CURLOPT_HEADER, $reheader);
                if ('' == ini_get('open_basedir') && 'Off' == ini_get('safe_mode'))
                    curl_setopt($ch[$k], CURLOPT_FOLLOWLOCATION, $this->follow_location);
                curl_setopt($ch[$k], CURLOPT_RETURNTRANSFER, 1);

                if (0 === strpos($url, 'https://')) { //如果是HTTPS请求
                    curl_setopt($ch[$k], CURLOPT_SSL_VERIFYPEER, FALSE);
                    curl_setopt($ch[$k], CURLOPT_SSL_VERIFYHOST, false);
                }

                if ($return)
                    curl_setopt($ch[$k], CURLOPT_TIMEOUT, $timeout);
                else
                    curl_setopt($ch[$k], CURLOPT_TIMEOUT, 1);
                //curl_setopt($ch[$k], CURLOPT_NOBODY, 1);
                //curl_setopt($ch[$k], version_compare(PHP_VERSION, '5.2.13', '>=') ? CURLOPT_TIMEOUT_MS : CURLOPT_TIMEOUT, 1);
                curl_multi_add_handle($mh, $ch[$k]);
            }
            $active = null;

            do {
                $mrc = curl_multi_exec($mh, $active);
            } while (CURLM_CALL_MULTI_PERFORM == $mrc);

            while ($active && CURLM_OK == $mrc) {
                if (-1 != ($a = curl_multi_select($mh))) {
                    do {
                        $mrc = curl_multi_exec($mh, $active);
                    } while (CURLM_CALL_MULTI_PERFORM == $mrc);

                    if ($h = curl_multi_info_read($mh)) {
                        $index = array_search($h['handle'], $ch);
                        $info = curl_getinfo($h['handle']);
                        if ($return && 200 == $info['http_code']) {
                            $result[$index]['content'] = curl_multi_getcontent($ch[$index]);
                            if ($reheader) {
                                $result[$index]['content'] = $this->splitHeader($result[$index]['data']['content']);
                                $result[$index]['header'] = $result[$index]['content']['header'];
                                $result[$index]['content'] = $result[$index]['content']['content'];
                                $this->_header_pool[] = $result[$index]['header'];
                            }
                        }
                        curl_multi_remove_handle($mh, $h['handle']);
                    }
                }
            }
            curl_multi_close($mh);
        } else {
            $result = array('header' => '', 'content' => '');

            if ('GET' == $method && '' != $query_data)
                $url .= '?' . $query_data;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            $this->trace("Query by curl [ {$method} ] => {$url}");
            if (!empty($header) && is_array($header))
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_HEADER, $reheader);
            if ('' == ini_get('open_basedir') && 'Off' == ini_get('safe_mode'))
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $this->follow_location);
            if (0 === strpos($url, 'https://')) { //如果是HTTPS请求
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            }

            if ('POST' == $method && is_array($data)) {
                curl_setopt($ch, CURLOPT_POST, count($data));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $query_data);
                $this->trace("Set params curl [ {$method} ] => {$query_data}");
            }

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            if ($return) {
                curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
                $result['content'] = curl_exec($ch);
                if ($reheader) {
                    $result['content'] = $this->splitHeader($result['content']);
                    $result['header'] = $result['content']['header'];
                    $result['content'] = $result['content']['content'];
                    $this->_header_pool[] = $result['header'];
                } else {
                    $result = $result['content'];
                }
            } else {
                curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                curl_exec($ch);
            }
            curl_close($ch);
        }
        return $result;
    }



    /**
     * 发送请求
     *
     * @access public
     * @version 0.10
     * @param string|array $url 请求网址, 可以是字符串形式的单个网址, 也可以是数组形式的多个网址
     * @param string $method 请求方式, 值只能是get或post的其中一个
     * @param string|array $data 请求参数
     * @param boolean $return 是否返回页面结果
     * @param integer $timeout 请求超时时间, 如果$return为真时, 这个数值将自动设置为1
     * @param boolean $reheader 是否返回响应头信息
     * @param array $header 附加请求头, 必须为数组
     * @return mixed
     * 		单条请求:
     * 			当$reheader为真时, 返回数组		array('header' => 头信息, 'content' => 页面内容)
     * 			当$reheader为假时, 返回字符串		页面内容
     * 		多条请求:
     * 			返回数组
     * 				array (
     * 					array('url' => URL, 'header' => ($reheader ? 头信息 : ''), 'content' => 页面内容),
     * 					array('url' => URL, 'header' => ($reheader ? 头信息 : ''), 'content' => 页面内容),
     * 					……
     * 				)
     */
    public function query($url, $method = 'get', $data = null, $return = null, $timeout = 30, $reheader = null, $header = array()) {
        $func = 'curl' == $this->mode ? 'curlQuery' : 'socketQuery';
        return $this->$func($url, $method, $data, $return, $timeout, $reheader, $header);
    }

    /**
     * 发送GET请求
     *
     * @access public
     * @param string|array $url 请求网址, 可以是字符串形式的单个网址, 也可以是数组形式的多个网址
     * @param string|array $data 请求参数
     * @param boolean $return 是否返回页面结果
     * @param integer $timeout 请求超时时间, 如果$return为真时, 这个数值将自动设置为1
     * @param boolean $reheader 是否返回响应头信息
     * @param array $header 附加请求头, 必须为数组
     * @return mixed
     * 		单条请求:
     * 			当$reheader为真时, 返回数组		array('header' => 头信息, 'content' => 页面内容)
     * 			当$reheader为假时, 返回字符串		页面内容
     * 		多条请求:
     * 			返回数组
     * 				array (
     * 					array('url' => URL, 'header' => ($reheader ? 头信息 : ''), 'content' => 页面内容),
     * 					array('url' => URL, 'header' => ($reheader ? 头信息 : ''), 'content' => 页面内容),
     * 					……
     * 				)
     */
    public function get($url, $data = null, $return = null, $timeout = 30, $reheader = null, $header = array()) {
        return $this->query($url, 'get', $data, $return, $timeout, $reheader, $header);
    }

    /**
     * 发送POST请求
     *
     * @access public
     * @param string|array $url 请求网址, 可以是字符串形式的单个网址, 也可以是数组形式的多个网址
     * @param string|array $data 请求参数
     * @param boolean $return 是否返回页面结果
     * @param integer $timeout 请求超时时间, 如果$return为真时, 这个数值将自动设置为1
     * @param boolean $reheader 是否返回响应头信息
     * @param array $header 附加请求头, 必须为数组
     * @return mixed
     * 		单条请求:
     * 			当$reheader为真时, 返回数组		array('header' => 头信息, 'content' => 页面内容)
     * 			当$reheader为假时, 返回字符串		页面内容
     * 		多条请求:
     * 			返回数组
     * 				array (
     * 					array('url' => URL, 'header' => ($reheader ? 头信息 : ''), 'content' => 页面内容),
     * 					array('url' => URL, 'header' => ($reheader ? 头信息 : ''), 'content' => 页面内容),
     * 					……
     * 				)
     */
    public function post($url, $data = null, $return = null, $timeout = 30, $reheader = null, $header = array()) {
        return $this->query($url, 'post', $data, $return, $timeout, $reheader, $header);
    }

    /**
     * 解析URL
     *
     * @access private
     * @version 0.10
     * @param string $url URL
     * @return array
     */
    private function parseUrl($url) {
        $url = preg_replace('/^(http:\/\/|https:\/\/)/i', '', $url);
        $pos = strpos($url, '/');
        if (false === $pos)
            return array('host' => $url, 'uri' => '/');
        else
            return array('host' => substr($url, 0, $pos), 'uri' => substr($url, $pos));
    }

    /**
     * 提取http请求获取的代码, 将以数组形式返回请求头与请求内容
     *
     * @access private
     * @version 0.10
     * @param string $s 源代码
     * @return array
     */
    private function splitHeader($s) {
        if (false === ($pos = strpos($s, "\r\n\r\n"))) {
            return array('header' => '', 'content' => $s);
        } else {
            $r = array('header' => '', 'content' => '');
            $r['header'] = substr($s, 0, $pos);
            $r['content'] = trim(substr($s, $pos));
            return $r;
        }
    }

    /**
     * 处理请求数据
     * 如果返回类型是字符串则不会包含 "?"
     *
     * @access private
     * @version 0.10
     * @param string|array $data 请求数据
     * @param string $retype 返回值类型
     * @return string|array 返回值的类型由$retype决定
     */
    private function parseData($data, $retype = 'string') {
        if (is_string($data)) {
            $data = preg_replace('/^\?/', '', trim($data));
            $data = explode('&', $data);
        }
        if (!is_array($data))
            $data = array();
        return 'string' == $retype ? http_build_query($data) : $data;
    }

    /**
     * 从头信息池中获取信息
     *
     * @access public
     * @param integer $index
     * @return string
     */
    public function getHeaderByPool($index = null) {
        if (-1 == $index)
            return end($this->_header_pool);
        return null === $index ? $this->_header_pool : (isset($this->_header_pool[$index]) ? $this->_header_pool[$index] : null);
    }

    /**
     * 输出Debug信息
     *
     * @access private
     * @param string $msg
     */
    public function trace($msg = '') {
        static $i = 0;
        $i++;
        if ($this->debug)
            echo date('Y-m-d H:i:s') . ' [ <span style="color:red">' . $i . '</span> ] ' . $msg . '<br />';
    }
}

