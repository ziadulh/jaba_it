function publish(id,token, url) {
    $.post( url,{_token: token, id: id}, function( data ) {
        
      });
}