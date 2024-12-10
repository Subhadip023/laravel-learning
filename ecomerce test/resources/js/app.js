import './bootstrap';
const successMsg = document.getElementById('successMsg');
if (successMsg) {
    setTimeout(() => {
        successMsg.style.display = 'none';
    }, 3000);
}
