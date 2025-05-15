/**
 * Course Filtering and Sorting System
 *
 * This script handles the filtering and sorting of course items based on
 * user selection from dropdown menus.
 */

document.addEventListener('DOMContentLoaded', () => {
  // Get references to all DOM elements
  const formatFilter = document.getElementById(
    'format-filter'
  ) as HTMLSelectElement;
  const availabilityFilter = document.getElementById(
    'availability-filter'
  ) as HTMLSelectElement;
  const sortBySelector = document.getElementById(
    'sort-by'
  ) as HTMLSelectElement;
  const courseGrid = document.querySelector('.courses-grid') as HTMLElement;
  // Only select courses-child elements that are direct children of the courses-grid
  const courseItems = document.querySelectorAll(
    '.courses-grid > .courses-child'
  ) as NodeListOf<HTMLElement>;

  /**
   * Applies all filters and sorts to the course items
   */
  const updateCourses = () => {
    const formatValue = formatFilter.value;
    const availabilityValue = availabilityFilter.value;
    const sortValue = sortBySelector.value;

    // First, filter courses
    courseItems.forEach((item) => {
      const itemType = item.getAttribute('data-type');
      const itemOpen = item.getAttribute('data-open');

      // Start with showing all items
      let shouldShow = true;

      // Apply format filter (if not 'all')
      if (formatValue !== 'all') {
        // Special case: when 'online' is selected, also show 'free' events
        if (formatValue === 'online') {
          if (itemType !== 'online' && itemType !== 'free') {
            shouldShow = false;
          }
        } else if (itemType !== formatValue) {
          shouldShow = false;
        }
      }

      // Apply availability filter (if not 'all')
      if (shouldShow && availabilityValue !== 'all') {
        if (availabilityValue === 'upcoming' && itemOpen !== 'closed') {
          shouldShow = false;
        } else if (availabilityValue === 'open' && itemOpen !== 'open') {
          shouldShow = false;
        }
      }

      // Show or hide the item
      item.style.display = shouldShow ? 'flex' : 'none';
    });

    // Then, sort visible courses
    sortCourses(sortValue);

    // Check if no courses are visible
    const visibleCourses = Array.from(courseItems).filter(
      (item) => item.style.display !== 'none'
    );

    if (visibleCourses.length === 0) {
      // If no courses match filters, show a message
      if (!document.querySelector('.no-courses-message')) {
        const noCoursesMessage = document.createElement('div');
        noCoursesMessage.className = 'no-courses-message';
        noCoursesMessage.textContent = 'No courses match your current filters.';
        noCoursesMessage.style.gridColumn = '1 / -1';
        noCoursesMessage.style.padding = '3rem';
        noCoursesMessage.style.textAlign = 'center';
        noCoursesMessage.style.fontSize = '1.8rem';
        courseGrid.appendChild(noCoursesMessage);
      }
    } else {
      // Remove no courses message if it exists
      const message = document.querySelector('.no-courses-message');
      if (message) {
        message.remove();
      }
    }
  };

  /**
   * Sorts the currently visible courses
   *
   * @param sortType - The type of sorting to apply ('date' or 'alpha')
   */
  const sortCourses = (sortType: string) => {
    const visibleCourses = Array.from(courseItems).filter(
      (item) => item.style.display !== 'none'
    );

    // Sort courses based on selected criteria
    visibleCourses.sort((a, b) => {
      if (sortType === 'date') {
        // Sort by date (starting soon first)
        const dateA = a.getAttribute('data-date') || '31-12-9999';
        const dateB = b.getAttribute('data-date') || '31-12-9999';

        // If both are empty or have the same value
        if (dateA === dateB) return 0;

        // If either is empty, put courses with no date at the end
        if (!dateA || dateA === '') return 1;
        if (!dateB || dateB === '') return -1;

        // Parse DD-MM-YYYY dates
        const [dayA, monthA, yearA] = dateA.split('-').map(Number);
        const [dayB, monthB, yearB] = dateB.split('-').map(Number);

        // Create Date objects (year, month-1, day)
        const dateObjA = new Date(yearA, monthA - 1, dayA);
        const dateObjB = new Date(yearB, monthB - 1, dayB);

        // Compare timestamps
        return dateObjA.getTime() - dateObjB.getTime();
      } else if (sortType === 'alpha') {
        // Sort alphabetically
        const alphaA = a.getAttribute('data-alpha') || '';
        const alphaB = b.getAttribute('data-alpha') || '';

        return alphaA.localeCompare(alphaB);
      }

      return 0;
    });

    // Reattach sorted elements to the grid
    visibleCourses.forEach((item) => {
      courseGrid.appendChild(item);
    });
  };

  // Add event listeners to the filter elements
  formatFilter.addEventListener('change', updateCourses);
  availabilityFilter.addEventListener('change', updateCourses);
  sortBySelector.addEventListener('change', updateCourses);

  // Initialize with default sort/filter
  updateCourses();
});
