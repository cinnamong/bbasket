<?

include "../inc/global.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/block_copy.inc"; // ���� ����
// ��ǰ���� ��������
$sql = "select * from wiz_product wp, wiz_cprelation wc where wp.prdcode='$prdcode' and wc.prdcode = wp.prdcode limit 1";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$prd_info = mysql_fetch_object($result);
if($prdcode == "" || $total <= 0) error("�������� �ʴ� ��ǰ�Դϴ�.");
if(empty($catcode)) $catcode = $prd_info->catcode;

include "../inc/util_lib.inc"; 		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����
include "../inc/cat_info.inc"; 		// ī�װ�����
include "../inc/oper_info.inc";		// �����

include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

// �α�,�Ż�,��õ...
if($prd_info->popular == "Y") $sp_img .= "<img src='/images/icon_hit.gif'>&nbsp;";
if($prd_info->recom == "Y") $sp_img .= "<img src='/images/icon_rec.gif'>&nbsp;";
if($prd_info->new == "Y") $sp_img .= "<img src='/images/icon_new.gif'>&nbsp;";
if($prd_info->sale == "Y"){ $sp_img .= "<img src='/images/icon_sale.gif'>&nbsp;"; $sellprice = "<s>".number_format($prd_info->conprice)." ��</s> �� "; }
if($prd_info->shortage == "Y" || $prd_info->stock <= 0) $sp_img .= "<img src='/images/icon_not.gif'>&nbsp;";
	
	
// ��ǰ��ȸ�� ����
$sql = "update wiz_product set viewcnt = viewcnt + 1 where prdcode='$prdcode'";
mysql_query($sql) or error(mysql_error());


// �������� ��ǰ
$catcode01 = str_replace("00","",substr($catcode,0,2));
$catcode02 = str_replace("00","",substr($catcode,2,2));
$catcode03 = str_replace("00","",substr($catcode,4,2));
$tmp_catcode = $catcode01.$catcode02.$catcode03;
$sql = "select wp.prdcode from wiz_cprelation wc, wiz_product wp where wc.catcode like '$tmp_catcode%' and wc.prdcode = wp.prdcode and wp.showset != 'N' and wp.prior > '$prd_info->prior' order by wp.prior asc limit 1";
$result = mysql_query($sql) or error(mysql_error());
if($row = mysql_fetch_object($result)) $prev_prdcode = "prd_view.php?prdcode=$row->prdcode&catcode=$catcode";
else $prev_prdcode = "#";

$sql = "select wc.prdcode from wiz_cprelation wc, wiz_product wp where wc.catcode like '$tmp_catcode%' and wc.prdcode = wp.prdcode and wp.showset != 'N' and wp.prior < '$prd_info->prior' order by wp.prior desc limit 1";
$result = mysql_query($sql) or error(mysql_error());
if($row = mysql_fetch_object($result)) $next_prdcode = "prd_view.php?prdcode=$row->prdcode&catcode=$catcode";
else $next_prdcode = "#";


// ���ú� ��ǰ��Ͽ� �߰�
$view_exist = false;
$view_idx = count($view_list);
for($ii = 0; $ii < $view_idx; $ii++){
	if($view_list[$ii][prdcode] == $prdcode){ $view_exist = true; break; }
}
if(!$view_exist){
	$view_list[$view_idx][prdcode] = $prdcode;
	$view_list[$view_idx][prdimg] = $prd_info->prdimg_R;
	session_register("view_list",$view_list);
}

?>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="javascript">
<!--

// ��ǰ�̹��� �˾�
function prdZoom(){
   
   var url = "prd_zoom.php?prdcode=<?=$prdcode?>";
   window.open(url,"prdZoom","width=798,height=600,scrollbars=no");
   
}

// ���ݼ���
function setSellprice(sellprice){
	
	document.getElementById("sellprice").innerHTML = ":&nbsp;&nbsp; <span class='price_b'>"+ won_Comma(sellprice) +"��";
	
}

// ���� ����
function incAmount(){
	
	var amount = document.prdForm.amount.value;
	document.prdForm.amount.value = ++amount;
	checkAmount();
	
}

// ���� ����
function decAmount(){

   var amount = document.prdForm.amount.value;
	if(amount > 1)
		document.prdForm.amount.value = --amount;
	checkAmount();
	
}

// ����üũ
function checkAmount(){
	
	var amount = document.prdForm.amount.value;
   if(!Check_Num(amount) || amount < 1){
   	document.prdForm.amount.value = "1";
   }else{
   <?
   	if($prd_info->opttitle != "" && $prd_info->optcode != ""){
   ?>
	   	if( document.prdForm.amount != null){
	   		var selvalue = document.prdForm.optcode.value;
	   		var optlist = selvalue.split("^");
		   	if( amount > eval(optlist[2])){
		   		 alert("����� �����մϴ�.");
		   		 document.prdForm.amount.value = "1";
		   		 return false;
		   	}else{
		   		return true;
		   	}
	   	}
   <?
   	}else{
   ?>
		   if( document.prdForm.amount != null){
		   	if( amount > <?=$prd_info->stock?>){
		   		 alert("����� �����մϴ�.");
		   		 document.prdForm.amount.value = "1";
		   		 return false;
		   	}else{
		   		return true;
		   	}
		   }
   <?
   	}
   ?>
	}
	
}


// ���ݺ���,ǰ���ɼ� üũ
function checkOpt01(){
	
	if(document.prdForm.optcode != null){
		
		var optval = document.prdForm.optcode.value;
		var optlist = optval.split("^");
	
		if(optval == ""){
			
			setSellprice('<?=$prd_info->sellprice?>');
			
		}else{
		
			if(optlist[2] == "0"){
				alert('ǰ���� ��ǰ�Դϴ�.');
				document.prdForm.optcode[0].selected = true;
				setSellprice('<?=$prd_info->sellprice?>');
				
				return false;
			
			// �ɼǺ� ���� ����	
			}else{
				setSellprice(optlist[1]);
			}
			
		}
		
	}
	
	return checkAmount();
	
}

// �ɼ�üũ
function checkOption(){

	if( document.prdForm.optcode != null){
      if(document.prdForm.optcode.value == ""){
         alert("�ɼ��� �����ϼ���");
         document.prdForm.optcode.focus();
         return false;
      }
   }
   if( document.prdForm.optcode2 != null){
      if(document.prdForm.optcode2.value == ""){
         alert("�ɼ��� �����ϼ���");
         document.prdForm.optcode2.focus();
         return false;
      }
   }
   if( document.prdForm.optcode3 != null){
      if(document.prdForm.optcode3.value == ""){
         alert("�ɼ��� �����ϼ���");
         document.prdForm.optcode3.focus();
         return false;
      }
   }
   
   return checkOpt01();
   
}


// ��ٱ��Ͽ� ���
function saveBasket(direct){
  <?
  if($prd_info->shortage == "Y" || $prd_info->stock <= 0) echo "alert('�˼��մϴ�. ǰ����ǰ �Դϴ�.');";
  else echo "if(checkOption()){ document.prdForm.direct.value = direct; document.prdForm.submit(); }";
  ?>
}
//-->

</script>

                     <!--��ǰ �󼼺��� ����-->
               <table border=0 cellpadding=0 cellspacing=0 width=100%>
					<tr>
					  <td align="center">
							<table border=0 cellpadding=0 cellspacing=0 width=692 align=center>
							  <tr>
							    <td width="50%" align=center>
							    
									<table width="100%" border=0 cellpadding=0 cellspacing=0>
									  <tr><td align=center><img src="/prdimg/<?=$prd_info->prdimg_M1?>" name="prdimg"></td></tr>
									  <!--tr><td align=center>
											<table border=0 cellpadding=5 cellspacing=0>
											  <tr>
								            <td><? if($prd_info->prdimg_S1 != ""){ ?><table width=50 height=50 cellpadding=0 cellspacing=0 style="border: 1 solid #cdcdcd"><tr><td align=center><img src="/prdimg/<?=$prd_info->prdimg_S1?>" onMouseOver="document.prdimg.src='/prdimg/<?=$prd_info->prdimg_M1?>'"></td></tr></table><?}?></td>
											   <td><? if($prd_info->prdimg_S2 != ""){ ?><table width=50 height=50 cellpadding=0 cellspacing=0 style="border: 1 solid #cdcdcd"><tr><td align=center><img src="/prdimg/<?=$prd_info->prdimg_S2?>" onMouseOver="document.prdimg.src='/prdimg/<?=$prd_info->prdimg_M2?>'"></td></tr></table><?}?></td>
												<td><? if($prd_info->prdimg_S3 != ""){ ?><table width=50 height=50 cellpadding=0 cellspacing=0 style="border: 1 solid #cdcdcd"><tr><td align=center><img src="/prdimg/<?=$prd_info->prdimg_S3?>" onMouseOver="document.prdimg.src='/prdimg/<?=$prd_info->prdimg_M3?>'"></td></tr></table><?}?></td>
												<td><? if($prd_info->prdimg_S4 != ""){ ?><table width=50 height=50 cellpadding=0 cellspacing=0 style="border: 1 solid #cdcdcd"><tr><td align=center><img src="/prdimg/<?=$prd_info->prdimg_S4?>" onMouseOver="document.prdimg.src='/prdimg/<?=$prd_info->prdimg_M4?>'"></td></tr></table><?}?></td>
										     </tr>
											</table>
									    </td>
									  </tr-->
									  <tr>
									    <td align=center>
											<table border=0 cellpadding=0 cellspacing=0>
											  <tr>
											   <td>
											   <a href="<?=$prev_prdcode?>"><img src="/images/but_view_prev.gif" border=0></a></td>
												<td><img src="/images/but_view_zoom.gif" border=0 onClick="prdZoom();" style="cursor:hand"></td>
												<td><a href="<?=$next_prdcode?>"><img src="/images/but_view_next.gif" border=0></td></tr>
											</table>
									    </td>
									  </tr>
									</table>
									
							    </td>
							    <td width="50%" align=center valign=top>
							
									<table border=0 cellpadding=0 cellspacing=0 width="100%">
									<form name="prdForm" action="https://www.brownbasket.com/shop/prd_save.php" method="post">
                           <input type="hidden" name="mode" value="insert">
                           <input type="hidden" name="direct" value="">
                           <input type="hidden" name="prdcode" value="<?=$prdcode?>">
                           <input type="hidden" name="opttitle" value="<?=$prd_info->opttitle?>">
                           <input type="hidden" name="opttitle2" value="<?=$prd_info->opttitle2?>">
                           <input type="hidden" name="opttitle3" value="<?=$prd_info->opttitle3?>">
                           
									  <tr><td class="p_title"><b><?=$prd_info->prdno?></b></td></tr>
										<tr><td class="p-name"><b><?=$prd_info->model?></b></td></tr>
									  <tr><td><img src="/images/shop_p_name_bar.gif"></td></tr>
									  <tr><td height=5></td></tr>
									  <tr>
									    <td bgcolor=#f5f5f5 style="padding:5 0 5 0">
											<table border=0 cellpadding=0 cellspacing=0 width=90% align=center>
		  									<? if($prd_info->conprice != "0"){?> 
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<b>����</b></td>
												<td id="conprice">:&nbsp;&nbsp; <span class="conprice"><?=number_format($prd_info->conprice)?>��</td></tr>
											  <?}?>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<b>�ǸŰ���</b></td>
												<td id="sellprice">:&nbsp;&nbsp; <span class="price"><?=number_format($prd_info->sellprice)?>��</td></tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<b>������</b></td>
												<td>:&nbsp;&nbsp; <b><?=number_format($prd_info->reserve)?>��</b></td></tr>
											</table>
									    </td>
									  </tr>
									  <tr>
									    <td style="padding:5 0 5 0">
											<table border=0 cellpadding=0 cellspacing=0 width=90% align=center>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;��ǰ����</td>
												<td>:&nbsp;&nbsp; <?=$sp_img?></td></tr>
											  <tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;������</td>
												<td>:&nbsp;&nbsp; <?=$prd_info->prdcom?></td></tr>
											  <tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;������</td>
												<td>:&nbsp;&nbsp; <?=$prd_info->origin?></td></tr>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;�� ��</td>
												<td>
												  <table border=0 cellpadding=0 cellspacing=0>
												    <tr>
												      <td rowspan=3>:&nbsp;&nbsp; <input type=text name=amount value=1 size=2 onChange="checkAmount();" class="input">&nbsp;&nbsp;</td>
														<td><a href="javascript:incAmount();"><img src="/images/but_vol_up.gif" border=0></a></td></tr>
													 <tr>
													  <td><a href="javascript:decAmount();"><img src="/images/but_vol_down.gif" border=0></a></td></tr>
												  </table>
												</td>
											  </tr>
											  <?
											  if($prd_info->opttitle != ""){
											  ?>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<?=$prd_info->opttitle?></td>
												<td>:&nbsp;&nbsp; 
												  <select name="optcode" onChange="checkOpt01();">
												  <option value=""> �����ϼ��� </option>
	                                   <?
                                       $opt_tmp = explode("^^",$prd_info->optcode);
                                       
                                    	for($ii=0; $ii<count($opt_tmp)-1; $ii++){
                                    		
                                    		$opt_sub_tmp = explode("^",$opt_tmp[$ii]);
                                    		if($opt_sub_tmp[2] <= 0) $opt_sub_tmp[2] = " [ǰ��]";
                                    		else $opt_sub_tmp[2] = "";
                                    		
                                    		$opt_sub_value = $opt_tmp[$ii];
                                    		$opt_sub_txt = $opt_sub_tmp[0]." / ".$opt_sub_tmp[1]."�� ".$opt_sub_tmp[2];
                                    		
                                    		echo "<option value='$opt_sub_value'>$opt_sub_txt\n";
                                    	}
	                                   ?>
												  </select>
												</td></tr>
											  <?
											  }

											  if($prd_info->opttitle2 != ""){
											  ?>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<?=$prd_info->opttitle2?></td>
												<td>:&nbsp;&nbsp; 
												  <select name="optcode2">
												  <option value=""> �����ϼ��� </option>
                                      <?
                                        $opt_list = explode(",",$prd_info->optcode2);
                                    	 for($ii=0; $ii<count($opt_list); $ii++){
                                    		echo "<option value='".$opt_list[$ii]."'>".$opt_list[$ii]."\n";
                                    	 }
                                      ?>
												  </select>
												</td></tr>
											  <?
											  }

											  if($prd_info->opttitle3 != ""){
											  ?>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<?=$prd_info->opttitle3?></td>
												<td>:&nbsp;&nbsp; 
												  <select name="optcode3">
												  <option value=""> �����ϼ��� </option>
                                      <?
                                        $opt_list = explode(",",$prd_info->optcode3);
                                    	 for($ii=0; $ii<count($opt_list); $ii++){
                                    		echo "<option value='".$opt_list[$ii]."'>".$opt_list[$ii]."\n";
                                    	 }
                                      ?>
												  </select>
												</td></tr>
											  <?
											  }
											  ?>
											  <tr>
											   <td height=25 width=100><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;����ȣ��</td>
												<td>:&nbsp;&nbsp; <img src="/images/icon_star_<?=$prd_info->prefer?>.gif"></td></tr>
										  </table>
									    </td>
									  </tr>
									  <tr><td height=1 bgcolor=#999999></td></tr>
									  <tr><td height=3 bgcolor=#F4F4F4></td></tr>
									  <tr><td style="padding:10 0 0 0" align=center>

											<table border=0 cellpadding=3 cellspacing=0>
											  <tr>
											   <td><a href="prd_list.php?catcode=<?=$catcode?>&page=<?=$page?>"><img src="/images/but_view_list.gif" border=0></a></td>
											   <td><a href="javascript:saveBasket('buy');"><img src="/images/but_view_buy.gif" border=0></a></td>
												<td><a href="javascript:saveBasket('basket');"><img src="/images/but_view_cart.gif" border=0></a></td>
												<td><a href="/member/my_save.php?mode=my_wish&prdcode=<?=$prdcode?>"><img src="/images/but_view_keeping.gif" border=0></a></td>
											  </tr>
											</table>
									    </td>
									  </tr>
									</form>
									</table>
							    </td>
							  </tr>
							</table>
							
							<br>
							
							<table border=0 cellpadding=0 cellspacing=0 width=95% align=center>
							<tr><td><img src="/images/bar_view_detailinfo.gif"></td></tr>
							<tr><td style="padding:15" valign=top><?=$prd_info->content?></td></tr>
							</table>
                   </td>
                 </tr>
               </table>
<?

include "./prd_review.inc";			// ��ǰ����
include "../inc/footer.inc"; 		// �ϴܵ�����

?>
