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

include_once(dirname(__FILE__).'/constants.inc.php');
include_once(FBP_DIR.'/include/conf.inc.php');
include_once(FBP_DIR.'/include/functions.inc.php');
include_once(FBP_DIR.'/include/header.inc.php');

$fbp_include_file = FBP_DIR.'/include/'.script_basename().'.inc.php';
if (file_exists($fbp_include_file))
{
  include_once($fbp_include_file);
}

include_once(FBP_DIR.'/include/footer.inc.php');

?>
