import { createBrowserRouter } from 'react-router-dom';
import Documents from './routes/Documents.jsx';
import NotFound from './routes/NotFound.jsx';

function getRoute(route, element) {
    return {
        path: route,
        element: element
    }
}

export default createBrowserRouter([
    getRoute('/documents', <Documents />),
    getRoute('*', <NotFound />)
]);