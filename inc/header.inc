<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? //include "../include/meta.inc"; ?>
<title><?=$design_info->site_title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<meta name="keywords" content="<?=$design_info->site_keyword?>">
<meta name="description" content="<?=$design_info->site_intro?>">
<meta http-equiv="imagetoolbar" content="no"> 
<link href="../css/css.css" rel="stylesheet" type="text/css">
<link rel="SHORTCUT ICON" href="/images/favicon.ico">

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>

<BODY leftMargin=0 topMargin=0>
<script  type="text/javascript"> 
function loading_st(){ 
    var ct_left = (parseInt(window.screen.width)-800)/2; 
    var ct_top = (parseInt(window.screen.height))/3; 
    layer_str = "<div id='loading_layer' style='position:absolute; background-color:; font-size:12px; left:"+ct_left+"px; top:"+ct_top+"px; width:600px; height:; padding:50px; text-align:center; vertical-align:middle; z-index:1000; font-weight: bold; color:#79cd86;'>행복을 전하는 쇼핑몰 브라운 바스켓 ^^</div>" 
    document.write(layer_str); 
} 
function loading_ed(){ 
    var ta =document.getElementById('loading_layer'); 
    ta.style.display='none'; 
} 
loading_st(); 
window.onload = loading_ed; 
</script> 
<TABLE cellSpacing=20 cellPadding=0 width=730 border=0>
<!---- 상단메뉴 시작 ----> 

 <TBODY>
  <TR>
    <TD align=middle background="" bgColor=#ffffff>
      <TABLE cellSpacing=0 cellPadding=0 width=720 border=0>
        <TBODY>
        <TR>
          <TD colSpan=2>
            <TABLE cellSpacing=0 cellPadding=0 border=0>
              <TBODY>
              <TR>
                <TD align=middle>
                  <table border=0 cellpadding=0 cellspacing=0>
  			<tr>
    				<td align=center>
		<?php require_once($_SERVER["DOCUMENT_ROOT"]."/include/top_menu.php");?>
    				</td>
  			</tr>
 
		  </table>
		 </TABLE></TD></TR>
                  <!---- 상단메뉴 끝 ---->
 <!---- 왼쪽 메뉴 시작 --->
 <!----- 카테고리 시작 ----->
        <TR>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width=180 border=0>
              <TBODY>
              <TR>
                <TD>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" align=center 
                  border=0>
                    <TBODY>
                      <TR height=21>
                      <td>                            
                         <?php require_once($_SERVER["DOCUMENT_ROOT"]."/include/left_menu2.php");?>
		    </td></TR></TBODY></TABLE></TD></TR>

<!----- 카테고리 끝 --->
                
        </TBODY></TABLE>
                      <td width="803" valign="top" style="padding:0 0 0 10">
