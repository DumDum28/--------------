document.addEventListener('DOMContentLoaded', () => {
    const date = document.getElementById('date');
    const dateLabel = document.querySelector('.date-label');
    const table = document.querySelector('table');

    date.addEventListener('change', () => {
        dateLabel.textContent = `วันที่ ${date.value}`;
    });

    table.addEventListener('click', (event) => {
        if (event.target.tagName === 'TD') {
            const row = event.target.parentNode;
            const carReg = row.cells[0].textContent;
            const time = event.target.cellIndex;

            window.location.href = `table_manage_detail.html?carreg=${carReg}&time=${time}`;
        }
    });

    // Read URL parameters and update table
    const urlParams = new URLSearchParams(window.location.search);
    const carreg = urlParams.get('carreg');
    const start = urlParams.get('start');
    const end = urlParams.get('end');

    if (carreg && start && end) {
        const startHour = parseInt(start.split(':')[0]);
        const endHour = parseInt(end.split(':')[0]);

        const rows = table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            if (row.cells[0].textContent === carreg) {
                for (let i = startHour + 1; i <= endHour; i++) {
                    row.cells[i].style.backgroundColor = '#f4a3a3';
                }
            }
        });
    }
});