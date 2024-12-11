function utiliserAjax(method,url,data,zoneAffichage){




var xhr;
try{
  xhr=new ActiveXObject();}
  catch(e){
    try{
      xhr=new ActiveXObject();}
      catch(e1){
        try{
          xhr=new XMLHttpRequest();}
          catch(e3){
            xhr=false;
          }

        }
  }}

xhr.onreadystatechange =function(){
  if(xhr.readyState==4){
    if(xhr.status==200){
      document.getElementById(zoneAffichage).innerHTML=xhr.responseText;
    }else
      alert("error code"+xhr.status);
    }
  }

if(method=="GET"){
  xhr.open("GET",url + "?" + data,true);
  xhr.send(null);
}
else if(method=="POST"){
  xhr.open("POST",url,true);
  xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xhr.send(data);
}
