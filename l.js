$(window).on('load', function() {
  $('#searchForm input').on('keyup', function(e) {
    var textinput = $(this).val()
    if (textinput) {
      $.ajax({
        type: 'GET',
        url: '/feeds/posts/summary',
        data: {
          'max-results': 10,
          'alt': 'json',
          'q': textinput
        },
        dataType: 'jsonp',
        success: function(data) {
          $('.results,.clear-text').removeClass('hidden')
          $('.results').empty()
          if (data.feed.entry) {
            for (var i = 0; i < data.feed.entry.length; i++) {
              for (var j = 0; j < data.feed.entry[i].link.length; j++) {
                if (data.feed.entry[i].link[j].rel == 'alternate') {
                  var postUrl = data.feed.entry[i].link[j].href;
                  break;
                }
              }
              var postTitle = data.feed.entry[i].title.$t;
              $('.results').append('<li><a href=' + postUrl + ' title="' + postTitle + '">' + postTitle + '</li>');
            }
          } else {
            $('.results').addClass('hidden')
          }
        }
      })
    } else {
      $('.results,.clear-text').addClass('hidden')
    }
  })
  $('.clear-text').click(function() {
    $('#searchForm input').val('')
    $('.results,.clear-text').addClass('hidden')
    $('.results').empty()
  })
})
