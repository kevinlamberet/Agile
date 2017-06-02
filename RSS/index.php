<html>
<head>
<script>
function showRSS(str) {
  if (str.length==0) {
    document.getElementById("rssOutput").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rssOutput").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getrss.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
<select onchange="showRSS(this.value)">
<option value="">Select an RSS-feed:</option>
<option value="google">Google News</option>
<option value="begeek">Be geek</option>
<option value="korben">Korben</option>
<option value="lemonde">Le Monde</option>
<option value="lefigaro">Le figaro</option>
<option value="01net">01.NET</option>
<option value="frandroid">FRAndroid</option>
<option value="thenextweb">The Next Web</option>
<option value="nbc">NBC News</option>
<option value="bbc">BBC News</option>
<option value="allocine">Allociné</option>
</select>
</form>
<br>
<div id="rssOutput">RSS-feed will be listed here...</div>
</body>
</html>
