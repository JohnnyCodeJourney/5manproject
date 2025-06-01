const dashboard = document.getElementById('dashboardSection');
const customer = document.getElementById('recordCustomer');
const staff = document.getElementById('recordStaff');
const rentals = document.getElementById('salesSection');
const report = document.getElementById('reportSection');
const user = document.getElementById('userSection');

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
