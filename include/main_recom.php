<?
$sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdno, wp.model, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc where wp.recom = 'Y' and wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc";
$result = mysql_query($sql) or error(mysql_error());

					$total = mysql_num_rows($result);
					
					$no = 0;
					
					if($cat_info->prd_width == "") $cat_info->prd_width = "100";
					if($cat_info->prd_height == "") $cat_info->prd_height = "100";
					
               if($cat_info->prd_num == "" || $cat_info->prd_num <= 0) $cat_info->prd_num = 16;
               $rows = $cat_info->prd_num;
 	            $lists = 5;
             	$page_count = ceil($total/$rows);
             	if(!$page || $page > $page_count) $page = 1;
             	$start = ($page-1)*$rows;
             	if($start>1) mysql_data_seek($result,$start);
            	?>
            	  <table width="720" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td style="padding:0 0 10 0">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td valign="top" style="padding:15 0 10 0">
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                <td>


                  	<table border=0 cellpadding=0 cellspacing=0 width=692>
					      <?
			             	while(($row = mysql_fetch_object($result)) && $rows){
			             		$sp_img = "";

			            		if($no%4==0){
			            			if($no == 0) echo "<tr>";
			            			else echo "<tr><td height='1' background='/images/dot.gif' colspan='10'></td></tr>";
			            		}
			            ?>
			             <td width=6></td>
						    <td style="padding:15 5 15 5" valign=top>
								<table border=0 cellpadding=0 cellspacing=0 align=center>
								<tr>
								  <td valign=top>
									<table width=130 border=0 cellpadding=0 cellspacing=0>
									<tr><td align=center><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>&page=<?=$page?>"><img src="/prdimg/<?=$row->prdimg_R?>" border="0" width="<?=$cat_info->prd_width?>" height="<?=$cat_info->prd_height?>"></a></td></tr>
								<a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>&page=<?=$page?>"><tr><td align=center><font color="#895b38"><?=cut_str($row->prdno,40)?><br>
 									<?=cut_str($row->model,30)?></font></td></tr></a>
								<tr><td align=center class="price"><?=number_format($row->sellprice)?>원</td></tr>
									</table>
								  </td>
								</tr>
								</table>
						    </td>
						   <?
						   		$rows--;
						   		$no++;
								}
								
								if($total <= 0) echo "<tr><td align=center height=50>등록된 상품이 없습니다.</td></tr>";
							?>
							</table>

					    
					    </td>
					  </tr>
					</table>
					   </td>
					  </tr>
					</table>
					   </td>
					  </tr>
					</table>			

