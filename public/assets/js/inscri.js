
  function validateField(field) {
    if (field.value.trim()) {
      field.classList.remove('is-invalid');
      field.classList.add('is-valid');
    } else {
      field.classList.remove('is-valid');
      field.classList.add('is-invalid');
    }
  }
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const requiredFields = form.querySelectorAll('input[required], select[required]');
    const mdp = document.getElementById('mdp');
    const mdpok = document.getElementById('mdpok');

    requiredFields.forEach(field => {
      field.addEventListener('input', function () {
        validateField(field);
      });
    });

    mdp.addEventListener('input', checkPasswords);
    mdpok.addEventListener('input', checkPasswords);

    function checkPasswords() {
      if (mdp.value.trim() && mdp.value === mdpok.value) {
        mdp.classList.remove('is-invalid');
        mdpok.classList.remove('is-invalid');
        mdp.classList.add('is-valid');
        mdpok.classList.add('is-valid');
      } else {
        mdp.classList.remove('is-valid');
        mdpok.classList.remove('is-valid');
        if (mdp.value || mdpok.value) {
          mdp.classList.add('is-invalid');
          mdpok.classList.add('is-invalid');
        }
      }
    }

    form.addEventListener( function (e) {
      e.preventDefault();
      let isValid = true;

      requiredFields.forEach(field => {
        if (!field.value.trim()) {
          field.classList.add('is-invalid');
          isValid = false;
        } else {
          field.classList.remove('is-invalid');
          field.classList.add('is-valid');
        }
      });


      if (mdp.value !== mdpok.value || !mdp.value.trim()) {
        mdp.classList.add('is-invalid');
        mdpok.classList.add('is-invalid');
        isValid = false;
      }

      if (isValid) {
        window.location.href = 'conexion.blade.php';
      }
    });
  });

