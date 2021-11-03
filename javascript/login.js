console.log("hirapara sagar");
const form = document.querySelector(".signup form"),
  continueBtn = document.querySelector(".button input"),
  error_txt = document.querySelector(".error-txt");

form.onsubmit = (e) => {
  e.preventDefault();
  console.log("hirapara sagar");
};
continueBtn.onclick = () => {
  let xhr = new XMLHttpRequest(); // creating a xml object
  xhr.open("POST", "php/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "success") {
          location.href = "users.php";
        } else {
          error_txt.innerHTML = data;
          error_txt.style.display = "block";
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};
