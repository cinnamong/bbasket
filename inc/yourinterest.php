<script>
String[] cookie_list = {"clist1", "clist2", "clist3", "clist4", "clist5"}; // HashMap�� �� key name
 Cookie[] cookies = request.getCookies(); // ���� �ִ� ��Ű�� �޾Ƽ�
 HashMap map = new HashMap();
 boolean check = false; // �ߺ�Ȯ��üũ 
 for(int i=0; i<cookies.length-1; i++){
  map.put(cookie_list[i], cookies[i].getValue()); // map�� ����
 }

 if(!map.containsValue(request.getParameter("idx"))){ // �ߺ����� x
  for(int i=map.size()-1; i>0 && i<=cookie_list.length; i--){ // ����������
   if(i!=cookies.length){ // �ǳ��� ����
    map.remove(cookie_list[i]); // ��ĭ�� �ڷ�
    map.put(cookie_list[i], (String)map.get(cookie_list[i-1])); // �̵�
   }
  }
 } else{ // �ߺ����� o
  for(int i=map.size()-1; i>0 && i<=cookie_list.length; i--){ // ����������
   if(i!=cookies.length){ // �ǳ��� ����
    if(((String)map.get(cookie_list[i])).equals(request.getParameter("idx"))){ // �ߺ�����üũ
     check = true; // Ȯ�� �� 
    }
    if(check){ // �ߺ��� �߰� �� ������
     map.remove(cookie_list[i]); // ��ĭ�� �ڷ�
     map.put(cookie_list[i], (String)map.get(cookie_list[i-1])); // �̵�
    }
   }
  }
 }
 map.put(cookie_list[0], request.getParameter("idx")); // �� �տ� ���� �� ��ǰ ����

 for(int i=0; i<map.size(); i++){
  Cookie cookie = new Cookie(cookie_list[i], (String)map.get(cookie_list[i])); // ��Ű����
  response.addCookie(cookie);
 }

 for(int i=0; i<cookies.length-1; i++){
  out.println(cookies[i].getName() + ": " + cookies[i].getValue()+"<br>"); // ��ŰȮ��
 }
</script>

 

