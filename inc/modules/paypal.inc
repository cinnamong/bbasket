	<form name=inform action="https://www.paypal.com/cgi-bin/webscr" method="post" >
	<input type="hidden" name="cmd"           value="_ext-enter">
	<input type="hidden" name="redirect_cmd"  value="_xclick">
	<input type="hidden" name="business"      value="<?=$shopinfo->paypal_id?>">
	<input type="hidden" name="item_name"     value="<?=$orderid?>">
	<input type="hidden" name="amount"        value="<?=$row->total_allprice?>">
	<input type="hidden" name="return"        value="<?=$home_dir?>/product/cart.php?active=orderdone">
	<input type="hidden" name="notify_url"    value="<?=$home_dir?>/product/paypal-ipn.php">
	<input type="hidden" name="cancel_return" value="<?=$home_dir?>/product/cart.php">
	
	<input type="hidden" name="first_name"    value="<?=$ordnm?>">
	<input type="hidden" name="last_name"     value="<?=$ordlnm?>">
	<input type="hidden" name="address1"      value="<?=$address?>">
	<input type="hidden" name="address2"      value="">
	<input type="hidden" name="city"          value="<?=$bcity?>">
	<input type="hidden" name="state"         value="<?=$bstate?>">
	<input type="hidden" name="zip"           value="<?=$zip1?>">
	<input type="hidden" name="night_phone_a" value="<?=$tel1?>">
	<input type="hidden" name="night_phone_b" value="<?=$tel2?>">
	<input type="hidden" name="night_phone_c" value="<?=$tel3?>">

    <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr><td colspan="4" height="3"></td></tr>
    <tr> 
    	<td colspan="4" align="right">
      	<input type="image" src="/images/but_pay.gif">
      	<a href="/"><img src="/images/but_cancel.gif"border="0"></a>
      	</td>
    </tr>
    <tr> 
      <td colspan="4" bgcolor="#DEDEDE"></td>
    </tr>
    <tr> 
      <td colspan="4" height="10"></td>
    </tr>
    </table>
	</form>
