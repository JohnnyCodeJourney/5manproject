document.addEventListener('DOMContentLoaded', () => {
    const openModal = document.getElementById('openAddCustomerModal');
    const modal = document.getElementById('addCustomerModal');
    const closeModal = document.getElementById('closeAddCustomerModal');
    const cancelBtn = document.getElementById('cancelBTN');

    if (openModal) {
        openModal.onclick = () => { modal.style.display = 'flex'; };
    }
    if (closeModal) {
        closeModal.onclick = () => { modal.style.display = 'none'; };
    }
    if (cancelBtn) {
       cancelBtn.onclick = (e) => {
        e.preventDefault(); // ⛔ stop the form submission
        modal.style.display = 'none';
        };


    }
    window.onclick = (e) => {
        if (e.target === modal) modal.style.display = 'none';
    };
});
