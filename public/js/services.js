document.addEventListener('DOMContentLoaded', function() {
    // Get the initial detail index based on existing entries
    let detailIndex = typeof serviceTranslationsCount !== 'undefined' ? serviceTranslationsCount : 1;
    const container = document.getElementById('service-details-container');
    const addButton = document.getElementById('add-service-detail');

    if (!container || !addButton) return;

    // Add new service detail section
    addButton.addEventListener('click', function() {
        const newDetail = document.createElement('div');
        newDetail.className = 'service-detail-item border rounded p-2 mb-2';
        newDetail.innerHTML = `
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="mb-0">Additional Entry #${detailIndex}</h5>
            <button type="button" class="btn btn-sm btn-alt-danger remove-detail" title="Remove this entry">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="row mb-2">
            <div class="col-md-6">
                <label class="form-label" for="names_${detailIndex}">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="names_${detailIndex}" name="names[]" required>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="icons_${detailIndex}">Icon (FontAwesome Class)</label>
                <input type="text" class="form-control" id="icons_${detailIndex}" name="icons[]" placeholder="fa fa-example">
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label" for="descriptions_${detailIndex}">Description</label>
            <textarea class="form-control" id="descriptions_${detailIndex}" name="descriptions[]" rows="3"></textarea>
        </div>
    `;

        container.appendChild(newDetail);
        detailIndex++;

        // Add event listener to remove button
        newDetail.querySelector('.remove-detail').addEventListener('click', function() {
            container.removeChild(newDetail);
        });
    });

    // Add event listeners to existing remove buttons
    document.querySelectorAll('.remove-detail').forEach(button => {
        button.addEventListener('click', function() {
            const detailItem = this.closest('.service-detail-item');
            container.removeChild(detailItem);
        });
    });
}); 