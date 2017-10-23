/**
 * Created by Tycho on 7-4-2017.
 */
if (typeof(keuze = "undefined")) {
  filter(0)
}
;

$("#filteren").change(function () {
  var keuze = $(this).find(":selected").val();
  filter(keuze)
});

function filter(verzenddata) {
  $.ajax({
    type: "POST",
    url: "./afhandeling/filter.php",
    data: {value: verzenddata},
    success: function (data) {
      $("#berichten").html(data);
    }
  });
}