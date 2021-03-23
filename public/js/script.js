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
  selector: "textarea",
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
