var $storehours_inputs = $( ".js-storehours input" );

$storehours_inputs.change(function( event ) {
    $( ".js-storehours textarea" ).val( JSON.stringify(storehours_inputs.serializeObject()) );
    event.preventDefault();
});