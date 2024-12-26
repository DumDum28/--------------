document.addEventListener('DOMContentLoaded', () => {
    const startTimeSelect = document.getElementById('start-time');
    const endTimeSelect = document.getElementById('end-time');
    const saveButton = document.getElementById('save-button');

    startTimeSelect.addEventListener('change', () => {
        const startTime = startTimeSelect.value;
        const startHour = parseInt(startTime.split(':')[0]);

        // Clear end-time options
        endTimeSelect.innerHTML = '';

        // Add new end-time options
        for (let i = startHour + 1; i <= 23; i++) {
            const option = document.createElement('option');
            option.value = `${i.toString().padStart(2, '0')}:00`;
            option.textContent = `${i.toString().padStart(2, '0')}.00 น.`;
            endTimeSelect.appendChild(option);
        }
    });

    saveButton.addEventListener('click', () => {
        const startTime = startTimeSelect.value;
        const endTime = endTimeSelect.value;
        const startHour = parseInt(startTime.split(':')[0]);
        const endHour = parseInt(endTime.split(':')[0]);

        // Get the table in table_manage.html
        const table = document.querySelector('table');
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            for (let i = startHour + 1; i <= endHour; i++) {
                cells[i].style.backgroundColor = '#f4a3a3';
            }
        });

        window.location.href = 'table_manage.html'; // Redirect to table_manage.html
    });
});