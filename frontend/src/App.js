import Home from "./pages/Home";
import { Routes, Route,Navigate } from "react-router-dom";
import Login from "./components/Login";
import Register from "./components/Register";
import PropertyDetails from "./pages/PropertyDetails";
import store from './store/store'
import { Provider } from 'react-redux'

function App() {
    return (
        <>
        <Provider store={store}>
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/login" element={<Login />} />
                <Route path="/register" element={<Register />} />
                <Route path="*" element={<Navigate to="/" replace />} />
                <Route
                    path="/property/:slug"
                    element={<PropertyDetails />}
                />
            </Routes>
        </Provider>
        </>
    );
}

export default App;
