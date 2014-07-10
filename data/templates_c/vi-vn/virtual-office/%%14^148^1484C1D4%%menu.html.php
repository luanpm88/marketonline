<?php /* Smarty version 2.6.27, created on 2014-07-09 11:26:15
         compiled from menu.html */ ?>
<table class="menu_nav" >
	<tr>
	</tr>
	<tr>
	<td>
		<?php if ($this->_tpl_vars['menu']['offer']): ?>
		
			<?php if ($this->_tpl_vars['showEmployeeShop'] && $this->_tpl_vars['membertype_id'] != 5 && $this->_tpl_vars['membertype_id'] != 6): ?>
		
				<table class="menu_width167">
				<tr>
				  <td>
			  <table class="menu_nav title_nav">
					  <tr>
						<td width="10"></td>
						<td class="title_bar" onclick="if($('#MenuTrade').length>0) $('#MenuTrade').toggle();"><a name="menu_top"></a><?php echo $this->_tpl_vars['_business_information']; ?>
</td>
						<td width="5"></td>
					  </tr>
				  </table>
			  </td>
				</tr>
				<tr>
				  <td align="center">
					
					
					
						<table class="menu_nav_content" id="MenuTrade">
								<tr class="MenuItem1">
								      <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/sell_add.gif"></th>
								      <td><a href="offer.php?do=edit"><?php echo $this->_tpl_vars['_release_supply']; ?>
</a></td>
								</tr>
								<tr class="MenuItem2">
								      <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/buy.gif"></th>
								      <td><a href="offer.php"><?php echo $this->_tpl_vars['_our_offer']; ?>
</a></td>
								</tr>
								<!--<tr>
								      <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/favor.gif"></th>
								      <td><a href="favor.php"><?php echo $this->_tpl_vars['_our_favorites']; ?>
</a></td>
								</tr>-->
								<tr  class="MenuItem3">
								      <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/sell.gif" width="14" height="14"></th>
								      <td><a href="stat.php"><?php echo $this->_tpl_vars['_buy_statistics']; ?>
</a></td>
								</tr>
							      <!--<tr>
								<th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/message_in.gif" /></td>
								<td><a href="pms.php?type=inquery"><?php echo $this->_tpl_vars['_customer_inquiry']; ?>
</a></td>
							      </tr>	-->	  
						</table>
						
						
				       </td>
				</tr>
			  </table>
			
			<?php endif; ?>
		
		
		<?php endif; ?>
		
		
		<?php if ($this->_tpl_vars['showEmployeeShop'] && $this->_tpl_vars['membertype_id'] != 5 && $this->_tpl_vars['membertype_id'] != 6): ?>
			<table class="menu_width167">
			  <tr>
				<td>
					<table class="menu_nav title_nav">
						<tr>
						  <td width="10"></td>
						  <td class="title_bar" onclick="if($('#MenuProduct').length>0) $('#MenuProduct').toggle();"><a name="p"></a><?php echo $this->_tpl_vars['_information_management']; ?>
</td>
						  <td width="55"></td>
						</tr>
					</table>
				</td>
			  </tr>
			  <tr>
				<td align="center">
				<table class="menu_nav_content" id="MenuProduct">
					<tr class="MenuItem4">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/product.gif"></th>
					  <td><a href="product.php?do=edit"><?php echo $this->_tpl_vars['_release_products']; ?>
</a> </td>
					</tr>
					<tr class="MenuItem5">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/product2.gif"></th>
					  <td><a href="product.php"><?php echo $this->_tpl_vars['_our_productse']; ?>
</a></td>
					</tr>
					<!--<tr>
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/cal.gif"></th>
					  <td><a href="price.php"><?php echo $this->_tpl_vars['_my_product_price']; ?>
</a></td>
					</tr>-->
					<tr class="MenuItem24">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/sort.gif"></th>
					  <td><a href="producttype.php"><?php echo $this->_tpl_vars['_categories_management']; ?>
</a></td>
					</tr>
					<tr class="MenuItem6">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/brand.gif"></th>
					  <td><a href="brand.php"><?php echo $this->_tpl_vars['_brand_manage']; ?>
</a></td>
					</tr>
					<tr class="MenuItem7">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/invoice.png"></th>
					  <td><a href="buyerorder.php"><?php echo $this->_tpl_vars['_buy_order']; ?>
</a></td>
					</tr>
					<tr class="MenuItem8">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/invoice.png"></th>
					  <td><a href="sellerorder.php"><?php echo $this->_tpl_vars['_sell_order']; ?>
</a>
						<?php if ($this->_tpl_vars['count_sellerorder']): ?><div class="unread"><span><?php echo $this->_tpl_vars['count_sellerorder']; ?>
</span></div><?php endif; ?>
					  </td>
					</tr>
				</table></td>
			  </tr>
			</table>
		<?php endif; ?>
			
			
		<?php if ($this->_tpl_vars['showEmployeeShop'] && $this->_tpl_vars['membertype_id'] != 5 && $this->_tpl_vars['membertype_id'] != 6): ?>
			<table class="menu_width167">
			  <tr>
				<td>
					<table class="menu_nav title_nav">
						<tr>
						  <td width="10"></td>
						  <td class="title_bar" onclick="if($('#MenuService').length>0) $('#MenuService').toggle();"><a name="p"></a><?php echo $this->_tpl_vars['_services_menu_title']; ?>
</td>
						  <td width="25"></td>
						</tr>
					</table>
				</td>
			  </tr>
			  <tr>
				<td align="center">
				<table class="menu_nav_content" id="MenuService">
					<tr class="MenuItem21">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/product.gif"></th>
					  <td><a href="product.php?type=service&do=edit"><?php echo $this->_tpl_vars['_add_service']; ?>
</a> </td>
					</tr>
					<tr class="MenuItem22">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/product2.gif"></th>
					  <td><a href="product.php?type=service"><?php echo $this->_tpl_vars['_service_list']; ?>
</a></td>
					</tr>
					<!--<tr>
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/cal.gif"></th>
					  <td><a href="price.php"><?php echo $this->_tpl_vars['_my_product_price']; ?>
</a></td>
					</tr>
					<tr>
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/sort.gif"></th>
					  <td><a href="producttype.php"><?php echo $this->_tpl_vars['_categories_management']; ?>
</a></td>
					</tr>-->
					<tr class="MenuItem23">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/brand.gif"></th>
					  <td><a href="brand.php?type=service"><?php echo $this->_tpl_vars['_brand_manage']; ?>
</a></td>
					</tr>
					<!--<tr class="MenuItem7">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/invoice.png"></th>
					  <td><a href="buyerorder.php"><?php echo $this->_tpl_vars['_buy_order']; ?>
</a></td>
					</tr>
					<tr class="MenuItem8">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/invoice.png"></th>
					  <td><a href="sellerorder.php"><?php echo $this->_tpl_vars['_sell_order']; ?>
</a></td>
					</tr>-->
				</table></td>
			  </tr>
			</table>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['showEmployeeShop'] && $this->_tpl_vars['membertype_id'] != 5 && $this->_tpl_vars['membertype_id'] != 6): ?>
				<table class="menu_width167">
				  <tr>
					<td>
						<table class="menu_nav title_nav">
							<tr>
							  <td width="10"></td>
							  <td class="title_bar" onclick="if($('#MenuAds').length>0) $('#MenuAds').toggle();"><a name="p"></a><?php echo $this->_tpl_vars['_site_advertising']; ?>
</td>
							  <td width="25"></td>
							</tr>
						</table>
					</td>
				  </tr>
				  <tr>
					<td align="center">
					<table class="menu_nav_content" id="MenuAds">
						<tr class="MenuItem30">
							<th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/news.gif" /></th>
							<td><a href="banner.php"><?php echo $this->_tpl_vars['_site_advertising']; ?>
</a></td>
						</tr>
					</table></td>
				  </tr>
				</table>
		<?php endif; ?>
		
		
			<?php if ($this->_tpl_vars['menu']['company'] && $this->_tpl_vars['MEMBER']['membergroup_id'] == 3 && $this->_tpl_vars['showEmployeeShop'] && $this->_tpl_vars['membertype_id'] != 6): ?>
				<table class="menu_width167">
				  <tr>
					<td> <table class="menu_nav title_nav">
						<tr class="MenuItem9">
						  <td width="10"></td>
						  <td class="title_bar" onclick="if($('#MenuCompany').length>0) $('#MenuCompany').toggle();">
							<?php if ($this->_tpl_vars['membertype_id'] == 5): ?>Nhà tuyển dụng<?php else: ?><?php echo $this->_tpl_vars['_company_information']; ?>
<?php endif; ?></td>
						</tr>
					</table></td>
				  </tr>
				  <tr>
					<td align="center">
					<table class="menu_nav_content" id="MenuCompany" style="">
						<tr class="MenuItem10"> 
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/company.gif"></th>
						  <td><a href="company.php"><?php echo $this->_tpl_vars['_basic_information']; ?>
 <?php echo $this->_tpl_vars['membertype_name']; ?>
</a> </td>
						</tr>
						<tr class="MenuItem11"> 
						  <th><img width="16" height="16" src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/Release.gif"></th>
						  <td><a href="policy.php"><?php echo $this->_tpl_vars['_policy']; ?>
</a> </td>
						</tr>
						<tr class="MenuItem20"> 
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/product2.gif"></th>
						  <td><a href="news.php?typeid=9"><?php echo $this->_tpl_vars['_comnote']; ?>
 <?php echo $this->_tpl_vars['membertype_name']; ?>
</a></td>
						</tr>
						<tr class="MenuItem12"> 
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/album.gif"></th>
						  <td><a href="album.php"><?php echo $this->_tpl_vars['_company_album']; ?>
 <?php echo $this->_tpl_vars['membertype_name']; ?>
</a> </td>
						</tr>
						<!--<tr> 
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/contact.gif"></th>
						  <td><a href="card.php"><?php echo $this->_tpl_vars['_card_information']; ?>
</a> </td>
						</tr>-->
						<tr class="MenuItem13"> 
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/alert.gif"></th>
						  <td><a href="news.php"><?php echo $this->_tpl_vars['_company_news']; ?>
</a></td>
						</tr>
						<tr class="MenuItem14">
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/hr.gif" /></th>
						  <td><a href="job.php"><?php echo $this->_tpl_vars['_hr']; ?>
</a></td>
						<tr> 
						<tr class="MenuItem15"> 
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/link.gif"></th>
						  <td><a href="link.php" title="<?php echo $this->_tpl_vars['_friendlink']; ?>
"><?php echo $this->_tpl_vars['_link_exchange']; ?>
</a></td>
						</tr>
					  </table></td>
				  </tr>
				</table>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['menu']['company'] && ( $this->_tpl_vars['MEMBER']['membergroup_id'] == 1 || $this->_tpl_vars['MEMBER']['membergroup_id'] == 2 ) && $this->_tpl_vars['showEmployeeShop'] && $this->_tpl_vars['membertype_id'] != 6): ?>
				<table class="menu_width167">
				  <tr>
					<td>
						<table class="menu_nav title_nav">
							<tr>
							  <td width="10"></td>
							  <td class="title_bar" onclick="if($('#MenuCompany').length>0) $('#MenuCompany').toggle();"><?php echo $this->_tpl_vars['_shop_information']; ?>
 <?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 2): ?>(<?php echo $this->_tpl_vars['_personal']; ?>
)<?php endif; ?></td>
							</tr>
						</table>
					</td>
				  </tr>
				  <tr>
					<td align="center">
					<table class="menu_nav_content" id="MenuCompany" style="">
						<tr class="MenuItem10"> 
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/company.gif"></th>
						  <td><a href="company.php"><?php echo $this->_tpl_vars['_basic_information']; ?>
 <?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 2): ?>Cửa hàng<?php else: ?><?php echo $this->_tpl_vars['membertype_name']; ?>
<?php endif; ?></a> </td>
						</tr>
						<tr class="MenuItem11"> 
						  <th><img width="16" height="16" src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/Release.gif"></th>
						  <td><a href="policy.php"><?php echo $this->_tpl_vars['_policy']; ?>
</a> </td>
						</tr>
						
						<?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 1): ?>
							<tr class="MenuItem20"> 
							  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/product2.gif"></th>
							  <td><a href="news.php?typeid=9"><?php echo $this->_tpl_vars['_comnote']; ?>
 <?php echo $this->_tpl_vars['membertype_name']; ?>
</a></td>
							</tr>
						<?php endif; ?>
						
						<tr class="MenuItem12"> 
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/album.gif"></th>
						  <td><a href="album.php"><?php echo $this->_tpl_vars['_company_album']; ?>
 <?php echo $this->_tpl_vars['membertype_name']; ?>
</a> </td>
						</tr>
						<!--<tr> 
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/contact.gif"></th>
						  <td><a href="card.php"><?php echo $this->_tpl_vars['_card_information']; ?>
</a> </td>
						</tr>-->
						<tr class="MenuItem13"> 
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/alert.gif"></th>
						  <td><a href="news.php"><?php echo $this->_tpl_vars['_company_news']; ?>
</a></td>
						</tr>
						<tr class="MenuItem14">
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/hr.gif" /></th>
						  <td><a href="job.php"><?php echo $this->_tpl_vars['_hr']; ?>
</a></td>
						<tr> 
						<tr class="MenuItem15"> 
						  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/link.gif"></th>
						  <td><a href="link.php" title="<?php echo $this->_tpl_vars['_friendlink']; ?>
"><?php echo $this->_tpl_vars['_link_exchange']; ?>
</a></td>
						</tr>
					  </table></td>
				  </tr>
				</table>
			<?php endif; ?>
		
		
		
		<?php if ($this->_tpl_vars['membertype_id'] != 5): ?>
			<table class="menu_width167">
			  <tr>
				<td> <table class="menu_nav title_nav">
					<tr>
					  <td width="10"></td>
					  <td class="title_bar" onclick="if($('#MenuEmployee').length>0) $('#MenuEmployee').toggle();"><?php echo $this->_tpl_vars['_office_employee']; ?>
</td>
					  <td width="55"></td>
					</tr>
				</table></td>
			  </tr>
			  <tr>
				<td align="center">
				<table class="menu_nav_content" id="MenuEmployee" style="">
					<tr class="MenuItem31">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/message.gif"/></th>
					  <td><a href="employee.php?do=edit"><?php echo $this->_tpl_vars['_employee_send']; ?>
</a></td>
					</tr>
					<tr class="MenuItem32">
					  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/personals.gif" /></th>
					  <td><a href="employee.php"><?php echo $this->_tpl_vars['_employee_list']; ?>
</a></td>
					</tr>
					
				</table>
				</td>
			  </tr>
			</table>
		<?php endif; ?>
		
		
		
		<?php if ($this->_tpl_vars['menu']['pms']): ?>
		<table class="menu_width167">
		  <tr>
			<td> <table class="menu_nav title_nav">
				<tr>
				  <td width="10"></td>
				  <td class="title_bar" onclick="if($('#MenuPMS').length>0) $('#MenuPMS').toggle();"><?php echo $this->_tpl_vars['_exchange_information']; ?>
</td>
				  <td width="55"></td>
				</tr>
			</table></td>
		  </tr>
		  <tr>
			<td align="center">
			<table class="menu_nav_content" id="MenuPMS" style="">
				<tr class="MenuItem17">
				  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/message.gif"/></th>
				  <td><a href="pms.php?do=send"><?php echo $this->_tpl_vars['_send_message']; ?>
</a></td>
				</tr>
				<tr class="MenuItem16">
				  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/message_in.gif" /></th>
				  <td><a href="pms.php"><?php echo $this->_tpl_vars['_sms']; ?>
</a></td>
				</tr>
				<tr class="MenuItem16sent">
				  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/message_out.gif" /></th>
				  <td><a href="pms.php?type=sent"><?php echo $this->_tpl_vars['_sms_sent']; ?>
</a></td>
				</tr>	
				
			</table>
			</td>
		  </tr>
		</table>
		<?php endif; ?>
		
		
		
		<?php if ($this->_tpl_vars['menu']['basic']): ?>
	   <table class="menu_width167">
		  <tr>
			<td><table class="menu_nav title_nav">
				<tr>
				  <td width="10"></td>
				  <td class="title_bar" onclick="if($('#MenuBasic').length>0) $('#MenuBasic').toggle();"><?php echo $this->_tpl_vars['_system_settings']; ?>
</td>
				  <td width="55"></td>
				</tr>
			</table></td>
		  </tr>
		  <tr>
			<td align="center">
			<table class="menu_nav_content" id="MenuBasic">
				<tr class="MenuItem18">
				  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/personals.gif"></th>
				  <td><a href="personal.php"><?php echo $this->_tpl_vars['_profile']; ?>
</a></td>
				</tr>
				<tr class="MenuItem19"> 
				  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/password.gif"></th>
				  <td><a href="changepass.php"><?php echo $this->_tpl_vars['_change_password']; ?>
</a></td>
				</tr>
				<!--<tr> 
				  <th><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/code.gif"></th>
				  <td><a href="invite.php"><?php echo $this->_tpl_vars['_our_invitation_code']; ?>
</a></td>
				</tr>-->
			</table></td>
		  </tr>
		  <tr>
			<td><div class="backtop"><a href="javascript:;" id="GoTop"><?php echo $this->_tpl_vars['_go_top']; ?>
</a></div></td>
		  </tr>
	  </table>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['membertype_id'] == 4 && ! $this->_tpl_vars['hasCompany'] && $this->_tpl_vars['hasProfile'] && $this->_tpl_vars['employeecount']): ?>		
			<div class="create_shop">
				<a href="#createShop" onclick="$('#upgrade_shop').css('display','block')">Tạo SHOP<br /> tham gia hoạt động<br /> kinh doanh</a>
			</div>
		<?php endif; ?>
		
		<?php if (( $this->_tpl_vars['membertype_id'] == 5 && $this->_tpl_vars['hasCompany'] && $this->_tpl_vars['jobcount'] ) || ( $this->_tpl_vars['membertype_id'] == 6 && $this->_tpl_vars['hasProfile'] )): ?>
		
			<div class="create_shop">
				<a href="#createShop" onclick="$('#upgrade_company').css('display','block')">Tạo SHOP<br /> tham gia hoạt động<br /> kinh doanh</a>
			</div>
		
		<?php endif; ?>
	  </td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	</tr>
</table>