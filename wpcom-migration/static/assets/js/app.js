(function () {
  const toggleFoldable = function (foldableElement) {
    foldableElement.classList.toggle("wpcom-migration-foldable--expanded");
  };

  const checkInputGroupCheckboxes = function (inputGroupElement, checked) {
    inputGroupElement
      .querySelectorAll('input[type="checkbox"]')
      .forEach((checkboxElement) => {
        checkboxElement.checked = checked;
      });
  };

  document
    .querySelectorAll(".wpcom-migration-foldable__header")
    .forEach((element) => {
      element.addEventListener("click", () =>
        toggleFoldable(element.parentElement)
      );
    });

  document
    .querySelectorAll("input.wpcom-migration-select-all")
    .forEach((checkboxElement) => {
      checkboxElement.addEventListener("change", () => {
        const inputGroupElement = checkboxElement.closest(
          ".wpcom-migration-input-group"
        );

        checkInputGroupCheckboxes(inputGroupElement, checkboxElement.checked);
      });
    });

  // Display the Cancel Migration modal
  const cancelButton = document.querySelector(
    ".wpcom-migration-form button.cancel-migration"
  );
  const cancelModal = document.querySelector(
    ".wpcom-migration-modal-container"
  );
  if (cancelButton && cancelModal) {
    cancelButton.addEventListener("click", (e) => {
      e.preventDefault();

      cancelModal.classList.add("wpcom-migration-modal--visible");
    });
  }

  document
    .querySelectorAll(
      ".wpcom-migration-modal .wpcom-migration-modal-buttons > button"
    )
    .forEach((element) => {
      element.addEventListener("click", () => {
        element
          .closest(".wpcom-migration-modal-container")
          .classList.remove("wpcom-migration-modal--visible");
      });
    });
})();
