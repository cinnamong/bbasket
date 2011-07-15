<?
echo "<b>This is Result Page - brownbasket.com</b><br>";
echo "x_response_code       ->". $x_response_code         ."<BR>";
echo "x_response_subcode    ->". $x_response_subcode      ."<BR>";
echo "x_response_reason_code->". $x_response_reason_code  ."<BR>";
echo "x_response_reason_text->". $x_response_reason_text  ."<BR>";
echo "x_auth_code           ->". $x_auth_code             ."<BR>";
echo "x_avs_code            ->". $x_avs_code              ."<BR>";
echo "x_trans_id            ->". $x_trans_id              ."<BR>";
echo "x_invoice_num         ->". $x_invoice_num           ."<BR>";
echo "x_description         ->". $x_description           ."<BR>";
echo "x_amount              ->". $x_amount                ."<BR>";
echo "x_Currency_code       ->". $x_Currency_code          ."<BR>";
echo "x_method              ->". $x_method                ."<BR>";
echo "x_type                ->". $x_type                  ."<BR>";
echo "x_cust_id             ->". $x_cust_id               ."<BR>";
echo "x_first_name          ->". $x_first_name            ."<BR>";
echo "x_last_name           ->". $x_last_name             ."<BR>";
echo "x_company             ->". $x_company               ."<BR>";
echo "x_address             ->". $x_address               ."<BR>";
echo "x_city                ->". $x_city                  ."<BR>";
echo "x_state               ->". $x_state                 ."<BR>";
echo "x_zip                 ->". $x_zip                   ."<BR>";
echo "x_country             ->". $x_country               ."<BR>";
echo "x_phone               ->". $x_phone                 ."<BR>";
echo "x_fax                 ->". $x_fax                   ."<BR>";
echo "x_email               ->". $x_email                 ."<BR>";
echo "x_ship_to_first_name  ->". $x_ship_to_first_name    ."<BR>";
echo "x_ship_to_last_name   ->". $x_ship_to_last_name     ."<BR>";
echo "x_ship_to_company     ->". $x_ship_to_company       ."<BR>";
echo "x_ship_to_address     ->". $x_ship_to_address       ."<BR>";
echo "x_ship_to_city        ->". $x_ship_to_city          ."<BR>";
echo "x_ship_to_state       ->". $x_ship_to_state         ."<BR>";
echo "x_ship_to_zip         ->". $x_ship_to_zip           ."<BR>";
echo "x_ship_to_country     ->". $x_ship_to_country       ."<BR>";
echo "x_tax                 ->". $x_tax                   ."<BR>";
echo "x_duty                ->". $x_duty                  ."<BR>";
echo "x_freight             ->". $x_freight               ."<BR>";
echo "x_tax_exempt          ->". $x_tax_exempt            ."<BR>";
echo "x_po_num              ->". $x_po_num                ."<BR>";
echo "x_md5_hash            ->". $x_md5_hash              ."<BR>";
echo "x_cvv2_resp_code      ->". $x_cvv2_resp_code        ."<BR>";

/if ( $x_response_code == "1")  {
	echo "<html><script>self.location.replace('https://www.brownbasket.com/shop/order_save.php?pay_method=PC&result=00&goodname=$x_invoice_num')</script></html>";
}
 else {
	 echo "<html><script>self.location.replace('https://www.brownbasket.com/shop/order_pay.php?orderid=$x_invoice_num&pay_method=PC&frurl=authorize&return_code=$x_response_reason_code&return_text=$x_response_reason_text')</script></html>";
}*/
?>
