import domReady from '@wordpress/dom-ready';
import { createRoot } from '@wordpress/element';
import { BrowserRouter as Router } from 'react-router-dom';
import Dashboard from './pages';

import './scss/style.scss';

domReady(() => {
    const root = createRoot(document.getElementById('cw-dashboard'));
    root.render(
        <>
            <Router>
                <Dashboard />
            </Router>
        </>
    );
});


