import axios from "axios"

const axiosClient = axios.create({
    baseURL: `${import.meta.env.VITE_BACKEND_URL}/api`
});

// axiosClient.interceptors.request.use((config) => {
//     config.headers.Authorization = `Bearer ${localStorage.getItem('token')}`;
// })

axiosClient.interceptors.response.use((response) => {
    console.log('Response axios client: ' ,  response);

    return response;
}, (error) => {
    console.log('Error axios client: ' ,  error);
});

export default axiosClient
