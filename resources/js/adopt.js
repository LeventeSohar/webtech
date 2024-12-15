document.addEventListener('DOMContentLoaded', function () {
    // 1. Checkbox functionalities
    const newestCheckbox = document.getElementById('newest');
    const oldestCheckbox = document.getElementById('oldest');

    // 2. Only one checkbox can be checked at once
    newestCheckbox.addEventListener('change', function () {
        if (this.checked) {
            oldestCheckbox.checked = false;
        }
    });

    oldestCheckbox.addEventListener('change', function () {
        if (this.checked) {
            newestCheckbox.checked = false;
        }
    });

    // "Read More" functionality
    document.querySelectorAll('.read-more').forEach(function (button) {
        button.addEventListener('click', function () {
            const animalId = this.getAttribute('data-id');
            const details = document.getElementById('details-' + animalId);
            const card = document.getElementById('animal-' + animalId);

            // Toggle visibility
            if (details.style.display === 'none') {
                details.style.display = 'block';
                card.style.flexDirection = 'column';
                this.textContent = 'Show less...';
            } else {
                details.style.display = 'none';
                this.textContent = 'Read more...';
            }
        });
    });
});
