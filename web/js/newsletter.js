$(document).ready(function() {
  var $controlGroup = $('#newsletter_email').parent().parent();
  $controlGroup.removeClass('error').removeClass('success');

  $('#newsletter_email').change(function(event) { checkEmail(); });
  $('#newsletter_email').keyup(function(event) { checkEmail(); });
  $('#newsletter_email').keypress(function(event) { if(event.keyCode == 13 && !checkEmail()) { event.preventDefault(); }});
  checkEmail();
  
  $(".meter > span").each(function() {
    $(this)
    .data("origWidth", $(this).width())
    .width(0)
    .animate({
      width: $(this).data("origWidth")
    }, 1200);
  });
});

function checkEmail() {
  var email = $('#newsletter_email').val();
  var readyForSubmit = false;
  var $controlGroup = $('#newsletter_email').parent().parent();

  if(email=="") {
    $controlGroup.removeClass('error').removeClass('success');
  } else if(isValidEmail(email)) {
    readyForSubmit = true;
    $controlGroup.removeClass('error').addClass('success');
  } else {
    //$controlGroup.removeClass('success').addClass('error');
  }

  return readyForSubmit;
}

function isValidEmail(email) {
  var emailRegexp = /^([a-zA-Z0-9_\.-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return (email!="") && emailRegexp.test(email);
}
