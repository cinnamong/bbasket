//상단
<table border=0 cellpadding=0 cellspacing=0>
  <tr>
    <td align=center>
      <table border=0 cellpadding=0 cellspacing=0 width=100%>
        <tr>
          <td width=180 height=50><?=$logo?></td>
          <td align=right><?=$top_navi?></td>
         <td align=right style="padding:0 10 0 0"><?=$prd_search?></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td><?=$top_menu?></td>
  </tr>
</table>

//메인좌측
<table width=180 border=0 cellpadding=0 cellspacing=0>
  <tr>
    <td><?=$category?></td>
  </tr>
  <tr height=10><td></td></tr>
  <tr>
    <td><?=$banner_01?></td>
  </tr>
</table>

//서브좌측
<table width=180 border=0 cellpadding=0 cellspacing=0>
  <tr>
    <td><?=$category?></td>
  </tr>
  <tr height=10><td></td></tr>
  <tr>
    <td><?=$banner_01?></td>
  </tr>
</table>

//메인
<table width=719 border=0 cellpadding=0 cellspacing=0>
  <tr>
    <td>
      <table border=0 cellpadding=0 cellspacing=0 width=100%> 
        <tr>
          <td><?=$main_img?></td>
          <td valign=top>
            <table border=0 cellpadding=0 cellspacing=0 width=252>
              <tr>
                <td><?=$notice?></td>
              </tr>
              <tr><td height=8></td>
              <tr>
                <td><?=$banner_02?></td>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td valign=top><?=$prd_new?></td>
  </tr>  
  <tr>
    <td valign=top><?=$prd_recom?></td>
  </tr>
  <tr>
    <td valign=top><?=$prd_popular?></td>
  </tr>
  <tr>
    <td valign=top><?=$prd_sale?></td>
  </tr>
</table>

//우측
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?=$prd_view?></td>
  </tr>
</table>

//하단부분
<table border=0 cellpadding=0 cellspacing=0>
  <tr>
    <td><?=$down_banner?></td>
  </tr>
  <tr>
    <td background="/images/mainimg/body_bg.gif"><?=$copyright?></td>
  </tr>
</table>
