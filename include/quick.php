
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<div id="floater" style="position:absolute; top:20px; width:69; z-index:0">
<table width="69" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <!--td align="center" style="padding:0 0 7 0">

                      <?=$right_banner?></td---->
  </tr>
  <tr> 
                <td align="center" height="17" valign="top"><IMG src="/img/quick_click_up.gif" border=0></td>
              </tr>
  <tr>
  	<td align="center">
  	
  	</td></tr>
  <tr> 
    <td align="center"><?=$prd_view?></td>
              </tr>
              <tr> 
                <td align="center" height="17" valign="bottom"><IMG src="/img/quick_click_down.gif" border=0></td>
 
  </tr>
</table>
</div>
<script language="JavaScript" type="text/javascript">
<!--
self.onError=null;
	currentX = currentY = 0; 
	whichIt = null; 
	lastScrollX = 0; lastScrollY = 0;
	NS = (document.layers) ? 1 : 0;
	IE = (document.all) ? 1: 0;
	
	function heartBeat() {
		if(IE) { 
			diffY = document.body.scrollTop; 
			diffX = 0; 
		}
		if(NS) { diffY = self.pageYOffset; diffX = self.pageXOffset; }
		if(diffY != lastScrollY) {
			percent = .05 * (diffY - lastScrollY);
			if(percent > 0) percent = Math.ceil(percent);
			else percent = Math.floor(percent);
			if(IE) document.all.floater.style.pixelTop += percent;
			if(NS) document.floater.top += percent; 
			lastScrollY = lastScrollY + percent;
		}
		if(diffX != lastScrollX) {
			percent = .05 * (diffX - lastScrollX);
			if(percent > 0) percent = Math.ceil(percent);
			else percent = Math.floor(percent);
			if(IE) document.all.floater.style.pixelLeft += percent;
			if(NS) document.floater.top += percent;
			lastScrollY = lastScrollY + percent;
		} 
	} 
	if(NS || IE) action = window.setInterval("heartBeat()",1);
//-->
</script>
