/**
 * Accordion component functionality
 * Handles accordion open/close behavior and accessibility
 */

document.addEventListener('DOMContentLoaded', () => {
  // Find all accordion groups on the page
  const accordionGroups =
    document.querySelectorAll<HTMLElement>('.accordion-group');

  accordionGroups.forEach((group) => {
    const isSingleOpen = group.dataset.accordionSingleOpen === 'true';
    const accordions = group.querySelectorAll<HTMLElement>('.accordion');

    // Set up click handlers for each accordion in this group
    accordions.forEach((accordion) => {
      const toggleButton =
        accordion.querySelector<HTMLButtonElement>('.accordion__toggle');
      const contentPanel =
        accordion.querySelector<HTMLElement>('.accordion__body');

      if (!toggleButton || !contentPanel) return;

      toggleButton.addEventListener('click', () => {
        const isExpanded =
          toggleButton.getAttribute('aria-expanded') === 'true';

        // If this is a single-open group, close all other accordions first
        if (isSingleOpen && !isExpanded) {
          accordions.forEach((otherAccordion) => {
            if (otherAccordion !== accordion) {
              const otherButton =
                otherAccordion.querySelector<HTMLButtonElement>(
                  '.accordion__toggle'
                );
              const otherPanel =
                otherAccordion.querySelector<HTMLElement>('.accordion__body');
              const otherChevron = otherAccordion.querySelector<HTMLElement>(
                '.accordion__chevron'
              );

              if (otherButton && otherPanel) {
                otherButton.setAttribute('aria-expanded', 'false');
                otherPanel.setAttribute('hidden', '');
                otherAccordion.classList.remove('accordion--open');

                // Remove rotation from other chevrons
                if (otherChevron) {
                  otherChevron.classList.remove('accordion__chevron--rotated');
                }
              }
            }
          });
        }

        // Toggle current accordion
        toggleButton.setAttribute('aria-expanded', (!isExpanded).toString());

        if (isExpanded) {
          contentPanel.setAttribute('hidden', '');
          accordion.classList.remove('accordion--open');
        } else {
          contentPanel.removeAttribute('hidden');
          accordion.classList.add('accordion--open');
        }

        // Rotate chevron (not the title icon)
        const chevron = toggleButton.querySelector('.accordion__chevron');
        if (chevron) {
          chevron.classList.toggle('accordion__chevron--rotated');
        }
      });
    });
  });
});
