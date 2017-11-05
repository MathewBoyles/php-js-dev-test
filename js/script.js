$(document).ready(function() {
  $('#loader').fadeOut();

  $('#load button').click(function(ev) {
    if ($(this).is('[disabled]')) return;

    app.loadUsers(1);
    ev.preventDefault();
  });

  $('#usersPagination > select').on('change', function() {
    app.loadUsers($(this).val());
  });
});

var app = {};

app.info = function(userID) {
  $('#userInfoModal .modal-load').show();
  $('#userInfoModal #userInfo > div').remove();
  $('#userInfoModal').modal();

  $.ajax({
    contentType: 'json',
    url: 'ajax/user-info.php',
    data: {
      id: userID
    },
    type: 'GET',
    success: function(data) {
      if (data.status == 'error') {
        alert(data.message ? data.message : 'An error has occurred');
        return;
      }

      var compiledTemplate = Template7.compile($('#userInfoTmpl').html());
      var html = compiledTemplate(data.data);
      $('#userInfoTmpl').after(html);

      $('#userInfoModal .modal-load').hide();
    },
    error: function() {
      alert('An error has occurred');
    }
  });
};

app.loadUsers = function(pageID) {
  $("#usersList").remove();
  $("#load").show();

  $('#load button')
    .attr('disabled', 'disabled')
    .text('Loading...');

  $.ajax({
    contentType: 'json',
    url: 'ajax/users-list.php',
    data: {
      page: pageID
    },
    type: 'GET',
    success: function(data) {
      if (data.status == 'error') {
        alert(data.message ? data.message : 'An error has occurred');
        return;
      }

      var compiledTemplate = Template7.compile($('#usersListTmpl').html());
      var html = compiledTemplate({
        users: data.data
      });
      $('#usersListTmpl').after(html);

      $('#users tbody tr').each(function() {
        var userID = $(this).attr('data-user');

        $(this).find('[data-action]').each(function() {
          $(this).click(function() {
            app[$(this).attr('data-action')](userID);
          });
        });
      });

      $('#usersPagination').show();
      $('#usersPagination > select > option').remove();

      for (var i = 1; i <= data.page_count; i++) {
        $el = $('<option />');
        $el
          .text(i)
          .val(i);
        if (i == data.page) $el.attr('selected', 'selected');
        $('#usersPagination > select').append($el);
      }

      $('#load').hide();
    },
    error: function() {
      alert('An error has occurred');
    }
  });
};
