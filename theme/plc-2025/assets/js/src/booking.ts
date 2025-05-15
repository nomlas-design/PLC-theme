document.addEventListener('DOMContentLoaded', () => {
  const courseTitle = document.querySelector('.booking-form__schedule__header')
    ?.textContent;
  const courseInput = document.querySelector<HTMLInputElement>(
    'input[name="course"]'
  );

  const scheduleTitle = document.querySelector('.schedule__header__hidden')
    ?.textContent;
  const scheduleInput = document.querySelector<HTMLInputElement>(
    'input[name="session"]'
  );
  if (courseInput && courseTitle) {
    courseInput.value = courseTitle.trim();
  }
  if (scheduleInput && scheduleTitle) {
    scheduleInput.value = scheduleTitle.trim();
  }
});
