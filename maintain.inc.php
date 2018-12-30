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

function plugin_install()
{
  // Update configuration
  $query = '
replace into '.CONFIG_TABLE.'
  (param, value, comment)
values
  (
    \'fbp\',
    \''.serialize(array()).'\',
    \'Parameters of "FacebookPlug" plugin\'
  )
;';

  pwg_query($query);
}

function plugin_activate()
{
  // Inactivate plugins
  $plugins = array('Facebook_Integration');
    $query = '
update '.PLUGINS_TABLE.'
set STATE=\'inactive\'
where ID in (\'' . implode('\',\'', $plugins) . '\')
;';
    pwg_query($query);

}

function plugin_uninstall()
{
  // Delete configuration
  $query = '
delete from '.CONFIG_TABLE.'
where param = \'fbp\'
;';

  pwg_query($query);
}

?>