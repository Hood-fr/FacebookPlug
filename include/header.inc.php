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

function fbp_get_fb_locale()
{
  global $user;

  // Array compute by plugins/FacebookPlug/tools/check_language.php script
  $valid_fb_locales = array ( 0 => 'af_ZA', 1 => 'ar_AR', 2 => 'ay_BO', 3 => 'az_AZ', 4 => 'be_BY', 5 => 'bg_BG', 6 => 'bn_IN', 7 => 'bs_BA', 8 => 'ca_ES', 9 => 'ck_US', 10 => 'cs_CZ', 11 => 'cy_GB', 12 => 'da_DK', 13 => 'de_DE', 14 => 'el_GR', 15 => 'en_GB', 16 => 'en_PI', 17 => 'en_UD', 18 => 'en_US', 19 => 'eo_EO', 20 => 'es_CL', 21 => 'es_CO', 22 => 'es_ES', 23 => 'es_LA', 24 => 'es_MX', 25 => 'es_VE', 26 => 'et_EE', 27 => 'eu_ES', 28 => 'fa_IR', 29 => 'fb_FI', 30 => 'fb_LT', 31 => 'fi_FI', 32 => 'fo_FO', 33 => 'fr_CA', 34 => 'fr_FR', 35 => 'ga_IE', 36 => 'gl_ES', 37 => 'gn_PY', 38 => 'gu_IN', 39 => 'he_IL', 40 => 'hi_IN', 41 => 'hr_HR', 42 => 'hu_HU', 43 => 'hy_AM', 44 => 'id_ID', 45 => 'is_IS', 46 => 'it_IT', 47 => 'ja_JP', 48 => 'jv_ID', 49 => 'ka_GE', 50 => 'kk_KZ', 51 => 'km_KH', 52 => 'kn_IN', 53 => 'ko_KR', 54 => 'ku_TR', 55 => 'la_VA', 56 => 'li_NL', 57 => 'lt_LT', 58 => 'lv_LV', 59 => 'mg_MG', 60 => 'mk_MK', 61 => 'ml_IN', 62 => 'mn_MN', 63 => 'mr_IN', 64 => 'ms_MY', 65 => 'mt_MT', 66 => 'nb_NO', 67 => 'ne_NP', 68 => 'nl_BE', 69 => 'nl_NL', 70 => 'nn_NO', 71 => 'pa_IN', 72 => 'pl_PL', 73 => 'ps_AF', 74 => 'pt_BR', 75 => 'pt_PT', 76 => 'qu_PE', 77 => 'rm_CH', 78 => 'ro_RO', 79 => 'ru_RU', 80 => 'sa_IN', 81 => 'se_NO', 82 => 'sk_SK', 83 => 'sl_SI', 84 => 'so_SO', 85 => 'sq_AL', 86 => 'sr_RS', 87 => 'sv_SE', 88 => 'sw_KE', 89 => 'sy_SY', 90 => 'ta_IN', 91 => 'te_IN', 92 => 'tg_TJ', 93 => 'th_TH', 94 => 'tl_PH', 95 => 'tl_ST', 96 => 'tr_TR', 97 => 'tt_RU', 98 => 'uk_UA', 99 => 'ur_PK', 100 => 'uz_UZ', 101 => 'vi_VN', 102 => 'xh_ZA', 103 => 'yi_DE', 104 => 'zh_CN', 105 => 'zh_HK', 106 => 'zh_TW', 107 => 'zu_ZA', );

  // User language
  $locale = $user['language'];
  if (! in_array($locale, $valid_fb_locales))
  {
    $code_lang = substr($locale, 0, 2);
    // Compose a locale
    $locale = $code_lang.'_'.strtoupper($code_lang);
    if (! in_array($locale, $valid_fb_locales))
    {
      // Search a locale
      foreach ($valid_fb_locales as $valid_fb_locale)
      {
        if ($code_lang == substr($valid_fb_locale, 0, 2))
        {
          return $valid_fb_locale;
        }
      }
      // default locale
      $locale = 'en_US';
    }
  }

  return $locale;
}

function fbp_header($content, &$smarty)
{
  // replace tag html
  $search = '<html ';
  $replacement = '<html xmlns:fb="http://www.facebook.com/2008/fbml" ';

  //~ $content = preg_replace('#'.$search.'#', $replacement, $content);
  return preg_replace('#'.$search.'#', $replacement, $content);
  //~ $fbp_content = file_get_contents(FBP_DIR.'/tpl/init.fb.tpl');

  //~ $search = '<div id="the_page">';
  //~ return preg_replace('#'.$search.'#', $fbp_content.$search, $content);
}

function fbp_init()
{
  global $template, $conf, $user, $page;

  // Lingua
  load_language('common.lang', FBP_DIR.'/');

  // Get init facebook
  $page['fbp']['do_facebook_init'] = trigger_change('fbp_do_facebook_init', $conf['fbp']['force_facebook_init']);
  if ($page['fbp']['do_facebook_init'])
  {
    // define ID
    $template->assign('FACEBOOK_APP_ID', (is_numeric($conf['fbp']['facebook_app_id']) ? $conf['fbp']['facebook_app_id'] : FACEBOOK_APP_ID));
    // define language
    $template->assign('FACEBOOK_LOCALE', fbp_get_fb_locale());
    $template->assign('FBP_PATH', FBP_PATH);
    $template->assign('FBP_SCRIPT_BASENAME', script_basename());
    $template->assign('fbp', $conf['fbp']);
    //~ $template->smarty->register_modifier('boolean_to_string', 'boolean_to_string');
  }
}

function fbp_loc_end_page_header()
{
  global $template, $conf, $user, $page;

  if ($page['fbp']['do_facebook_init'])
  {
    // set prefilter
    $template->set_prefilter('header', 'fbp_header');

    if (empty($page['fbp']['url']))
    {
      $page['fbp']['url'] = get_absolute_root_url().script_basename();
      if ($conf['php_extension_in_urls'])
      {
        $page['fbp']['url'] .= '.php';
      }
    }

    $template->assign('fbp_page', $page['fbp']);

    $template->set_filename('fbp_init.fb', FBP_DIR.'/tpl/init.fb.tpl');
    $template->append('head_elements', $template->parse('fbp_init.fb', true));

    if (
        (script_basename() == 'index')
        and
        ($conf['fbp']['social_plugin_activity_feed']['enabled'] or $conf['fbp']['social_plugin_like_box']['enabled'])
        )
    {
      $template->func_combine_css(array('path' => FBP_PATH.'/css/fbp.css'));
    }
  }
}

function fbp_do_facebook_init($do_it)
{
  global $conf;

  return 
    $do_it
  or
    (
      (
        (script_basename() == 'picture')
        and
        ($conf['fbp']['social_plugin_like_button']['enabled'] or $conf['fbp']['social_plugin_facepile']['enabled'] or $conf['fbp']['social_plugin_comments']['enabled'] or $conf['fbp']['share_picture'] or $conf['fbp']['upload_picture'])
      )
      or
      (
        (script_basename() == 'index')
        and
        ($conf['fbp']['social_plugin_activity_feed']['enabled'] or $conf['fbp']['social_plugin_like_box']['enabled'] or $conf['fbp']['share_album'])
      )
      or
      (
        (script_basename() == 'admin')
        and
        (
          (isset($_GET['page']) and preg_match('/^plugin-FacebookPlug(?:-(.*))?$/', $_GET['page']))
          or
          (
            (isset($_GET['page']) and $_GET['page'] == 'plugin')
            and
            (isset($_GET['section']) and strtok($_GET['section'], '/') == 'FacebookPlug')
          )
        )
      )
    )
  ;
}

function fbp_is_facebook_ip()
{
  foreach (array(
    FBP_IP_FB, 
    //~ '127.0',
      ) as $ip_fb)
  {
    if (preg_match('/'.$ip_fb. '/', $_SERVER["REMOTE_ADDR"]))
    {
      return true;
    }
  }
  return false;
}

function ftp_loc_end_section_init()
{
  global $conf, $page, $user;

  // No restristion for facebook user
  if (
      $page['fbp']['do_facebook_init']
      and 
      is_a_guest()
      and
      $conf['fbp']['allow_fb_access_private_page']
      and
      fbp_is_facebook_ip()
    )
  {
    global $user, $header_notes;

    // Notes
    $header_notes[] = 'Facebook robot detected, guest can access private page';
    // Allow guest access
    $conf['guest_access'] = true;
    // No forbidden categorie
    $user['forbidden_categories'] = '';
    $user['level'] = max($conf['available_permission_levels']);
    switch (script_basename())
    {
      case 'picture':
        if (isset($page['image_id']))
        {
          $page['rank_of'][$page['image_id']] = 0;
          $page['items'] = array_flip($page['rank_of']);
        }
        break;
      case 'index':
        if (isset($page['category']['representative_picture_id']))
        {
          fbp_loc_begin_index_category_thumbnails(array($page['category']));
        }
      break;
    }
    //~ else if $page['category']['id']
  }
}

add_event_handler('init', 'fbp_init');
add_event_handler('loc_end_page_header', 'fbp_loc_end_page_header');
add_event_handler('fbp_do_facebook_init', 'fbp_do_facebook_init');
add_event_handler('loc_end_section_init', 'ftp_loc_end_section_init');

?>
