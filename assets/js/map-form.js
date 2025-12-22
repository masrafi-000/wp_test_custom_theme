document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("map_form");

  form.addEventListener("submit", function (e) {
    e.preventDefault(); 

    const formData = new FormData(form);

    const data = {
      name: formData.get("name"),
      email: formData.get("email"),
      phone: formData.get("phone"),
      country: formData.get("country"),
      state: formData.get("state"),
      city: formData.get("city"),
      zip: formData.get("zip"),
      road: formData.get("road"),
      house: formData.get("house"),
    };

    console.log("Form Submitted Data ↓", data);
    console.table(data);
  });
});