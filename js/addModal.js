document.addEventListener('DOMContentLoaded', () => {
  // ---------- ADD CUSTOMER MODAL ----------
  const openCustomerModalBtn = document.getElementById('openAddCustomerModal');
  const customerModal = document.getElementById('addCustomerModal');
  const closeCustomerModalBtn = document.getElementById('closeAddCustomerModal');
  const cancelCustomerBtn = document.getElementById('cancelBTN');

  if (openCustomerModalBtn) {
    openCustomerModalBtn.onclick = () => customerModal.style.display = 'flex';
  }
  if (closeCustomerModalBtn) {
    closeCustomerModalBtn.onclick = () => customerModal.style.display = 'none';
  }
  if (cancelCustomerBtn) {
    cancelCustomerBtn.onclick = (e) => {
      e.preventDefault();
      customerModal.style.display = 'none';
    };
  }

  // ---------- RENTAL MODAL ----------
  const openRentalModal = document.getElementById('openAddRentals');
  const addRentalsModal = document.getElementById('addRentalsModal');
  const closeRentalModalBtn = document.getElementById('closeRentInformation');
  const cancelRentBtn = document.getElementById('cancelRent');
  const searchInput1 = document.getElementById('searchCustomer1');
  
  
  if (searchInput1) {
    searchInput1.addEventListener('input', function () {
      const filter1 = this.value.toLowerCase();
      const rows1 = document.querySelectorAll('#customerTableBody1 tr');
      rows1.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter1) ? '' : 'none';
      });
    });
  }

  if (openRentalModal) {
    openRentalModal.onclick = () => addRentalsModal.style.display = 'flex';
  }
  if (closeRentalModalBtn) {
    closeRentalModalBtn.onclick = () => addRentalsModal.style.display = 'none';
  }
  if (cancelRentBtn) {
    cancelRentBtn.onclick = (e) => {
      e.preventDefault();
      addRentalsModal.style.display = 'none';
    };
  }

  // ---------- SELECT CUSTOMER MODAL ----------
  const modalSelect = document.getElementById("selectCustomerModal");
  const openSelectCustomerBtn = document.getElementById("openCustomerModal");
  const closeSelectCustomerBtn = document.getElementById("closeCustomerModal");
  const rentalForm = document.getElementById('rentalFormId'); 
  rentalForm.addEventListener('submit', function (e) {
    const customerID = document.getElementById('selectedCustomerID').value;

    if (!customerID) {
      e.preventDefault();
      alert('Please select a customer before submitting the rental.');
      return;
    }
  });

  if (openSelectCustomerBtn && modalSelect) {
    openSelectCustomerBtn.onclick = () => modalSelect.style.display = "flex";
  }
  if (closeSelectCustomerBtn) {
    closeSelectCustomerBtn.onclick = () => modalSelect.style.display = "none";
  }

  function selectCustomer(id, name, contact) {
    document.getElementById('selectedCustomerID').value = id;
    document.getElementById('selectedCustomerName').value = name;
    document.getElementById('selectedCustomerContact').value = contact;
    modalSelect.style.display = "none";
  }
  window.selectCustomer = selectCustomer; // expose to global

  const searchInput = document.getElementById('searchCustomer');
  if (searchInput) {
    searchInput.addEventListener('input', function () {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll('#customerTableBody tr');
      rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
      });
    });
  }

  // ---------- EDIT CUSTOMER ----------
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

  const closeEditModal = document.querySelector('.closeModal');
  if (closeEditModal) {
    closeEditModal.addEventListener('click', () => {
      document.getElementById('editModal').style.display = 'none';
    });
  }

  // ---------- DELETE CUSTOMER ----------
  document.querySelectorAll('.deleteBtn').forEach(btn => {
    btn.addEventListener('click', () => {
      const customerID = btn.dataset.id;
      if (confirm('Are you sure you want to delete this customer?')) {
        window.location.href = `deleteCustomer.php?id=${customerID}`;
      }
    });
  });

  // ---------- SHARED WINDOW CLOSE FOR MODALS ----------
  window.onclick = (event) => {
    if (event.target === customerModal) customerModal.style.display = 'none';
    if (event.target === addRentalsModal) addRentalsModal.style.display = 'none';
    if (event.target === modalSelect) modalSelect.style.display = 'none';
    if (event.target === document.getElementById('editModal')) document.getElementById('editModal').style.display = 'none';
  };
});
