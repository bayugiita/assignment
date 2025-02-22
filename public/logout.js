const logoutlink = document.querySelector('#logoutlink');

logoutlink.addEventListener('click', () => {
    localStorage.removeItem('token');
    location.href = '/login';
});
