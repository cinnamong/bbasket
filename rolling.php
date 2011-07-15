 
<html> 
<head></head> 

<body> 
    <script language="Javascript"> 


            /****************************************************************************** 
            * 만든목적: JS 롤링; 
            * 만든이:허웅 [comefeel]; 
            * 제작시간:총 7~8시간; 
            * JS 경력:현재 6개월차 -..-; 초허접; 
            * last update:2007.01 
            * igear.co.kr 도와준분 [zeldign] 플머 12년차; 
            * e-mail : igearmall.co.kr <comefeel@daum.net> comefeel@comefeel.com 도 있지만 현재 안됨 ; 
            * 이것을 사용할려고 할시에 주석을 지우면 사용할수 없음; 
            * 허접한 소스를 보고 -_-+ 머라고 하면 쫏아감; 
            * ** 
            */ 

            var roll_Class=function(){this.initialize.apply(this,arguments);} 
            roll_Class.prototype={ 

            initialize:function(){ 

            this.className=arguments[0]?arguments[0]:null; 
            this.foundit(arguments[1],'',false); 
            this.contents=new Array('0'); 
            this.contents_delay=null; 
            this.nowdelay=null; 
            this.foundit( 
            this.roll.childNodes,this.foundvalue , 
            function(rt,that){ 

            if(that.constrain_size !== null) that.foundit(rt.childNodes,'IMG',function(rt,that){rt.style[(this.moving != 'left' ? 'width' : 'height')] = that.constrain_size;}); 
            that.contents_delay=that.contents[that.contents.length]=that.contents_delay+-rt[(that.moving=='left'?'offsetWidth':'offsetHeight')];}); 

            { 
            this.rollHeight=this.proll.style[(this.moving=='left'?'width':'height')]=Math.abs(this.contents[this.contents.length-1]); 
            this.roll.appendChild(this.roll.cloneNode(true)); 
            };}, 


            foundit:function(tg,n){ 

            var temp=new Array(); 

                for(var v in tg) 
                    switch(typeof arguments[2]){ 
                    case 'object':if(arguments[2].initialize(tg[v],n,this)==true) return; else break; 
                    case 'function':if(tg[v].nodeName==n) arguments[2](tg[v],this); break; 
                    case 'boolean':this[v]=tg[v]; break; 
                    default:if(tg[v].nodeName==n) return tg[v]; 
                } 

            return temp;}, 

            inaction:function(time){ 

            this.roll.style[this.moving]=time=time < 0 ?(this.fall==false && time <= -this.rollHeight?0:time):-this.rollHeight,null; 
            this.foundit(this.contents,time,{initialize:function(rt,vrt,that){if(Math.abs(rt - vrt) <(that.fast==false?that.tick:that.ftick)){that.roll.style[that.moving]=rt; that.nowdelay=that.fast==true?that.lengthen:that.delay; that.fast=false; return true;} else that.nowdelay=that.lengthen;}}); 
            {var ticks=this.fast==true?this.ftick:this.tick;} 
            this.control=setTimeout(this.className+".inaction("+(parseInt(this.roll.style[this.moving])+(this.fall==true?ticks:-ticks))+");",this.nowdelay);}, 

            stop:function(){ 

            this.temp=parseInt(this.roll.style[this.moving]); 
            clearTimeout(this.control);}    }; 

    </script> 


    <!-- 가로롤링 셈플 --> 

    <table> 
        <tr> 

            <td width="3" height="115" background="http://sportbox.co.kr/images/left_move2.gif" style="padding:0px 0px 0px 15px;cursor:pointer" style="cursor:pointer"  onclick="width_class.fall=false;width_class.fast=true;"></td> 
            <td> 

            <div id="parent_rolltable" name="parent_rolltable" style='overflow:hidden;border:1px solid #000000;' onmouseover="width_class.stop();" onmouseout="width_class.inaction(width_class.temp);"> 
                <nobr id="rolltable" name="rolltable" style="position:relative;" ><span><img src="http://sportbox.co.kr/skinwiz/layout/sportbox/images/brand_08.gif" ></span><span><img src="http://sportbox.co.kr/skinwiz/layout/sportbox/images/brand_08.gif" ></span><span><img src="http://sportbox.co.kr/skinwiz/layout/sportbox/images/brand_08.gif" ></span><span><img src="http://sportbox.co.kr/skinwiz/layout/sportbox/images/brand_08.gif" ></span></nobr> 
            </div> 


            </td><td width="3" height="115" background="http://sportbox.co.kr/images/right_move2.gif" style="padding:0px 0px 0px 15px;cursor:pointer"  onclick="width_class.fall=true;width_class.fast=true;"></td> 
            </td> 
        </tr> 
    </table> 




    <br /> 


    <!-- 세로롤링 셈플 --> 

    <table border="0" cellpadding="0" cellspacing="0"> 

            <tr> 
                <td align="center"><img src="http://insetup.igear.biz/shop/common/img/bt_ps_today.gif" width="80" height="27" alt="" style="cursor:pointer"  onclick="height_class.fall=false;height_class.fast=true;"/></td> 
            </tr> 

            <tr> 
                <td align="center"> 
                    <img src="http://insetup.igear.biz/shop/common/img/bt_ps_prev.gif" width="25" height="8" alt="" style="cursor:pointer"  onclick="height_class.fall=false;height_class.fast=true;" /> 
                </td> 
            </tr> 

            <tr> 
                <td> 

                    <div id="parent_rolltable1" name="parent_rolltable1" style='overflow:hidden;text-overflow:ellipsis;border:1px solid #ffffff' onmouseover="height_class.stop();" onmouseout="height_class.inaction(height_class.temp);"> 
                        <nobr  id="rolltable1" name="rolltable1" style="position:relative;"> 



                                <div style="text-align:center;padding-bottom:5px;"> 
                                    <img src="http://www.jpboom.com/shop/img/skyscraper/sign.gif" border="0"> 
                                </div> 
                                <div style="text-align:center;padding-bottom:5px;"> 
                                    <img src="http://www.jpboom.com/shop/img/skyscraper/card.gif" border="0"> 
                                </div> 
                                <div style="text-align:center;padding-bottom:5px;"> 
                                    <img src="http://www.jpboom.com/shop/img/skyscraper/10persale_scbanner.gif" border="0"> 
                                </div> 
                                <div style="text-align:center;padding-bottom:5px;"> 
                                    <img src="http://www.jpboom.com/shop/img/skyscraper/afterboard_scbanner.gif" border="0"> 
                                </div> 
                                <div style="text-align:center;padding-bottom:5px;"> 
                                    <img src="http://www.jpboom.com/shop/img/skyscraper/100perguide_scbanner.gif" border="0"> 
                                </div> 


                        </nobr> 
                    </div> 


                </td> 
            </tr> 

            <tr> 
                <td align="center"> 
                    <img src="http://insetup.igear.biz/shop/common/img/bt_ps_next.gif" width="25" height="8" alt="" style="cursor:pointer"  onclick="height_class.fall=true;height_class.fast=true;" /> 
                </td> 
            </tr> 
            <tr> 
                <td height="20" align="center" valign="middle" bgcolor="#75BD2F" style="cursor:pointer"  onclick="height_class.fall=true;height_class.fast=true;"> 

                </td> 
            </tr> 
            <tr> 
                <td align="center"><img src="http://insetup.igear.biz/shop/common/img/img_ps_bottom.gif" width="85" height="5" alt=""  /></td> 
            </tr> 
          </table> 






        <!-- 디버그 

        <table> 
        <tr> 
        <td> 
        <iframe id="scv" name="scv" width="700" height="1000"></iframe> 
        </td> 
        </tr> 
        </table>--> 

        <script language="Javascript"> 

            { 

                // 가로롤링 설정키 
                var roll_init=new Array(); 
                roll_init.constrain_size=null;                            // 전체의 높이값 [기본 default] 
                roll_init.tick=1;                                                    // 움직이는 칸수 
                roll_init.ftick=10;                                                // 빠른 움직이는 칸수 
                roll_init.lengthen=10;                                        // 1초당 움직이는 속도 
                roll_init.delay=1000;                                            // 잠시멈춤 속도 
                roll_init.fall=true;                                                // 이동 반대로 설정 ~ 
                roll_init.fast=false;                                            // 빠른속도:true 는 on 이며,false 는 off 이다. 
                roll_init.foundvalue =    'SPAN';                                // Nobr 내부엘리멘트 
                roll_init.moving='left';                                         // 상하좌우 움직임 설정 
                roll_init.roll=document.getElementById('rolltable');                                        // roll 
                roll_init.proll=document.getElementById('parent_rolltable');                            // proll 

            }; 

            { 

                // 가롤롤링 선언부분 

                var width_class=new roll_Class('width_class',roll_init); 
                width_class.inaction(); 

            }; 


            { 

                // 세로롤링 설정키 
                var roll_init1=new Array(); 
                roll_init1.constrain_size=null;                            // 전체의 넓이값 [기본 default] 
                roll_init1.tick=1;                                                    // 움직이는 칸수 
                roll_init1.ftick=10;                                                // 빠른 움직이는 칸수 
                roll_init1.lengthen=10;                                        // 1초당 움직이는 속도 
                roll_init1.delay=1000;                                            // 잠시멈춤 속도 
                roll_init1.fall=true;                                                // 이동 반대로 설정 ~ 
                roll_init1.fast=false;                                            // 빠른속도:true 는 on 이며,false 는 off 이다. 
                roll_init1.foundvalue =    'DIV';                                // Nobr 내부엘리멘트 
                roll_init1.moving='top';                                         // 상하좌우 움직임 설정 
                roll_init1.roll=document.getElementById('rolltable1');                                        // roll 
                roll_init1.proll=document.getElementById('parent_rolltable1');                            // proll 
            }; 

            { 

                // 세로롤링 선언부분 
                var height_class=new roll_Class('height_class',roll_init1); 
                height_class.inaction(); 

            }; 

        </script> 



    </body> 
    </html> 

    // 사실 저한테는 정말 최고네요.. 
    // comefeel님 동의없이 스쿨에 올리는거 죄송합니다 -_-;; 
    // 코드보고 깜짝놀랬습니다 ; 정말 짧네요;; 전언제 저런실력을 ㅠㅠ;; 
    // IE / FF 다 되네여 ;;;  퍼가실때 ; 댓글 달아주세요 ;;  
