
let provinces = [];
let cities = [];
let barangays = [];

// Load JSON data
fetch("../data/provinces.json")
    .then(response => response.json())
    .then(data => {
        provinces = data;
        populateSelect("province", provinces);
    });

fetch("../data/cities.json")
    .then(response => response.json())
    .then(data => {
        cities = data;
    });

fetch("../data/barangays.json")
    .then(response => response.json())
    .then(data => {
        barangays = data;
    });

function populateSelect(selectId, data) {
    const select = document.getElementById(selectId);
    select.innerHTML = '<option value="">Select</option>';
    data.forEach(item => {
        select.innerHTML += `<option value="${item.prov_code || item.mun_code}">${item.name}</option>`;
    });
}

document.getElementById("province").addEventListener("change", function () {
    const selectedProvince = this.value;
    const filteredCities = cities.filter(city => city.prov_code === selectedProvince);
    const citySelect = document.getElementById("city");
    citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
    filteredCities.forEach(city => {
        citySelect.innerHTML += `<option value="${city.mun_code}">${city.name}</option>`;
    });

    // Reset barangays
    document.getElementById("barangay").innerHTML = '<option value="">Select Barangay</option>';
});

document.getElementById("city").addEventListener("change", function () {
    const selectedCity = this.value;
    const filteredBarangays = barangays.filter(barangay => barangay.mun_code === selectedCity);
    const barangaySelect = document.getElementById("barangay");
    barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
    filteredBarangays.forEach(barangay => {
        barangaySelect.innerHTML += `<option value="${barangay.name}">${barangay.name}</option>`;
    });
});

console.log("Provinces loaded:", provinces);
console.log("Cities loaded:", cities);
console.log("Barangays loaded:", barangays);