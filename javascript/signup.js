const form = document.querySelector(".signup form"),
  continueBtn = document.querySelector(".button input");
console.log("hirapara");
form.onsubmit = (e) => {
  e.preventDefault();
  console.log("hirapara sagar");
};
continueBtn.onclick = () => {
  console.log("clicked");
  let xhr = new XMLHttpRequest(); // creating a xml object
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = () => {
    if (xhr.status === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        document.InnerHtml = data;
      }
    }
  };
  xhr.send();
};
