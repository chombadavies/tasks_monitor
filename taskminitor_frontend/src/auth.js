// src/auth.js

// A simple function to check if the user's authentication token exists and is valid
export function isAuthenticated() {
    // Assume you store the token in localStorage after login
    const token = localStorage.getItem('userToken');
    // A real application would validate the token's integrity and expiration
    return !!token;
}

// A function to check if the authenticated user is an admin
export function isAdmin() {
    // Assume you also store the user role in localStorage after login
    const role = localStorage.getItem('userRole');
    return role === 'Admin';
}
