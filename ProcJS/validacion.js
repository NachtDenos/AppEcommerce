document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formLogin");
  
    form.addEventListener("submit", function (event) {
      resetValidationMessages();
      const emailInput = document.getElementById("emailLog");
      const passInput = document.getElementById("passLog");
  
      let isValid = true;
  
      if (!isValidEmail(emailInput.value)) {
        showValidationMessage("warningsEmail", "Ingrese un correo electrónico válido.");
        isValid = false;
      }

  
      if (passInput.value.length < 8) {
        showValidationMessage("warningsPass", "La contraseña es incorrecta.");
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