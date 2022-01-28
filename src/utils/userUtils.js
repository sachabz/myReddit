export function getUser() {
    const stringUser = localStorage.getItem('user');
    const user = stringUser !== null ? JSON.parse(stringUser) : undefined;
    return user;
}

export function logoutUser() {
    localStorage.removeItem('user');
    localStorage.removeItem('token');
}

