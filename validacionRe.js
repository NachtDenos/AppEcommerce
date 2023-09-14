document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formRegister");
  
    form.addEventListener("submit", function (event) {
      resetValidationMessages();
      const emailInput = document.getElementById("emailR");
      const nameuInput = document.getElementById("nameuR");
      const passInput = document.getElementById("passR");
      const rolInput = document.getElementById("rolR");
      const nameInput = document.getElementById("nameR");
      const dateInput = document.getElementById("dateR");
      const genderInput = document.getElementById("genderR");
      const imagenInput = document.getElementById("imagenR");
  
      let isValid = true;
  
      if (!isValidEmail(emailInput.value)) {
        showValidationMessage("warningsEmail", "Ingrese un correo electrónico válido.");
        isValid = false;
      }
  
      if (nameuInput.value.length < 3) {
        showValidationMessage("warningsNameU", "El nombre de usuario debe tener al menos 3 caracteres.");
        isValid = false;
      }
  
      if (passInput.value.length < 8) {
        showValidationMessage("warningsPass", "La contraseña debe tener al menos 8 caracteres.");
        isValid = false;
      }
  
      if (rolInput.value === "") {
        showValidationMessage("warningsRol", "Selecciona un rol.");
        isValid = false;
      }
  
      if (nameInput.value === "") {
        showValidationMessage("warningsName", "Este campo es obligatorio.");
        isValid = false;
      }
  
      if (dateInput.value === "") {
        showValidationMessage("warningsDate", "Este campo es obligatorio.");
        isValid = false;
      }
  
      if (genderInput.value === "") {
        showValidationMessage("warningsGender", "Selecciona un género.");
        isValid = false;
      }
  
      if (imagenInput.value === "") {
        showValidationMessage("warningsImagen", "Selecciona una imagen de perfil.");
        isValid = false;
      }
  
      if (!isValid) {
        event.preventDefault();
      }
    });
  
    function isValidEmail(email) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
  
    function resetValidationMessages() {
      const warningElements = document.querySelectorAll(".warnings");
      warningElements.forEach((element) => (element.textContent = ""));
    }
  
    function showValidationMessage(id, message) {
      const warningElement = document.getElementById(id);
      warningElement.textContent = message;
    }
  });