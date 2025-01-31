$(document).ready(function () {
  $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });
});

function nextStep(step) {
  document.getElementById('modalStep' + (step - 1)).style.display = 'none';
  document.getElementById('modalStep' + step).style.display = 'block';
}

function prevStep(step) {
  document.getElementById('modalStep' + (step + 1)).style.display = 'none';
  document.getElementById('modalStep' + step).style.display = 'block';
}

function openForm() {
  document.getElementById("popupForm").style.display = "flex";
  document.getElementById("modalStep1").style.display = "block";
}

function closeForm() {
  document.getElementById("popupForm").style.display = "none";
  document.querySelectorAll(".popup-form").forEach(form => form.style.display = "none");
}