const sideBar = document.getElementById('sideBar');
const sideBarController = document.getElementById('sideBarController');
const mainManu = document.getElementById('mainManu');

const isHidden = localStorage.getItem('sidebarHidden') === 'true';

if (isHidden) {
    sideBar.classList.add('hidden');
    mainManu.classList.replace('w-[85%]', 'w-full');
    sideBarController.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short text-blue-800 scale-150" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
</svg>`;
} else {
    sideBar.classList.remove('hidden');
    mainManu.classList.replace('w-full', 'w-[85%]');
    sideBarController.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-blue-800 scale-150 bi bi-arrow-left-short" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
</svg>`;
}

// Add event listener for the toggle button
sideBarController.addEventListener('click', () => {
    sideBar.classList.toggle('hidden');
    
    if (sideBar.classList.contains('hidden')) {
        mainManu.classList.replace('w-[85%]', 'w-full');
        sideBarController.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short text-blue-800 scale-150" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
</svg>`;
        // Save state to localStorage
        localStorage.setItem('sidebarHidden', 'true');
    } else {
        mainManu.classList.replace('w-full', 'w-[85%]');
        sideBarController.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-blue-800 scale-150 bi bi-arrow-left-short" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
</svg>`;
        // Save state to localStorage
        localStorage.setItem('sidebarHidden', 'false');
    }
});


const successMsg = document.getElementById('successMsg');

if (successMsg) {
    setTimeout(() => {
        successMsg.style.display = 'none';
    }, 3000);
}



