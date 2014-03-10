<?php /* Smarty version 2.6.27, created on 2014-02-25 09:34:23
         compiled from default/register.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'default/register.html', 338, false),array('modifier', 'urldecode', 'default/register.html', 340, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['_member_reg']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<?php echo '
<style type="text/css">
label.error {
  font-weight: bold;
  color: #b80000;
}
</style>


<script>
  
function getSharingUsername() {
		//code
		$.ajax({
			url: "index.php?do=product&action=getSharingUsername",
		}).done(function ( data ) {
			if( console && console.log ) {
				//$("#message_out").html(data);
				//alert(data);
				if(data != \'\')
				{
				  $(\'#dataMemberReferrerHidden\').val(data);
				  $(\'.noreferrer\').remove();
				}
				else
				{
				  $(\'#dataMemberReferrerHidden\').remove();
				  $(\'.noreferrer\').css("display", "block");
				}
			}
  });
}
  
  $(document).ready(function() {
  
    getSharingUsername();
    
  
  });
</script>

'; ?>









<div id="box_4home_tb" style="display: none">
	
	<div style="padding: 20px;width: 900px">
	 
	 
	 
	 	 	 <h2><strong>Kính chào Quý khách hàng!</strong></h2>
	 
<p>Công ty cổ phần Truyền Thông và Tiếp Thị BMN (BMN) xin giới thiệu Trang Thương Mại Điện Tử <a href="http://www.marketonline.vn">MarketOnline.vn</a> là Thị Trường Trực Tuyến để tương tác giữa <strong>Cung và Cầu</strong> cho mọi hoạt động trong cuộc sống và công việc.</p>
<p>Trang Thương Mại Điện Tử là nơi để Quý khách hàng đăng tải Thông tin thương mại / Đầu tư / Mua-Bán / Phân phối / Dịch vụ / Tìm đối tác / Tuyển dụng / Rao vặt. Cũng như là Thị trường để Quý khách hàng tự giới thiệu năng lực Cá nhân, năng lực Cửa hàng, năng lực Doanh nghiệp, năng lực Tổ chức ở mọi lĩnh vực trong và ngoài nước.</p>
<p>Mời Quý khách hàng <a href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
register.php">Đăng ký thành viên</a> và tạo SHOP miễn phí để tham gia Thị trường.</p>
<p>Ngoài việc BMN cung cấp cho Quý thành viên công cụ Thị Trường Trực Tuyến chúng
tôi còn hỗ trợ thành viên đăng tin miễn phí trên Trang Tin Điện tử <a target="_blank" rel="nofollow" href="http://www.kinhdoanhtiepthi.vn">KinhDoanhTiepThi.vn</a>
là phương tiện bổ trợ để Quý thành viên truyền thông mọi hoạt động liên quan đến nhu cầu
của Cá nhân / Cửa hàng / Công ty / Tổ chức trong việc quảng cáo sản phẩm,
quảng bá hình ảnh chính mình đến với cộng đồng. Bài viết giới thiệu liên
quan hoạt động kinh doanh do thành viên cung cấp. Chương trình áp dụng cho tất
cả các khách hàng đã đăng ký thành viên của <a href="http://marketonline.vn">MarketOnline.vn</a>.
Mọi bài viết và thông tin liên lạc xin gởi về <a href="mailto:contact@marketonline.vn">contact@marketonline.vn</a>.</p>
<p>Sứ mệnh đặt ra của Trang Thương Mại Điện tử <a href="http://marketonline.vn">MarketOnline.vn</a> và Trang Tin Điện tử <a target="_blank" rel="nofollow" href="http://www.kinhdoanhtiepthi.vn">KinhDoanhTiepThi.vn</a>
là Thị trường đáng tin cậy, đầy đủ và tiện lợi cho Quý khách hàng.</p>
<p>Trân trọng kính mời!</p>
<p></p>
<p><strong>Lưu ý: Trang <a href="http://marketonline.vn">MarketOnline.vn</a> đang trong quá trình hoàn thiện chức năng.</strong></p>

			
	</div>
	
   </div>
   
   
   
   <div id="box_4home_ql" style="display: none">
	
	<div style="padding: 20px;width: 900px">
	 
	 
	 
	 <h2><strong>Quyền lợi thành viên</strong></h2>



<ol>
<li>Truy cập Trang điện tử <a href="http://www.marketonline.vn/">MarketOnline.vn</a> (Marketonline.vn) bằng tài khoản quản trị do <strong>Quý khách tự tạo</strong>. Sử dụng các sản phẩm, dịch vụ đã đăng ký với <a href="http://www.marketonline.vn/">MarketOnline.vn</a> để phục vụ cho các hoạt động Cán nhân/ Công ty/ Cửa hàng/ Tổ chức quảng bá, giới thiệu, kinh doanh của mình.</li>
<li>Tiếp nhận các thông tin về thị trường, doanh nghiệp, sản phẩm và dịch vụ của các đối tác, khách hàng, cũng như các thông báo cần thiết của <a href="http://www.marketonline.vn/">MarketOnline.vn</a> tạo liên lạc thuận lợi trong kinh doanh.</li>
<li>Thực hiện các giao dịch thương mại trực tiếp hoặc gián tiếp qua Trang điện tử <a href="http://www.marketonline.vn/">MarketOnline.vn</a>.</li>
<li>Được hưởng các chính sách ưu đãi theo từng thời điểm thông báo của BMN.</li>
<li>Đề xuất, kiến nghị các vấn đề liên quan đến hoạt động của Trang điện tử <a href="http://www.marketonline.vn/">MarketOnline.vn</a> theo địa chỉ E-Mail: <a href="mailto:info@marketonline">info@marketonline.vn</a></li>
</ol>
<h2><strong>Nghĩa vụ của thành viên</strong><strong></strong></h2>
<ol>
<li>Chịu sự kiểm tra, giám sát của <a href="http://www.marketonline.vn/">MarketOnline.vn</a> về việc tổ chức thực hiện giao dịch thương mại, quảng bá thông tin qua hệ thống <a href="http://www.marketonline.vn/">MarketOnline.vn</a>.</li>
<li>Thông báo ngay cho <a href="http://www.marketonline.vn/">MarketOnline.vn</a> khi bị thất lạc hay bị lộ mật khẩu tài khoản quản trị.</li>
<li>Khi sử dụng thông tin có nguồn từ <a href="http://www.marketonline.vn/">MarketOnline.vn</a>, thành viên phải trích dẫn nguồn là <a href="http://www.marketonline.vn/">MarketOnline.vn</a> đối với các thông tin do <a href="http://www.marketonline.vn/">MarketOnline.vn</a><strong> </strong>công bố.</li>
<li>Cung cấp thông tin đầy đủ và chính xác tại mục Thông tin thành viên cũng như cam kết chịu trách nhiệm hoàn toàn mọi thực hiện giao dịch giữa các Thành viên với Đối tác của thành viên.</li>
<li>Tuân thủ các quy định của pháp luật hiện hành về giao dịch thương mại điện tử, và các hướng dẫn, quy định của từng dịch vụ riêng của <a href="http://www.marketonline.vn/">MarketOnline.vn</a> tại <a class="more" href="#box_4home_dk">Điều khoản sử dụng</a>, <a class="more" href="#box_4home_bm">Chính sách bảo mật</a> và các <a class="more" href="#box_4home_tb">Thông báo</a> khác. </li>
</ol>
			
	</div>
	
   </div>
   
   
   
   <div id="box_4home_dk" style="display: none">
	
	<div style="padding: 20px;width: 900px">
	 
	 
	 
	 <h2><strong>Điều khoản sử dụng</strong></h2>

	 
	 <p><strong>Công ty Cổ phần Truyền Thông và Tiếp Thị BMN (gọi tắt là BMN)</strong> duy trì trang <a href="http://www.marketonline.vn">www.marketonline.vn</a> (sau đây gọi là <a href="#">Trang điện tử</a>) như một dịch vụ cung cấp cho khách hàng, bao gồm nhưng không giới hạn là các cá nhân, tổ chức sử dụng hoặc hợp tác kinh doanh với BMN (gọi tắt là Người dùng). Khi sử dụng trang điện tử này và bất kỳ sản phẩm/dịch vụ nào tại đây (gọi tắt là Dịch vụ) có nghĩa là Người dùng đã chấp nhận và đồng ý tuân theo bản Điều khoản sử dụng này. Ngoài ra khi sử dụng các Dịch vụ cụ thể của Trang điện tử, Người dùng phải tuân theo các điều khoản và điều kiện riêng áp dụng cho Dịch vụ đó theo từng thời điểm.BMN có thể thay đổi, điều chỉnh Điều khoản sử dụng này theo quyết định của mình mà không cần thông báo cho Người dùng. Người dùng có thể xem những thông tin mới cập nhật vào bất cứ lúc nào tại Trang điện tử. Nếu Người dùng tiếp tục sử dụng Dịch vụ có nghĩa là Người dùng chấp nhận và đồng ý tuân theo Điều khoản sử dụng mới được cập nhật. Bất cứ sự vi phạm nào của Người dùng đối với các điều khoản và điều kiện này đều có thể dẫn đến việc đình chỉ hoặc kết thúc tài khoản, Dịch vụ hoặc những hoạt động được phép khác theo Thỏa thuận sử dụng Dịch vụ của BMN. Hơn thế nữa, BMN có quyền đưa ra các phương án giải quyết dựa trên các chính sách sẵn có của Trang điện tử và luật pháp hiện hành.</p>
<h2>1. Sử dụng hợp pháp</h2>
<p>Bạn phải chấp nhận rằng Bạn sẽ không được phép có bất cứ hành vi nào có nội dung vi phạm pháp luật hiện hành và thuần phong mỹ tục Việt Nam trong việc đề nghị hoặc chào hàng, bán hàng, trưng bày, giao hàng, quảng cáo và khuyến mãi trực tiếp hoặc gián tiếp bất kỳ sản phẩm, dịch vụ, dữ liệu, thông tin, hình ảnh,… trên trang điện tử.</p>
<h2>2. Sự tuân thủ</h2>
<p>BMN có quyền hợp pháp yêu cầu Người dùng tuân thủ những Điều khoản sử dụng, Chính sách bảo mật hoặc Thỏa thuận sử dụng Dịch vụ khác có liên quan. Nếu xác định được Bạn vi phạm những điều khoản và điều kiện này thì BMN có thể đơn phương chấm dứt hoặc đình chỉ ngay lập tức việc:</p>
<p>a)    Sử dụng Dịch vụ;</p>
<p>b)    Thỏa thuận sử dụng Dịch vụ;</p>
<p>c)    Truy cập tài khoản Người dùng tại Trang điện tử này.</p>
<p>Trang điện tử có quyền thông báo các hoạt động bị nghi ngờ vi phạm qui định với cơ quan chức trách hoặc bên thứ ba. BMN có thể hợp tác với với cơ quan pháp luật để hỗ trợ điều tra và truy tố các hoạt động vi phạm pháp luật theo quy định hiện hành.</p>
<p>Mọi thắc mắc chưa rõ về điều khoản này xin vui lòng liên hệ <a href="mailto:support@marketonline.vn">support@marketonline.vn</a>.</p>
<h2>3. Liên kết website của bên thứ ba</h2>
<p>Trang điện tử này có thể kết nối đến những website của các bên thứ ba. Marketonline.vn cung cấp những đường dẫn để thực hiện các kết nối nhằm đem đến sự thuận tiện cho Bạn. Những website của nhà cung cấp hoặc quảng cáo được sở hữu bởi những tổ chức có hoạt động độc lập. BMN không chịu trách nhiệm, xác nhận hay có nghĩa vụ đối với bất kỳ nội dung, quảng cáo, các sản phẩm có sẵn từ các website đó. Hơn nữa, Bạn xác nhận và đồng ý rằng BMN sẽ không chịu trách nhiệm hoặc có nghĩa vụ, trực tiếp hoặc gián tiếp, đối với bất kỳ thiệt hại hoặc tổn thất nào liên quan tới việc sử dụng hay căn cứ vào nội dung, sản phẩm hoặc dịch vụ hiện có trên bất kỳ website đó. Bạn nên tìm hiểu kỹ về các nhà cung cấp trước khi thực hiện bất kỳ giao dịch nào với bên thứ ba.</p>
<h2>4. Quyền sở hữu trí tuệ</h2>
<p>Tất cả hình ảnh, biểu tượng, và tất cả các nội dung khác (gọi tắt là Nội dung) tại Trang điện tử thuộc sở hữu của <strong>BMN </strong>và các tổ chức/công ty khác liên kết Marketonline.vn.</p>
<ul>
<li>Bạn có quyền:</li>
</ul>
<p>Xem, tải về và in Nội dung khi chỉ sử dụng cho mục đích cá nhân, không phải cho mục đích thương mại.</p>
<ul>
<li>Bạn không có quyền:</li>
</ul>
<p>-        Sao chép, xuất bản hoặc sử dụng lại Nội dung.</p>
<p>-        Chỉnh sửa Nội dung.</p>
<p>-        Di chuyển bất kỳ bản quyền, thương hiệu và các Nội dung độc quyền khác trên Trang điện tử.</p>
<p>Mọi thắc mắc Bạn có thể liên hệ <a href="mailto:support@marketonline.vn">support@marketonline.vn</a> để được hỗ trợ.</p>
<p>Nghiêm cấm mọi việc sao chép, điều chỉnh hoặc sử dụng lại Nội dung Trang điện tử mà không có sự cho phép trước bằng văn bản của BMN. Nếu được chấp thuận, Bạn phải bảo đảm là việc sử dụng Nội dung “Trang điện tử của Bạn” sẽ phù hợp với Quy định này và việc sử dụng này không vi phạm quyền, lợi ích của các cá nhân/tổ chức khác hoặc vi phạm hợp đồng, nghĩa vụ luật pháp của cá nhân/tổ chức khác.</p>
<h2>5. Tuyên bố từ chối bảo đảm</h2>
<p>Trang điện tử này và các Dịch vụ của BMN được cung cấp trên cơ sở trong điều kiện "có thể thực hiện được". BMN không bảo đảm rằng: Trang điện tử hoặc Dịch vụ sẽ luôn sẵn sàng có thể sử dụng, không bị gián đoạn, đúng thời gian, chính xác, an toàn, không có lỗi hoặc virus cũng như chắc chắn về kết quả đạt được sau khi sử dụng Trang điện tử, Dịch vụ.</p>
<p>Ngoài việc chủ động tính liên tục, Bạn cần lưu ý rằng Trang điện tử này và Dịch vụ là dựa trên những dịch vụ đường truyền Internet và có thể bị mất điện hoặc gián đoạn, bị bên ngoài tấn công và xảy ra chậm trễ. Trong những trường hợp như vậy, đối với những điều khoản này, BMN sẽ nỗ lực khắc phục sự gián đoạn và đưa ra sự điều chỉnh, sửa chữa và thay thế trong khả năng có thể để phục hồi hệ thống.</p>
<h2>6. Giới hạn trách nhiệm</h2>
<p>BMN sẽ không chịu bất kỳ trách nhiệm hoặc trách nhiệm liên đới đối với những hậu quả của việc truy cập trái phép đến máy chủ, website liên kết, dữ liệu của Bạn hoặc dữ liệu khách hàng của Bạn trên Marketonline.vn như: hacking hay thiết bị của bên thứ ba và các nguyên nhân khác nằm ngoài sự kiểm soát của BMN. BMN cũng không chịu trách nhiệm nếu Dịch vụ hoặc Website bị xâm nhập bởi trojan, virus, các chương trình phần mềm khác cố ý phá hoại từ bên ngoài.</p>
<p>Như một điều kiện khi sử dụng Trang điện tử và Dịch vụ này, Bạn đồng ý rằng BMN, các tổ chức thành viên, đại lý, nhà cung cấp của BMN sẽ không có trách nhiệm với Bạn hoặc bên thứ ba cho việc thiệt hại lợi nhuận, cơ hội kinh doanh; mọi thiệt hại phát sinh trực tiếp hay gián tiếp khi kết nối với Trang điện tử này hay sử dụng các Dịch vụ của BMN.</p>
<p>BMN không bảo đảm cũng như chịu trách nhiệm về kết quả của các giao dịch hoặc sử dụng Trang điện tử. Mọi việc liên quan giữa BMN và Bạn sẽ được giải quyết theo Thỏa thuận sử dụng Dịch vụ tương ứng.</p>
<h2>7. Bồi thường</h2>
<p>Bạn có nghĩa vụ bồi thường cho BMN hoặc bất cứ bên thứ ba nào cho toàn bộ/bất cứ thiệt hại thực tế nào mà phần lỗi được xác định là do Bạn khi xảy ra một trong các tình huống dưới đây:</p>
<ul>
<li>Vi phạm các Điều khoản này hoặc các Thỏa thuận sử dụng Dịch vụ khác của BMN.</li>
<li>Vi phạm các quy định và pháp luật hiện hành gây ảnh hưởng/thiệt hại đến BMN và/hoặc bên thứ ba.</li>
<li>Sự vô ý hoặc hành vi cố ý làm sai của Bạn, hoặc nhân viên và đại lý của Bạn gây ảnh hưởng/thiệt hại đến BMN và/hoặc bên thứ ba.</li>
<li>Vi phạm bất cứ quy định/thoả thuận nào tại Chính sách bảo mật của BMN.</li>
<li>Xâm phạm quyền sở hữu trí tuệ hoặc quyền lợi hợp pháp của bất kỳ cá nhân/tổ chức nào gây ảnh hưởng/thiệt hại đến BMN và/hoặc bên thứ ba.</li>
<li>Tranh chấp trong việc quảng cáo, khuyến mãi, phân phối hàng hóa của Bạn gây ảnh hưởng/thiệt hại đến BMN và/hoặc bên thứ ba.</li>
</ul>
<h2>8. Truy cập vào khu vực có mật khẩu</h2>
<p>Chỉ những người được BMN ủy quyền hợp pháp mới được thực hiện việc truy cập và sử dụng những khu vực được bảo vệ bằng mật khẩu của Trang điện tử. Những cá nhân/tổ chức cố ý xâm nhập trái phép vào vùng này có thể sẽ bị khởi kiện và tuỳ từng mức độ, truy tố theo pháp luật hiện hành.</p>
<h2>9. Những Dịch vụ cung cấp trên Trang điện tử</h2>
<p>Khi Bạn đăng ký sử dụng một Dịch vụ trên Trang điện tử thì có nghĩa là Bạn đã chấp nhận những Quy định và điều kiện tương ứng cho Dịch vụ đó theo Thỏa thuận sử dụng Dịch vụ liên quan. Ngoại trừ những quy định được xác định trong Thỏa thuận sử dụng Dịch vụ, BMN không bảo đảm những mô tả và Nội dung của Trang điện tử này là chính xác, hiện hành, đáng tin cậy và không có lỗi tại mọi thời điểm.</p>
<p>Trang điện tử <a href="http://www.marketonline.vn">www.marketonline.vn</a> là nơi cung cấp cho Bạn giải pháp, công cụ để giới thiệu Doanh nghiệp/ Cửa hàng/ Sản phẩm (theo qui định pháp luật hiện hành của nước Việt Nam) và mua bán trực tuyến tất các loại sản phẩm dân dụng/ công nghiệp/ điện tử/ hàng tiêu dùng… (theo qui định pháp luật hiện hành của nước Việt Nam) đang có mặt trên thị trường của nhiều nhà cung cấp khác nhau. Khi Bạn thực hiện theo đúng quy trình mua hàng/ tạo trang điện tử thành viên theo hướng dẫn của chúng tôi trên <a href="http://www.marketonline.vn">www.marketonline.vn</a> có nghĩa là <strong>Bạn đã chấp nhận giao kết một hợp đồng mua bán hàng hóa trực tuyến với BMN</strong> với tất các quy định được nêu trong điều khoản này.</p>
<h2>10. Chấm dứt sử dụng</h2>
<p>BMN có quyền chấm dứt việc truy cập của Bạn vào Trang điện tử và việc sử dụng Dịch vụ bất kỳ khi nào tuỳ thuộc vào sự xem xét, quyết định duy nhất của BMN được căn cứ trên nhu cầu giữa BMN và Bạn/ tình hình kinh doanh cụ thể của BMN. Sự chấm dứt này sẽ được thông báo trước cho Bạn bằng văn bản hoặc email. BMN sẽ không chịu bất cứ trách nhiệm nào với Bạn và bên thứ ba về hậu quả phát sinh từ hoặc liên quan tới việc chấm dứt này.</p>
<h2>11. Chính sách bảo mật</h2>
<p>Tất cả những thông tin nhập vào Trang điện tử này được áp dụng theo <a class="more" href="#box_4home_bm">Chính sách bảo mật của BMN</a>.</p>
<h2>12. Điều khoản chung</h2>
<p>Trường hợp có bất kỳ điều khoản nào của Điều khoản sử dụng này (một phần hay toàn bộ) hết hiệu lực hoặc không thể thi hành vì bất cứ lý do gì sẽ chỉ ảnh hưởng đến điều khoản đã xác định hết hiệu lực đó và không ảnh hưởng đến hiệu lực của các điều khoản còn lại. Nếu có sự khác biệt giữa Điều khoản sử dụng này và các Thỏa thuận sử dụng Dịch vụ thì quy định nào mới nhất sẽ có giá trị.</p>
			
	</div>
	
   </div>
   
   
   
   <div id="box_4home_bm" style="display: none">
	
	<div style="padding: 20px;width: 900px">
	 
	 <h2><strong>Bảo mật</strong></h2>
	 
<h2>Kính chào Quý Khách Hàng !</h2>
<p>Công ty Cổ phần Truyền thông và Tiếp thị BMN (BMN) là đơn vị hoạt động trong lĩnh vực truyền thông tin tức và tiếp thị sản phẩm. Marketonline.vn là sản phẩm được BMN xây dựng và phát triển theo định hướng Thương Mại Điện Tử.</p>
<p>BMN luôn hiểu tất cả khách hàng đều rất quan tâm đến những thông tin cá nhân sẽ cung cấp khi tham gia sử dụng dịch vụ Marketonline.vn được BMN bảo mật và sử dụng ra sao? Chính vì thế BMN nỗ lực tối đa để bảo mật bằng Chính sách bảo mật thông tin nghiêm ngặt. BMN đảm bảo sẽ sử dụng thông tin khách hàng một cách hợp lý, có cân nhắc để không ngừng cải thiện chất lượng phục vụ và đem lại cho khách hàng ngày càng nhiều tính năng tiện lợi và hữu ích trên <a href="http://www.marketonline.vn">www.marketonline.vn</a> (trang điện tử).</p>
<p>BMN rất trân trọng sự tin tưởng Quý khách !.</p>
<p><strong>Chính sách bảo mật thông tin</strong> được BMN định ra nhằm diễn giải các quy trình lưu trữ, xử lý và bảo mật các thông tin cá nhân/ thông tin khác mà người sử dụng cung cấp khi sử dụng dịch vụ tại trang điện tử. Vui lòng luôn kiểm tra/ tham khảo Chính sách bảo mật vì có thể sẽ được sửa đổi, bổ sung, điều chỉnh tùy từng thời điểm, tùy thuộc vào sự phát triển của dịch vụ và sự thay đổi của hệ thống pháp luật liên quan. Việc thay đổi bổ sung, điều chỉnh sẽ có hiệu lực ngay khi được đăng tải trên trang điện tử. Trường hợp nếu có sự thay đổi quan trọng BMN sẽ có thông báo trước 30 ngày trên trang điện tử. Khi đăng ký sử dụng bất kỳ dịch vụ trên trang điện tử, khách hàng/ người sử dụng được xem là mặc nhiên chấp thuận Chính sách bảo mật.</p>
<h2>I. Phạm vi chính sách bảo mật</h2>
<p>Chính sách này được áp dụng cho các cá nhân, tổ chức, khách hàng, đối tác, nhà cung cấp, thông tin chưa được phép tiết lộ, cũng như các thông tin phát sinh khác trong quá trình giao dịch trên trang điện tử… (thông tin) được BMN thực hiện nghiêm ngặt về việc thu thập, lưu giữ, chia sẻ và bảo mật thông tin nhằm đảm bảo cho người dùng trang điện tử.</p>
<h3>1. Mục đích thu thập, sử dụng thông tin người dùng</h3>
<p>-            <strong>Việc thu thập thông tin:</strong></p>
<ul>
<li>Khi Bạn đăng ký sử dụng trang điện tử, Bạn sẽ được yêu cầu cung cấp các thông tin cá nhân của Bạn bao gồm họ tên, địa chỉ, số điện thoại, địa chỉ email, thông tin khác liên quan sử dụng. Tất cả sẽ được thực hiện bằng cách ghi nhận, lưu giữ lại thông tin tại trung tâm dữ liệu của trang điện tử.</li>
<li>Trang điện tử cũng có thể nhận thông tin của Bạn từ những đối tác kinh doanh có liên quan.</li>
</ul>
<p>-            <strong>Sử dụng thông tin người dùng</strong></p>
<ul>
<li>Gửi thư điện tử thông báo định kỳ, giới thiệu sản phẩm/ dịch vụ mới và những chương trình khuyến mãi của Marketonline.vn đến người dùng.</li>
<li>Luôn cung cấp mới hoặc nâng cao tiện ích cho người dùng.</li>
<li>Không ngừng gia tăng chất lượng dịch vụ hỗ trợ người dùng.</li>
<li>Những thông tin được Bạn cung cấp tại đây sẽ được Marketonline.vn sử dụng chỉ cho mục đích thực hiện/triển khai từng loại sản phẩm, dịch vụ, xử lý giao dịch... theo yêu cầu của Bạn.</li>
<li>Bạn cũng có thể được thông báo về dịch vụ của các nhà cung cấp khác.</li>
</ul>
<h3>2. Chia sẻ thông tin</h3>
<p>BMN biết rằng thông tin khách hàng là một phần rất quan trọng trong việc kinh doanh vì thế chúng tôi sẽ không được bán, trao đổi cho một bên thứ ba nào khác.</p>
<p>Trừ những trường hợp cụ thể sau đây thông tin cá nhân của Bạn có thể được chia sẻ cho bên thứ ba:</p>
<p>-            Khi có sự đồng ý chia sẻ thông tin đó của Bạn.</p>
<p>-            Khi những thông tin đó được chia sẻ để cung cấp dịch vụ và/hoặc sản phẩm theo yêu cầu của Bạn.</p>
<p>-            Khi có sự yêu cầu của cơ quan pháp luật có thẩm quyền là cần thiết và phù hợp nhằm tuân theo các yêu cầu pháp l‎ý.</p>
<p>-            Khi những thông tin đó cần cung cấp để thực hiện việc bảo vệ quyền lợi, tài sản hoặc an toàn của trang điện tử, của khách hàng, cá nhân/tổ chức khác có liên quan trong việc trao đổi thông tin để phòng chống gian lận và giảm rủi ro.</p>
<p>-            Khi những thông tin đó cần cung cấp để cần đối chiếu hoặc làm rõ thông tin với bên thứ ba để bảo đảm sự chính xác thông tin.</p>
<h2>II. An toàn thông tin</h2>
<p>Để đảm bảo bảo mật thông tin, thì an toàn thông tin là điều tiên quyết. Việc bảo mật thông tin của Bạn được thực hiện bằng phương pháp lưu trữ tập trung, sao lưu và mã hóa hóa dữ liệu. Nhân viên quản trị thông tin và các nhân viên liên quan chỉ được truy cập có giới hạn và phải tuân thủ nghiêm ngặt các qui định bảo mật. Biện pháp “tường lửa” và những công nghệ bảo mật thông tin khác sẽ được sử dụng để ngăn chặn các sự xâm nhập trái phép.</p>
<p>Bên cạnh đó Bạn cũng góp phần quan trọng trong việc bảo vệ thông tin cá nhân. Bạn sẽ hoàn toàn chịu trách nhiệm trong việc lưu giữ an toàn Tên sử dụng và Mật khẩu được cung cấp để truy cập trang điện tử. Bạn phải luôn cẩn trọng, ý thức đầy đủ và có trách nhiệm trong việc sử dụng và tiết lộ những thông tin này. Bạn cũng phải mọi chịu trách nhiệm khi có bất kỳ hậu quả gì xảy ra do việc tiết lộ/để lộ thông tin này.</p>
<h2>III. Thay đổi thông tin người dùng</h2>
<p>Nếu thông tin cá nhân của Bạn có sự thay đổi hoặc nếu Bạn không muốn sử dụng dịch vụ của Marketonline.vn, Bạn có thể sửa, cập nhật, xóa thông tin bằng cách truy cập vào Website hoặc liên hệ với Bộ phận Chăm sóc Khách hàng Marketonline.vn.</p>
			
	</div>
	
   </div>
   


<?php echo '
<script>
  $(document).ready(function() {
    $(\'.submit_res\').click(function() {
	    
	    
	    
	    setTimeout(function(){
	      if ($(\'label[for=typename]\').css(\'display\') != \'none\') {
		$(\'.typename_out\').append($(\'label[for=typename]\').clone())
		$(\'label[for=typename]\').eq(0).remove();
	      }
	      $("html, body").animate({ scrollTop:250 }, 100);
	      
	      
	      //check submit button
	      if(!$(\'#regfrm label.error\').filter(function() {
		return $(this).css(\'display\') !== \'none\';
	      }).length)
	      {
		$(\'.submit_res\').val("Đang xử lý thông tin...");
		$(\'.submit_res\').addClass("reg-loading");
		$(\'.submit_res\').after(\'<span class="lloading"></span>\');
	      }	     
	      
	    }, 100);
    });
    
    $(\'#dataMemberEmail\').keyup(function() {
      if ($(this).val() == "") {
	if (!$(\'.email_confirm\').hasClass("hide_res")) {
	  $(\'.email_confirm\').addClass("hide_res");
	}
      }
      else
      {
	$(\'.email_confirm\').removeClass("hide_res");
      }
    });
    
    $(\'#memberpass\').keyup(function() {
      if ($(this).val() == "") {
	if (!$(\'.password_confirm\').hasClass("hide_res")) {
	  $(\'.password_confirm\').addClass("hide_res");
	}
      }
      else
      {
	$(\'.password_confirm\').removeClass("hide_res");
      }
    });
    
    
    
    
  });
</script>
'; ?>


<div id="body-wrapper" >
<div id="body-wrapper-padding">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row">
    <div class="fifteen columns" id="page-title" style="margin-top: -10px">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">
            
                        <p><?php echo $this->_tpl_vars['_member']; ?>
</p>
        </div>
        <h1 class="page-title">
                        <?php echo $this->_tpl_vars['_register']; ?>
                </h1>


    </div>
    <div class="fifteen columns"><div class="line" style="margin-top: -17px"></div></div>
</div>


<div class="row">
  
<ul class="main_user_select">
  <li class="active" rel="shop"><a href="javascript:void(0)">Tạo Gian hàng</a></li>
  <li rel="employee"><a href="javascript:void(0)">Xin Việc</a></li>
  <li rel="employer"><a href="javascript:void(0)">Tuyển dụng</a></li>
  <li rel="learner"><a href="javascript:void(0)">Học tập</a></li>
</ul>

    <div class="four columns loginbox resbox">

        <section id="woocommerce_login-2" class="widget-1 widget-first widget">
	  <div class="widget-inner">
	    
	    
	    
	    
	    <form name="regfrm" id="regfrm" method="post" action="" autocomplete="off">
            <?php echo smarty_function_formhash(array(), $this);?>

            <input type="hidden" name="register" value="<?php echo $this->_tpl_vars['_G']['type']; ?>
" />
            <!--<input type="hidden" name="typename" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['_G']['typename'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)); ?>
" />-->
            <input type="hidden" name="forward" value="<?php echo $this->_tpl_vars['_G']['forward']; ?>
" />
	    <p class="typename_out you_are_form" style="margin-bottom: 15px;">
			<label class="registerlabel" for="dataMemberUsername">
			<?php echo $this->_tpl_vars['_member_type_choose']; ?>
:<span>*</span>
			</label>
			
			<input type="radio" name="typename" value="Personal" /> Cá nhân |
			<input type="radio" name="typename" value="Shop" /> Cửa hàng |
			<input type="radio" name="typename" value="Company" /> Doanh nghiệp
			
			<input class="hidden_check" type="radio" name="typename" value="Employee" />
			<input class="hidden_check" type="radio" name="typename" value="Employer" />
			<input class="hidden_check" type="radio" name="typename" value="Learner" />
			
	    </p>
	    <p>
			<label class="registerlabel" for="dataMemberUsername">
			<?php echo $this->_tpl_vars['_member_login_name']; ?>
<span>*</span>
			</label>
			
			<input placeholder="Tên đăng nhập (không phải tên Shop)" type="text" name="data[member][username]" id="dataMemberUsername" value="" tabindex="1"/>
	    
			<label class="lenglabel" id="membernameDiv">
			
			</label>
	    </p>
	    <p>
			<label class="registerlabel" for="dataMemberEmail">
			<?php echo $this->_tpl_vars['_email']; ?>
<span>*</span>
			</label>

			<input placeholder="E-mail để khách hàng liên hệ với bạn" type="text" name="data[member][email]" id="dataMemberEmail" value="" tabindex="2"/>

			<label class="lenglabel" id="memberemailDiv">

			</label>
	</p>
	<p class="email_confirm hide_res">
			<label class="registerlabel" for="dataMemberEmail">
			Nhập lại email<span>*</span>
			</label>

			<input placeholder="" type="text" name="confirm_email" id="dataMemberConfirmEmail" value="" tabindex="2"/>

			<label class="lenglabel" id="memberemailDiv">

			</label>
	</p>
	    <p>
			<label class="registerlabel" for="memberpass">
			<?php echo $this->_tpl_vars['_password']; ?>
<span>*</span>
			</label>

			<input type="password" name="data[member][userpass]" id="memberpass" value="" tabindex="3">

			<label class="lenglabel">
			
			</label>
		</p>
	    <p class="password_confirm hide_res">
			<label class="registerlabel" for="re_memberpass">
			<?php echo $this->_tpl_vars['_re_enter_password']; ?>
<span>*</span>
			</label>

			<input name="re_memberpass" type="password" id="re_memberpass" value="" tabindex="4">

			<label class="lenglabel">
			
			</label>
            </p>
	    
	    
	    
	      <input type="hidden" name="data[member][referrer_id]" id="dataMemberReferrerHidden" value="" tabindex="5"/>
	       
	    
	      <p class="noreferrer" style="display: none">
			  <label class="registerlabel" for="dataMemberUsername">
			  <?php echo $this->_tpl_vars['_referrer_name']; ?>

			  </label>
			  
			  <input placeholder="<?php echo $this->_tpl_vars['_referrer_intro']; ?>
" type="text" name="data[member][referrer_id]" id="dataMemberReferrer" value="" tabindex="5"/>
			  <span class="referer_info">(<?php echo $this->_tpl_vars['_referer_info']; ?>
)</span>
	      
			  <label class="lenglabel" id="memberReferrer">
  
			  </label>
	      </p>
	    
	    
	    
	    
            <?php if ($this->_tpl_vars['ifcapt']): ?>
	    <div id="res_captcha">
		<div class="left">
			
			<span class="registercheck"><img class="registerpic" width="123" height="50" id="imgcaptcha" src="captcha.php?sid=<?php echo $this->_tpl_vars['sid']; ?>
" alt="<?php echo $this->_tpl_vars['_unclear_see_numbers']; ?>
" title="<?php echo $this->_tpl_vars['_unclear_see_numbers']; ?>
" />
			
			<object type="application/x-shockwave-flash" data="images/play.swf?audio=captcha.php&amp;do=play&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" height="19" width="19">
			<param name="movie" value="images/play.swf?audio=captcha.php&amp;do=play&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" />
			</object>
			<a href="javascript:;"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
images/gongqiu03.jpg" class="registerpic2" id="exchange_imgcapt" /></a>
			</span>
		</div>
		<div class="right">
			<label class="registerlabel" for="login_auth" style="margin-top: 5px;margin-bottom: 8px;">
			  <?php echo $this->_tpl_vars['_code']; ?>
<span>*</span>
			</label>
			<input class="" name="data[capt_register]" id="login_auth" type="text" value="" size="4" style="width:117px; margin-bottom: 5px;" tabindex="5">&nbsp;<font class="gray" style="float: left"><?php echo $this->_tpl_vars['_input_code']; ?>
</font>
		</div>
           </div>
            <?php endif; ?>
	    <br style="clear: both" />
			<p class="registerp2">
			  <input style="float: left; margin: 5px;" name="licence_check" id="LicenseCheck" type="checkbox" onclick="if(this.checked)$('#Submit').removeAttr('disabled'); else $('#Submit').attr('disabled','true');" checked="checked" />
			  <label style="float: left;margin-top: 3px;" for="LicenseCheck"><?php echo $this->_tpl_vars['_see_agree']; ?>
</label>
			</p>
			<div class="agree" id="agreements" style="display: none;"><?php echo $this->_tpl_vars['agreement']; ?>
</div>
          
			<p class="registerbutton">
			  <input type="submit" name="Submit" id="wp-submit" value="<?php echo $this->_tpl_vars['_register']; ?>
" class="submit_w67 submit_res" />
			</p>
			</form>
	    
	    
			<ul class="pagenav"></ul></div></section>
			
    </div>
    
    <div class="four columns register_right">
	<div class="wpb_content_element span4 column_container">
		<div class="wpb_wrapper" style="margin-top:-25px">
			 <div class="row-fluid">
	<div class="wpb_content_element span12 text-item wpb_text_column">
		<div class="wpb_wrapper">
			
<h2><a href="#box_4home_tb">Giới thiệu</a></h2>

Kính chào Quý khách hàng!<br />
Công ty cổ phần Truyền Thông và Tiếp Thị BMN (BMN) xin giới thiệu Trang điện tử (Marketonline.vn) hoạt động theo mô hình kinh doanh B2B...
<br /><a class="more" href="#box_4home_tb">Xem thêm</a>

<img height="32" width="32" src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/check1.png" alt="" title="settings" class="icon_post">


		</div> 
	</div> </div> <div class="row-fluid">
	<div class="wpb_content_element span12 text-item no-740 wpb_text_column">
		<div class="wpb_wrapper">
			

<h2><a href="#box_4home_ql">Quyền lợi thành viên</a></h2>
Truy cập Trang điện tử www.marketonline.vn (Marketonline.vn) bằng tài khoản quản trị do Quý khách tự tạo. Sử dụng các sản phẩm, dịch vụ đã đăng ký với Marketonline.vn để phục vụ cho ..
<br /><a class="more" href="#box_4home_ql">Xem thêm</a>

<img height="32" width="32" src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/check1.png" alt="" title="check" class="icon_post">


		</div> 
	</div> </div> 
		</div> 
	</div>
	
	
	<div class="wpb_content_element span4 column_container">
		<div class="wpb_wrapper">
			 <div class="row-fluid">
	<div class="wpb_content_element span12 text-item wpb_text_column">
		<div class="wpb_wrapper">
			

<h2><a href="#box_4home_dk">Điều khoản sử dụng</a></h2>
Công ty Cổ phần Truyền Thông và Tiếp Thị BMN (gọi tắt là BMN) duy trì trang www.marketonline.vn (sau đây gọi là Trang điện tử) như một dịch vụ cung cấp cho khách hàng, bao gồm...
<br /><a class="more" href="#box_4home_dk">Xem thêm</a>


<img height="32" width="32" src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/check1.png" alt="" title="settings" class="icon_post">


		</div> 
	</div> </div> <div class="row-fluid">
	<div class="wpb_content_element span12 text-item no-740 wpb_text_column">
		<div class="wpb_wrapper">
			

<h2><a href="#box_4home_bm">Bảo mật</a></h2>
CCông ty Cổ phần Truyền thông và Tiếp thị BMN (BMN) là đơn vị hoạt động trong lĩnh vực truyền thông tin tức và tiếp thị sản phẩm. Marketonline.vn là sản phẩm được BMN xây dựng...
<br /><a class="more" href="#box_4home_bm">Xem thêm</a>

<img height="32" width="32" src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/check1.png" alt="" title="check" class="icon_post">


		</div> 
	</div> </div> 
		</div> 
	</div>
	
	
    </div>
    
</div>



</div>
  </div>

<!--<script language="javascript" src="scripts/jquery/jquery.validatez.js"></script>-->
<script language="javascript" src="scripts/validate.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<?php echo '
<script>
$(document).ready(function() {

$(".row-fluid h2 a").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$(".row-fluid a.more").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$("#SeeAgreement").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});

});
</script>
'; ?>





<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


