$navbar = $( ".navbar.main" );
$( window ).scroll( function ( e ) {
  if ( $( document ).scrollTop() > 0 ) {
    $navbar.addClass( "shadow" );
  } else {
    $navbar.removeClass( "shadow" );
  }
} );

// SweetAllert2
const flashData = $( ".flash-data" ).data( "flashdata" );

if ( flashData ) {
  Swal.fire( {
    icon: "success",
    title: "RH Wedding Planner",
    text: flashData,
    showConfirmButton: false,
    timer: 1500,
  } );
}

$( "#sidebarToggle" ).on( "click", () => {
  $( ".no-toggled" ).removeClass( "toggled" );
} );

$( ".btn-delete" ).on( "click", function ( e ) {
  e.preventDefault();
  Swal.fire( {
    title: "Are you sure?",
    text: "You will delete this data",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  } ).then( ( result ) => {
    if ( result.isConfirmed ) {
      $( this ).unbind( "click" ).click();
    }
  } );
} );
