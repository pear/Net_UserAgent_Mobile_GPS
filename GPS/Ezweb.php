<?php
/**
 * +----------------------------------------------------------------------+
 * | PEAR :: Net :: UserAgent :: Mobile :: GPS                            |
 * +----------------------------------------------------------------------+
 * | Copyright (c) 2008 Kei Horikita                                      |
 * +----------------------------------------------------------------------+
 * | All rights reserved.                                                 |
 * |                                                                      |
 * | Redistribution and use in source and binary forms, with or without   |
 * | modification, are permitted provided that the following conditions   |
 * | are met:                                                             |
 * |                                                                      |
 * | * Redistributions of source code must retain the above copyright     |
 * |   notice, this list of conditions and the following disclaimer.      |
 * | * Redistributions in binary form must reproduce the above copyright  |
 * |   notice, this list of conditions and the following disclaimer in    |
 * |   the documentation and/or other materials provided with the         |
 * |   distribution.                                                      |
 * | * The names of its contributors may be used to endorse or promote    |
 * |   products derived from this software without specific prior written |
 * |   permission.                                                        |
 * |                                                                      |
 * | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS  |
 * | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT    |
 * | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS    |
 * | FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE       |
 * | COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,  |
 * | INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, |
 * | BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;     |
 * | LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER     |
 * | CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT   |
 * | LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN    |
 * | ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE      |
 * | POSSIBILITY OF SUCH DAMAGE.                                          |
 * +----------------------------------------------------------------------+
 *
 * PHP versions 5
 *
 * @category  Net
 * @package   Net_UserAgent_Mobile_GPS
 * @author    Kei Horikita <gps4mobile@gmail.com>
 * @copyright 2008 Kei Horikita
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   CVS: $Id$
 * @link      http://mgps.org
 */

require_once 'Net/UserAgent/Mobile/GPS.php';
require_once 'Net/UserAgent/Mobile/GPS/Provider.php';

/**
 * Net_UserAgent_Mobile_GPS_Ezweb class
 *
 * This class provides a method to create a link for GPS
 * and to parse a response from GPS
 *
 * @category  Net
 * @package   Net_UserAgent_Mobile_GPS
 * @author    Kei Horikita <gps4mobile@gmail.com>
 * @copyright 2008 Kei Horikita
 * @license   http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version   Release: 0.0.1
 * @link      http://mgps.org
 */
class Net_UserAgent_Mobile_GPS_Ezweb extends Net_UserAgent_Mobile_GPS_Provider
{
    /**
     * Net_UserAgent_Mobile object
     * @var Net_UserAgent_Mobile
     */
    private $_agent = null;

    /**
     * Constructor, sets the User Agent object's 
     *
     * @param object $agent Net_UserAgent_Mobile object
     */
    public function __construct($agent = null)
    {
        if ( $agent === null ) {
            include_once 'Net/UserAgent/Mobile.php';
            $agent = Net_UserAgent_Mobile::singleton();
        }

        $this->_agent = $agent;
    }

    /**
     * Get Link for GPS
     *
     * @param string $callback_url url to get GPS information and return
     * @param string $str          string for link <a href=''>string</a>
     *
     * @return array array with the following items: (string)url, (string)tag
     */
    public function getGPSLink($callback_url, $str = null)
    {
        $_url = "device:gpsone?url=${callback_url}"
              . '&ver=1&datum=0&unit=0&acry=0&number=0';
        $_tag = "<a href=\"${_url}\">${str}</a>";

        return array('url' => $_url, 'tag' => $_tag);
    }

    /**
     * Parse Response from GPS
     *
     * @return array array with the following items:
     *               (string)longitude, (string)latitude
     */
    public function getGPSResponse()
    {
        $_lat = $_GET['lat'];
        $_lon = $_GET['lon'];

        return array('lat' => $_lat, 'lon' => $_lon);
    }
}
?>
