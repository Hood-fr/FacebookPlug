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


function fbp_loc_begin_about()
{
  global $template, $conf;

  // Lingua
  load_language('about.lang', FBP_DIR.'/');

  $template->assign('FACEBOOK_PIWIGO_GROUP_URL', FACEBOOK_PIWIGO_GROUP_URL);
  $template->assign('FACEBOOK_PIWIGO_APPLICATION_URL', FACEBOOK_PIWIGO_APPLICATION_URL);

  $template->set_filename('fbp_about', FBP_DIR.'/tpl/about.tpl');
  $template->append('about_msgs', $template->parse('fbp_about', true));
}

if ($conf['fbp']['add_about_informations'])
{
  add_event_handler('loc_begin_about', 'fbp_loc_begin_about');
}

?>
