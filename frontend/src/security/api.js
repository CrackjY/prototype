const user = JSON.parse(localStorage.getItem('user'));

let token = ''

if  (user && user.token) {
    token = user.token
}

const config = {
    url: 'http://prototype.com.local/api',
    headers: {
        'Authorization': 'Bearer '+ token
    }
}

export default config