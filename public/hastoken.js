const token = localStorage.getItem("token");

if (token === null) {
    location.href = '/login';
}

(async function () {
    try {
        const req = await fetch('/auth/verify', {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + token
            }
        });

        const res = await req.json();
        console.log(res);
        // console.log(res.message)
        if (!res.success) {
            localStorage.removeItem('token');
            location.href = '/login';
        }
    } catch (e) {
        console.log(e)
    }
})();
