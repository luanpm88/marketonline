function OpenInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}

$(document).ready(function() {
    
    $(".ad_banner_item").click(function() {
      var pos = $(this).attr("pos")
      OpenInNewTab("/app/ads/new?pos="+pos)
    })
    $(".ad_toggle").click(function(e) {
      e.preventDefault()
      if ($(".ad_banner_item_hover").css("display") == "block") {
        $(".ad_banner_item, .ad_banner_item_hover").fadeOut()
        $(this).removeClass("ad_fixed_in")
        $(this).html("Đăng Quảng Cáo")
      } else {
        $(".ad_banner_item, .ad_banner_item_hover").fadeIn()
        $(this).addClass("ad_fixed_in")
        $(this).html("X")
        
        // update position info        
        $(".ad_banner_item").each(function() {
          var pos = $(this).attr("pos")
          var box = $(this)
          if (typeof(pos) != "undefined") {
            $.ajax({
              url: "/app/ad_positions/get_remaining_time?pos="+pos,
            }).done(function ( data ) {
              box.find(".ad_info_hover").remove()
              //alert(data.time)
              if(data.time != "") {
                box.append('<div class=\"ad_info_hover\"><div class="subtitle right time_remaining">Có thể quảng cáo từ ngày: <strong><br />'+data.time+'</strong></div><span class=\"size\">'+data.pos.width+' x '+data.pos.height+'</span><span class=\"ticket\">Đăng ký trước</span></div>')
              } else {
                box.append('<div class=\"ad_info_hover\"><div class="subtitle time_remaining"><strong>Có thể quảng cáo ngay</strong></div><span class=\"size\">'+data.pos.width+' x '+data.pos.height+'</span><span class=\"ticket\">Đăng ký ngay</span></div>')
              }
            });
          }
        })
      }
    })
    
    //when ad appear
    $('.iframe_ad').on('appear', function(event, $all_appeared_elements) {
      if (typeof($(this).attr("src")) == "undefined") {
        $(this).attr("src", $(this).attr("src_tmp"))
      }
    });
    $('.iframe_ad').appear();
    
});