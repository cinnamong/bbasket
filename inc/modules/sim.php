<!--

###########################################################
#                                                         #
#  D O C U M E N T A T I O N                              #
#                                                         #
#  This code sample has been successfully tested on       #
#  third-party web servers and performed according to     #
#  documented Advanced Integration Method (AIM)           #
#  standards.                                             #
#                                                         #
#  Last updated September 2004.                           #
#                                                         #
#  For complete and freely available documentation,       #
#  please visit the Authorize.Net web site at:            #
#                                                         #
#  http://www.authorizenet.com/support/guides.php         #
#                                                         #
###########################################################

###########################################################
#                                                         #
#  D I S C L A I M E R                                    #
#                                                         #
#  WARNING: ANY USE BY YOU OF THE SAMPLE CODE PROVIDED    #
#  IS AT YOUR OWN RISK.                                   #
#                                                         #
#  Authorize.Net provides this code "as is" without       #
#  warranty of any kind, either express or implied,       #
#  including but not limited to the implied warranties    #
#  of merchantability and/or fitness for a particular     #
#  purpose.                                               #
#                                                         #
#                                                         #
###########################################################

###########################################################
#                                                         #
#  P R E R E Q U I S I T E S                              #
#                                                         #
#  Basically, all the required code to generate 1) a      #
#  unique fingerprint, using the HMAC-MD5 algorithm,      #
#  and 2) a compatible timestamp is included in the       #
#  sample code provided in this file and the additional   #
#  files that should have accompanied this file:          #
#  - simdata.php                                          #
#  - simlib.php                                           #
#                                                         #
#  However, you need to verify that the required PHP      #
#  MHASH extension is available; otherwise, you will      #
#  not be able to generate the required fingerprint.      #
#                                                         #
#  The required MHASH extension comes with PHP and        #
#  requires no additional cost.                           #
#                                                         #
#  Most web hosting providers install this extension      #
#  along with PHP; however, in some circumstances, you    #
#  may have to enable it yourself or ask your web host    #
#  to enable it for you.                                  #
#                                                         #
#  PLEASE UNDERSTAND that it is impossible for us to      #
#  anticipate any and all possible web server             #
#  configurations.                                        #
#                                                         #
#  If you cannot get the sample code to work due to an    #
#  unknown server configuration or missing PHP extension, #
#  and if you cannot figure out how to test for the       #
#  availability of the required extension, consider       #
#  hiring a professional web developer or server          #
#  administrator.                                         #
#                                                         #
#  Authorize.Net is unable to assist you with web         #
#  server troubleshooting.                                #
#                                                         #
#                                                         #
###########################################################

###########################################################
#                                                         #
#  C O N T A C T    I N F O R M A T I O N                 #
#                                                         #
#  For specific questions,                                #
#  please contact Authorize.Net's Integration Services:   #
#                                                         #
#  integration at authorize dot net                       #
#                                                         #
#  Please remember that we cannot support individual      #
#  e-commerce developers with programming problems and    #
#  other issues that could be easily solved by referring  #
#  to the available reference materials.                  #
#                                                         #
###########################################################

###########################################################
#                                                         #
#  S I M   I N   A   N U T S H E L L                      #
#                                                         #
###########################################################
#                                                         #
#  1. You gather some basic transaction data on your web  #
#  site.                                                  #
#                                                         #
#  2. Using a standard HTML form, you submit the required #
#  information to Authorize.Net, by posting the form data #
#  to a specific URL on Authorize.Net’s secure server.    #
#                                                         #
#  3. On Authorize.Net’s secure server, you collect all   #
#  the financial information on the SIM Payment Form.     #
#                                                         #
#  4. When the transaction has been completed, you may    #
#  either re-direct the user to another web page on your  #
#  web site or complete the transaction on                #
#  Authorize.Net’s secure server.                         #
#                                                         #
#                                                         #
###########################################################

###########################################################
#                                                         #
#  H A R D   C O D E D   V A L U E S                      #
#                                                         #
#  The purpose of this sample code is to demonstrate how  #
#  a basic SIM transaction works.                         #
#                                                         #
#  For this purpose, we have hard-coded a number of       #
#  values, to expedite your testing and integration       #
#  efforts.                                               #
#                                                         #
#  Please, pay special attention to values, such as       #
#  your log-in ID, transaction key, amount, description,  #
#  etc. that may need to be changed throughout this       #
#  code sample and/or its associated include files.       #
#                                                         #
#                                                         #
###########################################################

-->


<HTML>
<HEAD>
<TITLE>Authorize.Net PHP SIM Example</TITLE>
</HEAD>
<BODY>
<H3>Final Order</H3>

<?
$x_Description = $HTTP_GET_VARS['x_Description'];
$x_Amount = $HTTP_GET_VARS['x_Amount'];

// *** IF YOU WANT TO PASS CURRENCY CODE do the following: ***
// Assign the transaction currency (from your shopping cart) to $currencycode variable

if ($x_Description == "")
	$x_Description = $HTTP_POST_VARS['x_Description'];

if ($x_Amount == "")
	$x_Amount = $HTTP_POST_VARS['x_Amount'];

?>

Description: <?=$x_Description?>  <BR />
Total Amount : <?=$x_Amount?>

<BR /><BR />
<!--FORM action="https://test.authorize.net/gateway/transact.dll" method="POST"---->
<!-- Uncomment the line ABOVE for test accounts or BELOW for live merchant accounts -->
<FORM action="https://secure.authorize.net/gateway/transact.dll" method="POST">
<?

// authdata.php contains the loginid and x_tran_key.
// You may use a more secure alternate method to store these (like a DB / registry).

include ("simdata.php");
include ("simlib.php");

$amount = $x_Amount;

// Trim $ sign if it exists
if (substr($amount, 0,1) == "$") {
	$amount = substr($amount,1);
}
// I would validate the Order here before generating a fingerprint

// Seed random number for security and better randomness.

srand(time());
$sequence = rand(1, 1000);
// Insert the form elements required for SIM by calling InsertFP
$ret = InsertFP ($loginid, $x_tran_key, $amount, $sequence);

//*** IF YOU ARE PASSING CURRENCY CODE uncomment and use the following instead of the InsertFP invocation above  ***
//$ret = InsertFP ($loginid, $x_tran_key, $amount, $sequence, $currencycode);

// Insert rest of the form elements similiar to the legacy weblink integration
echo ("<input type=\"hidden\" name=\"x_description\" value=\"" . $x_Description . "\">\n" );
echo ("<input type=\"hidden\" name=\"x_login\" value=\"" . $loginid . "\">\n");
echo ("<input type=\"hidden\" name=\"x_amount\" value=\"" . $amount . "\">\n");

// *** IF YOU ARE PASSING CURRENCY CODE uncomment the line below *****
//echo ("<input type=\"hidden\" name=\"x_currency_code\" value=\"" . $currencycode . "\">\n");

?>
<INPUT type="hidden" name="x_show_form" value="PAYMENT_FORM">
<INPUT type="hidden" name="x_test_request" value="TRUE">
<INPUT type="submit" value="Accept Order">
</FORM>
</BODY>
</HTML>
