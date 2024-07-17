// Forgot password sweet alert start
document.getElementById("forgot").addEventListener("click", function () {
  Swal.fire({
    title: "Forgot Password?",
    html: "If you forget your password, you can call the admin number at <strong>123-456-789</strong>.",
    icon: "info",
    confirmButtonColor: "#1e1e1e",
    confirmButtonText: "OK",
  });
});
// Forgot password sweet alert ends

// Show password in login start
function showPassword() {
  var see = document.getElementById("login-password");
  if (see.type === "password") {
    see.type = "text";
  } else {
    see.type = "password";
  }
}
// Show password in login ends

// Show password in register start
function showPasswordAndConfirmPassword() {
  var password = document.getElementById("signup-password");
  var confirmPassword = document.getElementById("signup-repassword");

  if (password.type === "password" || confirmPassword.type === "password") {
    password.type = "text";
    confirmPassword.type = "text";
  } else {
    password.type = "password";
    confirmPassword.type = "password";
  }
}
// Show password in register ends

// Login Validation Start
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("login-form");
  const usernameInput = document.getElementById("login-username");
  const passwordInput = document.getElementById("login-password");

  function createErrorElement(message) {
    const errorElement = document.createElement("div");
    errorElement.className = "error-message";
    errorElement.style.color = "#ff5252";
    errorElement.style.fontSize = "12px";
    errorElement.style.marginTop = "5px";
    errorElement.textContent = message;
    return errorElement;
  }

  function validateInput(input, validationFunction, errorMessage) {
    const parent = input.parentElement;
    const label = parent.querySelector("label");
    const existingError = parent.querySelector(".error-message");

    if (!validationFunction(input.value)) {
      input.style.borderColor = "#ff5252";
      label.style.color = "#ff5252";
      if (!existingError) {
        parent.appendChild(createErrorElement(errorMessage));
      }
      return false;
    } else {
      input.style.borderColor = "";
      label.style.color = "";
      if (existingError) {
        parent.removeChild(existingError);
      }
      return true;
    }
  }

  function validateUsername(value) {
    return !value.includes(" ");
  }

  function validatePassword(value) {
    return value.length >= 6;
  }

  usernameInput.addEventListener("input", function () {
    validateInput(this, validateUsername, "Username cannot contain spaces");
  });

  passwordInput.addEventListener("input", function () {
    validateInput(
      this,
      validatePassword,
      "Password must be at least 6 characters long"
    );
  });

  form.addEventListener("submit", function (e) {
    let isValid = true;

    isValid =
      validateInput(
        usernameInput,
        validateUsername,
        "Username cannot contain spaces"
      ) && isValid;
    isValid =
      validateInput(
        passwordInput,
        validatePassword,
        "Password must be at least 6 characters long"
      ) && isValid;

    if (!isValid) {
      e.preventDefault();
    }
  });
});
// Login Validation Ends

// Register Validation Start
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("register-form");
  const usernameInput = document.getElementById("signup-username");
  const passwordInput = document.getElementById("signup-password");
  const repasswordInput = document.getElementById("signup-repassword");

  function createErrorElement(message) {
    const errorElement = document.createElement("div");
    errorElement.className = "error-message";
    errorElement.style.color = "#ff5252";
    errorElement.style.fontSize = "12px";
    errorElement.style.marginTop = "5px";
    errorElement.textContent = message;
    return errorElement;
  }

  function validateInput(input, validationFunction, errorMessage) {
    const parent = input.parentElement;
    const label = parent.querySelector("label");
    const existingError = parent.querySelector(".error-message");

    if (!validationFunction(input.value)) {
      input.style.borderColor = "#ff5252";
      label.style.color = "#ff5252";
      if (!existingError) {
        parent.appendChild(createErrorElement(errorMessage));
      }
      return false;
    } else {
      input.style.borderColor = "";
      label.style.color = "";
      if (existingError) {
        parent.removeChild(existingError);
      }
      return true;
    }
  }

  function validateUsername(value) {
    return !value.includes(" ");
  }

  function validatePassword(value) {
    return value.length >= 6;
  }

  function validateRepassword(value) {
    return value === passwordInput.value;
  }

  usernameInput.addEventListener("input", function () {
    validateInput(this, validateUsername, "Username cannot contain spaces");
  });

  passwordInput.addEventListener("input", function () {
    validateInput(
      this,
      validatePassword,
      "Password must be at least 6 characters long"
    );
    validateInput(
      repasswordInput,
      validateRepassword,
      "Passwords do not match"
    );
  });

  repasswordInput.addEventListener("input", function () {
    validateInput(this, validateRepassword, "Passwords do not match");
  });

  form.addEventListener("submit", function (e) {
    let isValid = true;

    isValid =
      validateInput(
        usernameInput,
        validateUsername,
        "Username cannot contain spaces"
      ) && isValid;
    isValid =
      validateInput(
        passwordInput,
        validatePassword,
        "Password must be at least 6 characters long"
      ) && isValid;
    isValid =
      validateInput(
        repasswordInput,
        validateRepassword,
        "Passwords do not match"
      ) && isValid;

    if (!isValid) {
      e.preventDefault();
    }
  });
});
// Register Validation Ends
