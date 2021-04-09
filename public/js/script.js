// search sugestion vendor/product

// event ketika keyword di tulis
$("#keyword").on("keyup keydown", function () {
  var keyword = $(this).val();
  console.log(keyword);
  const suggWrapper = document.querySelector(".search-suggestion");
  if (keyword) {
    suggWrapper.classList.remove("d-none");
    cari(keyword);
    $("body").on("click", () => {
      suggWrapper.classList.add("d-none");
    });
  } else {
    suggWrapper.classList.add("d-none");
  }
});

function cari(keyword) {
  // var html = "";
  const suggVendor = document.querySelector(".suggestVendor");
  const suggProduct = document.querySelector(".suggestProduct");
  const elNoData = $(".js-no-data")[0];

  $.ajax({
    type: "post",
    data: keyword,
    url: "/search?keyword=" + keyword,
    success: function (res) {
      // console.log(JSON.parse(res));
      let result = "";
      let products,
        vendors = Array();
      result = JSON.parse(res);
      console.log(result);
      vendors = result["vendors"];
      products = result["products"];
      let listVendor = "";
      let listProduct = "";
      let noData = "";
      if (vendors.length > 0) {
        suggVendor.classList.remove("d-none");
        listVendor += `<h5 class="font-weight-bold">Vendors</h5>`;
      }
      vendors.forEach((vendor) => {
        listVendor += `
        <a href="/vendor/${vendor["slug"]}" class="list-group-item list-group-item-action">
          <div class="row align-items-center">
              <div class="col-2">
                  <img class="img-product-suggestion rounded-circle" src="/img/vendors/logo/${vendor["vendor_logo"]}">
              </div>
              <div class="col-10">
                  <p class="d-none d-lg-inline small mb-0">${vendor["vendor_name"]}</p>
              </div>
          </div>
      </a>
        `;
      });

      if (products.length > 0) {
        suggProduct.classList.remove("d-none");
        listProduct += `<h5 class="font-weight-bold">Products</h5>`;
      }
      products.forEach((product) => {
        listProduct += `
        <a href="/${product["slug"]}" class="list-group-item list-group-item-action">
            <div class="row align-items-center">
                <div class="col-2">
                    <img class="img-product-suggestion rounded-circle" src="/img/products/main-img/${product["product_main_image"]}">
                </div>
                <div class="col-10">
                    <p class="d-none d-lg-inline small  mb-0">${product["product_name"]}</p>
                </div>
            </div>
        </a>
        `;
      });
      // tambahkan hr
      listVendor += "<hr>";
      listProduct += "<hr>";

      if (products.length == 0 && vendors.length == 0) {
        suggProduct.classList.add("d-none");
        suggVendor.classList.add("d-none");
        noData += `
        <div class="col-12">
          <p class="small mb-0">Can't find any product \"${keyword}\"  </p>
        </div>
        `;
      }

      suggVendor.innerHTML = listVendor;
      suggProduct.innerHTML = listProduct;
      elNoData.innerHTML = noData;
      console.log(suggVendor);
    },
  });
}

$navbar = $(".navbar.main");
$(window).scroll(function (e) {
  if ($(document).scrollTop() > 0) {
    $navbar.addClass("shadow");
  } else {
    $navbar.removeClass("shadow");
  }
});

// SweetAllert2
const flashData = $(".flash-data").data("flashdata");

if (flashData) {
  Swal.fire({
    icon: "success",
    title: "RH Wedding Planner",
    text: flashData,
    showConfirmButton: false,
    timer: 1500,
  });
}
// tiny Rich text editor
tinymce.init({
  selector: ".tiny-textarea",
  plugins: "advlist autolink lists link image charmap print preview hr anchor pagebreak",
  toolbar_mode: "floating",
});

// hide & unhide
let visible = document.querySelectorAll(".visible");
// console.log(visible);
visible.forEach((e) => {
  e.addEventListener("click", () => {
    e.classList.toggle("fa-eye");
    e.classList.toggle("fa-eye-slash");
    let password = e.nextElementSibling;
    if (password.getAttribute("type") == "password") {
      password.setAttribute("type", "text");
    } else {
      password.setAttribute("type", "password");
    }
  });
});

// preview img
function previewImg(input, preview) {
  const upload = document.querySelector(`#${input}`);
  const imgPreview = document.querySelector(`.${preview}`);
  const content = new FileReader();
  console.log(imgPreview);
  content.readAsDataURL(upload.files[0]);
  content.onload = function (e) {
    imgPreview.src = e.target.result;
    imgPreview.classList.add("object-fit");
  };
}

$("#sidebarToggle").on("click", () => {
  $(".no-toggled").removeClass("toggled");
});

$(".btn-delete").on("click", function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "You will delete this data",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $(this).unbind("click").click();
    }
  });
});

// btn reject order
let btnReject = document.querySelectorAll(".btn-reject");
btnReject.forEach((e) => {
  e.addEventListener("click", () => {
    let id = $(e).data("id");
    console.log(id);
    $("#detail-id").val(id);
  });
});
