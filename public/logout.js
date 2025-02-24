const logoutlink = document.querySelector('#logoutlink');

logoutlink.addEventListener('click', () => {
    localStorage.removeItem('jwt');
    location.href = '/login';
});
