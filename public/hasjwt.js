const jwt = localStorage.getItem('jwt');

if (jwt === null) {
    location.href = '/login';
}

(async function () {
    try {
        const req = await fetch('/auth/verify', {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + jwt
            }
        });

        const res = await req.json();
        console.log(res);
        // console.log(res.message)
        // return;
        if (!res.success) {
            localStorage.removeItem('jwt');
            location.href = '/login';
        }
    } catch (e) {
        console.log(e)
    }
})();
