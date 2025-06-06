const openModal = document.getElementById('openAddCustomerModal');
const modal = document.getElementById('addCustomerModal');
const closeModal = document.getElementById('closeAddCustomerModal');

openModal.onclick = () => { modal.style.display = 'flex'; };
closeModal.onclick = () => { modal.style.display = 'none'; };
window.onclick = (e) => {
    if (e.target === modal) modal.style.display = 'none';
};