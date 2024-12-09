document
  .getElementById("registerForm")
  .addEventListener("submit", function (e) {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    if (password !== confirmPassword) {
      e.preventDefault();
      alert("Password dan konfirmasi password tidak cocok!");
    }
  });
