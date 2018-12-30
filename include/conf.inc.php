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

global $conf, $page;

$conf['fbp'] = array_merge(
  // default values
  array
  (
    'facebook_app_id' => null,
    'async_script' => false,
    'force_facebook_init' => false,
    'add_about_informations' => true,
    'add_group_footer' => true,
    'add_application_footer' => true,
    'picture_url_type' => 'page',
    'share_picture' => true,
    'share_album' => true,
    'upload_picture' => true,
    'allow_fb_access_private_page' => true,
    'social_plugin_like_button' => array(),
    'social_plugin_facepile' => array(),
    'social_plugin_comments' => array(),
    'social_plugin_like_box' => array(),
    'social_plugin_activity_feed' => array(),
  ),
  unserialize($conf['fbp']));

$conf['fbp']['social_plugin_like_button'] = array_merge(
  // default values
  array
  (
    'enabled' => true,
    'layout' => 'standard',
    'show_faces' => true,
    'action' => 'like',
    'colorscheme' => 'dark',
    'width' => null,
    'font' => null,
    'ref' => null,
  ),
  $conf['fbp']['social_plugin_like_button']);

$conf['fbp']['social_plugin_facepile'] = array_merge(
  // default values
  array
  (
    'enabled' => true,
    'max_rows' => 1,
    'width' => null,
  ),
  $conf['fbp']['social_plugin_facepile']);

$conf['fbp']['social_plugin_comments'] = array_merge(
  // default values
  array
  (
    'enabled' => false,
    'numposts' => 3,
    'css' => null,
    'title' => null,
    'simple' => true,
    'reverse' => false,
    'publish_feed' => true,
    'width' => null,
  ),
  $conf['fbp']['social_plugin_comments']);

$conf['fbp']['social_plugin_activity_feed'] = array_merge(
  // default values
  array
  (
    'enabled' => true,
    'site' => null,
    'colorscheme' => 'dark',
    'recommendations' => false,
    'header' => true,
    'width' => 210,
    'height' => null,
    'border_color' => null,
    'filter' => null,
    'ref' => null,
  ),
  $conf['fbp']['social_plugin_activity_feed']);

$conf['fbp']['social_plugin_like_box'] = array_merge(
  // default values
  array
  (
    'enabled' => false,
    'url' => 'http://www.facebook.com/Piwigo',
    'colorscheme' => 'dark',
    'show_faces' => true,
    'stream' => true,
    'header' => true,
    'width' => 210,
    'height' => null,
  ),
  $conf['fbp']['social_plugin_like_box']);

//From http://developers.facebook.com/docs/reference/rest/photos.upload/
// *GIF *JPG *PNG *PSD *TIFF *JP2 *IFF *WBMP *XBM
$page['fbp']['available_upload_ext'] = array('GIF', 'JPG', 'PNG', 'PSD', 'TIFF', 'JP2', 'IFF', 'WBMP', 'XBM');

?>
