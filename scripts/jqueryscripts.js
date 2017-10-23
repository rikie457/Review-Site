/**
 * Created by Tycho on 23-2-2017.
 */
$("input[name='emailextra']").keyup(function () {
  if ($("input[name='emailextra']").val().length < 1) {
    $("#error").html('Email is leeg');
  }
  else {
    $.post('./afhandeling/valideeremail.php',
      {"email": $("input[name='emailextra']").val()},
      function (data) {
        if (data == false) {
          $("#error").html('Dit is geen goed email');
        } else {
          $("#error").html('');
        }
      }, 'json');
  }
});


$("#nieuwbericht").submit(function () {


  var formData = new FormData($(this)[0]);
  $.ajax({
    type: "POST",
    url: $(this).attr("action"),
    data: formData,
    cache: false,
    processData: false,
    success: function (data) {

    },
    error: function (data) {

    }
  })
});



