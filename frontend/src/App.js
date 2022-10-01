import Home from "./pages/Home";
import { Routes, Route,Navigate } from "react-router-dom";
import { Provider } from 'react-redux'
import Login from "./components/Login";
import Register from "./components/Register";
import PropertyDetails from "./pages/PropertyDetails";
import Meetings from "./pages/Meetings";
import store from './store/store'

function App() {
    return (
        <>
        <Provider store={store}>
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/login" element={<Login />} />
                <Route path="/register" element={<Register />} />
                <Route path="/my-meetings" element={<Meetings />} />
                <Route
                    path="/property/:slug"
                    element={<PropertyDetails />}
                />
                <Route path="*" element={<Navigate to="/" replace />} />
            </Routes>
        </Provider>
        </>
    );
}

export default App;
