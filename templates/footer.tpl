
{* $Id: footer.tpl 62 2009-02-18 02:59:27Z john $ *}

  {* SHOW PAGE BOTTOM ADVERTISEMENT BANNER *}
  {if $ads->ad_bottom != ""}
    <div class='ad_bottom' style='display: block; visibility: visible;'>
      {$ads->ad_bottom}
    </div>
  {/if}

{* END CONTENT CONTAINER *}
</div>


{* END BODY CONTAINER *}
</td>
{* SHOW RIGHT-SIDE ADVERTISEMENT BANNER *}
{if $ads->ad_right != ""}
  <td valign='top'><div class='ad_right' width='1' style='display: table-cell; visibility: visible;'>{$ads->ad_right}</div></td>
{/if}
</tr>
</table>


{* COPYRIGHT FOOTER *}
<!--Footer-->
<div id="footer">
	<div class="foot_l">
    	<div class="foot_r">
            <div class="dis">{lang_print id=6000146} – <a href="http://www.nineseven.ru" target="_blank">Nineseven</a></div>
            <div class="copy"><span>© 2008–2011 Goongi.com</span></div>
        </div>
    </div>
</div>
<!--/Footer-->


{* END CENTERED TABLE *}
</td>
</tr>
</table>


{* INCLUDE ANY FOOTER TEMPLATES NECESSARY *}
{hook_include name=footer}


</body>
</html>