
<script>
var popup = window.open("test.html","mypopup","width=500,height=300");
popup.document.getElementById("player").someFunction();

var popup = window.open('','mypopup');
// now popup is known again
popup.document.getElementById("player").someFunction();

</script>