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

// include
include_once(PHPWG_ROOT_PATH.'admin/include/tabsheet.class.php');

// Lingua
load_language('admin.lang', FBP_DIR.'/');

// Arguments
$page['tab'] = (isset($_GET['tab']) ? $_GET['tab'] : 'social_plugin');

// Data
//~ $base_url = get_admin_plugin_menu_link(__FILE__);
$base_url = get_root_url().'admin.php?page=plugin-'.FBP_PLUGIN_NAME.'-';
$picture_url_type = array('page', 'image');
$picture_url_type_l10n = array_map('l10n', $picture_url_type);
$layout = array('standard', 'button_count', 'box_count');
$layout_l10n = array_map('l10n', $layout);
$action = array('like', 'recommend');
$action_l10n = array_map('l10n', $action);
$colorscheme = array('light', 'dark');
$colorscheme_l10n = array_map('l10n', $colorscheme);


// Tabsheet
$tabsheet = new tabsheet();
$tabsheet->add('social_plugin',
               l10n('Social plugins'),
               //add_url_params($base_url, array('tab' => 'social_plugin')));
               $base_url.'social_plugin');
$tabsheet->add('button',
               l10n('Buttons'),
               //add_url_params($base_url, array('tab' => 'button')));
               $base_url.'button');
$tabsheet->add('advanced',
               l10n('Advanced'),
               //add_url_params($base_url, array('tab' => 'advanced')));
               $base_url.'advanced');
$tabsheet->add('activity',
               l10n('Activity'),
               //add_url_params($base_url, array('tab' => 'activity')));
               $base_url.'activity');
$tabsheet->select($page['tab']);
$tabsheet->assign();

function fbp_intval($n)
{
  return (is_numeric($n) ? $n : null);
}

function fbp_checked($b)
{
  return ($b ? 'checked="checked"' : '');
}

// Update
if (isset($_POST['submit']))
{
  $save_conf['fbp'] = $conf['fbp'];

  switch ($page['tab'])
  {
    case 'social_plugin' :
    {
      // Like button
      $conf['fbp']['social_plugin_like_button']['enabled'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_LIKE_BUTTON_ENABLED']);
      $conf['fbp']['social_plugin_like_button']['layout'] = $layout[$_POST['FBP_SOCIAL_PLUGIN_LIKE_BUTTON_LAYOUT']];
      $conf['fbp']['social_plugin_like_button']['show_faces'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_LIKE_BUTTON_SHOW_FACES']);
      $conf['fbp']['social_plugin_like_button']['action'] = $action[$_POST['FBP_SOCIAL_PLUGIN_LIKE_BUTTON_ACTION']];
      $conf['fbp']['social_plugin_like_button']['colorscheme'] = $colorscheme[$_POST['FBP_SOCIAL_PLUGIN_LIKE_BUTTON_COLORSCHEME']];
      // Facepile
      $conf['fbp']['social_plugin_facepile']['enabled'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_FACEPILE_ENABLED']);
      $conf['fbp']['social_plugin_facepile']['max_rows'] = intval($_POST['FBP_SOCIAL_PLUGIN_FACEPILE_MAX_ROWS']);
      // Comments
      $conf['fbp']['social_plugin_comments']['enabled'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_COMMENTS_ENABLED']);
      $conf['fbp']['social_plugin_comments']['numposts'] = fbp_intval($_POST['FBP_SOCIAL_PLUGIN_COMMENTS_NUMPOSTS']);
      $conf['fbp']['social_plugin_comments']['title'] = $_POST['FBP_SOCIAL_PLUGIN_COMMENTS_TITLE'];
      $conf['fbp']['social_plugin_comments']['simple'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_COMMENTS_SIMPLE']);
      $conf['fbp']['social_plugin_comments']['reverse'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_COMMENTS_REVERSE']);
      $conf['fbp']['social_plugin_comments']['publish_feed'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_COMMENTS_PUBLISH_FEED']);
      // Actvity feed
      $conf['fbp']['social_plugin_activity_feed']['enabled'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_ACTIVITY_FEED_ENABLED']);
      $conf['fbp']['social_plugin_activity_feed']['colorscheme'] = $colorscheme[$_POST['FBP_SOCIAL_PLUGIN_ACTIVITY_FEED_COLORSCHEME']];
      $conf['fbp']['social_plugin_activity_feed']['recommendations'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_ACTIVITY_FEED_RECOMMENDATIONS']);
      $conf['fbp']['social_plugin_activity_feed']['header'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_ACTIVITY_FEED_HEADER']);
      $conf['fbp']['social_plugin_activity_feed']['height'] = fbp_intval($_POST['FBP_SOCIAL_PLUGIN_ACTIVITY_FEED_HEIGHT']);
      // Like box
      $conf['fbp']['social_plugin_like_box']['enabled'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_LIKE_BOX_ENABLED']);
      $conf['fbp']['social_plugin_like_box']['url'] = $_POST['FBP_SOCIAL_PLUGIN_LIKE_BOX_URL'];
      $conf['fbp']['social_plugin_like_box']['colorscheme'] = $colorscheme[$_POST['FBP_SOCIAL_PLUGIN_LIKE_BOX_COLORSCHEME']];
      $conf['fbp']['social_plugin_like_box']['show_faces'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_LIKE_BOX_SHOW_FACES']);
      $conf['fbp']['social_plugin_like_box']['stream'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_LIKE_BOX_STREAM']);
      $conf['fbp']['social_plugin_like_box']['header'] = ! empty($_POST['FBP_SOCIAL_PLUGIN_LIKE_BOX_HEADER']);
      $conf['fbp']['social_plugin_like_box']['height'] = fbp_intval($_POST['FBP_SOCIAL_PLUGIN_LIKE_BOX_HEIGHT']);

      // Check
      if ($conf['fbp']['social_plugin_like_button']['enabled'] and $conf['fbp']['social_plugin_comments']['enabled'])
      {
        $conf['fbp']['social_plugin_like_button']['enabled'] = $save_conf['fbp']['social_plugin_like_button']['enabled'];
        $conf['fbp']['social_plugin_comments']['enabled'] = $save_conf['fbp']['social_plugin_comments']['enabled'];
        array_push($page['infos'], l10n('Like button and comments cannot be enabled together').', '.l10n('enabled values are restored'));
      }
      break;
    }

    case 'button' :
    {
      $conf['fbp']['share_picture'] = ! empty($_POST['FBP_SHARE_PICTURE']);
      $conf['fbp']['share_album'] = ! empty($_POST['FBP_SHARE_ALBUM']);
      $conf['fbp']['upload_picture'] = ! empty($_POST['FBP_UPLOAD_PICTURE']);
      break;
    }

    case 'advanced' :
    {
      $conf['fbp']['facebook_app_id'] = $_POST['FBP_FACEBOOK_APP_ID'];
      $conf['fbp']['async_script'] = ! empty($_POST['FBP_ASYNC_SCRIPT']);
      $conf['fbp']['force_facebook_init'] = ! empty($_POST['FBP_FORCE_FACEBOOK_INIT']);
      $conf['fbp']['picture_url_type'] = $picture_url_type[$_POST['FBP_PICTURE_URL_TYPE']];
      $conf['fbp']['allow_fb_access_private_page'] = ! empty($_POST['FBP_ALLOW_FB_ACCESS_PRIVATE_PAGE']);
      $conf['fbp']['add_about_informations'] = ! empty($_POST['FBP_ADD_ABOUT_INFORMATIONS']);
      $conf['fbp']['add_group_footer'] = ! empty($_POST['FBP_ADD_GROUP_FOOTER']);
      $conf['fbp']['add_application_footer'] = ! empty($_POST['FBP_ADD_APPLICATION_FOOTER']);
      break;
    }
  }

  $query = '
update '.CONFIG_TABLE.'
set
  value = \''.serialize($conf['fbp']).'\'
where 
  param = \'fbp\'
;';
  if (pwg_query($query))
  {
    array_push($page['infos'], l10n('Data updated with success'));
  }
  else
  {
    array_push($page['errors'], l10n('Data updated with error'));
  }

  // Delete compiled templates
  $template->delete_compiled_templates();
}

// Display
switch ($page['tab'])
{
  case 'social_plugin' :
  {
    $template->assign(
      $page['tab'],
      array(
        'like_button' => array
          (
            'FB_PAGE' => FACEBOOK_DOC_PLUGINS_URL.'/like/',
            'ENABLED' => fbp_checked($conf['fbp']['social_plugin_like_button']['enabled']),
            'LAYOUT_OPTIONS' => $layout_l10n,
            'LAYOUT_OPTIONS_SELECTED' => array_search($conf['fbp']['social_plugin_like_button']['layout'], $layout),
            'SHOW_FACES' => fbp_checked($conf['fbp']['social_plugin_like_button']['show_faces']),
            'ACTION_OPTIONS' => $action_l10n,
            'ACTION_OPTIONS_SELECTED' => array_search($conf['fbp']['social_plugin_like_button']['action'], $action),
            'COLORSCHEME_OPTIONS' => $colorscheme_l10n,
            'COLORSCHEME_OPTIONS_SELECTED' => array_search($conf['fbp']['social_plugin_like_button']['colorscheme'], $colorscheme),
          ),
       'facepile' => array
          (
            'FB_PAGE' => FACEBOOK_DOC_PLUGINS_URL.'/facepile/',
            'ENABLED' => fbp_checked($conf['fbp']['social_plugin_facepile']['enabled']),
            'MAX_ROWS' => $conf['fbp']['social_plugin_facepile']['max_rows'],
          ),
       'comments' => array
          (
            'FB_PAGE' => FACEBOOK_DOC_PLUGINS_URL.'/comments/',
            'ENABLED' => fbp_checked($conf['fbp']['social_plugin_comments']['enabled']),
            'NUMPOSTS' => $conf['fbp']['social_plugin_comments']['numposts'],
            'TITLE' => $conf['fbp']['social_plugin_comments']['title'],
            'SIMPLE' => fbp_checked($conf['fbp']['social_plugin_comments']['simple']),
            'REVERSE' => fbp_checked($conf['fbp']['social_plugin_comments']['reverse']),
            'PUBLISH_FEED' => fbp_checked($conf['fbp']['social_plugin_comments']['publish_feed']),
          ),
       'activity_feed' => array
          (
            'FB_PAGE' => FACEBOOK_DOC_PLUGINS_URL.'/activity/',
            'ENABLED' => fbp_checked($conf['fbp']['social_plugin_activity_feed']['enabled']),
            'COLORSCHEME_OPTIONS' => $colorscheme_l10n,
            'COLORSCHEME_OPTIONS_SELECTED' => array_search($conf['fbp']['social_plugin_activity_feed']['colorscheme'], $colorscheme),
            'RECOMMENDATIONS' => fbp_checked($conf['fbp']['social_plugin_activity_feed']['recommendations']),
            'HEADER' => fbp_checked($conf['fbp']['social_plugin_activity_feed']['header']),
            'HEIGHT' => $conf['fbp']['social_plugin_activity_feed']['height'],
          ),
       'like_box' => array
          (
            'FB_PAGE' => FACEBOOK_DOC_PLUGINS_URL.'/like-box/',
            'ENABLED' => fbp_checked($conf['fbp']['social_plugin_like_box']['enabled']),
            'URL' => $conf['fbp']['social_plugin_like_box']['url'],
            'COLORSCHEME_OPTIONS' => $colorscheme_l10n,
            'COLORSCHEME_OPTIONS_SELECTED' => array_search($conf['fbp']['social_plugin_like_box']['colorscheme'], $colorscheme),
            'SHOW_FACES' => fbp_checked($conf['fbp']['social_plugin_like_box']['show_faces']),
            'STREAM' => fbp_checked($conf['fbp']['social_plugin_like_box']['stream']),
            'HEADER' => fbp_checked($conf['fbp']['social_plugin_like_box']['header']),
            'HEIGHT' => $conf['fbp']['social_plugin_like_box']['height'],
          ),
        ));
    break;
  }
  case 'button' :
  {
    $template->assign(
      $page['tab'],
      array(
        'FBP_SHARE_PICTURE' => fbp_checked($conf['fbp']['share_picture']),
        'FBP_SHARE_ALBUM' => fbp_checked($conf['fbp']['share_album']),
        'FBP_UPLOAD_PICTURE' => fbp_checked($conf['fbp']['upload_picture']),
        ));
    break;
  }
  case 'advanced' :
  {
    $template->assign(
      $page['tab'],
      array(
        'FBP_FACEBOOK_APP_ID' => $conf['fbp']['facebook_app_id'],
        'FBP_ASYNC_SCRIPT' => fbp_checked($conf['fbp']['async_script']),
        'FBP_FORCE_FACEBOOK_INIT' => fbp_checked($conf['fbp']['force_facebook_init']),
        'FBP_PICTURE_URL_TYPE_OPTIONS' => $picture_url_type_l10n,
        'FBP_PICTURE_URL_TYPE_OPTIONS_SELECTED' => array_search($conf['fbp']['picture_url_type'], $picture_url_type),
        'FBP_ALLOW_FB_ACCESS_PRIVATE_PAGE'=> fbp_checked($conf['fbp']['allow_fb_access_private_page']),
        'FBP_ADD_ABOUT_INFORMATIONS' => fbp_checked($conf['fbp']['add_about_informations']),
        'FBP_ADD_GROUP_FOOTER' => fbp_checked($conf['fbp']['add_group_footer']),
        'FBP_ADD_APPLICATION_FOOTER' => fbp_checked($conf['fbp']['add_application_footer']),
        ));
    break;
  }
  case 'activity' :
  {
    $template->assign(
      $page['tab'],
      array(
        ));
    break;
  }
}

// Global value
//~ $template->assign('FBP_ACTION', add_url_params($base_url, array('tab' => $page['tab'])));
$template->assign('FBP_ACTION', $base_url.$page['tab']);
$template->assign('FACEBOOK_PIWIGO_RUB_URL', FACEBOOK_PIWIGO_RUB_URL);
$template->assign('FACEBOOK_PIWIGO_GROUP_URL', FACEBOOK_PIWIGO_GROUP_URL);
$template->assign('FACEBOOK_PIWIGO_APPLICATION_URL', FACEBOOK_PIWIGO_APPLICATION_URL);
$template->assign('FBP_OLD_VERSION', version_compare(PHPWG_VERSION, '2.2', '<'));

//Apply tpl
$template->set_filename('fbp_plugin_admin_content', FBP_DIR.'/tpl/admin.tpl');
$template->assign_var_from_handle('ADMIN_CONTENT', 'fbp_plugin_admin_content');

?>