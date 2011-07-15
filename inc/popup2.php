            <SCRIPT language=javascript>
<!--
function readCookie(cookiename)
{
 var Found = false;

 cookiedata = document.cookie;
 if ( cookiedata.indexOf(cookiename) >= 0 ){
   Found = true;
 }

 return Found;
}

function setCookie( name, value, expiredays )
{
 var todayDate = new Date();
 todayDate.setDate( todayDate.getDate() + expiredays );
 document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}
//-->
</SCRIPT>

            <SCRIPT language=javascript>
<!--
  function popupClose7(){
    setCookie("popupDayClose7", "true", 1);
    popup7.style.display = 'none';
  }
//-->
</SCRIPT>

            <!---DIV id=popup7 
            style="LEFT: 100px; WIDTH: 400px; POSITION: absolute; TOP: 150px; HEIGHT: 453px">
            <TABLE cellSpacing=0 cellPadding=0 border=0>
              <TBODY>
              <TR>
                <TD>
                  <TABLE onclick="javascript:document.location = '';" 
                  cellSpacing=0 cellPadding=0 border=0>
                    <TBODY>
                    <TR>
                      <TD><IMG src="images/05100612531044.gif"> 
                    </TD></TR></TBODY></TABLE>
                  <TABLE height=25 cellSpacing=0 cellPadding=0 width="100%" 
                  bgColor=#909090 border=0>
                    <TBODY>
                    <TR>
                      <TD align=right><FONT color=#ffffff>오늘하루 열지않음</FONT> 
                        <INPUT onclick=popupClose7(); type=checkbox>&nbsp; 
                    </TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV---->
            <SCRIPT language=javascript>
<!--
if(readCookie('popupDayClose7')){
  popup7.style.display = 'none';
}
-->
</SCRIPT>