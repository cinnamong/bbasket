<?
if($oper_info->review_use == "Y"){
?>
<script language="javascript">
<!--
function reviewCheck(frm){
	
	if(memberCheck()){
	
	   if(
	      frm.star[0].checked == false &&
	      frm.star[1].checked == false &&
	      frm.star[2].checked == false &&
	      frm.star[3].checked == false &&
	      frm.star[4].checked == false
	   ){
	      alert("��ȣ���� �����ϼ���");
	      return false;
	   }
	   if(frm.content.value == ""){
	      alert("������ �Է��ϼ���");
	      frm.content.focus();
	      return false;
	   }
	   if(frm.name.value == ""){
	      alert("�̸��� �Է��ϼ���");
	      frm.name.focus();
	      return false;
	   }

	}else{
		return false;
	}
	
}
function memberCheck(){
<?
	if($oper_info->review_level == "M" && $wiz_session[id] == ""){ echo "alert('ȸ���� ��ǰ�� ���Ⱑ �����մϴ�.'); return false;"; }
	else { echo "return true;"; }
?>
}
-->
</script>
                     <table border=0 cellpadding=0 cellspacing=0 width=95% align=center>
							<tr><td><img src="/images/bar_view_review.gif"></td></tr>
							<tr><td style="padding:15" valign=top>
							<tr><td style="padding:10 15 10 15">
							��ǰ�� �����Ͻ� ���� �����е��� �ǰ��Դϴ�.��ǰ���� ������ ü���� �������� �� �ְ����� �ǰ����� ��ǰ� �ٸ��ų�,
							���� ����� ���� ���̰� ���� �� ������ ��ǰ�� ���ݿ� ���� �ʴ� ���� ������ �� �ֽ��ϴ�. 
							</td></tr>
							<tr><td>
									<!--���� ���̺� ����-->
									<table border=1 cellpadding=0 cellspacing=0 width=100% bgcolor=#f7f7f7 bordercolor=#ffffff>
									<?
				               $sql = "select * from wiz_comment where prdcode = '$prdcode'";
				               $result = mysql_query($sql) or error(mysql_error());
				               
				               while($row = mysql_fetch_object($result)){
				                  $row->content = str_replace("\n", "<br>", $row->content);
				            	?>
									  <tr><td style="padding:5 0 5 0">
											<table border=0 cellpadding=0 cellspacing=0 width=100% align=center>
											<tr><td align=center width=90><b><?=$row->name?></b><br><img src="/images/icon_star_<?=$row->star?>.gif"></td>
												<td width=1 bgcolor=#cdcdcd></td>
												<td style="padding:0 10 0 10" width=400><?=$row->content?></td>
												<td width=1 bgcolor=#cdcdcd></td>
												<td style="padding:0 5 0 5" class="s11"><b><?=$row->wdate?></b> <br>(<?=$row->wip?>)</td>
												<td>
												<?
												if($wiz_session[id] != "" && $wiz_session[id] == $row->id){
												?>
												  <a href="prd_save.php?mode=del_review&prdcode=<?=$prdcode?>&idx=<?=$row->idx?>"><img src="/images/but_review_del.gif" border=0></a>
												<?
												}
												?>
												</td></tr>
											</table>
									    </td>
									  </tr>
									<?
									}
									?>
									</table>
									<!--���� ���̺� ��-->
							</td></tr>
							<form action="prd_save.php" method="post" onSubmit="return reviewCheck(this);">
                     <input type="hidden" name="mode" value="review">
                     <input type="hidden" name="prdcode" value="<?=$prdcode?>">
							<tr><td height=40 align=center>
							<input name="star" type="radio" value="5" style="border:0px; background-color:transparent;" onClick="memberCheck();"><img src="/images/icon_star_5.gif">&nbsp;&nbsp;&nbsp;
							<input name="star" type="radio" value="4" style="border:0px; background-color:transparent;" onClick="memberCheck();"><img src="/images/icon_star_4.gif">&nbsp;&nbsp;&nbsp;
							<input name="star" type="radio" value="3" style="border:0px; background-color:transparent;" onClick="memberCheck();"><img src="/images/icon_star_3.gif">&nbsp;&nbsp;&nbsp;
							<input name="star" type="radio" value="2" style="border:0px; background-color:transparent;" onClick="memberCheck();"><img src="/images/icon_star_2.gif">&nbsp;&nbsp;&nbsp;
							<input name="star" type="radio" value="1" style="border:0px; background-color:transparent;" onClick="memberCheck();"><img src="/images/icon_star_1.gif">
							</td></tr>
							<tr><td align=center><textarea name="content" cols="111" rows="3" onClick="memberCheck();" class="input"></textarea></td></tr>
							<tr><td align=right height=35>
									<table border=0 cellpadding=0 cellspacing=0>
									<tr>
									   <td width=90></td>
										<td width=180 align=right>�̸� <input type=text name=name value="<?=$wiz_session[name]?>" onClick="memberCheck();" size=18 class="input"></td>
										<td width=80>&nbsp;<input type="image" src="/images/but_review_write.gif" border=0></a></td></tr>
									</table>
							</td></tr>
							</form>
							</table>
<?
}
?>