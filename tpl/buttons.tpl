{* --------------------------------------------------------------------------- *}
{if $fbp.share_picture or $fbp.share_album}
{if $FBP_SCRIPT_BASENAME == 'index'}<li>{/if}
{* method 1 *}
{*
<a class="pwg-state-default pwg-button" name="fb_share" type="icon" share_url="{$fbp_page.url}" title="{'Share on Facebook'|@translate}"></a>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" 
        type="text/javascript">
</script>
*}
{* method 2 *}
<a class="pwg-state-default pwg-button" href="http://www.facebook.com/sharer.php?u={$fbp_page.url|@urlencode}" title="{'Share on Facebook'|@translate}" rel="nofollow" onclick="window.open(this.href, 'Facebook_Share','width=550,height=350,location=no,status=no,toolbar=no,scrollbars=no,menubar=no'); return false;"><img src="{$FBP_PATH|@cat:'/icon/share.png'}" class="button" alt="{'Share on Facebook'|@translate}"></a>
{* method 3 *}
{*
<a class="pwg-state-default pwg-button" href="{$fbp_page.url}" title="{'Share on Facebook'|@translate}" rel="nofollow"  onclick="share(this.href); return false;"><img src="{$FBP_PATH|@cat:'/icon/share.png'}" class="button" alt="{'Share on Facebook'|@translate}"></a>
{literal}
<script type="text/javascript">
  //stream share method
  function share(href)
  {
    FB.ui({method: 'stream.share', u: href});
  }
</script>
{/literal}
*}
{if $FBP_SCRIPT_BASENAME == 'index'}</li>{/if}
{/if} {* $fbp.share_picture or $fbp.share_album *}
{* --------------------------------------------------------------------------- *}
{*
{if $fbp.upload_picture and $FBP_SCRIPT_BASENAME == 'picture' and in_array($fbp_page.url_image|get_extension|strtoupper, $fbp_page.available_upload_ext)}
<a class="pwg-state-default pwg-button" href="{$PIWIGO_FACEBOOK_UPLOAD_URL}?u={$fbp_page.url_image|@urlencode}&amp;pu={$fbp_page.url|@urlencode}&amp;pt={$PAGE_TITLE|@replace:'"':' '}&amp;gt={$GALLERY_TITLE|@replace:'"':' '}" title="{'Upload photo on Facebook'|@translate}" rel="nofollow" onclick="window.open(this.href, 'Facebook_Upload','width=250,height=50,location=no,status=no,toolbar=no,scrollbars=no,menubar=no'); return false;"><img src="{$FBP_PATH|@cat:'/icon/upload.png'}" class="button" alt="{'Share on Facebook'|@translate}"></a>
{/if} *} {* $fbp.upload_picture  and $FBP_SCRIPT_BASENAME == 'picture' *}
{* --------------------------------------------------------------------------- *}
