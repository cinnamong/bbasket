<script language=javascript>
<!--
var downLayerId;
var dropDegree = 5; //스크롤 속도
var doDirect;
var DirectTerm = 4000; //스크롤 지연시간
var curDropIdx = 0;



 //  화면 출력부분



<body onLoad="DirectDown();">
<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td>
  <div style="left:0px; overflow:hidden; width:635px; position:relative; top:0px; height:130px">
   <div id=DropHit style="left:0px; visibility:visible; width:635px; position:absolute; top:0px; height:130px">
    <table border=0 cellpadding=0 cellspacing=0 width=635>
    <tr>
     <td><img border=0 src=img/1.gif></td>
     <td><img border=0 src=img/2.gif></td>
     <td><img border=0 src=img/3.gif></td>
  <td><img border=0 src=img/4.gif></td>
  <td><img border=0 src=img/5.gif></td>
    </tr>
    </table>
   </div>
   <div id=DropHit style="left:0px; visibility:visible; width:635px; position:absolute; top:-200px; height:130px">
    <table border=0 cellpadding=0 cellspacing=0 width=635>
    <tr>
     <td><img border=0 src=img/6.gif></td>
  <td><img border=0 src=img/7.gif></td>
  <td><img border=0 src=img/8.gif></td>
  <td><img border=0 src=img/9.gif></td>
  <td><img border=0 src=img/10.gif></td>
    </tr>
    </table>
   </div>
  </div>
</td>
<td>
  <table cellspacing=0 cellpadding=0 width=13 border=0>
  <tr><td><a href="javascript:DirectUp()"><img border=0 src=img/up.gif></a></td></tr>
    <tr><td align=center><img height=100 width=1 src=binimg.gif></td></tr>
  <tr><td><a href="javascript:DirectDown()"><img border=0 src=img/down.gif></a></td></tr>
  </table>
</td>
</tr>
</table>


