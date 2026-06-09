import './bootstrap';

const cssVar = (name) => getComputedStyle(document.documentElement).getPropertyValue(name).trim();

function initThemeToggle() {
    document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const next = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
            document.documentElement.dataset.theme = next;
            localStorage.setItem('warung-theme', next);
        });
    });
}

function initSmartSearch() {
    const input = document.querySelector('[data-smart-search-input]');
    const wrapper = document.querySelector('[data-smart-search]');
    if (!input || !wrapper) return;

    document.addEventListener('keydown', (event) => {
        if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'k') {
            event.preventDefault();
            input.focus();
        }
    });

    input.addEventListener('input', () => {
        wrapper.classList.toggle('is-open', input.value.length > 0);
    });
}

function initSmartTables() {
    document.querySelectorAll('[data-smart-table]').forEach((tableShell) => {
        const input = tableShell.querySelector('[data-table-search]');
        const rows = [...tableShell.querySelectorAll('tbody tr')];

        input?.addEventListener('input', () => {
            const query = input.value.toLowerCase();
            rows.forEach((row) => {
                row.hidden = !row.textContent.toLowerCase().includes(query);
            });
        });

        tableShell.querySelectorAll('[data-sort]').forEach((header) => {
            header.addEventListener('click', () => {
                const index = [...header.parentElement.children].indexOf(header);
                const tbody = tableShell.querySelector('tbody');
                [...tbody.querySelectorAll('tr')]
                    .sort((a, b) => a.children[index].textContent.trim().localeCompare(b.children[index].textContent.trim()))
                    .forEach((row) => tbody.appendChild(row));
            });
        });
    });
}

function initCharts() {
    if (!window.Chart || !window.inventoryCharts) return;

    Chart.defaults.font.family = 'Inter, system-ui, sans-serif';
    Chart.defaults.color = cssVar('--muted');
    Chart.defaults.borderColor = cssVar('--line');

    const palette = [cssVar('--primary'), cssVar('--success'), cssVar('--warning'), cssVar('--danger'), '#06b6d4', '#8b5cf6'];
    const charts = window.inventoryCharts;

    const stockCanvas = document.getElementById('stockOverviewChart');
    if (stockCanvas) {
        new Chart(stockCanvas, {
            type: 'line',
            data: {
                labels: charts.stockOverview.labels,
                datasets: [
                    { label: 'Masuk', data: charts.stockOverview.in, borderColor: cssVar('--success'), backgroundColor: 'rgba(16, 185, 129, .12)', tension: .42, fill: true },
                    { label: 'Keluar', data: charts.stockOverview.out, borderColor: cssVar('--danger'), backgroundColor: 'rgba(244, 63, 94, .10)', tension: .42, fill: true },
                ],
            },
            options: { responsive: true, plugins: { legend: { position: 'bottom' } }, scales: { y: { beginAtZero: true } } },
        });
    }

    const monthlyCanvas = document.getElementById('monthlySalesChart');
    if (monthlyCanvas) {
        new Chart(monthlyCanvas, {
            type: 'bar',
            data: { labels: charts.monthlySales.labels, datasets: [{ label: 'Penjualan', data: charts.monthlySales.data, backgroundColor: cssVar('--primary') }] },
            options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } },
        });
    }

    const categoryCanvas = document.getElementById('categoryChart');
    if (categoryCanvas) {
        new Chart(categoryCanvas, {
            type: 'doughnut',
            data: { labels: charts.categories.labels, datasets: [{ data: charts.categories.data, backgroundColor: palette }] },
            options: { plugins: { legend: { position: 'bottom' } }, cutout: '66%' },
        });
    }

    const topCanvas = document.getElementById('topProductsChart');
    if (topCanvas) {
        new Chart(topCanvas, {
            type: 'bar',
            data: { labels: charts.topProducts.labels, datasets: [{ label: 'Qty keluar', data: charts.topProducts.data, backgroundColor: cssVar('--success') }] },
            options: { indexAxis: 'y', plugins: { legend: { display: false } }, scales: { x: { beginAtZero: true } } },
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initThemeToggle();
    initSmartSearch();
    initSmartTables();
    initCharts();
});
