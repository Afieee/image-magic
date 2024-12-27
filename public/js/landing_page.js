const dropdown = document.querySelector('.dropdown');
const dropdownContent = document.querySelector('.dropdown-content');
let hideTimeout;

function toggleDropdown() {
    dropdownContent.classList.toggle('show');
    clearTimeout(hideTimeout);
}

dropdown.querySelector('.dropbtn').addEventListener('click', (event) => {
    event.stopPropagation();
    toggleDropdown();
});

window.addEventListener('click', (event) => {
    if (!dropdown.contains(event.target)) {
        hideTimeout = setTimeout(() => {
            dropdownContent.classList.remove('show');
        }, 400);
    }
});

dropdownContent.addEventListener('mouseenter', () => {
    clearTimeout(hideTimeout);
});

dropdownContent.addEventListener('mouseleave', () => {
    hideTimeout = setTimeout(() => {
        dropdownContent.classList.remove('show');
    }, 1000);
});
