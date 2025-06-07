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
        e.preventDefault(); 
        modal.style.display = 'none';
        };


    }
    window.onclick = (e) => {
        if (e.target === modal) modal.style.display = 'none';
    };


    document.querySelectorAll('.editBtn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.getElementById('editID').value = btn.dataset.id;
      document.getElementById('editLastName').value = btn.dataset.lname;
      document.getElementById('editFirstName').value = btn.dataset.fname;
      document.getElementById('editMiddleName').value = btn.dataset.mname;
      document.getElementById('editProvince').value = btn.dataset.province;
      document.getElementById('editCity').value = btn.dataset.city;
      document.getElementById('editBarangay').value = btn.dataset.barangay;
      document.getElementById('editDetailed').value = btn.dataset.detailed;
      document.getElementById('editContact').value = btn.dataset.contact;

      document.getElementById('editModal').style.display = 'flex';
    });
  });

  document.querySelector('.closeModal').addEventListener('click', () => {
    document.getElementById('editModal').style.display = 'none';
  });

   document.querySelectorAll('.deleteBtn').forEach(btn => {
    btn.addEventListener('click', () => {
      const customerID = btn.dataset.id;
      if (confirm('Are you sure you want to delete this customer?')) {
        window.location.href = `deleteCustomer.php?id=${customerID}`;
      }
    });
  });
});
