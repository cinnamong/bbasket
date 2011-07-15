<?
$tidx=$idx;//원래 idx값을 보관
   $prd_view = "";
   
   $rows = 4;
   $total = count($view_list);
   if(empty($v_page)) $v_page = 1;
   
   $page_count = ceil($total/$rows);
   $idx = ($v_page-1)*$rows;
   $viewtotal=$total;
   while($rows > 0 && $idx < $total){

   $prd_view .= "<!-- 테이블의 height 속성과 id 속성은 절대 삭제하지 마세요(값 변경은 가능합니다) -->
					<table border='0' cellpadding='0' cellspacing='0' height=76 id=\"tbl_row".$idx."\" >
						<tr height=1><td align='center' colspan='2'>
						<!----img src='http://img0001.echosting.cafe24.com/front/type_b/image/common/quick_line.gif' border=0--></td></tr>	
						<tr style='padding:3 0 3 0' height=75>
							<td width=\"76\" align=\"center\" valign=middle>
								
								<a href=\"/shop/prd_view.php?prdcode=".$view_list[$idx][prdcode]."\"><img src='/prdimg/".$view_list[$idx][prdimg]."' width=\"60\" height=\"55.2\" align=\"absmiddle\" style=\"border:1 solid #CCCCCC;\"></a></td>
							<td STYLE=\"color:#555555;font-size:12;font-family:굴림;\">
							&nbsp;</td>
						</tr>
					</table>";
   $idx++;
	$rows--;
  }
  if($total <= 0) $prd_view .= "
					<table border='0' cellpadding='0' cellspacing='0' height=76 id=\"tbl_row1\" >
						<tr height=1><td align='center' colspan='2'><!--img src='http://img0001.echosting.cafe24.com/front/type_b/image/common/quick_line.gif' border=0--></td></tr>	
						<tr style='padding:3 0 3 0' height=75>클릭한 상품이 없습니다.</td>
						</tr>						
					</table>";
  
  if($v_page > 1) $v_spage = $v_page-1;
  else $v_spage = 1;

  if($v_page < $page_count) $v_epage = $v_page+1;
  else $v_epage = $page_count;

  $prd_view .= "
					<table border='0' cellpadding='0' cellspacing='0' height=10 >
						<tr height=10><td align='center' colspan='2'>
						<!---a href=/shop/view_clear.php?prev=".$PHP_SELF."><font color=red>삭제</font></a----></td>
						</tr>
					</table>";
$idx=$tidx;//원래 idx값을 환원
?>