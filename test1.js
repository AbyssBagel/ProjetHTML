// Assuming you have a form with an id of "myForm"
const form = document.getElementById("myForm");

// Add an event listener to listen for form submission
form.addEventListener("submit", (event) => {
  event.preventDefault(); // Prevent the default form submission

  // Get the form data
  const formData = new FormData(form);

  // Access the form fields by their names
  const username = formData.get("username");
  const email = formData.get("email");
  const password = formData.get("password");

  // Use fetch API to send the form data to the server
  fetch("send_server_new_user_info.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    console.log("Server response:", data);
  })
  .catch(error => {
    console.error("Error:", error);
  });
});
