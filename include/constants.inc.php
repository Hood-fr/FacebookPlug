<?php
// +-----------------------------------------------------------------------+
// | FacebookPlug - a Piwigo Plugin                                        |
// | Copyright (C) 2010-2011 Ruben ARNAUD - rub@piwigo.org                 |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+

if (!defined('PHPWG_ROOT_PATH'))
{
  die('Hacking attempt!');
}

define('FACEBOOK_APP_ID', '111499825588662');
if (!defined('PIWIGO_FACEBOOK_UPLOAD_VERSION')) define('PIWIGO_FACEBOOK_UPLOAD_VERSION', '1.0');

define('FACEBOOK_URL', 'http://www.facebook.com');
define('FACEBOOK_PIWIGO_GROUP_URL', FACEBOOK_URL.'/Piwigo');
define('FACEBOOK_PIWIGO_RUB_URL', FACEBOOK_URL.'/ruben.arnaud');
define('FACEBOOK_PIWIGO_APPLICATION_URL', FACEBOOK_URL.'/apps/application.php?id='.FACEBOOK_APP_ID);
define('FACEBOOK_DEV_URL', 'http://developers.facebook.com');
define('FACEBOOK_DOC_PLUGINS_URL', FACEBOOK_DEV_URL.'/docs/reference/plugins');

define('PIWIGO_FACEBOOK_UPLOAD_URL', 'http://facebook.piwigo.net/'.PIWIGO_FACEBOOK_UPLOAD_VERSION.'/upload_photo.php');

define('FBP_DIR', dirname(dirname(__FILE__)));
define('FBP_PATH' , PHPWG_PLUGINS_PATH.basename(FBP_DIR));
define('FBP_PLUGIN_NAME', basename(dirname(dirname(__FILE__))));
define('FBP_IP_FB', '66.220.');

?>
