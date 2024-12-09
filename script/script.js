document.addEventListener("DOMContentLoaded", function () {
  // Pastikan elemen yang akan diakses benar-benar ada di halaman
  const someElement = document.querySelector(".some-element"); // Ganti dengan elemen yang sesuai

  // Cek jika elemen tersebut ada sebelum mencoba mengaksesnya
  if (someElement) {
    someElement.classList.add("active"); // Contoh manipulasi class
  } else {
    console.warn("Elemen .some-element tidak ditemukan!");
  }

  // Jika Anda bekerja dengan form, pastikan form juga ada di halaman
  const form = document.querySelector("form");
  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      console.log("Form Submitted");
      form.submit();
    });
  }
});
