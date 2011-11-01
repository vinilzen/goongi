<?php /* Smarty version 2.6.14, created on 2011-11-01 12:54:34
         compiled from footer.tpl */
?><?php
SELanguage::_preload_multi(6000146);
SELanguage::load();
?>﻿

    <?php if ($this->_tpl_vars['ads']->ad_bottom != ""): ?>
    <div class='ad_bottom' style='display: block; visibility: visible;'>
      <?php echo $this->_tpl_vars['ads']->ad_bottom; ?>

    </div>
  <?php endif; ?>

</div>


</td>
<?php if ($this->_tpl_vars['ads']->ad_right != ""): ?>
  <td valign='top'><div class='ad_right' width='1' style='display: table-cell; visibility: visible;'><?php echo $this->_tpl_vars['ads']->ad_right; ?>
</div></td>
<?php endif; ?>
</tr>
</table>


<!--Footer-->
<div id="footer">
	<div class="foot_l">
    	<div class="foot_r">
            <div class="dis"><?php echo SELanguage::_get(6000146); ?> – <a href="http://www.nineseven.ru" target="_blank">Nineseven</a></div>
            <div class="copy"><span>© 2008–2011 Goongi.com</span></div>
        </div>
    </div>
</div>
<!--/Footer-->


</td>
</tr>
</table>


<?php if( isset($this->_tpl_hooks['footer']) )
{
  foreach( $this->_tpl_hooks['footer'] as $_tpl_hook_include )
  {
    $this->_smarty_include(array('smarty_include_tpl_file' => $_tpl_hook_include, 'smarty_include_vars' => array()));
  }
} ?>


</body>
</html>