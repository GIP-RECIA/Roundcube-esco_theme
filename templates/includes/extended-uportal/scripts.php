
<script type="text/javascript" defer> 
$(()=>{
  const date = new Date();
  const cacheBuster = `${date.getFullYear()}${date.getMonth()+1}${date.getDate()}`;
  $("script").attr("type","text/javascript").attr("src","/commun/extended-uportal-header.min.js?c="+cacheBuster).appendTo("head");
  $("script").attr("type","text/javascript").attr("src","/commun/extended-uportal-footer.min.js?c="+cacheBuster).appendTo("head");
});
</script>