var xhr = new XMLHttpRequest();
var demo = document.getElementById("demo");
xhr.onreadystatechange = function (){

    if(this.readyState == 4 && this.status==200){
        demo.innerHTML = this.response;
        console.log(this.response);
        
        
    }else if( this.readyState==4 && this.status==404){
        alert("Erreur 404");
    }
}
xhr.open("GET","getlong.php","true");
xhr.responseType="text";
xhr.send();

