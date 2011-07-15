<?
$sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdno, wp.model, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc where wp.new = 'Y' and wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc limit 4";
$result = mysql_query($sql) or error(mysql_error());
?>
                  <table width="720" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td style="padding:0 0 10 0">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td valign="top" style="padding:15 0 10 0">
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
<?
$i=0;
while(($row = mysql_fetch_object($result))){
if($i!=4) {
$bordercheck=" style='BORDER-right: #DDDDDD 0px solid'";
}
else {
$bordercheck="";
}

if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
else $row->prdimg_R = "/prdimg/$row->prdimg_R";

$row->prdname = cut_str($row->prdname,27);

?>
                                  <td width="20%" align="center" valign="top" <?=$bordercheck?>>
                                  <table width="130" border="0" cellspacing="0" cellpadding="3">
                                      <tr> 
                                        <td align="center"><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>"><img src="<?=$row->prdimg_R?>" width="100" height="100" border="0"></a></td>
                                      </tr>
                                      <tr> 
                                        <td align="center" valign="top" style="padding:10 0 5 0"><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>"><font color="#895b38"><?=cut_str($row->prdno,40)?><br>
                                          <?=cut_str($row->model,30)?></font></a></td>
                                      </tr>
                                      <tr> 
                                        <td align="center" class="price" style="padding:5 0 5 0"><?=number_format($row->sellprice)?> ¿ø</td>
                                      </tr>
                                    </table></td>
<?
$i++;
}
?>

                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
