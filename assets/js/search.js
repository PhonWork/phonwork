function searchFunction() {
  // Declare variables
  var input, filter, ul, li, a, i;
 
  input = window.document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  
  ul = window.document.getElementById("hiddenMenu");
  li = ul.getElementsByTagName("li");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

function init() {
	document.getElementById("mySearch").value = value
	/*var textBox = document.getElementById("menuSearch");
	textBox.addEventListener("keyup", function (event) {
 
            // Checking if key pressed is ENTER or not
            // if the key pressed is ENTER
            // click listener on button is called
            if (event.keyCode == 13) {
                var str = textBox.value;
            }
    });*/
	searchFunction()
}

const params = new Proxy(new URLSearchParams(window.location.search), {
  get: (searchParams, prop) => searchParams.get(prop),
});
// Get the value of "some_key" in eg "https://example.com/?some_key=some_value"
let value = params.q; // "some_value"
if (value) {
	window.onload = init;
	console.log(value)
}

