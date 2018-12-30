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

function fbp_add_bar_button()
{
  global $template;

  switch (script_basename())
  {
    case 'index':
    {
      $action = 'PLUGIN_INDEX_ACTIONS';
      break;
    }
    case 'picture':
    {
      $action = 'PLUGIN_PICTURE_ACTIONS';
      break;
    }
  }

  if (isset($action))
  {
    $template->assign('PIWIGO_FACEBOOK_UPLOAD_URL', PIWIGO_FACEBOOK_UPLOAD_URL);
    $tpl = 'buttons';
    $template->set_filename('fbp_'.$tpl, FBP_DIR.'/tpl/'.$tpl.'.tpl');
    $template->concat(
          $action,
          $template->parse('fbp_'.$tpl, true)
          );
  }
}

?>
