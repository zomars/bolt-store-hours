jQuery(document).ready(function() {
  var $storeHourFields = $( ".js-storehours input[type=text]" );

  $storeHourFields.each(function() {
    $(this).change(function(event) {
      /* Act on the event */
      var allFields = JSON.stringify($storeHourFields.serializeObject());
      $( ".js-storehours textarea" ).val(allFields);
      // console.log(allFields);
    });
  });

});
