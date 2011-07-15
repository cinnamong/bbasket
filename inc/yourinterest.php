<script>
String[] cookie_list = {"clist1", "clist2", "clist3", "clist4", "clist5"}; // HashMap에 들어갈 key name
 Cookie[] cookies = request.getCookies(); // 현재 있는 쿠키를 받아서
 HashMap map = new HashMap();
 boolean check = false; // 중복확인체크 
 for(int i=0; i<cookies.length-1; i++){
  map.put(cookie_list[i], cookies[i].getValue()); // map에 대입
 }

 if(!map.containsValue(request.getParameter("idx"))){ // 중복숫자 x
  for(int i=map.size()-1; i>0 && i<=cookie_list.length; i--){ // 마지막부터
   if(i!=cookies.length){ // 맨끝은 제외
    map.remove(cookie_list[i]); // 한칸씩 뒤로
    map.put(cookie_list[i], (String)map.get(cookie_list[i-1])); // 이동
   }
  }
 } else{ // 중복숫자 o
  for(int i=map.size()-1; i>0 && i<=cookie_list.length; i--){ // 마지막부터
   if(i!=cookies.length){ // 맨끝은 제외
    if(((String)map.get(cookie_list[i])).equals(request.getParameter("idx"))){ // 중복숫자체크
     check = true; // 확인 후 
    }
    if(check){ // 중복이 발견 된 곳부터
     map.remove(cookie_list[i]); // 한칸씩 뒤로
     map.put(cookie_list[i], (String)map.get(cookie_list[i-1])); // 이동
    }
   }
  }
 }
 map.put(cookie_list[0], request.getParameter("idx")); // 맨 앞에 현재 본 상품 삽입

 for(int i=0; i<map.size(); i++){
  Cookie cookie = new Cookie(cookie_list[i], (String)map.get(cookie_list[i])); // 쿠키굽기
  response.addCookie(cookie);
 }

 for(int i=0; i<cookies.length-1; i++){
  out.println(cookies[i].getName() + ": " + cookies[i].getValue()+"<br>"); // 쿠키확인
 }
</script>

 

