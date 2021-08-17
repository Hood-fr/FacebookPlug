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

function fbp_render_element_content($content, $current_picture)
{
  global $template, $user, $page, $conf, $picture;

  if ($page['fbp']['do_facebook_init'])
  {
    // Init array
    $tpls = array();

    // Specific
    if ($page['slideshow'] and $conf['fbp']['social_plugin_facepile']['enabled'])
    {
      $tpls[] = 'social.plugin.facepile';
    }
    else if (! $page['slideshow'])
    {
      if ($conf['fbp']['social_plugin_like_button']['enabled'])
      {
        $tpls[] = 'social.plugin.like.button';
      }
      else if ($conf['fbp']['social_plugin_comments']['enabled'])
      {
        $tpls[] = 'social.plugin.comments';
      }
    }

    // define picture FB link
    // Always use full url for FB social plugin
    set_make_full_url();
//      echo '<pre>'; print_r($conf['fbp']); echo '</pre>';
    if ($conf['fbp']['picture_url_type'] == 'image')
    {
      $page['fbp']['url'] = get_element_url($current_picture);
    }
    else
    {
      $page['fbp']['url'] = make_picture_url(array('image_id' => $page['image_id']));
    }
    $page['fbp']['url_image'] = get_element_url($current_picture);
    $page['fbp']['url_thumbnail_image'] = DerivativeImage::thumb_url($current_picture);
    $page['fbp']['url_square_image'] = DerivativeImage::url(IMG_SQUARE, $current_picture);
    $page['fbp']['url_medium_image'] = DerivativeImage::url(IMG_MEDIUM, $current_picture);
//    echo '<pre>'; print_r($page['fbp']); echo '</pre>';
    unset_make_full_url();


    // Assign template
    $template->assign('fbp_page', $page['fbp']);

    // Parse TPL
    foreach($tpls as $tpl)
    {
      // XFBML implementation
      $template->set_filename('fbp_'.$tpl, FBP_DIR.'/tpl/'.$tpl.'.tpl');
      $content .= $template->parse('fbp_'.$tpl, true);
    }
  }

  return $content;
}


add_event_handler('render_element_content', 'fbp_render_element_content', EVENT_HANDLER_PRIORITY_NEUTRAL+1 /*in order to have picture content*/, 2);

if ($conf['fbp']['share_picture'] or $conf['fbp']['upload_picture'])
{
  add_event_handler('loc_end_picture', 'fbp_add_bar_button', EVENT_HANDLER_PRIORITY_NEUTRAL+1 /* In order to be on right */);
}

?>
