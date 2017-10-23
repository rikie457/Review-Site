/**
 * Created by Tycho on 7-4-2017.
 */

function verwijder(id) {

  $.ajax({
    type: "POST",
    url: '../afhandeling/verwijderrecensie.php',
    data: {'verwijderid': id},
    success: function (data) {
      $('#beheerdertable').load(document.URL + ' #beheerdertable');
    },
    error: function (data) {
    }
  })
}


function bewerk(tid) {
  $('.bewerknop' + tid).parent().siblings().each(
    function () {

      if ($(this).hasClass('bewerkbaar')) {

        var t = $(this).text();
        var id = $(this).attr('id');
        $(this).html($('<input id="' + id + '" />', {'value': t}).val(t));
        $('#verandergedeelte' + tid).html("<a id='opslaanknop" + tid + "' onclick='opslaan(" + tid + ")'><span class='glyphicon glyphicon-ok' aria-hidden='true'> </span></a>" +
          "<a id='stopknop" + tid + "' onclick='stop(" + tid + ")'> <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>");
        $(this).removeAttr('id');
      }
    });
}
function stop(tid) {

  $('#stopknop' + tid).parent().siblings().children().each(
    function () {
      $(this).parent().attr('id', $(this).attr('id'));
    });

  $('#stopknop' + tid).parent().siblings().each(
    function () {
      $(this).children().attr('id');

      if ($(this).find('input').length) {

        $(this).text($(this).find('input').val());
        $('#verandergedeelte' + tid).html("<a class='bewerknop" + tid + "' onclick='bewerk(" + tid + ")'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>");
      } else {

      }
    });
}
function opslaan(tid) {

  var id = $('#gebruikerid' + tid).text();
  var voornaam = $('#voornaaminput' + tid).val();
  var achternaam = $('#achternaaminput' + tid).val();
  var email = $('#emailinput' + tid).val();
  var score = $('#scoreinput' + tid).val();
  var afbeeldingpath = $('#afbeeldingpathinput' + tid).val();
  var berichtonderwerp = $('#berichtonderwerpinput' + tid).val();
  var berichttekst = $('#berichttekstinput' + tid).val();

  $.ajax({
    type: "POST",
    url: '../afhandeling/bewerkrecensie.php',
    data: {
      'id': id,
      'voornaam': voornaam,
      'achternaam': achternaam,
      'email': email,
      'score': score,
      'afbeeldingpath': afbeeldingpath,
      'berichtonderwerp': berichtonderwerp,
      'berichttekst': berichttekst
    },
    success: function (data) {

    },
    error: function (data) {
    }
  });

  $('#opslaanknop' + tid).parent().siblings().children().each(
    function () {
      $(this).parent().attr('id', $(this).attr('id'));
    });

  $('#opslaanknop' + tid).parent().siblings().each(
    function () {
      if ($(this).find('input').length) {
        $(this).text($(this).find('input').val());
        $('#verandergedeelte' + id).html("<a class='bewerknop" + tid + "' onclick='bewerk(" + id + ")'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>");
        $('#beheerdertable').load(document.URL + ' #beheerdertable');
      }


    });
  $('#beheerdertable').load(document.URL + ' #beheerdertable');
}
// tycho is homo
function resetCounter() {
  $.ajax({
    type: "POST",
    url: '../afhandeling/resetcounter.php',
    data: {},
    success: function (data) {

    },
    error: function (data) {
    }
  })
}

