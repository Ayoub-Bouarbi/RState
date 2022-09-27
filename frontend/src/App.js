import Home from "./pages/Home";
import { Routes, Route } from "react-router-dom";
import Login from "./components/Login";
import Register from "./components/Register";
import PropertyDetails from "./pages/PropertyDetails";
import Properties from "./pages/Properties";
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
                <Route path="/properties" element={<Properties />} />
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
