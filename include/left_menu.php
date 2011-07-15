 <table width="184" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width=180 border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <!--td style="padding:0 0 5 0"><img src="/img/category_title.gif" width="184" height="24"></td--->
        </tr>
        <tr> 
          <td>
<?
$sql = "select * from wiz_category where depthno = 1 order by depthno asc, priorno01 asc, priorno02 asc, priorno03 asc";
$result = mysql_query($sql) or error(mysql_error());
$no=1;
while($prow = mysql_fetch_object($result)){
?>
            <table width=180 border="0" cellpadding="3" cellspacing="0">
              <tr> 
                <td height="22" class="menu"><!---img src="/img/category_dot.gif" width="20" height="3" align="absmiddle"-----><a href=/shop/prd_list.php?catcode=<?=$prow->catcode?> onMouseOver=MM_swapImage('c_<?=$no?>','','/images/catimg/<?=$prow->catimg_over?>',1) onMouseOut=MM_swapImgRestore()><img src='/images/catimg/<?=$prow->catimg?>' name='c_<?=$no?>' border=0 id='c_<?=$no?>'><!--?=$prow->catname?---><!--img src="/images/catimg/<?=$prow->catimg?>"---></a></td>

              </tr>
              <tr> 
                <td width=150 height="1" colspan="2" bgcolor="e9e9e9"> </td>
              </tr>
            </table>
<?
$no++;
}
?>
			</td>
        </tr>
      </table>
                  
      <!--table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td align="center" bgcolor="fde5c7" style="padding:7 0 7 0"><a href="mailto:brown_basket@yahoo.com"><img src="/img/left_customer.gif" width="170" height="124" border="0"></a></td>
        </tr>
        <tr> 
          <td align="center" bgcolor="fde5c7"><img src="/img/left_account.gif" width="170" height="124"></td>
        </tr>
        <tr> 
          <td align="center" bgcolor="fde5c7" style="padding:5 0 5 0"><a href="/center/faq.php"><img src="/img/left_faq.gif" width="169" height="34" border="0"></a></td>
        </tr>
      </table---><!-- Banner : Start -->
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" align=center 
                  border=0>
                    <TBODY>
                    <TR>
                      <TD><a href="/center/center.php"><IMG src="/images/banner_01.gif" border=0></a></TD></TR>
                    <TR>
                      <TD><a href="/center/faq.php"><IMG src="/images/banner_02.gif" border=0></a></TD></TR>
                    <TR>
                      <TD><a href="/bbs/list.php?code=qna"><IMG src="/images/banner_03.gif" border=0></a></TD></TR>
                    <TR>
                      <TD><a href="/bbs/list.php?code=review"><IMG src="/images/banner_04.gif" border=0></a></TD></TR>
                    <TR>
                      <TD><a href="/center/faq.php"><IMG src="/images/banner_05.gif" border=0></a></TD></TR>
                    <TR>
                      <TD><a href="/bbs/list.php?code=babycare"><IMG src="/images/banner_06.gif" border=0></a></TD></TR></TBODY></TABLE><!-- Banner : End --> </td>
  </tr>
</table>
