const keyword = document.querySelector("#search input");
const btnCari = document.querySelector("#search button");
const container = document.getElementById("container");

// event ketika keyword ditulis
keyword.addEventListener("keyup", function () {
  // buat objek ajax
  const xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = function () {
    // reaadystate 4  ketika suday redy, status 200 sumber siap
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  // eksekusi ajax
  xhr.open("GET", "ajax/data.php?keyword=" + keyword.value, true); // true = asyncronous
  xhr.send();
});
