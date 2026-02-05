<style>
    a { text-decoration: none; }
    .logo-row { display: flex; flex-wrap: wrap; justify-content: center; align-items: center; }
    .gov-logo { width: clamp(80px, 20vw, 150px); height: auto; object-fit: contain; }
    /* Ensure icons show up if you are using Boxicons */
    .fs-4 { font-size: 1.5rem !important; }
</style>

<link rel="stylesheet" href="<?php echo WEB_ROOT;?>news/css/news.css">

<section class="content-section" id="content">
    <div class="header-banner">
        <div class="container">
            <h1><i class="fas fa-newspaper"></i> Registry of Qualified Applicants</h1>
            <hr>
            <p>Department of Education - Division of Silay</p>
        </div>
    </div>

    <div class="container mt-5">
         <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>Date Posted</th>
                        <th>Preview</th>
                    </tr>
                </thead>
                <tbody id="rqaTableBody"></tbody>
            </table>
        </div>
    </div>
</section>

<script>
/* HELPER: ESCAPE HTML */
function escapeHtml(text) {
    return text ? text.replace(/[&<>"']/g, m => ({
        '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'
    }[m])) : '';
}

/* LOAD RQA */
async function loadRqa() {
    try {
        // Pointing to the correct API location from root
        const apiPath = '<?= WEB_ROOT; ?>administrator-page/rqa/api/fetch-rqa.php';
        const res = await fetch(apiPath, { credentials:'same-origin' });
        const json = await res.json();

        if (!json.success) return;

        const tbody = document.getElementById('rqaTableBody');
        tbody.innerHTML = '';

        json.data.forEach((row, i) => {
            const ext = row.rFile.split('.').pop().toLowerCase();
            const isImage = ['jpg','jpeg','png','webp'].includes(ext);
            
            // Path to the actual physical files
            const filePath = '<?= WEB_ROOT; ?>assets/rqa-files/' + row.rFile;
            // Path to the viewer script
            const viewPath = '<?= WEB_ROOT; ?>administrator-page/rqa/api/view-rqa.php?id=' + row.rId;

            const filePreview = isImage
                ? `<img src="${filePath}" style="width:50px;height:50px;object-fit:cover" class="rounded">`
                : `<i class="bx bxs-file-pdf text-danger fs-2"></i>`;

            tbody.innerHTML += `
            <tr>
                <td>${i + 1}</td>
                <td>${escapeHtml(row.fileName)}</td>
                <td>${row.dateAdded}</td>
                <td>
                    <a href="${viewPath}" class="text-primary me-2" title="View">
                       <i class="bi bi-eye"></i> View
                    </a>
                </td>
            </tr>`;
        });
    } catch (err) { 
        console.error("Load error:", err); 
    }
}

// Initialize on load
document.addEventListener('DOMContentLoaded', loadRqa);
</script>