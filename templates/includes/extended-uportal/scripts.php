
<script type="text/javascript" defer> 
$(()=>{
  if ( self !== top ) {
    console.debug('Roundcube theme : in iframe');
    $('#esco-header').hide();
    $('#esco-footer').hide();
  }else{
    const date = new Date();
    const cacheBuster = `${date.getFullYear()}${date.getMonth()+1}${date.getDate()}`;
    $('#esco-header').show();
    $('#esco-footer').show();
    $("<script>").attr("type","text/javascript").attr("src","/commun/extended-uportal-header.min.js?c="+cacheBuster).appendTo("body");
    $("<script>").attr("type","text/javascript").attr("src","/commun/extended-uportal-footer.min.js?c="+cacheBuster).appendTo("body");
  }
});
</script>