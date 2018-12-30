{if $fbp.add_group_footer}
 - <a href="{$FACEBOOK_PIWIGO_GROUP_URL}" onclick="window.open(this.href); return false;" class="Piwigo">{'Join Facebook Piwigo group'|@translate}</a>
{/if}
{if $fbp.add_application_footer}
 - <a href="{$FACEBOOK_PIWIGO_APPLICATION_URL}" onclick="window.open(this.href); return false;" {*class="Piwigo"*}>{'Via Facebook Piwigo application'|@translate}</a>
{/if}
