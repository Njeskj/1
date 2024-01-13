// script.js
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
  
    form.addEventListener("submit", function (event) {
      if (!usernameInput.value || !passwordInput.value) {
        event.preventDefault(); // Impede o envio do formulário caso haja campos em branco
        showError("Por favor, preencha todos os campos.");
      }
    });
  
    function showError(message) {
      const errorMessage = document.createElement("p");
      errorMessage.className = "error-message";
      errorMessage.textContent = message;
  
      const existingErrorMessage = document.querySelector(".error-message");
      if (existingErrorMessage) {
        existingErrorMessage.remove(); // Remove mensagens de erro existentes
      }
  
      form.appendChild(errorMessage);
    }
  });
  