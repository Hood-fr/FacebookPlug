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

echo '$_SERVER["HTTP_ACCEPT_LANGUAGE"] = '.$_SERVER["HTTP_ACCEPT_LANGUAGE"].'<br />';

$language_path = dirname(dirname(dirname(dirname(__FILE__)))).'/language';
$dir = opendir($language_path);

echo 'Language path = '.$language_path.'<br />'.'<br />';

while ($file = readdir($dir))
{
  $path = $language_path.'/'.$file;
  if (!is_link($path) and is_dir($path) and file_exists($path.'/iso.txt'))
  {
    $locale = $file;
    $languages['strict_list'][] = $locale;

    $code_lang = substr($locale, 0, 2);
    // Compose a locale
    $locale = $code_lang.'_'.strtoupper($code_lang);
    $languages['extented_list'][] = $locale;
  }
}
closedir($dir);

$languages['extented_list'] = array_merge($languages['strict_list'], $languages['extented_list']);

/*foreach (array_unique($languages['extented_list']) as $locale)
{
  echo '<br />'.$locale.'<br />'.'-------'.'<br />';
  $locale_connect = 'http://connect.facebook.net/'.$locale.'/all.js';
  echo $locale_connect.'<br />';

  $content = @file_get_contents($locale_connect);
  if ($content !== false and ! preg_match('/is not a valid locale/', $content))
  {
    echo 'ok'.'<br />';
    $languages['ok'][] = $locale;
  }
  else
  {
    echo 'ko'.'<br />';
    $languages['ko'][] = $locale;
  }
}

@asort($languages['ok']);
@asort($languages['ko']);

echo '<br />'.'<br />'.'Languages defined on Facebook'.'<br />'.'-----------------------------'.'<br />';
var_export($languages['ok']);

echo '<br />'.'<br />'.'Languages not defined on Facebook'.'<br />'.'-----------------------------'.'<br />';
var_export($languages['ko']);

echo '<br />'.'<br />'.'Facebook Locales'.'<br />'.'-----------------------------'.'<br />';
echo @file_get_contents('http://www.facebook.com/translations/FacebookLocales.xml');
*/
$dom = DomDocument::load('http://www.facebook.com/translations/FacebookLocales.xml');

$domrepresentation = $dom->getElementsByTagName("representation");

foreach ($domrepresentation as $representations)
{
  $languages['fb'][] = $representations->nodeValue;
} 
@sort($languages['fb']);

echo '<br />'.'<br />'.'Languages defined on Facebook'.'<br />'.'-----------------------------'.'<br />';
var_export($languages['fb']);

echo '<br />'.'<br />'.'Languages not defined on Facebook'.'<br />'.'-----------------------------'.'<br />';
var_export(array_values(array_diff($languages['strict_list'],$languages['fb'])));

echo '<br />'.'<br />'.'Extented languages not defined on Facebook'.'<br />'.'-----------------------------'.'<br />';
var_export(array_values(array_diff($languages['extented_list'],$languages['fb'])));

?>
