const form = document.querySelector(".typing-area"),
  inputField = form.querySelector(".input-field"),
  sendBtn = form.querySelector("button"),
  chat_box = document.querySelector(".chat-box");
form.onsubmit = (e) => {
  e.preventDefault();
};

chat_box.onmouseenter = () => {
  chat_box.classList.add("active");
};
chat_box.onmouseleave = () => {
  chat_box.classList.remove("active");
};
sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest(); // creating a xml object
  xhr.open("POST", "php/insertChat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        inputField.value = "";
        if (!chat_box.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};

setInterval(() => {
  let xhr = new XMLHttpRequest(); // creating a xml object
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        // console.log(data);
        chat_box.innerHTML = data;
        if (!chat_box.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
}, 500);

function scrollToBottom() {
  chat_box.scrollTop = chat_box.scrollHeight;
}
