<?php /* Smarty version 2.6.14, created on 2011-11-02 12:17:26
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


			</div>
            <div class="left_small">
            	<div class="left_c">
					<!-- start USER MENU -->
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'menu_main.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<!-- end USER MENU -->
                	<div class="block0">
                    	<div class="bg">
                        	<div class="c">
                            	<div class="rec">
                                	<p><strong>Разработка сайтов</strong><br /><span>веб-дизайн</span></p>
                                    <div><img src="images/2.jpg" alt="" /></div>
                                    <p><font>Отличные сайты любой сложности<br /><strong>от 20.000 руб.</strong></font></p>
									<p><font>+375 (29) 571-33-72<br /><a href="http://nineseven.ru" target="_blank">http://nineseven.ru</a></font></p>
                                </div>
                            </div>
                        </div>
                        <div class="b1"><a href="#">Создать себе визитку</a></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="clearfooter"></div>	
</div>


</div>

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




<?php if( isset($this->_tpl_hooks['footer']) )
{
  foreach( $this->_tpl_hooks['footer'] as $_tpl_hook_include )
  {
    $this->_smarty_include(array('smarty_include_tpl_file' => $_tpl_hook_include, 'smarty_include_vars' => array()));
  }
} ?>


</body>
</html>