<FORM name=inform action="https://secure.authorize.net/gateway/transact.dll" method=post>
<?

#$loginid = $shopinfo->oper_id;
$loginid = "brownbasket380";
$txnkey = "828j9dTzY5HG565q";

$amount = $total_price / (961.33);
include ("simlib.php");
if (substr($amount, 0,1) == "$") {
	$amount = substr($amount,1);
}
srand(time());
$sequence = rand(1, 1000);
$ret = InsertFP ($loginid, $txnkey, $amount, $sequence);

?>
<INPUT type=hidden name=x_description         value="<?=$namedisplay?>">
<INPUT type=hidden name=x_login               value="<?=$loginid?>">
<INPUT type=hidden name=x_amount              value="<?=$amount?>">
<!--INPUT type=hidden name=x_show_form           value="PAYMENT_FORM"-->
<INPUT type=hidden name=x_Version             value="3.0">
<input type=hidden name=x_Relay_URL           value="https://www.brownbasket.com/shop/authorize.php">
<input type=hidden name=x_method              value="PC">
<INPUT type=hidden name=x_Type                value="AUTH_CAPTURE">
<INPUT type=hidden name=x_Invoice_num         value="<?=$order_info->orderid?>">
<INPUT type=hidden name=x_Cust_ID             value="<?=$order_info->send_id?>">

<INPUT type=hidden name=x_First_Name          value="<?=$order_info->send_name?>">
<INPUT type=hidden name=x_Last_Name           value="">
<INPUT type=hidden name=x_Address             value="<?=$order_info->send_address?>">
<INPUT type=hidden name=x_City                value="">
<INPUT type=hidden name=x_State               value="">
<INPUT type=hidden name=x_Zip                 value="<?=$order_info->send_post?>">
<INPUT type=hidden name=x_Country             value="US">
<INPUT type=hidden name=x_Phone               value="<?=$order_info->send_tphone?>">
<INPUT type=hidden name=x_Fax                 value="">
<INPUT type=hidden name=x_Email               value="<?=$order_info->send_email?>">

<INPUT type=hidden name=x_Ship_to_first_name  value="<?=$order_info->rece_name?>">
<INPUT type=hidden name=x_Ship_to_last_name   value="">
<INPUT type=hidden name=x_Ship_to_address     value="<?=$order_info->rece_address?>">
<INPUT type=hidden name=x_Ship_to_city        value="">
<INPUT type=hidden name=x_Ship_to_state       value="">
<INPUT type=hidden name=x_Ship_to_zip         value="<?=$order_info->rece_post?>">
<INPUT type=hidden name=x_Ship_to_country     value="KR">
<INPUT type=hidden name=x_Ship_to_company     value="">
<input type=hidden name=x_Email_Customer      value="True">
<INPUT type=hidden name=x_Test_Request        value="False">

<table width="90%" border="0" cellspacing="0" cellpadding="0" height="30">
<tr><td bgcolor="f5f5f5" width=180>Credit Card Number </td><td> <INPUT type=text name=x_card_num  value="">
</td></tr>
<tr><td bgcolor="f5f5f5">Credit Card Expiration Date </td><td> <INPUT type=text name=x_exp_date value="" size=4>(MMYY)
<tr><td bgcolor="f5f5f5">CCV Code </td><td> <INPUT type=text name=x_card_code value="" size=4> 크레딧카드 뒷면 사인을 써넣는 부분에 있는 번호중 끝에있는 세 번호를 입력
</td></tr>
<tr>
	<td colspan=2 height=3 background="/images/point1.gif"></td>
</tr>
<tr>
	<td height=20></td>
</tr></table>
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
      <td colspan="4" height="3"></td>
      </tr>
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


<font color=white>4007000000027</font>
</form>
