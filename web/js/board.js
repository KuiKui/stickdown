$(document).ready(function() {
  $('#stuff_content').focus();
  $('.star').click(function(event) {
    var line = $(this).parent('tr').get(0);
    manageStar(line);
  });
  $('.check').click(function(event) {
    var line = $(this).parent('tr').get(0);
    manageCheck(line);
  });
  $('.delete').click(function(event) {
    var line = $(this).parent('tr').get(0);
    manageDelete(line);
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
    url: '/board/setStarred',
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

function manageCheck(line) {
  var stuffId = getIdFromHTMLId(line.id);
  var checked = ($(line).hasClass('checked')) ? 0 : 1;
  updateCheck(stuffId, checked);
}

function updateCheck(stuffId, checked) {
  $.ajax({
    type: "POST",
    url: '/board/setChecked',
    data: ({stuff_id: stuffId, checked: checked}),
    dataType: "json",
    cache: false,
    success: function(json) {
      var info = "";
      if(json != undefined && (info = eval(json)) != undefined && info.returnCode == 0) {
        if(json.checked) {
          $('#stuff-' + info.stuffId).addClass('checked');
        } else {
          $('#stuff-' + info.stuffId).removeClass('checked');
        }
      }
    }
  });
}

function manageDelete(line) {
  var stuffId = getIdFromHTMLId(line.id);
  if(confirm('Do you really want to delete this stuff ?')) {
    $.ajax({
      type: "POST",
      url: '/board/deleteStuff',
      data: ({stuff_id: stuffId}),
      dataType: "json",
      cache: false,
      success: function(json) {
        var info = "";
        if(json != undefined && (info = eval(json)) != undefined && info.returnCode == 0) {
          $('#stuff-' + info.stuffId).hide();
        }
      }
    });
  }
}

function getIdFromHTMLId(HTMLId) {
  return HTMLId.substring(HTMLId.indexOf('-', 0) + 1);
}
