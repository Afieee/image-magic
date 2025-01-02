const dropdown = document.querySelector('.dropdown');
const dropdownContent = document.querySelector('.dropdown-content');

let hideTimeout;

function showDropdown() {
    clearTimeout(hideTimeout);
    dropdownContent.style.display = 'block';
}

function hideDropdown() {
    hideTimeout = setTimeout(() => {
        dropdownContent.style.display = 'none';
    }, 2000);
}

dropdown.addEventListener('mouseover', showDropdown);

dropdown.addEventListener('mouseleave', hideDropdown);

dropdownContent.addEventListener('mouseover', showDropdown);

dropdownContent.addEventListener('mouseleave', hideDropdown);
