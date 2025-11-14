import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const statusElement = document.getElementById('csv-download-status');

    if (!window.Echo || !statusElement || !window.currentUserId) {
        return;
    }

    statusElement.dataset.state = 'idle';

    window.Echo.private(`reports.${window.currentUserId}`).listen('.report.downloaded', (event) => {
        statusElement.textContent = `CSV ready: ${event.fileName} (${event.rowCount} rows) at ${new Date(
            event.completedAt,
        ).toLocaleString()}`;
        statusElement.dataset.state = 'complete';
    });
});
