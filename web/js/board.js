$(document).ready(function() {
  $('#stuff_content').focus();
  $('.star').click(function(event) {
    var line = $(this).parent('tr').get(0);
    manageStar(line);
  });
});

function manageStar(line) {
  var stuffId = getIdFromHTMLId(line.id);
  var starred = ($(line).hasClass('starred')) ? 0 : 1;
  updateStar(stuffId, starred);
}

function updateStar(stuffId, starred) {
  $.ajax({
    type: "POST",
    url: '/frontend_dev.php/board/setStarred',
    data: ({stuff_id: stuffId, starred: starred}),
    dataType: "json",
    cache: false,
    success: function(json) {
      var info = "";
      if(json != undefined && (info = eval(json)) != undefined && info.returnCode == 0) {
        if(json.starred) {
          $('#stuff-' + info.stuffId).addClass('starred');
        } else {
          $('#stuff-' + info.stuffId).removeClass('starred');
        }
      }
    }
  });
}

function getIdFromHTMLId(HTMLId) {
  return HTMLId.substring(HTMLId.indexOf('-', 0) + 1);
}
