<!-- By FacebookPlug a Piwigo Plugin -->
{if isset($fbp_page.og.title)}
<meta property="og:title" content="{$fbp_page.og.title|@replace:'"':' '}">
{else}
  {if (isset($REVERSE) and $REVERSE and $PAGE_TITLE == l10n('Home'))}
<meta property="og:title" content="{$GALLERY_TITLE|@replace:'"':' '} | {$PAGE_TITLE|@replace:'"':' '}">
  {else}
<meta property="og:title" content="{$PAGE_TITLE|@replace:'"':' '} | {$GALLERY_TITLE|@replace:'"':' '}">
  {/if}
{/if}
{if isset($fbp_page.og.description)}
<meta property="og:description" content="{$fbp_page.og.description|@replace:'"':' '}">
{else}
  {if isset($COMMENT_IMG)}
<meta property="og:description" content="{$COMMENT_IMG|@strip_tags:false|@replace:'"':' '}{if isset($INFO_FILE)} - {$INFO_FILE|@replace:'"':' '}{/if}">
  {else}
<meta property="og:description" content="{$PAGE_TITLE|@replace:'"':' '}{if isset($INFO_FILE)} - {$INFO_FILE|@replace:'"':' '}{/if}">
  {/if}
{/if}
<meta property="og:site_name" content="{if isset($fbp_page.og.site_name)}{$fbp_page.og.site_name|@replace:'"':' '}{else}{$GALLERY_TITLE|@replace:'"':' '}{/if}">
<meta property="og:type" content="{if isset($fbp_page.og.type)}{$fbp_page.og.type}{else}website{/if}">
<meta property="og:image" content="{if isset($fbp_page.og.image)}{$fbp_page.og.image}{else}{$fbp_page.url_xs_image}{/if}">
<meta property="og:image:url" content="{if isset($fbp_page.og.image.url)}{$fbp_page.og.image}{else}{$fbp_page.url_xs_image}{/if}">
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">
<meta property="og:url" content="{if isset($fbp_page.og.url)}{$fbp_page.og.url}{else}{$fbp_page.url}{/if}">
{if isset({$FACEBOOK_APP_ID})}
<meta property="fb:app_id" content="{$FACEBOOK_APP_ID}">
{/if}
{if isset($fbp_page.fb.admins)}
<meta property="fb:admins" content="{$fbp_page.fb.admins}">
{/if}

{if $fbp.async_script}
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {ldelim}
    FB.init({ldelim}
      appId  : '{$FACEBOOK_APP_ID}',
      status : true, // check login status 
      cookie : true, // enable cookies to allow the server to access the session 
      xfbml  : true,  // parse XFBML
      version: 'v11.0'
    {rdelim}); 
  {rdelim}; 
  (function() {ldelim}
    var e = document.createElement(script);
    e.src = document.location.protocol + //connect.facebook.net/{$FACEBOOK_LOCALE}/all.js#appId={$FACEBOOK_APP_ID}&amp;xfbml=1;
    e.async = true;
    document.getElementById(fb-root).appendChild(e);
  {rdelim}());
</script>
{else}
<div id="fb-root"></div>
<!--<script src="https://connect.facebook.net/{$FACEBOOK_LOCALE}/all.js#appId={$FACEBOOK_APP_ID}&amp;xfbml=1"></script>-->
<script src="https://connect.facebook.net/{$FACEBOOK_LOCALE}/sdk.js"></script>
<script>
  FB.init({ldelim}
    appId  : '{$FACEBOOK_APP_ID}',
    status : true, // check login status
    cookie : true, // enable cookies to allow the server to access the session
    xfbml  : true,  // parse XFBML      version: 'v11.0'
    version: 'v11.0'
 {rdelim});
</script>
{/if}
