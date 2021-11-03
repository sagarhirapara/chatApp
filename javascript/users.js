const userList = document.querySelector(".user-list");
const searchBar = document.querySelector(".users .search input");

searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  if (searchTerm != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest(); // creating a xml object
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        userList.innerHTML = data;
        // userList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
};

setInterval(() => {
  let xhr = new XMLHttpRequest(); // creating a xml object
  xhr.open("POST", "php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        // console.log(data);
        if (!searchBar.classList.contains("active")) {
          userList.innerHTML = data;
        }
      }
    }
  };
  xhr.send();
}, 500);
console.log("hii");
