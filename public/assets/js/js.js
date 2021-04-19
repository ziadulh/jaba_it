const { forEach } = require("lodash");

function publish(id,token, url) {
    $.post( url,{_token: token, id: id}, function( data ) {
        
      });
}

function publish_fee(id,token, url) {
  $.post( url,{_token: token, id: id}, function( data ) {
      
    });
}

function getSection() {
  $('select[name="section"]').empty();
  $('select[name="section"]').append(
    '<option data-select2-id="30" value=null>---select section---</option>'+
    '<option data-select2-id="30" value="a">A</option>'+
    '<option data-select2-id="31" value="b">B</option>'+
    '<option data-select2-id="32" value="c">C</option>'
  );
}

function getStudent (token, url) {
  $('select[name="student"]').empty();
  var data = {_token : token, cls: $('select[name="class"]').val(), section : $('select[name="section"]').val()};
  $.post(url, data, function( dt ) {
    $.each(dt, function(key,value){
      
      $('select[name="student"]').append(
        '<option data-select2-id="32" value="'+value.id+'">'+value.first_name + " "+value.last_name+'</option>'
      );

    });
  });
}