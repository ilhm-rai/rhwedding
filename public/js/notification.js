function getItemInUserNotificationLimit() {
  $.ajax({
    url: "/notification/item/get",
    type: "GET",
    success: function (data) {
      var html = "";
      var items = JSON.parse(data);
      console.log(items);
      const notifItem = $(".js-count-notif-item");

      if (items.length > 0) {
        notifItem.removeClass("d-none");
        notifItem.html(items.length);
      } else {
        notifItem.addClass("d-none");
      }

      var itemsLimit = items.splice(0, 5);

      itemsLimit.forEach((item) => {
        html += `
                <a class="dropdown-item d-flex align-items-center" href="${item["link"]}">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">${item["created_at"]}</div>
                        <span class="">${item["message"]}</span>
                    </div>
                </a>
                    `;
      });

      $(".js-item-notification").html(html);
    },
  });
}
