const dashboard = document.getElementById('dashboardSection');
const customer = document.getElementById('recordCustomer');
const staff = document.getElementById('recordStaff');
const rentals = document.getElementById('salesSection');
const report = document.getElementById('reportSection');
const user = document.getElementById('userSection');
const navItems = document.querySelectorAll('.navItem');
const actionsTD = document.querySelectorAll('.actionsTD');

// pang role base
if(userRole == "Staff"){
  document.getElementById('users_button').style.display = 'none';
  document.getElementById('staff_button').style.display = 'none';
  actionsTD.forEach(el => {
    el.style.display = 'none';
  });
}

// para sa active dashboard
navItems.forEach(item => {
  item.addEventListener('click', () => {

    navItems.forEach(i => i.classList.remove('active'));

    item.classList.add('active');
  });
});

function hideAll() {
  dashboard.style.display = 'none';
  customer.style.display = 'none';
  staff.style.display = 'none';
  rentals.style.display = 'none';
  report.style.display = 'none';
  user.style.display = 'none';
}

document.getElementById('dashboard_button').addEventListener('click', () => {
  hideAll();
  dashboard.style.display = 'block';
});

document.getElementById('customers_button').addEventListener('click', () => {
  hideAll();
  customer.style.display = 'block';
});

document.getElementById('staff_button').addEventListener('click', () => {
  hideAll();
  staff.style.display = 'block';
});

document.getElementById('rentals_button').addEventListener('click', () => {
  hideAll();
  rentals.style.display = 'block';
});

document.getElementById('reports_button').addEventListener('click', () => {
  hideAll();
  report.style.display = 'block';
});

document.getElementById('users_button').addEventListener('click', () => {
  hideAll();
  user.style.display = 'block';
});

// PARA NAKA DEFAULT YUNG STYLE NG DASHBOARD
dashboard.style.display = 'block';

// CALCULATIONS
const rateInput = document.getElementById('rate');
const daysInput = document.getElementById('numberOfDays');
const totalDisplay = document.getElementById('totalDisplay');
const totalHidden = document.getElementById('total');

const dateStartInput = document.getElementById('dateStart');
const dateEndDisplay = document.getElementById('dateEnd');
const dateEndHidden = document.getElementById('dateEnd1');

function updateTotalAndEndDate() {
  const rate = parseFloat(rateInput.value);
  const days = parseInt(daysInput.value);
  const startDate = new Date(dateStartInput.value);


  if (!isNaN(rate) && !isNaN(days)) {
    const total = rate * days;
    totalDisplay.value = total.toFixed(2);
    totalHidden.value = total.toFixed(2);
  } else {
    totalDisplay.value = '';
    totalHidden.value = '';
  }


  if (!isNaN(days) && dateStartInput.value) {
    const endDate = new Date(startDate);
    endDate.setDate(startDate.getDate() + days);


    const options = { year: 'numeric', month: 'long', day: '2-digit' };
    const formattedEnd = endDate.toLocaleDateString('en-US', options).replace(',', '').replace(' ', '-');

    dateEndDisplay.type = "text"; 
    dateEndDisplay.value = formattedEnd;

    const isoString = endDate.toISOString().split('T')[0];
    dateEndHidden.value = isoString;
  } else {
    dateEndDisplay.value = '';
    dateEndHidden.value = '';
  }
}

const rentalForm = document.getElementById('rentalFormId'); 
rentalForm.addEventListener('submit', function (e) {
  const customerID = document.getElementById('selectedCustomerID').value;

  if (!customerID) {
    e.preventDefault();
    alert('Please select a customer before submitting the rental.');
    return;
  }
});

rateInput.addEventListener('input', updateTotalAndEndDate);
daysInput.addEventListener('input', updateTotalAndEndDate);
dateStartInput.addEventListener('input', updateTotalAndEndDate);
