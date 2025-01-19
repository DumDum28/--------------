document.addEventListener('DOMContentLoaded', function () {
    const sProvinceSelect = document.getElementById('s-province');
    const sDistrictSelect = document.getElementById('s-distric');
    const sSubdistrictSelect = document.getElementById('s-street-address');
    const eProvinceSelect = document.getElementById('e-province');
    const eDistrictSelect = document.getElementById('e-distric');
    const eSubdistrictSelect = document.getElementById('e-street-address');

    const sProvinceText = document.getElementById('s-province-text');
    const sDistrictText = document.getElementById('s-distric-text');
    const sSubdistrictText = document.getElementById('s-street-address-text');
    const eProvinceText = document.getElementById('e-province-text');
    const eDistrictText = document.getElementById('e-distric-text');
    const eSubdistrictText = document.getElementById('e-street-address-text');

    // Fetch provinces
    fetch('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province.json')
        .then(response => response.json())
        .then(data => {
            data.forEach(province => {
                const option = document.createElement('option');
                option.value = province.id; // ใช้ id ของจังหวัดเป็นค่า
                option.textContent = province.name_th;
                sProvinceSelect.appendChild(option);
                eProvinceSelect.appendChild(option.cloneNode(true));
            });
        })
        .catch(error => console.error('Error fetching provinces:', error));

    // Handle province change
    sProvinceSelect.addEventListener('change', function () {
        fetchDistricts(sProvinceSelect.value, sDistrictSelect, sSubdistrictSelect);
        sProvinceText.value = sProvinceSelect.options[sProvinceSelect.selectedIndex].textContent;
    });

    eProvinceSelect.addEventListener('change', function () {
        fetchDistricts(eProvinceSelect.value, eDistrictSelect, eSubdistrictSelect);
        eProvinceText.value = eProvinceSelect.options[eProvinceSelect.selectedIndex].textContent;
    });

    function fetchDistricts(provinceId, districtSelect, subdistrictSelect) {
        fetch('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_amphure.json')
            .then(response => response.json())
            .then(data => {
                const districts = data.filter(district => district.province_id == provinceId);
                districtSelect.innerHTML = '<option value="" disabled selected>อำเภอ</option>';
                subdistrictSelect.innerHTML = '<option value="" disabled selected>ตำบล</option>';
                districts.forEach(district => {
                    const option = document.createElement('option');
                    option.value = district.id; // ใช้ id ของอำเภอเป็นค่า
                    option.textContent = district.name_th;
                    districtSelect.appendChild(option);
                });

                districtSelect.addEventListener('change', function () {
                    fetchSubdistricts(districtSelect.value, subdistrictSelect);
                    sDistrictText.value = districtSelect.options[districtSelect.selectedIndex].textContent;
                    eDistrictText.value = districtSelect.options[districtSelect.selectedIndex].textContent;
                });
            })
            .catch(error => console.error('Error fetching districts:', error));
    }

    function fetchSubdistricts(districtId, subdistrictSelect) {
        fetch('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_tambon.json')
            .then(response => response.json())
            .then(data => {
                const subdistricts = data.filter(subdistrict => subdistrict.amphure_id == districtId);
                subdistrictSelect.innerHTML = '<option value="" disabled selected>ตำบล</option>';
                subdistricts.forEach(subdistrict => {
                    const option = document.createElement('option');
                    option.value = subdistrict.id; // ใช้ id ของตำบลเป็นค่า
                    option.textContent = subdistrict.name_th;
                    subdistrictSelect.appendChild(option);
                });

                subdistrictSelect.addEventListener('change', function () {
                    sSubdistrictText.value = subdistrictSelect.options[subdistrictSelect.selectedIndex].textContent;
                    eSubdistrictText.value = subdistrictSelect.options[subdistrictSelect.selectedIndex].textContent;
                });
            })
            .catch(error => console.error('Error fetching subdistricts:', error));
    }
});