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

function fbp_blockmanager_register_blocks( $menu_ref_arr )
{
  global $conf;
  
  $menu = & $menu_ref_arr[0];
  if ($menu->get_id() != 'menubar')
    return;

  if ($conf['fbp']['social_plugin_activity_feed']['enabled'])
  {
    $menu->register_block(new RegisteredBlock('mbFBP_activity_feed', 'social.plugin.activity.feed', 'FacebookPlug'));
  }
  if ($conf['fbp']['social_plugin_like_box']['enabled'])
  {
    $menu->register_block(new RegisteredBlock('mbFBP_like_box', 'social.plugin.like.box', 'FacebookPlug'));
  }
}

function fbp_blockmanager_apply($menu_ref_arr)
{
  global $template;

  $menu = & $menu_ref_arr[0];

  foreach (array('mbFBP_activity_feed', 'mbFBP_like_box') as $mbFBPId)
  {
    if ($block = $menu->get_block($mbFBPId))
    {
      $template->set_template_dir(FBP_DIR.'/tpl/');
      $block->template = $block->get_block()->get_name().'.tpl';
    }
  }
}

function fbp_loc_begin_index()
{
  global $page;

  set_make_full_url();
  $page['fbp']['url'] = duplicate_index_url(array(''), array('start', 'flat', 'chronology_date', 'chronology_field', 'chronology_style', 'chronology_view'));
  unset_make_full_url();
}

function fbp_loc_begin_index_category_thumbnails($categories)
{
  global $page;

  $C = count($categories);
  if ($C > 0)
  {
    include_once(PHPWG_ROOT_PATH.'include/functions_picture.inc.php');
    //~ $category = reset($categories);
    $category = $categories[rand(0, $C-1)];
    if (is_numeric($category['representative_picture_id']))
    {
      $query = '
SELECT id, path
FROM '.IMAGES_TABLE.'
WHERE id = '.$category['representative_picture_id'].'
;';
      $result = pwg_query($query);
      if($row = pwg_db_fetch_assoc($result))
      {
        set_make_full_url();
        $page['fbp']['url_image'] = get_element_url($row);
        $page['fbp']['url_thumbnail_image'] = DerivativeImage::thumb_url($row);
        unset_make_full_url();
      }
    }
  }
}

function fbp_loc_begin_index_thumbnails($pictures)
{
  global $page;

  if (isset($page['category']['representative_picture_id']))
  {
    fbp_loc_begin_index_category_thumbnails(array($page['category']));
  }
  else
  {
    $C = count($pictures);
    if ($C > 0)
    {
      include_once(PHPWG_ROOT_PATH.'include/functions_picture.inc.php');
      $picture = reset($pictures);
      $picture = $pictures[rand(0, $C-1)];
      set_make_full_url();
      $page['fbp']['url_image'] = get_element_url($picture);
      $page['fbp']['url_thumbnail_image'] = DerivativeImage::thumb_url($picture);
      unset_make_full_url();
    }
  }
}

if ($conf['fbp']['social_plugin_activity_feed']['enabled'] or $conf['fbp']['social_plugin_like_box']['enabled'])
{
  add_event_handler('blockmanager_register_blocks', 'fbp_blockmanager_register_blocks', EVENT_HANDLER_PRIORITY_NEUTRAL);
  add_event_handler('blockmanager_apply', 'fbp_blockmanager_apply');
}

add_event_handler('loc_begin_index', 'fbp_loc_begin_index');
add_event_handler('loc_begin_index_category_thumbnails', 'fbp_loc_begin_index_category_thumbnails', EVENT_HANDLER_PRIORITY_NEUTRAL, 1);
add_event_handler('loc_begin_index_thumbnails', 'fbp_loc_begin_index_thumbnails', EVENT_HANDLER_PRIORITY_NEUTRAL, 1);

if ($conf['fbp']['share_album'])
{
  add_event_handler('loc_end_index', 'fbp_add_bar_button', EVENT_HANDLER_PRIORITY_NEUTRAL+1 /* In order to be on right */);
}

?>
