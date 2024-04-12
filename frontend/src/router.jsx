import { createBrowserRouter } from 'react-router-dom';
import NotFound from './routes/NotFound.jsx';
import Documents from './routes/documents.jsx';

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