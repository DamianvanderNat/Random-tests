// Search Logic
document.getElementById('search').addEventListener('input', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#productTable tbody tr');
    rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});

// Filter Logic
document.getElementById('rarity-filter').addEventListener('change', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#productTable tbody tr');
    rows.forEach(row => {
        const status = row.cells[2].innerText.toLowerCase();
        row.style.display = !filter || status === filter ? '' : 'none';
    });
});
