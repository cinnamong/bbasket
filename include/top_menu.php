<!--- 상단메뉴 시작 --->
       <TBODY>
        <TR>
          <TD colSpan=2>
            <TABLE cellSpacing=0 cellPadding=0 border=0>
              <TBODY>
              <TR>
                <TD align=middle>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD width=180 height=40><A 
                        href="/"><IMG 
                        src="/images/logo.gif" border=0></A></TD>
                      <TD align=right>
                        <TABLE cellSpacing=0 cellPadding=0 border=0>
                          <TBODY>
                          <TR>
                            <TD>
<!--- 로그인 로그아웃 변환 모듈 시작---->

<?
if($wiz_session[id]) {
?>
                  <a href="http://www.brownbasket.com/member/logout.php"><img src="/images/topnavi_logout.gif" align="absmiddle"></a>
                  
<?
}
else {
?>
				<a href="http://www.brownbasket.com/member/login.php"><img src="/images/topnavi_login.gif" align="absmiddle"></a>
                  <TD><a href="/member/join.php"><img src="/images/topnavi_join.gif" align="absmiddle"></a> </TD>
<?
}
?>
<!----- 로그인 로그아웃 변환 모듈 끝---->

                            <TD><A 
                              href="https://www.brownbasket.com/member/my_shop.php"><IMG 
                              src="/images/topnavi_myshop.gif" 
border=0></A></TD>
                            <TD><A 
                              href="/center/company.php"><IMG 
                              src="/images/topnavi01.gif" border=0></A></TD>
                            <TD><A 
                              href="/center/sitemap.php"><IMG 
                              src="/images/topnavi02.gif" 
                          border=0></A></TD></TR>
                            	<?
				if($wiz_session[name]) {
				?>
		              <tr>
		              	<td colspan=3>:: <b><?=$wiz_session[name]?> </b>님 안녕하세요? :: </td></tr>
		              <?
				}
				else {?> <tr><td colspan=3> &nbsp;</td></tr><?}?>
                          </TBODY></TABLE></TD>
                      <TD 
                      style="PADDING-RIGHT: 10px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                      align=right>
                        <TABLE cellSpacing=0 cellPadding=2 border=0>
                          <FORM action=/shop/prd_search.php>
                          <TBODY>
                          <TR>
                            <TD><IMG src="/images/search_01.gif"></TD>
                            <TD><INPUT class=input style="WIDTH: 150px" 
                              name=prdname></TD>
                            <TD><INPUT type=image 
                              src="/images/search_btn.gif" border=0></A></TD>
                            <TD><A 
                              href="/shop/prd_search.php"><IMG 
                              src="/images/search_btn_detail.gif" 
                            border=0></A></TD></TR>
                           <tr>
              			<td> &nbsp;          	</td>
              		</tr>
              
                            </FORM></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
                
            
              <TR>
                <TD>
                  <TABLE cellSpacing=0 cellPadding=0 border=0>
                    <TBODY>
                    <TR>
                      <TD><A href="/"><IMG 
                        src="/images/topmenu01.gif" border=0></A></TD>
                      <TD><A 
                        href="https://www.brownbasket.com/shop/prd_basket.php"><IMG 
                        src="/images/topmenu02.gif" border=0></A></TD>
                      <TD><A 
                        href="https://www.brownbasket.com/shop/order_list.php"><IMG 
                        src="/images/topmenu03.gif" border=0></A></TD>
                      <TD><A 
                        href="/center/guide.php"><IMG 
                        src="/images/topmenu04.gif" border=0></A></TD>
                      <TD><A 
                        href="/center/center.php"><IMG 
                        src="/images/topmenu05.gif" border=0></A></TD>
                      <TD><A
                       	href="/brand/brandshop.php"><IMG src="/images/topmenu06.gif" border=0></A></TD>  
                      <TD><A 
                        href="/shop/prd_list.php?grp=popular"><IMG 
                        src="/images/topmenu07.gif" border=0></A></TD>
                      <TD><A 
                        href="/shop/prd_list.php?grp=recom"><IMG 
                        src="/images/topmenu08.gif" border=0></A></TD>
                      <TD><A 
                        href="/shop/prd_list.php?grp=new"><IMG 
                        src="/images/topmenu09.gif"  border=0></A></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
                  <? 
                  include $_SERVER[DOCUMENT_ROOT]."/module/right_banner.inc";
                  include $_SERVER[DOCUMENT_ROOT]."/module/prd_view.inc";                    // 상품클릭
                  ?>
<!--- 상단메뉴 끝 --->

<!--- table width="950" border="0" cellspacing="0" cellpadding="0">
  <tr border="0"> 
    <td><table width="100%" height="86" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="184" valign="top" style="padding:15 0 0 0"><a href="/"><img src="/images/logo.gif" width="370" height="90"></a></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td align="right" class="white" style="padding:15 0 0 0">
<?
if($wiz_session[id]) {
?>
                  <a href="/member/logout.php"><img src="/images/topnavi_login.gif" align="absmiddle"></a>
<?
}
else {
?>
				<a href="/member/login.php"><img src="/images/topnavi_logout.gif" align="absmiddle"></a>
                  &nbsp;<a href="/member/join.php"><img src="/images/topnavi_join.gif" align="absmiddle"></a> 
<?
}
?>
                  &nbsp;<a href="/member/my_shop.php"><img src="/images/topnavi_myshop.gif" align="absmiddle"></a> 
                  &nbsp;<a href="/center/company.php"><img src="/images/topnavi01.gif" align="absmiddle"></a> 
                  &nbsp;<a href="/center/sitemap.php"><img src="/images/topnavi02.gif" align="absmiddle"></a> </td>
               
                <td height="18" align="right" valign="bottom"><a href="/shop/order_list.php">My Order</a>&nbsp;&nbsp;<a href="/shop/prd_basket.php">My Cart</a><a href="/bbs/list.php?code=qna"><img src="/img/btn_bord.gif" width="76" height="21" border="0"></a></td>
              </tr>
            </table></td>
        </tr>
      </table></td></tr>
  <tr> 
    <td><table width="100%" height="60" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="184" rowspan="2" valign="bottom"><img src="/images/topmenu01.gif" width="184" height="30"></td>
          <td height="30">&nbsp;</td>
          <td width="250" class="s_txt"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              </table></td>
        </tr>
        <tr> 
          <td width="516" align="right" bgcolor="c2bfbb"><table width="430" border="0" cellspacing="0" cellpadding="0">
<form action='/shop/prd_search.php'>
              <tr> 
                <td width="66"><img src="/img/icon_search.gif" width="55" height="10"></td>
                <td> <input name="prdname" type="text" class="form1" value="SEARCH TEST" size="42" onfocus="this.value='';"></td>
                <td width="105" align="right" valign="bottom"><input type="image" src="/img/btn_go.gif" width="32" height="18" border="0">&nbsp; 
                  <a href="/shop/prd_search.php"><img src="/img/btn_search.gif" width="55" height="17" border="0"></a>
                </td>
              </tr>
</form>
            </table></td>
          <td background="/img/top_line_img.gif">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table----->

