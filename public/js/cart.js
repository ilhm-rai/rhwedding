function getItemInUserCartLimit() {
  $.ajax({
    url: "/cart/item/get",
    type: "GET",
    success: function (data) {
      var html = "";
      var items = JSON.parse(data);
      const cartItem = $(".js-count-cart-item");

      if (items.length > 0) {
        cartItem.removeClass("d-none");
        cartItem.html(items.length);
      } else {
        cartItem.addClass("d-none");
      }

      var itemsLimit = items.splice(0, 5);

      itemsLimit.forEach((item) => {
        html += `
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="dropdown-list-image">
                                <img class="rounded-circle object-fit" src="/img/products/main-img/${item["product_main_image"]}" alt="${item["product_name"]}">
                            </div>
                        </div>
                        <div>
                            <span class="font-weight-bold">${item["product_name"]}</span>
                            <div class="small text-gray-500">
                            ${parseInt(item["price"]).toLocaleString("id-ID", { style: "currency", currency: "IDR" })}
                            </div>
                        </div>
                    </a>
                `;
      });

      $(".js-item-cart").html(html);
    },
  });
}

function getItemInUserCart() {
  $.ajax({
    url: "/cart/item/get/group_by_vendor",
    type: "GET",
    success: function (data) {
      var html = "";
      var arrayItems = JSON.parse(data);

      if (arrayItems.length > 0) {
        arrayItems.forEach(function (items, index) {
          html += `
                        <div class="content-frame mb-4 shadow">
                        <p class="font-weight-bold">${items[index]["vendor_name"]} <span class="badge badge-geyser p-2"><i class="fas fa-gem"></i> Platinum Vendor</span></p>
                        <!-- card product list -->
                    `;

          items.forEach((item) => {
            html += `
                            <div class="content-frame mb-3 shadow p-0">
                                <div class="card card-product">
                                    <div class="row align-items-center">
                                        <div class="col-3">
                                            <img src="/img/products/main-img/${item["product_main_image"]}" class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body col-6 row">
                                            <div class="col-8">
                                                <h5 class="card-title">${item["product_name"]}</h5>
                                                <p class="main-product-price">
                                                ${parseInt(item["price"]).toLocaleString("id-ID", { style: "currency", currency: "IDR" })}
                                                </p>
                                                <p class="main-product-location">Tasikmalaya</p>
                                            </div>
                                            <div class="col-4">
                                                <p class="main-product-location mb-0">Service</p>
                                                <p class="main-product-price">${item["service_name"]}</p>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input js-process-into-transaction" id="${item["product_id"]}" ${item["process_into_transaction"] > 0 ? "checked" : ""}>
                                                <label class="custom-control-label" for="${item["product_id"]}">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="col-2 text-center">
                                            <a href="#" data-item-id="${item["product_id"]}" class="btn rounded-pill btn-action js-delete-item"><i class="fas fa-trash mr-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
          });

          html += `</div>`;
        });
      } else {
        html += '<div class="col-12 text-center"><p>Cart is empty.</p></div>';
      }

      $(".js-item-group-by-vendor").html(html);
      getItemInUserCartLimit();
    },
  }).then(function () {
    $(".js-delete-item").on("click", function (e) {
      e.preventDefault();
      var $el = $(e.currentTarget);
      var productId = $el.data("item-id");
      deleteItem(productId);
    });

    $(".js-process-into-transaction").on("click", function (e) {
      var $el = $(e.currentTarget);
      var slug = $el.attr("id");
      var processIntoTransaction = 0;

      if ($el.is(":checked")) {
        processIntoTransaction = 1;
      }

      processItemIntoTransaction(slug, processIntoTransaction);
    });
  });
}

function addToCart(productId) {
  $.ajax({
    url: "cart/item/add/" + productId,
    type: "POST",
    success: function (data) {
      console.log(data);
      if (data) {
        $(".js-count-cart-item").removeClass("d-none");
        $(".js-count-cart-item").html(data);
        getItemInUserCartLimit();
      }
    },
  });
}

function deleteItem(productId) {
  $.ajax({
    type: "DELETE",
    url: "/cart/item/delete/" + productId,
    success: function (param) {
      getItemInUserCart();
    },
  });
}

function processItemIntoTransaction(productId, processIntoTransaction) {
  $.ajax({
    type: "POST",
    url: `/cart/item/${productId}/process_into_transaction/${processIntoTransaction}`,
  });
}

function getCheckoutItem() {
  $.ajax({
    url: "/cart/item/get/group_by_vendor/checkout",
    type: "GET",
    success: function (data) {
      console.log(data);
      var html = "";
      var arrayItems = JSON.parse(data);
      var total = 0;

      if (arrayItems.length > 0) {
        arrayItems.forEach(function (items, index) {
          html += `
                    <div class="content-frame mb-4 shadow">
                        <p class="font-weight-bold">${items[index]["vendor_name"]} <span class="badge badge-geyser p-2"><i class="fas fa-gem"></i> Platinum Vendor</span></p>
                        <!-- card product list -->
                    `;

          items.forEach((item) => {
            total += parseInt(item["price"]);
            html += `
                            <div class="content-frame mb-3 shadow p-0">
                                <div class="card card-product">
                                    <div class="row align-items-center">
                                        <div class="col-3">
                                            <img src="/img/products/main-img/${item["product_main_image"]}" class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body col-9 row">
                                            <div class="col-6">
                                                <h5 class="card-title">${item["product_name"]}</h5>
                                                <p class="main-product-price">
                                                ${parseInt(item["price"]).toLocaleString("id-ID", { style: "currency", currency: "IDR" })}
                                                </p>
                                                <p class="main-product-location">Tasikmalaya</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="main-product-location mb-0">Service</p>
                                                <p class="main-product-price">${item["service_name"]}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
          });

          html += `</div>`;
        });
      } else {
        html += '<div class="col-12 text-center"><p>Cart is empty.</p></div>';
      }

      $(".js-item-checkout").html(html);
      $(".js-total").html(total.toLocaleString("id-ID", { style: "currency", currency: "IDR" }));
    },
  });
}
