
<script type="text/javascript" defer> 
$(()=>{
  if ( self !== top ) {
    console.debug('Roundcube theme : in iframe');
    $('#layout').addClass('in-iframe');
  }else{
    const date = new Date();
    const cacheBuster = `${date.getFullYear()}${date.getMonth()+1}${date.getDate()}`;
    $("<script>").attr("type","text/javascript").attr("src","/commun/extended-uportal-header.min.js?c="+cacheBuster).appendTo("body");
    $("<script>").attr("type","text/javascript").attr("src","/commun/extended-uportal-footer.min.js?c="+cacheBuster).appendTo("body");
  }
});
</script>