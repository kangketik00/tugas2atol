document.addEventListener("DOMContentLoaded", function () {
  // Start Date Picker Initialization
  const elemsDatepicker = document.querySelectorAll(".datepicker");
  var d = new Date();
  var yearNow = d.getFullYear();
  const optionDatepicker = {
    autoClose: true,
    format: "yyyy-mm-dd",
    yearRange: [1950, yearNow],
    changeMonth: true,
    changeYear: true,
  };

  const instancesDatePicker = M.Datepicker.init(
    elemsDatepicker,
    optionDatepicker
  );
  // END Date Picker Initialization

  // Start Select Initialization
  const elemsSelect = document.querySelectorAll("select");
  const instancesSelectForm = M.FormSelect.init(elemsSelect);
  // End Select Initialization

  const elemsModal = document.querySelectorAll(".modal");
  const instanceModal = M.Modal.init(elemsModal);
});
function handlingModalDelete(event) {
  const nip = event.target.dataset.nip;
  const getInputElement = document.getElementById("delete-nip");
  console.log(getInputElement);
  getInputElement.value = nip;
}
