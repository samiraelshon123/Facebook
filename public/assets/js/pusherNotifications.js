
var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('new-notification');
  channel.bind('facebook', function(data) {
    var auth_id = $('#auth_id').val();
    console.log(data.user_id);
    console.log(parseInt(auth_id));
    if(data.user_id !== parseInt(auth_id)){
    var existingNotifications = notifications.html();
    var newNotificationHtml =

        `<a href=""><div class="media-body"><h6 class="media-heading text-right">${data.user_name} comment on your post</h6>
       
        <small style="direction: ltr;"><p class="media-meta text-muted text-right" style="direction: ltr;">
        ${data.date} ${data.time} </p> </small></div></a><hr>`;

    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
    }
});
