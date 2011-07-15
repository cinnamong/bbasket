<?
include $_SERVER[DOCUMENT_ROOT]."/inc/global.inc"; 		// DB컨넥션, 접속자 파악
include $_SERVER[DOCUMENT_ROOT]."/inc/connect.inc";		// 접소카운터
include $_SERVER[DOCUMENT_ROOT]."/inc/util_lib.inc"; 	// 유틸 라이브러리
include $_SERVER[DOCUMENT_ROOT]."/inc/shop_info.inc"; 	// 운영정보
include $_SERVER[DOCUMENT_ROOT]."/inc/design_info.inc"; // 디자인 정보
include $_SERVER[DOCUMENT_ROOT]."/inc/popup.inc";                    // 팝업
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? include "include/meta.inc"; ?>
<title><?=$design_info->site_title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<meta name="keywords" content="<?=$design_info->site_keyword?>">
<meta name="description" content="<?=$design_info->site_intro?>">
<link href="css/css.css" rel="stylesheet" type="text/css">

<SCRIPT language="JavaScript" src="images/flash.js" type="text/JavaScript"></SCRIPT>

<script language="JavaScript" type="text/JavaScript">

<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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
</head>

<BODY leftMargin=0 topMargin=0>
<TABLE cellSpacing=20 cellPadding=0 width=750 border=0>
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
                  			<?php require_once('include/top_menu.php');?>
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
                      <td> <?php require_once('include/left_menu.php');?></td></TR></TBODY></TABLE></TD></TR>

<!----- 카테고리 끝 --->
                
              <TR>
                <TD><!-- Banner : Start -->
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" align=center 
                  border=0>
                    <TBODY>
                    <TR>
                      <TD><IMG src="images/banner_01.gif" border=0></TD></TR>
                    <TR>
                      <TD><IMG src="images/banner_02.gif" border=0></TD></TR>
                    <TR>
                      <TD><IMG src="images/banner_03.gif" border=0></TD></TR>
                    <TR>
                      <TD><IMG src="images/banner_04.gif" border=0></TD></TR>
                    <TR>
                      <TD><IMG src="images/banner_05.gif" border=0></TD></TR>
                    <TR>
                      <TD><IMG src="images/banner_06.gif" 
                    border=0></TD></TR></TBODY></TABLE><!-- Banner : End --></TD></TR></TBODY></TABLE>
          
                    
          
          <!--                ### 팝업 시작 ###            -->
 <?php //require_once('inc/popup2.php');?>
<!--                ### 팝업 끝 ###            -->
            
</TD>
<!--- 메인 시작 ------------->
<TD vAlign=top align=left>
<TABLE align=left cellSpacing=0 cellPadding=0 width=719 border=0>
              <TBODY>
              <TR>
                <TD>
                  <TABLE cellSpacing=0 cellPadding=0 width="719" border=0>
                    <TBODY>
                    <TR>
                      <TD><A href="/"><IMG height=341 
                        src="images/mainimg.gif" width=467 border=0></A></TD>
                      <!--- 공지 시작 ----->
                        <TD align=left vAlign=top>
                        <TABLE cellSpacing=0 cellPadding=0 width=252 border=0>
                          <TBODY>
                          <TR>
                            <TD>
                              <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                                <TBODY>
                                <TR>
                                <TD><A href="/bbs/list.php?code=notice">
                                <IMG src="images/notice_img.gif" border=0></A></TD></TR>
                                <TR>
                                <td style="padding:0 0 0 0">
                              <?php require_once('include/main_news.php');?>
							</td></TR></TBODY></TABLE></TD></TR>
                          <TR>
                            <TD height=8></TD></TR>
                          <TR>
                            <TD><!-- Banner : Start -->
                              <TABLE cellSpacing=0 cellPadding=0 width="100%" 
                              align=center border=0>
                                <TBODY>
                                <TR>
                                <TD><IMG src="images/a_event_01.gif" 
                                border=0></TD></TR>
                                <TR>
                                <TD><IMG src="images/a_event_02.gif" 
                                border=0></TD></TR>
                                <TR>
                                <TD><IMG src="images/a_event_03.gif" 
                                border=0></TD></TR>
                                <TR>
                                <TD><IMG src="images/a_event_04.gif" 
                                border=0></TD></TR></TBODY></TABLE><!-- Banner : End --></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD vAlign=top>
                  <TABLE cellSpacing=0 cellPadding=0 width=720 border=0>
                    <TBODY>
                    <TR>
                      <TD>
                        <TABLE cellSpacing=0 cellPadding=0 width=719 border=0>
                          <TBODY>
                          <TR>
                            <TD vAlign=top><!--히트상품 시작-->
                              <TABLE cellSpacing=0 cellPadding=0 width=392 
                              border=0>
                                <TBODY>
                                <TR>
                                <TD><A href="/#"><IMG 
                                src="images/title_hit.gif" 
                                border=0></A></TD></TR>
                                <TR>
                                <TD style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 5px">
                                <!--상품배열-->
                                <TABLE cellSpacing=0 cellPadding=10 align=center 
                                border=0>
                                <TBODY>
                                <TR>
                                <TD vAlign=top>
									<?php require_once('include/main_bestofbest.php');?>
								</TD>
                             
                             </TR></TBODY></TABLE></TD></TR></TBODY></TABLE><!--히트상품 끝--></TD>
                            <!---- 히트상품 배너 시작 -------------->
                            <TD>
                              <TABLE cellPadding=0 border=0>
                                <TBODY>
                                <TR>
                                <TD rowSpan=2><IMG 
                                src="images/b_event_01_01.gif" border=0></TD>
                                <TD><IMG src="images/b_event_01_02.gif" 
                                border=0></TD></TR>
                                <TR>
                                <TD><IMG src="images/b_event_01_03.gif" 
                                border=0></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
                        	<!---------- 히트상품 배너 끝 ----------------->    
                        	<!---------- 신상품 배너 시작 ----------------->    
                    <TR>
                      <TD><A 
                        href="/shop/prd_list.php?grp=new"><IMG 
                        src="images/new_bar.gif" border=0></A></TD></TR>
                    <TR>
                      <TD align=left>
						<?php require_once('include/main_new_arrival.php');?>
                      </TD></TR>
                      <!---------------- 신상품 배너 끝 --------------------->
                      <!---------------- 추천상품 배너 시작 ----------------->
              <TR>
                <TD vAlign=top>
                  <TABLE cellSpacing=0 cellPadding=0 width="720" border=0>
                    <TBODY>
                     <TR>
                      <TD><A 
                        href="/shop/prd_list.php?grp=recom"><IMG 
                        src="images/recom_bar.gif" border=0></A></TD></TR>
                    <TR>
                      <TD align=left>
						<?php require_once('include/main_recom.php');?>
                    </TD></TR></TBODY></TABLE></TD></TR>
             
    			</TBODY></TABLE></TD></TR>
    			<!--------------- 추천상품 배너 끝 ------------------------>
    			<!-------------- floating banner -------------------------->
          
                <?php require_once($_SERVER[DOCUMENT_ROOT]."/inc/floating.inc");?>
        <!----------------- floating banner 끝 ------------------------>
		<!---- FOOTER 시작 ------------------------->

                <!---?php require_once($_SERVER[DOCUMENT_ROOT]."/inc/footer.inc");?--->
                <?php include $_SERVER[DOCUMENT_ROOT]."/inc/footer.inc"; ?> 


				
                
