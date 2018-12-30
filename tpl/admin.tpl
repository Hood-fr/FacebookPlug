{combine_script id="jquery.tipTip" path='themes/default/js/plugins/jquery.tipTip.minified.js' load='async'}

{combine_css path=$FBP_PATH|@cat:"/css/admin.css"}
{combine_css path="plugins/FacebookPlug/css/admin.css"}

<div class="titrePage">
  <h2>FacebookPlug</h2>
</div>
<br>

<form method="post" class="properties" action="{$FBP_ACTION}">
{if isset($social_plugin)}
<h3>{'On picture pages'|@translate}</h3>
<fieldset>
  <legend><a href="{$social_plugin.like_button.FB_PAGE}" onclick="window.open(this.href); return false;">{'Like button'|@translate}</a></legend>
  <ul>
    <li>
      <label>
        <span class="property">{'Enabled'|@translate}</span>
        <input type="checkbox" name="FBP_SOCIAL_PLUGIN_LIKE_BUTTON_ENABLED" {$social_plugin.like_button.ENABLED} />
      </label>
    </li>

    <div id='like_button'>
      <li>
        <label>
          <span class="property">{'Layout style'|@translate}</span>
          <select name="FBP_SOCIAL_PLUGIN_LIKE_BUTTON_LAYOUT" size="1">
            {html_options options=$social_plugin.like_button.LAYOUT_OPTIONS selected=$social_plugin.like_button.LAYOUT_OPTIONS_SELECTED}
          </select>
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Show faces'|@translate}</span>
          <input type="checkbox" name="FBP_SOCIAL_PLUGIN_LIKE_BUTTON_SHOW_FACES" {$social_plugin.like_button.SHOW_FACES} />
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Verb to display'|@translate}</span>
          <select name="FBP_SOCIAL_PLUGIN_LIKE_BUTTON_ACTION" size="1">
            {html_options options=$social_plugin.like_button.ACTION_OPTIONS selected=$social_plugin.like_button.ACTION_OPTIONS_SELECTED}
          </select>
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Color scheme'|@translate}</span>
          <select name="FBP_SOCIAL_PLUGIN_LIKE_BUTTON_COLORSCHEME" size="1">
            {html_options options=$social_plugin.like_button.COLORSCHEME_OPTIONS selected=$social_plugin.like_button.COLORSCHEME_OPTIONS_SELECTED}
          </select>
        </label>
      </li>
    </div>
  </ul>
</fieldset>

<fieldset>
  <legend><a href="{$social_plugin.facepile.FB_PAGE}" onclick="window.open(this.href); return false;">{'Facepile'|@translate}</a> {'on slideshow pages'|@translate}</legend>
  <ul>
    <li>
      <label>
        <span class="property">{'Enabled'|@translate}</span>
        <input type="checkbox" name="FBP_SOCIAL_PLUGIN_FACEPILE_ENABLED" {$social_plugin.facepile.ENABLED} />
      </label>
    </li>

    <div id='facepile'>
      <li>
        <label>
          <span class="property">{'Num rows'|@translate}</span>
          <input type="text" size="3" maxlength="4" name="FBP_SOCIAL_PLUGIN_FACEPILE_MAX_ROWS" value="{$social_plugin.facepile.MAX_ROWS}" />
        </label>
      </li>
    </div>
  </ul>
</fieldset>

<fieldset>
  <legend><a href="{$social_plugin.comments.FB_PAGE}" onclick="window.open(this.href); return false;">{'Comments'|@translate}</a></legend>
  <ul>
    <li>
      <label>
        <span class="property">{'Enabled'|@translate}</span>
        <input type="checkbox" name="FBP_SOCIAL_PLUGIN_COMMENTS_ENABLED" {$social_plugin.comments.ENABLED} />
      </label>
    </li>

    <div id='comments'>
      <li>
        <label>
          <span class="property">{'Num posts'|@translate}</span>
          <input type="text" size="3" maxlength="4" name="FBP_SOCIAL_PLUGIN_COMMENTS_NUMPOSTS" value="{$social_plugin.comments.NUMPOSTS}" />
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Title'|@translate}</span>
          <input type="text" size="39" name="FBP_SOCIAL_PLUGIN_COMMENTS_TITLE" value="{$social_plugin.comments.TITLE}" />
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Simple'|@translate}</span>
          <input type="checkbox" name="FBP_SOCIAL_PLUGIN_COMMENTS_SIMPLE" {$social_plugin.comments.SIMPLE} />
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Reverse'|@translate}</span>
          <input type="checkbox" name="FBP_SOCIAL_PLUGIN_COMMENTS_REVERSE" {$social_plugin.comments.REVERSE} />
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Publish feed'|@translate}</span>
          <input type="checkbox" name="FBP_SOCIAL_PLUGIN_COMMENTS_PUBLISH_FEED" {$social_plugin.comments.PUBLISH_FEED} />
        </label>
      </li>
    </div>
  </ul>
</fieldset>

<h3>{'On menu of main pages'|@translate}</h3>
<fieldset>
  <legend><a href="{$social_plugin.activity_feed.FB_PAGE}" onclick="window.open(this.href); return false;">{'Activity feed'|@translate}</a></legend>
  <ul>
    <li>
      <label>
        <span class="property">{'Enabled'|@translate}</span>
        <input type="checkbox" name="FBP_SOCIAL_PLUGIN_ACTIVITY_FEED_ENABLED" {$social_plugin.activity_feed.ENABLED} />
      </label>
    </li>

    <div id='activity_feed'>
      <li>
        <label>
          <span class="property">{'Color scheme'|@translate}</span>
          <select name="FBP_SOCIAL_PLUGIN_ACTIVITY_FEED_COLORSCHEME" size="1">
            {html_options options=$social_plugin.activity_feed.COLORSCHEME_OPTIONS selected=$social_plugin.activity_feed.COLORSCHEME_OPTIONS_SELECTED}
          </select>
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Show header'|@translate}</span>
          <input type="checkbox" name="FBP_SOCIAL_PLUGIN_ACTIVITY_FEED_HEADER" {$social_plugin.activity_feed.HEADER} />
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Show recommendations'|@translate}</span>
          <input type="checkbox" name="FBP_SOCIAL_PLUGIN_ACTIVITY_FEED_RECOMMENDATIONS" {$social_plugin.activity_feed.RECOMMENDATIONS} />
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Height'|@translate}</span>
          <input type="text"  size="3" maxlength="4" name="FBP_SOCIAL_PLUGIN_ACTIVITY_FEED_HEIGHT" value="{$social_plugin.activity_feed.HEIGHT}" />
        </label>
      </li>
    </div>
  </ul>
</fieldset>

<fieldset>
  <legend><a href="{$social_plugin.like_box.FB_PAGE}" onclick="window.open(this.href); return false;">{'Like box'|@translate}</a></legend>
  <ul>
    <li>
      <label>
        <span class="property">{'Enabled'|@translate}</span>
        <input type="checkbox" name="FBP_SOCIAL_PLUGIN_LIKE_BOX_ENABLED" {$social_plugin.like_box.ENABLED} />
      </label>
    </li>

    <div id='like_box'>
      <li>
        <label>
          <span class="property">{'Facebook Page URL'|@translate}</span>
          <input type="text" size="39" name="FBP_SOCIAL_PLUGIN_LIKE_BOX_URL" value="{$social_plugin.like_box.URL}" />
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Color scheme'|@translate}</span>
          <select name="FBP_SOCIAL_PLUGIN_LIKE_BOX_COLORSCHEME" size="1">
            {html_options options=$social_plugin.like_box.COLORSCHEME_OPTIONS selected=$social_plugin.like_box.COLORSCHEME_OPTIONS_SELECTED}
          </select>
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Show faces'|@translate}</span>
          <input type="checkbox" name="FBP_SOCIAL_PLUGIN_LIKE_BOX_SHOW_FACES" {$social_plugin.like_box.SHOW_FACES} />
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Show stream'|@translate}</span>
          <input type="checkbox" name="FBP_SOCIAL_PLUGIN_LIKE_BOX_STREAM" {$social_plugin.like_box.STREAM} />
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Show header'|@translate}</span>
          <input type="checkbox" name="FBP_SOCIAL_PLUGIN_LIKE_BOX_HEADER" {$social_plugin.like_box.HEADER} />
        </label>
      </li>
      <li>
        <label>
          <span class="property">{'Height'|@translate}</span>
          <input type="text"  size="3" maxlength="4" name="FBP_SOCIAL_PLUGIN_LIKE_BOX_HEIGHT" value="{$social_plugin.like_box.HEIGHT}" />
        </label>
      </li>
    </div>
  </ul>
</fieldset>
<p><i>{'Other options are available by programming'|@translate}</i></p>
{/if}{* isset $social_plugin*}

{if isset($button)}
<fieldset>
  <legend>{'Share'|@translate}</legend>
  <ul>
    <li>
      <label>
        <span class="property">{'Share picture page'|@translate}</span>
        <a class="HelptipTip" href="#" title="{'Add a icon link on each picture page to share on Facebook'|@translate}"><sup>{' (?)'|@translate}</sup></a>
        <input type="checkbox" name="FBP_SHARE_PICTURE" {$button.FBP_SHARE_PICTURE} />
      </label>
    </li>
    <li>
      <label>
        <span class="property">{'Share album page'|@translate}</span>
        <a class="HelptipTip" href="#" title="{'Add a icon link on each album page to share on Facebook'|@translate}"><sup>{' (?)'|@translate}</sup></a>
        <input type="checkbox" name="FBP_SHARE_ALBUM" {$button.FBP_SHARE_ALBUM} />
      </label>
    </li>
  </ul>
</fieldset>
{*
<fieldset>
  <legend>{'Upload'|@translate}</legend>
  <ul>
    <li>
      <label>
        <span class="property">{'Upload picture'|@translate}</span>
        <a class="HelptipTip" href="#" title="{'Add a icon link on each picture page to upload image on Facebook'|@translate}"><sup>{' (?)'|@translate}</sup></a>
        <input type="checkbox" name="FBP_UPLOAD_PICTURE" {$button.FBP_UPLOAD_PICTURE} />
      </label>
    </li>
</fieldset>
*}
{/if}{* isset $button*}

{if isset($advanced)}
<fieldset>
  <legend>{'Options'|@translate}</legend>
  <ul>
      <li>
      <label>
        <span class="property">{'Facebook application identifient'|@translate}</span>
        <a class="HelptipTip" href="#" title="{'To fill only if you want to use a specific Facebook application. It\'s recommended to leave blank.'|@translate}"><sup>{' (?)'|@translate}</sup></a>
        <input type="text" size="15" name="FBP_FACEBOOK_APP_ID" value="{$advanced.FBP_FACEBOOK_APP_ID}" />
      </label>
    </li>
{*    <li>
      <label>
        <span class="property">{'Asynchronous Facebook access'|@translate}</span>
        <a class="HelptipTip" href="#" title="{'Todo'|@translate}"><sup>{' (?)'|@translate}</sup></a>
        <input type="checkbox" name="FBP_ASYNC_SCRIPT" {$advanced.FBP_ASYNC_SCRIPT} />
      </label>
    </li>*}
    <li>
      <label>
        <span class="property">{'Always initialize Facebook'|@translate}</span>
        <a class="HelptipTip" href="#" title="{'Useful for personal templates, plugins. A event if also defined for plugins.'|@translate}"><sup>{' (?)'|@translate}</sup></a>
        <input type="checkbox" name="FBP_FORCE_FACEBOOK_INIT" {$advanced.FBP_FORCE_FACEBOOK_INIT} />
      </label>
    </li>
    <li>
      <label>
        <span class="property">{'Picture URL type'|@translate}</span>
        <a class="HelptipTip" href="#" title="{'Page type allows to reference the page and Facebook can get informations (title, ...). Image type allows to reference image url and Facebook cannot get informations but works always with private albums.'|@translate}"><sup>{' (?)'|@translate}</sup></a>
        <select name="FBP_PICTURE_URL_TYPE" size="1">
          {html_options options=$advanced.FBP_PICTURE_URL_TYPE_OPTIONS selected=$advanced.FBP_PICTURE_URL_TYPE_OPTIONS_SELECTED}
        </select>
      </label>
    </li>
    <li>
      <label>
        <span class="property">{'Allow Facebook to see private page'|@translate}</span>
        <a class="HelptipTip" href="#" title="{'Recommended in order to Facebook get title, ... of your pages for wall display'|@translate}"><sup>{' (?)'|@translate}</sup></a>
        <input type="checkbox" name="FBP_ALLOW_FB_ACCESS_PRIVATE_PAGE" {$advanced.FBP_ALLOW_FB_ACCESS_PRIVATE_PAGE} />
      </label>
    </li>
  </ul>
</fieldset>
<fieldset>
  <legend>{'Promote'|@translate}</legend>
  <ul class="OldVersion">
    <li>
      <label>
        <span class="property">{'Add informations on about page'|@translate}</span>
        <a class="HelptipTip" href="#" title="{'Add a paragraph with Facebook link on about page'|@translate}"><sup>{' (?)'|@translate}</sup></a>
        <input type="checkbox" name="FBP_ADD_ABOUT_INFORMATIONS" {$advanced.FBP_ADD_ABOUT_INFORMATIONS} />
      </label>
    </li>
  </ul>
  <ul>
    <li>
      <label>
        <span class="property">{'Add Facebook Piwigo group on footer'|@translate}</span>
        <a class="HelptipTip" href="#" title="{'Add a link on each page footer'|@translate}"><sup>{' (?)'|@translate}</sup></a>
        <input type="checkbox" name="FBP_ADD_GROUP_FOOTER" {$advanced.FBP_ADD_GROUP_FOOTER} />
      </label>
    </li>
  </ul>
  <ul>
    <li>
      <label>
        <span class="property">{'Add Facebook Piwigo application on footer'|@translate}</span>
        <a class="HelptipTip" href="#" title="{'Add a link on each page footer'|@translate}"><sup>{' (?)'|@translate}</sup></a>
        <input type="checkbox" name="FBP_ADD_APPLICATION_FOOTER" {$advanced.FBP_ADD_APPLICATION_FOOTER} />
      </label>
    </li>
  </ul>
</fieldset>
{/if}{* isset $advanced*}

{if isset($activity)}
<center>
  <div>
  <fb:activity
    width="550"
    height="950"
    recommendations="true"
    header="true"
  ></fb:activity>
</center>
{/if}{* isset $activity*}

{if ! isset($activity)}
  <p>
    <input class="submit" type="submit" name="submit" value="{'Submit'|@translate}">
    <input class="submit" type="reset" name="reset" value="{'Reset'|@translate}">
  </p>
{/if}{* isset $activity*}

  <p>
{'Develop by'|@translate} <a href="{$FACEBOOK_PIWIGO_RUB_URL}" target="_bank">Ruben ARNAUD</a>
 - <a href="{$FACEBOOK_PIWIGO_GROUP_URL}" target="_bank">{'Join Facebook Piwigo group'|@translate}</a>
 - <a href="{$FACEBOOK_PIWIGO_APPLICATION_URL}" target="_bank">{'Via Facebook Piwigo application'|@translate}</a>
  <p>

</form>

<div id="dialog_modal_like_button_comments" title="{'Informations'|@translate}">{'Like button and comments cannot be enabled together'|@translate}</div>
{*<div id="dialog_modal_can_close" title="{'Informations'|@translate}">{'Data are modified but not saved! Are you sure to quit this tabsheet?'|@translate}</div>*}

{footer_script require='jquery.ui.button,jquery.ui.dialog,jquery.tipTip'}
{literal}
  function show_hide(checkbox_name, div_name)
  {
    if ($("input[name="+checkbox_name+"]").attr('checked'))
    {
      $("#"+div_name).show();
    }
    else
    {
      $("#"+div_name).hide();
    }
  }

  function inverse_check_value(checkbox_name_1, checkbox_name_2)
  {
    if ($("input[name="+checkbox_name_1+"]").attr('checked') && $("input[name="+checkbox_name_2+"]").attr('checked'))
    {
      $("input[name="+checkbox_name_1+"]").attr('checked', false);
      $("#dialog_modal_like_button_comments").dialog('open');
    }
  }

  function init_checkbox(checkbox_name, div_name)
  {
    $("input[name="+checkbox_name+"]").click(
      function()
      {
        show_hide(checkbox_name, div_name);
      }
    );
    show_hide(checkbox_name, div_name);
  }

  function init_checkbox_with_inverse_value(checkbox_name_1, checkbox_name_2)
  {
    $("input[name="+checkbox_name_1+"]").click(
      function()
      {
        inverse_check_value(checkbox_name_1, checkbox_name_2);
      }
    );
    $("input[name="+checkbox_name_2+"]").click(
      function()
      {
        inverse_check_value(checkbox_name_2, checkbox_name_1);
      }
    );
  }

  $(document).ready(
    function()
    {
      //Init all main checkbox
      init_checkbox_with_inverse_value("FBP_SOCIAL_PLUGIN_LIKE_BUTTON_ENABLED", "FBP_SOCIAL_PLUGIN_COMMENTS_ENABLED");
      init_checkbox("FBP_SOCIAL_PLUGIN_LIKE_BUTTON_ENABLED", "like_button");
      init_checkbox("FBP_SOCIAL_PLUGIN_FACEPILE_ENABLED", "facepile");
      init_checkbox("FBP_SOCIAL_PLUGIN_COMMENTS_ENABLED", "comments");
      init_checkbox("FBP_SOCIAL_PLUGIN_ACTIVITY_FEED_ENABLED", "activity_feed");
      init_checkbox("FBP_SOCIAL_PLUGIN_LIKE_BOX_ENABLED", "like_box");
      // Init message box
      $("#dialog_modal_like_button_comments").dialog({
        autoOpen: false, modal: true, dialogClass: 'admin_config', // necessary to have a specific class because there are conflic with main menu accordeon
        buttons: { "{/literal}{'Continue'|@translate}{literal}": function() { $(this).dialog("close"); } },
      });
      $("#dialog_modal_can_close").dialog({
        autoOpen: false, modal: true, dialogClass: 'admin_config', // necessary to have a specific class because there are conflic with main menu accordeon
        buttons: { "Cancel": function() { $(this).dialog("close"); }, "{/literal}{'Submit'|@translate}{literal}": function() { IsDataChanged = false; $(this).dialog("close"); } },
      });
      // Init help tips
      $('.HelptipTip').tipTip({
        'delay' : 0,
        'fadeIn' : 200,
        'fadeOut' : 200,
      });
{/literal}
{if $FBP_OLD_VERSION}
      // Hide non compatible option
      $('.OldVersion').hide();
{/if}
{*      // Detect data change
      IsDataChanged = false;
      $("input, select").change(function() { IsDataChanged = true; });
      //~ $(".tabsheet").click(function()
      $(window).unload(function()
        {
          if (IsDataChanged)
          {
            //~ alert($(this).attr("name"));
           //~ $("#dialog_modal_can_close").dialog( "option", "buttons", { "{/literal}{'Submit'|@translate}{literal}": function() { $(this).dialog("close"); } } );
            $("#dialog_modal_can_close").dialog('open');
            
            //~ return true;
            return false
          }
          else
          {
            return true;
          }
          //return ! IsDataChanged;
        });
*}
{literal}
    });
{/literal}
{/footer_script}
