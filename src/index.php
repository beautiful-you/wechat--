<?php
require 'vendor/autoload.php';

use FongGree\WeChat\JsSdk\Manager;

$manager = new Manager("wx4285b8f2757f9774", "a4ed3e87f92687898ddf7b1d56f14c46");
$signPackage = $manager->GetSignPackage();

?>
<!DOCTYPE html>
<html>
  <head>
	<title>分享测试</title>
	<!-- end copy -->
  </head>
  <body>
<!-- 背景乐设置 -->
<audio style="display:none" id="bgm" src="https://static.jyacad.com/2018/0811/bgm.mp3" controls loop autoplay></audio>
<!-- 图标设置 -->
<img id="anm" onclick="music()" src="https://static.jyacad.com/2018/0811/music.png" style="width: 10%;position: absolute;margin-top: -1020px;z-index: 9999;margin-left: 550px;">

<script src="https://static.jyacad.com/Plugin/GreenSock-JS/1.20.4/src/minified/TweenMax.min.js"></script>
<script>
//分享js 插件

var appid = "<?php echo $signPackage["appId"];?>", 
    timestamp = <?php echo $signPackage["timestamp"];?>, 
    noncestr = "<?php echo $signPackage["nonceStr"];?>", 
    signature = "<?php echo $signPackage["signature"];?>";
// 设置分享信息
var fx_info_arr = ['标题', '描述', '分享链接', '分享小图标', '分享类型（可以为空）', '数据链接（可以为空）'];
// 初始化完成后执行
window.onload = function (){
    set_fx_info(fx_info_arr);
	// 自动播放背景乐
	bgm = document.getElementById("bgm");
	anm = document.getElementById("anm"); 
    tanm = TweenMax.to(anm, 3,{rotation:360,repeat:100000});
};
// 点击了分享按钮过后执行的函数
window.fx_success= function (){
    // window.location.href='url';// 设置跳转链接
}
window.set_fx_info = function (data){
		
		// 微信分享代码
  		for (let i = 0; i < data.length; i++){
        	fx_info[i] = data[i]
        }
        
      	title = fx_info[0];
        desc = fx_info[1];
        link = fx_info[2];
        imgUrl = fx_info[3];
        type = fx_info[4];
  		dataUrl = fx_info[5];
  	
 		
wx.config({
    debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: appid, // 必填，公众号的唯一标识
    timestamp: timestamp, // 必填，生成签名的时间戳
    nonceStr: noncestr, // 必填，生成签名的随机串
    signature: signature,// 必填，签名，见附录1
    jsApiList:[
    'checkJsApi',
    'onMenuShareTimeline',
    'onMenuShareAppMessage',
    'onMenuShareQQ',
    'onMenuShareWeibo',
    'onMenuShareQZone',
    'hideMenuItems',
    'showMenuItems',
    'hideAllNonBaseMenuItem',
    'showAllNonBaseMenuItem',
    'translateVoice',
    'startRecord',
    'stopRecord',
    'onVoiceRecordEnd',
    'playVoice',
    'onVoicePlayEnd',
    'pauseVoice',
    'stopVoice',
    'uploadVoice',
    'downloadVoice',
    'chooseImage',
    'previewImage',
    'uploadImage',
    'downloadImage',
    'getNetworkType',
    'openLocation',
    'getLocation',
    'hideOptionMenu',
    'showOptionMenu',
    'closeWindow',
    'scanQRCode',
    'chooseWXPay',
    'openProductSpecificView',
    'addCard',
    'chooseCard',
    'openCard'
    ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
});

wx.ready(function(){
  	bgm.play();
    wx.onMenuShareTimeline({
        title:title,
        desc:desc,
        link:link,
        imgUrl:imgUrl,
        type:type,
        dataUrl:dataUrl,
        success:function(){
        fx_success();
        }
    });
    wx.onMenuShareAppMessage(
        {title:title,
         desc:desc,
         link:link,
         imgUrl:imgUrl,
         type:type,
         dataUrl:dataUrl,
         success:function(){
            fx_success();
         }
    });
    wx.onMenuShareQZone({
        title:title,
        desc:desc,
        link:link,
        imgUrl:imgUrl,
        type:type,
        dataUrl:dataUrl,
        success:function(){
            fx_success();
        }
    });wx.onMenuShareQQ({
        title:title,
        desc:desc,
        link:link,
        imgUrl:imgUrl,
        type:type,
        dataUrl:dataUrl,
        success:function(){
            fx_success();
        }
    });
    wx.onMenuShareWeibo({
        title:title,
        desc:desc,
        link:link,
        imgUrl:imgUrl,
        type:type,
        dataUrl:dataUrl,
        success:function(){
            fx_success();
        }
    })
});
  return 'success';
};
	  </script>

  </body>
</html>

